<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Application;
use Illuminate\View\Factory;
use Illuminate\View\View;

/**
 * Class for handling user registering requests.
 *
 * @author Pola Eskandar
 * @version 1.0.0
 * @since 1.0.0
 */
class RegisterController extends Controller {

  public function __construct() { $this->middleware('guest'); }

  /**
   * Register a new user.
   *
   * @param Request $request
   * @return RedirectResponse
   * @author Pola Eskandar
   * @version 1.0.0
   * @since 1.0.0
   */
  public function register(Request $request): RedirectResponse {
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

  /**
   * Returns the view of register form.
   *
   * @return Factory|View|Application
   * @author Pola Eskandar
   * @version 1.0.0
   * @since 1.0.0
   */
  public function registerView(): Factory|View|Application { return view('auth.register'); }
}
