<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Student;
use Carbon\Carbon;

class Payme extends Controller
{
    private function checkAuthorization(Request $request)
    {
        $authorizationHeader = $request->header('Authorization');
        $expectedAuthorization = 'Basic ' . base64_encode(env('PAYME_MERCHANT_ID') . ':' . env('PAYME_SECRET_KEY'));

        // if ($authorizationHeader !== $expectedAuthorization) {
        //     return response()->json([
        //         'jsonrpc' => '2.0',
        //         'id' => $request->id,
        //         'error' => [
        //             'code' => -32504,
        //             'message' => 'Authorization header is incorrect',
        //         ],
        //     ]);
        // }

        return true;
    }

    private function checkUser($account, $requestId)
    {
        if (empty($account)) {
            return [
                'id' => $requestId,
                'error' => [
                    'code' => -32504,
                    'message' => [
                        'ru' => 'Недостаточно привилегий для выполнения метода.',
                        'uz' => 'Metodni bajarish uchun etarli huquqlar yo\'q.',
                        'en' => 'Insufficient privileges to perform the method.',
                    ],
                ],
            ];
        } elseif (empty($account['user_id'])) {
            return [
                'id' => $requestId,
                'error' => [
                    'code' => -31050,
                    'message' => [
                        'ru' => 'User not found',
                        'uz' => 'Foydalanuvchi topilmadi',
                        'en' => 'User not found',
                    ],
                ],
            ];
        } else {
            $student = Student::find($account['user_id']);
            if (!$student) {
                return [
                    'id' => $requestId,
                    'error' => [
                        'code' => -31050,
                        'message' => [
                            'ru' => 'User not found',
                            'uz' => 'Foydalanuvchi topilmadi',
                            'en' => 'User not found',
                        ],
                    ],
                ];
            }
        }

        return true;
    }

    public function index(Request $request)
    {
        $authorization = $this->checkAuthorization($request);
        if ($authorization !== true) {
            return $authorization; // Authorization failed
        }

        switch ($request->method) {
            case "CheckPerformTransaction":
                $response = $this->checkUser($request->params['account'], $request->id);
                if ($response === true) {
                    return response()->json([
                        'result' => [
                            'allow' => true,
                        ],
                    ]);
                } else {
                    return response()->json($response);
                }

            case "CreateTransaction":
                $response = $this->checkUser($request->params['account'], $request->id);
                if ($response !== true) {
                    return response()->json($response);
                }

                $transaction = Payment::where('paycom_transaction_id', $request->params['id'])->first();

                if ($transaction) {
                    return response()->json([
                        'result' => [
                            'create_time' => $transaction->paycom_time * 1000,
                            'transaction' => strval($transaction->id),
                            'state' => intval($transaction->state),
                        ],
                    ]);
                }

                try {
                    $transaction = Payment::create([
                        'paycom_time' => $request->params['time'] / 1000,
                        'paycom_time_datetime' => Carbon::createFromTimestampMs($request->params['time'])->toDateTimeString(),
                        'student_id' => $request->params['account']['user_id'],
                        'paycom_transaction_id' => $request->params['id'],
                        'amount' => $request->params['amount'],
                        'state' => 1,
                    ]);
                } catch (\Exception $e) {
                    return response()->json([
                        'id' => $request->id,
                        'error' => [
                            'code' => -31008,
                            'message' => [
                                'ru' => 'Ошибка создания транзакции',
                                'uz' => 'Tranzaksiya yaratishda xatolik',
                                'en' => 'Error creating transaction',
                            ],
                            'data' => $e->getMessage(),
                        ],
                    ]);
                }

                return response()->json([
                    'result' => [
                        'create_time' => $request->params['time'],
                        'transaction' => strval($transaction->id),
                        'state' => 1,
                    ],
                ]);

            case "CheckTransaction":
                $transaction = Payment::where('paycom_transaction_id', $request->params['id'])->first();

                if (!$transaction) {
                    return response()->json([
                        'id' => $request->id,
                        'error' => [
                            'code' => -32504,
                            'message' => [
                                'ru' => 'Платеж не найден',
                                'uz' => 'Tranzaksiya topilmadi',
                                'en' => 'Payment not found',
                            ],
                        ],
                    ]);
                }

                $result = [
                    'create_time' => $transaction->paycom_time * 1000,
                    'transaction' => strval($transaction->id),
                    'state' => intval($transaction->state),
                    'reason' => intval($transaction->reason),
                ];

                if ($transaction->state == 1) {
                    $result['perform_time'] = intval($transaction->perform_time_unix);
                    $result['cancel_time'] = 0;
                } elseif ($transaction->state == 2) {
                    $result['perform_time'] = intval($transaction->perform_time_unix);
                    $result['cancel_time'] = 0;
                } elseif ($transaction->state == -1) {
                    $result['perform_time'] = intval($transaction->perform_time_unix);
                    $result['cancel_time'] = intval($transaction->cancel_time);
                } elseif ($transaction->state == -2) {
                    $result['perform_time'] = intval($transaction->perform_time_unix);
                    $result['cancel_time'] = intval($transaction->cancel_time);
                }

                return response()->json(['result' => $result]);

            case "PerformTransaction":
                $transaction = Payment::where('paycom_transaction_id', $request->params['id'])->first();

                if (!$transaction) {
                    return response()->json([
                        'id' => $request->id,
                        'error' => [
                            'code' => -32504,
                            'message' => [
                                'ru' => 'Платеж не найден',
                                'uz' => 'Tranzaksiya topilmadi',
                                'en' => 'Payment not found',
                            ],
                        ],
                    ]);
                }

                if ($transaction->state != 1) {
                    return response()->json([
                        'id' => $request->id,
                        'error' => [
                            'code' => -31008,
                            'message' => [
                                'ru' => 'Платеж уже выполнен или отменен',
                                'uz' => 'Tranzaksiya allaqachon bajarilgan yoki bekor qilingan',
                                'en' => 'Payment is already performed or cancelled',
                            ],
                        ],
                    ]);
                }

                $currentMillis = intval(microtime(true) * 1000); // milliseconds
                $transaction->state = 2;
                $transaction->perform_time = now();
                $transaction->perform_time_unix = $currentMillis;
                $transaction->save();

                return response()->json([
                    'result' => [
                        'transaction' => strval($transaction->id),
                        'perform_time' => $currentMillis,
                        'state' => intval($transaction->state),
                    ],
                ]);

            case "CancelTransaction":
                $transaction = Payment::where('paycom_transaction_id', $request->params['id'])->first();

                if (!$transaction) {
                    return response()->json([
                        'id' => $request->id,
                        'error' => [
                            'code' => -32504,
                            'message' => [
                                'ru' => 'Платеж не найден',
                                'uz' => 'Tranzaksiya topilmadi',
                                'en' => 'Payment not found',
                            ],
                        ],
                    ]);
                }

                if ($transaction->state == 1) {
                    $transaction->state = -1;
                    $transaction->reason = $request->params['reason'];
                    $transaction->cancel_time = now();
                    $transaction->save();

                    return response()->json([
                        'result' => [
                            'transaction' => strval($transaction->id),
                            'cancel_time' => $transaction->cancel_time->timestamp * 1000,
                            'state' => $transaction->state,
                        ],
                    ]);
                } elseif ($transaction->state == 2) {
                    $transaction->state = -2;
                    $transaction->reason = $request->params['reason'];
                    $transaction->cancel_time = now();
                    $transaction->save();

                    return response()->json([
                        'result' => [
                            'transaction' => strval($transaction->id),
                            'cancel_time' => $transaction->cancel_time->timestamp * 1000,
                            'state' => $transaction->state,
                        ],
                    ]);
                } else {
                    return response()->json([
                        'id' => $request->id,
                        'error' => [
                            'code' => -31007,
                            'message' => [
                                'ru' => 'Отмена невозможна',
                                'uz' => 'Bekor qilish mumkin emas',
                                'en' => 'Cancellation is not possible',
                            ],
                        ],
                    ]);
                }

            default:
                return response()->json([
                    'id' => $request->id,
                    'error' => [
                        'code' => -32601,
                        'message' => [
                            'ru' => 'Метод не найден',
                            'uz' => 'Usul topilmadi',
                            'en' => 'Method not found',
                        ],
                    ],
                ]);
        }
    }
}
