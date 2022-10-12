<?php

use App\Http\Controllers\Authentication\RegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->group(function () {
  Route::get('/register', [RegisterController::class, 'registerView'])->name('register.form');
  Route::post('/register', [RegisterController::class, 'register'])->name('register');
});
