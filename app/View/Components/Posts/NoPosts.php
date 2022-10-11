<?php

namespace App\View\Components\Posts;

use Illuminate\View\Component;

class NoPosts extends Component {
  public string $loginLink;

  public function __construct() {
    $this->loginLink = route('login.form');
  }

  public function render() {
    return view('posts.no-posts');
  }
}
