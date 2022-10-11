<?php

namespace App\View\Components\Posts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class PostsList extends Component {
  public Collection $posts;

  public function __construct(Collection $posts) {
    $this->posts = $posts;
  }

  public function render() { return view('posts.posts-list'); }
}
