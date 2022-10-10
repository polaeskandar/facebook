<?php

use App\Http\Controllers\Posts\PostController;
use Illuminate\Support\Facades\Route;

//Route::post('/images', function (\Illuminate\Http\Request $request) {
//  dd(time() . "-{$request->file('image')->getClientOriginalExtension()}.{$request->file('image')->guessClientExtension()}");
//});

Route::prefix('/posts')->group(function () {
  Route::post('/create', [PostController::class, 'createPost'])->name('post.create');
});
