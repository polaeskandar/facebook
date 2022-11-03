<?php

use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/profile')->group(function () {
  Route::get('/{id}', [UserController::class, 'userProfile'])->name('profile.index');
  Route::post('/image/upload', [UserController::class, 'uploadProfileImage'])->name('profile.image.upload');
});
