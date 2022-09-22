<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    if (!Hash::check($validated['password'], $user->password))
      return redirect()->back()->withErrors(['password' => 'The entered password is wrong!']);

    Auth::login($user, $validated['remember']);
    return redirect()->route('index');
  }

  public function logout(Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('index');
  }
}
