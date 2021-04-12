<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', fn() => view('home'))->name('home');
Route::group(['middleware' => ['XssSanitizer']], function () {
    Route::get('/student', [\App\Http\Controllers\Student\StudentController::class, 'index'])->name('student');
    Route::post('/student', [\App\Http\Controllers\Student\StudentController::class, 'store'])->name('student.store');
    Route::post('/admin/login', [\App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login');
});

Route::get('/admin/login', [\App\Http\Controllers\Admin\LoginController::class, 'index']);
Route::get('/admin/logout', [\App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('logout');
Route::get('/admin', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin');

Route::post('/admin/approveStudent/{student}', [\App\Http\Controllers\Admin\ApproveStudentController::class, 'store'])->name('approveStudent');
Route::delete('/admin/removeStudent/{student}', [\App\Http\Controllers\Admin\RemoveStudentController::class, 'destroy'])->name('removeStudent');
