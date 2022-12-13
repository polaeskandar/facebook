<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UnverifiedUser {
  public function handle(Request $request, Closure $next) {
    if ($request->user()->hasVerifiedEmail()) return redirect()->route('index');
    return $next($request);
  }
}
