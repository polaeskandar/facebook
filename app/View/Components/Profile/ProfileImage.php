<?php

namespace App\View\Components\Profile;

use App\Models\ProfileImage as ProfileImageModel;
use App\Models\User;
use Illuminate\View\Component;

class ProfileImage extends Component {
  public User $user;
  public bool $showImage;
  public ProfileImageModel|null $currentProfileImage;

  public function __construct(User $user) {
    $this->user = $user;
    $this->showImage =  $user?->profileImages->count();
    $this->currentProfileImage = $user?->profileImages->last();
  }

  public function render() { return view('profile.profile-image'); }
}
