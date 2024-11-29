<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\Auth\StudentLoginController;
use App\Http\Controllers\Auth\StudentRegisterController;
use App\Http\Controllers\Student\StudentDashboardController;

use App\Http\Controllers\Admin\Settings\CategoryController;
use App\Http\Controllers\Admin\Settings\CategoryFolderController;
use App\Http\Controllers\Admin\Expense\ExpenseController;
use App\Http\Controllers\Admin\CRM\CRMController;


Route::get('/', function () {
    return redirect()->route('student.login');
});

Route::get('lang/{locale}', function ($locale) {

    // Foydalanuvchining tanlagan tilini sessiyaga saqlash
    Session::put('locale', $locale);
    return redirect()->back();

})->name('lang.switch');

Route::get('/get-districts/{region_id}', [BranchController::class, 'getDistricts']);
Route::post('/transactions', [TransactionController::class, 'create']);
Route::get('/form', [TransactionController::class, 'form']);
Route::post('/test', [TransactionController::class, 'test']);

// ================================================================ //
//!--! [Start] xodimlar uchun Login & Register & Logout !--//
// ================================================================ //

// login marshrutlari
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

// logout marshrutlari
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Parolni unutdingiz marshrutlari
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Emailni tekshirish marshrutlari
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

// ================================================================ //
//!--! [End] xodimlar uchun Login & Register & Logout !--//
// ================================================================ //


Route::prefix('student')->name('student.')->group(function () {

    Route::middleware(['student.access'])->group(function () {
        Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
        // boshqa student sahifalari
    });

    Route::get('/login', [StudentLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [StudentLoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register_form');

    Route::post('/logout', [StudentLoginController::class, 'logout'])->name('logout');
});


Route::middleware(['checkRole:admin', 'auth'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {

        Route::get('/dashboard', [MainController::class, 'index'])->name('admin');
        Route::get('/knowledge', [MainController::class, 'knowledge'])->name('knowledge');
        Route::get('/sales', [SalesController::class, 'index'])->name('sales');
        Route::get('/student/payment/show', [StudentController::class, 'showAllPayment'])->name('showAllPayment');
        Route::get('/student/invoice/show', [StudentController::class, 'showAllInvoice'])->name('showAllInvoice');
        Route::resource('students', StudentController::class);
        Route::post('/student/branch/store', [StudentController::class, 'branch_store'])->name('student.branch.store');
        Route::post('students/delete_status', [StudentController::class, 'delete_status'])->name('students.delete_status');
        Route::resource('billings', BillingController::class);
        Route::get('/groups/create/invoice/{group}', [InvoiceController::class, 'create'])->name('invoice.create');
        Route::resource('invoices', InvoiceController::class);
        Route::post('/invoice/store', [InvoiceController::class, 'store'])->name('invoice.store');
        Route::post('/invoices/delete_status', [InvoiceController::class , 'delete_status'])->name('invoices.delete_status');
        Route::resource('branch', BranchController::class);
        Route::post('branch/delete_status', [BranchController::class, 'delete_status'])->name('branch.delete_status');
        Route::resource('courses', CourseController::class);
        Route::resource('groups', GroupController::class);
        Route::get('/groups/students/store/{group}', [GroupController::class, 'studentStoreGet'])->name('studentStoreGet');
        Route::get('/groups/attendance/store/{group}', [GroupController::class, 'studentAttendance'])->name('studentAttendance');
        Route::get('/groups/showAttendance/store/{group}', [GroupController::class, 'showAttendance'])->name('showAttendance');
        Route::post('/groups/students/store', [GroupController::class, 'studentStore'])->name('studentStore');
        Route::resource('enrollments', EnrollmentController::class);
        Route::resource('payments', PaymentController::class);
        Route::get('/students/search', [GroupController::class, 'searchStudents'])->name('students.search');
        Route::post('/attendance/store', [GroupController::class, 'storeAttendance'])->name('attendance.store');
        Route::delete('/groups/{group}/students/{students}', [GroupController::class, 'removeStudent'])->name('groups.removeStudent');

        // Register routes
        Route::get('employee/index', [EmployeeController::class, 'index'])->name('employee.index');
        Route::get('employee/view/{user}', [EmployeeController::class, 'view'])->name('employee.view');
        Route::post('/employee/delete_status', [EmployeeController::class, 'delete_status'])->name('employee.delete_status');
        Route::get('student/index', [StudentController::class, 'index'])->name('student.index');
        Route::get('register', [EmployeeController::class, 'register'])->name('register');
        Route::post('register', [EmployeeController::class, 'register_store'])->name('register.store');
        Route::post('logout', [EmployeeController::class, 'logout'])->name('logout');
        Route::get('/user/{id}/edit', [EmployeeController::class, 'edit'])->name('user.edit');
        Route::put('/user/{id}', [EmployeeController::class, 'update'])->name('user.update');
        Route::delete('/user/{id}', [EmployeeController::class, 'destroy'])->name('user.destroy');
        
        Route::resource('transaction', TransactionController::class);
        Route::get('transaction/show/{transaction}', [TransactionController::class, 'show'])->name('transaction.show');
        Route::get('transaction/edit/{id}', [TransactionController::class, 'edit'])->name('transaction.edit');

        // O'quvchi shoti o'zgarishi
        Route::post('/update-billing', [BillingController::class, 'update_billing'])->name('update.billing');

        // Translator routes
        Route::get('translations', [TranslationController::class, 'index'])->name('translations.index');
        Route::put('translations', [TranslationController::class, 'update'])->name('translations.update');
        Route::get('translations/sidebar', [TranslationController::class, 'sidebar'])->name('translations.sidebar');
        Route::put('/translations/sidebar/update', [TranslationController::class, 'updateSidebar'])->name('updateSidebar.update');

        // Expense resource routes
        Route::resource('expenses', ExpenseController::class);
        Route::get('expenses/show/{expense}', [ExpenseController::class, 'show'])->name('expenses.show');
        Route::get('expenses/edit/{id}', [ExpenseController::class, 'edit'])->name('expenses.edit');
        Route::delete('expenses/{id}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
        Route::post('expenses/store', [ExpenseController::class, 'store'])->name('expenses.store');
        Route::put('expenses/update/{id}', [ExpenseController::class, 'update'])->name('expenses.update');
        Route::get('expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');

        // Settings resource routes
        Route::prefix('categories')->group(function () { // Adjusted prefix to fit within the 'admin' context
            Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
            Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
            Route::put('/{id}', [CategoryController::class, 'update'])->name('categories.update');
            Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        });

        // Settings resource routes for Category Folders
        Route::prefix('category-folders')->group(function () {
            Route::get('/', [CategoryFolderController::class, 'index'])->name('category-folders.index');
            Route::get('/create', [CategoryFolderController::class, 'create'])->name('category-folders.create');
            Route::post('/store', [CategoryFolderController::class, 'store'])->name('category-folders.store');
            Route::get('/{id}/edit', [CategoryFolderController::class, 'edit'])->name('category-folders.edit');
            Route::put('/{id}', [CategoryFolderController::class, 'update'])->name('category-folders.update');
            Route::delete('/{id}', [CategoryFolderController::class, 'destroy'])->name('category-folders.destroy');
            Route::get('/{id}', [CategoryFolderController::class, 'show'])->name('category-folders.show');
        });

        // CRM routes
        Route::prefix('crm')->group(function () {
            Route::get('/', [CRMController::class, 'index'])->name('crm.index');
            Route::get('/create', [CRMController::class, 'create'])->name('crm.create');  // This is the missing route
            Route::post('/store-card', [CRMController::class, 'storeCard'])->name('crm.storeCard');
            Route::put('/update-card-stage/{id}', [CRMController::class, 'updateCardStage'])->name('crm.updateCardStage');
            Route::delete('/destroy-card/{id}', [CRMController::class, 'destroyCard'])->name('crm.destroyCard');
        });




    });
});


Route::post('/get-month-attendance', [GroupController::class, 'getMonthAttendance'])->name("getMonthAttendance");
