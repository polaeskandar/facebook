<?php

namespace App\View\Components\Profile;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class PostsList extends Component {
  public User $user;
  public Collection $posts;

  public function __construct(User $user) {
    $this->user = $user;
    $this->posts = Post::where('user_id', $this->user->id)->orderBy('created_at', 'desc')->take(5)->get();
  }

  public function render() {
    return view('profile.posts-list');
  }
}
