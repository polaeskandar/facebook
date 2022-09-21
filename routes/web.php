<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('index'))->name('index');

Route::post('/login')->name('login');
Route::get('/login', fn () => view('auth.login'))->name('login.form')->middleware('guest');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/register', fn () => view('auth.register'))->name('register.form')->middleware('guest');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
