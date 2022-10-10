<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller {
  public function register(Request $request) {
    $validated = $request->validate([
      'name' => ['required', 'min:3', 'max:20'],
      'email' => ['required', 'email', 'unique:users,email'],
      'password' => ['required', 'confirmed', 'min:8', 'max:120'],
      'remember' => ['boolean']
    ]);

    $user = User::create([
      'name' => $validated['name'],
      'email' => $validated['email'],
      'password' => Hash::make($validated['password']),
    ]);

    $role = Role::whereRole('user')->first();
    $user->roles()->attach($role);

    Auth::login($user, $validated['remember']);
    return redirect()->route('index');
  }

  public function login(Request $request) {
    $validated = $request->validate([
      'email' => ['required', 'email', 'exists:users,email'],
      'password' => ['required'],
      'remember' => ['boolean']
    ]);

    $user = User::where('email', $validated['email'])->first();

    if (!Hash::check($validated['password'], $user->password)) {
      return redirect()->back()->withErrors(['password' => 'The entered password is wrong!']);
    }

    Auth::login($user, $validated['remember']);
    return redirect()->route('index');
  }

  public function logout(Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('index');
  }

  public function sendResetLink(Request $request) {
    $request->validate(['email' => ['required', 'email']]);
    $status = Password::sendResetLink($request->only('email'));

    return $status === Password::RESET_LINK_SENT
      ? back()->with(['status' => __($status)])
      : back()->withErrors(['email' => __($status)]);
  }

  public function showResetPasswordForm($token) {
    return view('auth.reset-password', ['token' => $token]);
  }

  public function resetPassword(Request $request) {
    $request->validate([
      'token' => ['required'],
      'email' => ['required', 'email'],
      'password' => ['required', 'min:8', 'confirmed'],
    ]);

    $data = $request->only('email', 'password', 'password_confirmation', 'token');

    $status = Password::reset($data, function ($user, $password) {
      $user->forceFill(['password' => Hash::make($password)])->setRememberToken(Str::random(60));
      $user->save();
      event(new PasswordReset($user));
    });

    return $status === Password::PASSWORD_RESET
      ? redirect()->route('login')->with('status', __($status))
      : back()->withErrors(['email' => [__($status)]]);
  }
}
