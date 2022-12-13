<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class for handling user logout requests.
 *
 * @author Pola Eskandar
 * @version 1.0.0
 * @since 1.0.0
 */
class LogoutController extends Controller {
  public function __construct() {
    $this->middleware('auth');
  }

  /**
   * Logout user.
   *
   * @param Request $request
   * @return RedirectResponse
   * @author Pola Eskandar
   * @version 1.0.0
   * @since 1.0.0
   */
  public function logout(Request $request) : RedirectResponse {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('index');
  }
}
