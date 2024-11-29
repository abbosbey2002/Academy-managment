<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\Payme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/', [Payme::class, 'index']);

Route::post('/test', [Payme::class, 'test']);

Route::post('/get-month-attendance', [GroupController::class, 'getMonthAttendance'])->name("getMonthAttendance");

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users/{id}/billings', [BillingController::class, 'getUserBillings']);



