<?php

use App\Http\Controllers\Authentication\LoginController;
use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->group(function () {
  Route::get('/login', [LoginController::class, 'loginView'])->name('login.form');
  Route::post('/login', [LoginController::class, 'login'])->name('login');
});
