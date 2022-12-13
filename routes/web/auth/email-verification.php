<?php

use App\Http\Controllers\Authentication\VerificationController;
use Illuminate\Support\Facades\Route;

Route::view('/email/verify', 'auth.verify-email')->middleware(['auth', 'unverified'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [VerificationController::class, 'sendVerificationEmail'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
