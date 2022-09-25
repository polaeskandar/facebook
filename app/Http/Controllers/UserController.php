<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller {
  public function getProfileImage() {}
  public function uploadProfileImage(Request $request) {
    $validated = $request->validate(['image' => ['required', 'image', 'mimes:jpg,bmp,png,jpeg']]);
    $user = User::find(auth()->id());

    if ($request->file('image')) {
      $file = $request->file('image');
      $fileName = time() . '_' . Str::random(10) . '_' . $file->getClientOriginalExtension() . '.' . $file->guessClientExtension();
      $path = Storage::putFileAs('images', $file, $fileName);
      dd($path);
    }
  }
}
