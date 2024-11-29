<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Billing extends Model
{
    use HasFactory;

    protected $table = 'billings';

    protected $fillable = [
        'student_id',
        'account',
        'amount',
    ];


    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public static function deposit($data = [])
    {

        $currentDateTime = Carbon::now();
        $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
        $data['paycom_time_datetime'] = $formattedDateTime;

        // Talab qilinadigan maydonlar ro'yxati
        $requiredFields = ['amount', 'casher', 'student_id'];

        // Yo'q maydonlarni tekshirish
        $missingFields = [];
        foreach ($requiredFields as $field) {
            if (!array_key_exists($field, $data)) {
                $missingFields[] = $field;
            }
        }

        // Agar yo'q maydonlar bo'lsa, xatolik bilan javob qaytarish
        if (!empty($missingFields)) {
            return [
                'result' => [
                    'message' => implode(', ', $missingFields) . ' maydon(i) bo\'sh',
                    'status' => 'error'
                ]
            ];
        }
        // state holatini tekshirish
        $validStates = [1, -1, 2];


        if (!array_key_exists('state', $data)) {
            $data['state'] = 1; // Default value
        } elseif (!in_array($data['state'], $validStates)) {
            return [
                'result' => [
                    'message' => 'Noto\'g\'ri state qiymati. Iltimos, 1, -1 yoki 2 ni kiriting.',
                    'status' => 'error'
                ]
            ];
        }

        // Talaba mavjudligini tekshirish
        if (array_key_exists('student_id', $data)) {
            $studentExists = DB::table('students')->where('id', $data['student_id'])->exists();

            if (!$studentExists) {
                return [
                    'result' => [
                        'message' => 'Student topilmadi',
                        'status' => 'error'
                    ]
                ];
            }
        }


        // xodim mavjudligini tekshirish
        // Check if 'casher' is provided
        if (array_key_exists('casher', $data)) {
            $casherExists = DB::table('users')->where('id', $data['casher'])->exists();

            if (!$casherExists) {
                return [
                    'result' => [
                        'message' => 'Xodim topilmadi',
                        'status' => 'error'
                    ]
                ];
            }
        }

        // Qarzlari qoplash

        $old_invoices = DB::table('invoices')
            ->where('student_id', $data['student_id'])
            ->whereIn('state', [0, 1])
            ->get();
  
        if (count($old_invoices)  > 0) {

            $amount_of_payments = intval( $data['amount'] );
           
            foreach ($old_invoices as $invoice) {
                $transactions = DB::table('transactions')
                    ->where('invoice_id', $invoice->id)
                    ->sum('amount');
                $transactions = intval( $invoice->amount ) - intval( $transactions );
                
                if ($data['amount'] > intval( $transactions )) {
                    $amount_of_payments -= $transactions;
                    $invoice->state = 2;
                    // create transaction for user invoise
                    $trans = DB::table('transactions')->insert([
                        'amount' => $transactions,
                        'group_id' => $invoice->group_id,
                        'student_id' => $invoice->student_id,
                        'status' => 'completed',
                        'date' => now(),
                        'invoice_id' =>  $invoice->id,
                    ]);
                } else {
                    
                    $trans = DB::table('transactions')->insert([
                        'amount' => intval($amount_of_payments), 
                        'group_id' => $invoice->group_id,
                        'student_id' => $invoice->student_id,
                        'status' => 'completed',
                        'date' => now(),
                        'invoice_id' =>  $invoice->id,
                    ]);

                    $amount_of_payments = 0;
                }

                if ($amount_of_payments === 0) {
                    break;
                }
            }
        }

        $billing = Billing::where('student_id', $data['student_id'])->with('student')->first();
        if ($billing) {
            $billing->amount = intval($billing->amount) + intval($data['amount']);
            $billing->update();

            // Transaction yaratish
            DB::table('payments')->insert($data);
        } else {
            return [
                'result' => [
                    'message' => 'Account topilmadi',
                    'status' => 'error'
                ]
            ];
        }

        return [
            'result' => [
                'message' => 'Buyruq bajarildi',
                'status' => 'success'
            ]
        ];
    }
    public static function withdraw($data = [])
    {
        // Hozirgi vaqtni olish
        $data['date'] = now();

        // Talab qilinadigan maydonlar ro'yxati
        $requiredFields = ['amount', 'student_id', 'group_id', 'month'];

        // Yo'q maydonlarni tekshirish
        $missingFields = [];
        foreach ($requiredFields as $field) {
            if (!array_key_exists($field, $data)) {
                $missingFields[] = $field;
            }
        }


        // Agar yo'q maydonlar bo'lsa, xatolik bilan javob qaytarish
        if (!empty($missingFields)) {
            return [
                'result' => [
                    'message' => implode(', ', $missingFields) . ' maydon(i) bo\'sh',
                    'status' => 'error'
                ]
            ];
        }


        if (!array_key_exists('status', $data)) {
            $data['status'] = ' completed'; // agar status bo'lmasa status qo'shadi
        }


        // Talaba mavjudligini tekshirish
        if (array_key_exists('student_id', $data)) {
            $studentExists = DB::table('students')->where('id', $data['student_id'])->exists();

            if (!$studentExists) {
                throw new \Exception("Student with ID {$data['student_id']} does not exist.");
            }
        }


        $billing = self::where('student_id', $data['student_id'])->with('student')->first();
        if ($billing) {
            $old_biling =   $billing->amount;
            $billing->amount = intval($billing->amount) - intval($data['amount']);
            $billing->update();
        } else {
            return [
                'result' => [
                    'message' => 'Accaunt topilmadi',
                    'status' => 'success'
                ]
            ];
        }

        // Ma'lumotlarni tranzaktsiyada saqlash
        if (intval($old_biling) > 0) {
            if ($old_biling <  $data['amount']) {
                $data['amount'] =  intval($old_biling);
            }
            $trans = DB::table('transactions')->insert($data);
        }


        return [
            'result' => [
                'message' => 'Buyruq bajarildi',
                'status' => 'success'
            ]
        ];
    }
}
