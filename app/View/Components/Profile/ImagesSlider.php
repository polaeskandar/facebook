<?php

namespace App\View\Components\Profile;

use App\Models\ProfileImage;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class ImagesSlider extends Component {
  public User $user;
  public Collection $profileImages;
  public bool $showImagesCarousel;

  public function __construct(User $user) {
    $this->user = $user;
    $this->profileImages = ProfileImage::where('user_id', $user->id)->orderBy('created_at', 'desc')->take(5)->get();
    $this->showImagesCarousel = $this->profileImages->count();
  }

  public function render() { return view('profile.images-slider'); }
}
