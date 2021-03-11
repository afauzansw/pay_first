<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CalendarController;
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

Route::group(['middleware' => ['auth']], function() {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('school', SchoolController::class);
    Route::resource('bill', BillController::class);
    Route::resource('student', StudentController::class);
    Route::resource('calendar', CalendarController::class);
    Route::resource('user', UserController::class);
    Route::resource('transaction', TransactionController::class);
    });

Route::get('student-pdf', [StudentController::class, 'export']);

// Route::group(['middleware'=>'admins'],function(){
//     Route::resource('/user',UserController::class);
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
