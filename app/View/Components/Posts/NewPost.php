<?php

namespace App\View\Components\Posts;

use Illuminate\View\Component;

class NewPost extends Component {
  public string $createPostRoute;

  public function __construct() {
    $this->createPostRoute = route('posts.create');
  }

  public function render() { return view('posts.new-post'); }
}
