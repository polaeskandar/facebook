<?php

use App\Http\Controllers\Authentication\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->group(function () {
  Route::get('/forget-password', [ResetPasswordController::class, 'sendResetLinkView'])->name('forget-password.form');
  Route::post('/forgot-password/send-link', [ResetPasswordController::class, 'sendResetLink'])->name('password.email');
  Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
  Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');
});
