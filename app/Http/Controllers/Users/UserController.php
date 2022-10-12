<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class for handling user requests.
 *
 * @author Pola Eskandar
 * @version 1.0.0
 * @since 1.0.0
 */
class UserController extends Controller {
  public function getProfileImage() {}

  /**
   * Uploading profile image for user.
   *
   * @param Request $request
   * @return RedirectResponse
   * @author Pola Eskandar
   * @version 1.0.0
   * @since 1.0.0
   */
  public function uploadProfileImage(Request $request): RedirectResponse {
    $request->validate(['image' => ['required', 'image', 'mimes:jpg,bmp,png,jpeg']]);
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
