<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\View\Factory;
use Illuminate\View\View;


/**
 * Class for handling resetting password requests.
 *
 * @author Pola Eskandar
 * @version 1.0.0
 * @since 1.0.0
 */
class ResetPasswordController extends Controller {

  public function __construct() { $this->middleware('guest'); }

  /**
   * Show send reset link view.
   *
   * @return Factory|View|Application
   * @author Pola Eskandar
   * @version 1.0.0
   * @since 1.0.0
   */
  public function sendResetLinkView(): Factory|View|Application { return view('auth.forget-password'); }

  /**
   * Send the reset link on email.
   *
   * @param Request $request
   * @return RedirectResponse
   * @author Pola Eskandar
   * @version 1.0.0
   * @since 1.0.0
   */
  public function sendResetLink(Request $request): RedirectResponse {
    $validated = $request->validate(['email' => ['required', 'email']]);
    $status = Password::sendResetLink($validated['email']);

    return $status === Password::RESET_LINK_SENT
      ? back()->with(['status' => __($status)])
      : back()->withErrors(['email' => __($status)]);
  }

  /**
   * Show reset password view.
   *
   * @param string $token
   * @return Factory|View|Application
   * @author Pola Eskandar
   * @version 1.0.0
   * @since 1.0.0
   */
  public function showResetPasswordForm(string $token): Factory|View|Application { return view('auth.reset-password', ['token' => $token]); }

  /**
   * Reset the password.
   *
   * @param Request $request
   * @return RedirectResponse
   * @author Pola Eskandar
   * @version 1.0.0
   * @since 1.0.0
   */
  public function resetPassword(Request $request): RedirectResponse {
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
