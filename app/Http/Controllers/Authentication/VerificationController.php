<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VerificationController extends Controller {

  /**
   * Verify the email address.
   *
   * @param EmailVerificationRequest $request
   * @return RedirectResponse
   * @author Pola Eskandar
   * @version 1.0.0
   * @since 1.0.0
   */
  public function verify(EmailVerificationRequest $request) : RedirectResponse {
    $request->fulfill();
    return redirect()->route('index');
  }

  /**
   * Send verification email.
   *
   * @param Request $request
   * @return RedirectResponse
   * @author Pola Eskandar
   * @version 1.0.0
   * @since 1.0.0
   */
  public function sendVerificationEmail(Request $request) : RedirectResponse {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
  }
}
