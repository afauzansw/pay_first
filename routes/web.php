<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('dashboard', \App\Http\Controllers\Admin\DashboardController::class);
    Route::resource('student-bill', \App\Http\Controllers\Admin\StudentBillController::class);
    Route::resource('school', \App\Http\Controllers\Admin\SchoolController::class);
    Route::resource('bill', \App\Http\Controllers\Admin\BillController::class);
    Route::resource('student', \App\Http\Controllers\Admin\StudentController::class);
    Route::resource('report', \App\Http\Controllers\Admin\ReportController::class);
    Route::resource('calendar', \App\Http\Controllers\Admin\CalendarController::class);
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('transaction', \App\Http\Controllers\Admin\TransactionController::class);

    Route::get('receipt-pdf/{id}', [\App\Http\Controllers\Admin\TransactionController::class, 'exportPDF'])->name('receipt-pdf');
    Route::get('student-pdf', [\App\Http\Controllers\Admin\StudentController::class, 'displayReport']);
    Route::get('student-bill-pdf', [\App\Http\Controllers\Admin\StudentBillController::class, 'exportPDF']);
});



// Route::group(['middleware'=>'admins'],function(){
//     Route::resource('/user',UserController::class);
// });


