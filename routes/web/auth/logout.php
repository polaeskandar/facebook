<?php

use App\Http\Controllers\Authentication\LogoutController;
use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->group(function () {
  Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});
