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

//Домашняя страница
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Роут бронирование мест
Route::get('/booking/{movie}', [App\Http\Controllers\BookingController::class, 'index'])->name('booking');

Route::post('/booking/{movie}', [App\Http\Controllers\BookingController::class, 'store'])->name('bookings.store');

//Роут админин панели
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
//Удаление бронирования
Route::delete('/admin/bookings/{id}', [App\Http\Controllers\AdminController::class, 'deleteBooking'])->name('admin.deleteBooking');