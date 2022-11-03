<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class for handling file system in the app.
 *
 * @author Pola Eskandar
 * @version 1.0.0
 * @since 1.0.0
 */
class FileService {

  /**
   * Upload an image to a specific folder in the file storage.
   *
   * @param UploadedFile $file
   * @param string $storagePath
   * @return string
   * @author Pola Eskandar
   * @version 1.0.0
   * @since 1.0.0
   */
  public function uploadImage(UploadedFile $file, string $storagePath) : string {
    $filename = $this->generateFileName($file);
    $path = Storage::putFileAs($storagePath, $file, $filename);
    return $this->getPath($path);
  }

  /**
   * Generate a random file name based on given file.
   *
   * @param UploadedFile $file
   * @return string
   * @author Pola Eskandar
   * @version 1.1.0
   * @since 1.0.0
   */
  public function generateFileName(UploadedFile $file) : string {
    return time() . "_" . Str::random() . ".{$file->guessClientExtension()}";
  }

  /**
   * Get the path of the stored file.
   *
   * @param string $path
   * @return string
   * @author Pola Eskandar
   * @version 1.0.0
   * @since 1.0.0
   */
  public function getPath(string $path) : string {
    $pathArray = explode('/', $path);
    $pathArray[0] = "storage";
    array_unshift($pathArray, env('APP_URL', 'http://127.0.0.1:8000'));
    return implode('/', $pathArray);
  }
}
