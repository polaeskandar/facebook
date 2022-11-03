<?php

namespace App\View\Components\Profile;

use Illuminate\View\Component;

class IndexPageImageUploader extends Component {
  public bool $showContainer;
  public string $imageUploadRoute;

  public function __construct() {
    $this->showContainer = auth()->check() && !auth()->user()->profileImages->count();
    $this->imageUploadRoute = route('profile.image.upload');
  }

  public function render() { return view('profile.index-page-image-uploader'); }
}
