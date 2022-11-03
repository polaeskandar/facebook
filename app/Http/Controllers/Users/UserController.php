<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\ProfileImage;
use App\Models\User;
use App\Services\FileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class for handling user requests.
 *
 * @author Pola Eskandar
 * @version 1.0.0
 * @since 1.0.0
 */
class UserController extends Controller {

  public FileService $fileService;

  public function __construct() {
    $this->fileService = new FileService();
  }

  /**
   * Uploading profile image for user.
   *
   * @param Request $request
   * @return RedirectResponse
   * @author Pola Eskandar
   * @version 1.1.0
   * @since 1.0.0
   */
  public function uploadProfileImage(Request $request) : RedirectResponse {
    $validated = $request->validate(['image' => ['required', 'image', 'mimes:jpg,bmp,png,jpeg']]);
    $file = $validated['image'];

    $user = auth()->user();
    $path = $this->fileService->uploadImage($file, 'public/images');
    $user->profileImages()->create(['image' => $path]);

    return redirect()->route('index');
  }

  public function userProfile($id) {
    $user = User::findOrFail($id);
    return view('profile.profile', ['user' => $user]);
  }
}
