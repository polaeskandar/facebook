<?php

namespace App\View\Components\Profile;

use App\Models\ProfileImage as ProfileImageModel;
use App\Models\User;
use Illuminate\View\Component;

class ProfileImage extends Component {
  public User $user;
  public bool $showImage;
  public ProfileImageModel|string $currentProfileImage;

  public function __construct(User $user) {
    $this->user = $user;
    $this->showImage = $user->profileImages->count();
    $this->currentProfileImage = $this->showImage ? $user->profileImages->last() : strtoupper($user->name[0]);
  }

  public function render() { return view('profile.profile-image'); }
}
