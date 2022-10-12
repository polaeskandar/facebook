<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\Factory;
use Illuminate\View\View;

/**
 * Class for handling user login requests.
 *
 * @author Pola Eskandar
 * @version 1.0.0
 * @since 1.0.0
 */
class LoginController extends Controller {

  public function __construct() { $this->middleware('guest'); }

  /**
   * Login user.
   *
   * @param Request $request
   * @return RedirectResponse
   * @author Pola Eskandar
   * @version 1.0.0
   * @since 1.0.0
   */
  public function login(Request $request): RedirectResponse {
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

  /**
   * Returns the view of login form.
   *
   * @return Factory|View|Application
   * @author Pola Eskandar
   * @version 1.0.0
   * @since 1.0.0
   */
  public function loginView(): Factory|View|Application { return view('auth.login'); }
}
