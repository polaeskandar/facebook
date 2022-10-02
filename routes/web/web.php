<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('index', [
    'posts' => Post::all()
  ]);
})->name('index');

Route::view('/profile', 'profile.profile')->name('profile.page');
Route::get('/profile-image/get', [UserController::class, 'getProfileImage'])->name('user.profile-image.get');
Route::post('/profile-image/upload', [UserController::class, 'uploadProfileImage'])->name('user.profile-image.upload');

Route::prefix('/posts')->group(function () {
  Route::post('/create', [PostController::class, 'createPost'])->name('post.create');
});
