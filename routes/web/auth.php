<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'guest', 'prefix' => '/auth'], function () {
  Route::post('/login', [AuthController::class, 'login'])->name('login');
  Route::get('/login', fn () => view('auth.login'))->name('login.form');
  Route::post('/register', [AuthController::class, 'register'])->name('register');
  Route::get('/register', fn () => view('auth.register'))->name('register.form');
  Route::view('/forget-password', 'auth.forget-password')->name('forget-password.form');
  Route::post('/forgot-password/send-link', [AuthController::class, 'sendResetLink'])->name('password.email');
  Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
  Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

Route::group(['middleware' => 'auth', 'prefix' => '/auth'], function () {
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
