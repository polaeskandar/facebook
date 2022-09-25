<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

Route::get('/', function () {
  return view('index', [
    'posts' => Post::all()
  ]);
})->name('index');

Route::prefix('/auth')->group(function () {
  Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
  Route::get('/login', fn () => view('auth.login'))->name('login.form')->middleware('guest');
  Route::post('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
  Route::get('/register', fn () => view('auth.register'))->name('register.form')->middleware('guest');
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

  Route::view('/forget-password', 'auth.forget-password')->name('forget-password.form')->middleware('guest');
  Route::post('/forgot-password/send-link', function (Request $request) {
    $request->validate(['email' => ['required', 'email']]);
    $status = Password::sendResetLink($request->only('email'));

    return $status === Password::RESET_LINK_SENT
      ? back()->with(['status' => __($status)])
      : back()->withErrors(['email' => __($status)]);
  })->middleware('guest')->name('password.email');

  Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
  })->middleware('guest')->name('password.reset');

  Route::post('/reset-password', function (Request $request) {
    $request->validate([
      'token' => 'required',
      'email' => 'required|email',
      'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
      $request->only('email', 'password', 'password_confirmation', 'token'),
      function ($user, $password) {
        $user->forceFill([
          'password' => Hash::make($password)
        ])->setRememberToken(Str::random(60));

        $user->save();
        event(new PasswordReset($user));
      }
    );

    return $status === Password::PASSWORD_RESET
      ? redirect()->route('login')->with('status', __($status))
      : back()->withErrors(['email' => [__($status)]]);
  })->middleware('guest')->name('password.update');
});

Route::get('profile-image/get', [UserController::class, 'getProfileImage'])->name('user.profile-image.get');
Route::post('profile-image/upload', [UserController::class, 'uploadProfileImage'])->name('user.profile-image.upload');

Route::prefix('/posts')->group(function () {
  Route::post('/create', [PostController::class, 'createPost'])->name('post.create');
});
