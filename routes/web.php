<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\StudentBillController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::group(['middleware' => ['auth']], function() {
    Route::group(['middleware' => 'can:isAdmin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('dashboard', DashboardController::class);
        Route::resource('student-bill', StudentBillController::class);
        Route::resource('school', SchoolController::class);
        Route::resource('bill', BillController::class);
        Route::resource('student', StudentController::class);
        Route::resource('report', ReportController::class);
        Route::resource('calendar', CalendarController::class);
        Route::resource('user', UserController::class);
        Route::resource('transaction', TransactionController::class);

        Route::get('receipt-pdf/{id}', [TransactionController::class, 'exportPDF'])->name('receipt-pdf');
        Route::get('student-pdf', [StudentController::class, 'exportPDF']);
    });

    Route::group(['middleware' => 'can:isCashier', 'prefix' => 'cashier', 'as' => 'cashier'], function(){
        Route::resource('dashboard', DashboardController::class);
        Route::resource('student-bill', StudentBillController::class);
        Route::resource('report', ReportController::class);
        Route::resource('calendar', CalendarController::class);
        Route::resource('transaction', TransactionController::class);

        Route::get('receipt-pdf/{id}', [TransactionController::class, 'exportPDF'])->name('receipt-pdf');
    });
});



// Route::group(['middleware'=>'admins'],function(){
//     Route::resource('/user',UserController::class);
// });


