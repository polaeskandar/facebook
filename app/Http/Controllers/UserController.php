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

    $file = $request->file('image');
    $fileName = time() . '_' . Str::random(10) . '_' . $file->getClientOriginalExtension() . '.' . $file->guessClientExtension();
    $path = Storage::putFileAs('public/images', $file, $fileName);
    $pathArray = explode('/', $path);
    $pathArray[0] = "storage";
    array_unshift($pathArray, env('APP_URL', 'http://127.0.0.1:8000'));
    $path = implode('/', $pathArray);

    $user->image = $path;
    $user->save();
    return redirect()->route('index');
  }
}
