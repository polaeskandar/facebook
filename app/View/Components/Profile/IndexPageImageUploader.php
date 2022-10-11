<?php

namespace App\View\Components\Profile;

use Illuminate\View\Component;

class IndexPageImageUploader extends Component {
  public bool $showContainer;

  public function __construct() {
    $this->showContainer = auth()->check() && !auth()->user()->image;
  }

  public function render() { return view('profile.index-page-image-uploader'); }
}
