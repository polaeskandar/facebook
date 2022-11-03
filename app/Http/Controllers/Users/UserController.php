<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
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
   * @version 1.0.0
   * @since 1.0.0
   */
  public function uploadProfileImage(Request $request) : RedirectResponse {
    $request->validate(['image' => ['required', 'image', 'mimes:jpg,bmp,png,jpeg']]);
    $file = $request->file('image');
    $user = auth()->user();
    $path = $this->fileService->uploadImage($file, 'public/images');
    $user->image = $path;
    $user->save();
    return redirect()->route('index');
  }
}
