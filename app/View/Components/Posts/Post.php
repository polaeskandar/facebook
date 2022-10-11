<?php

namespace App\View\Components\Posts;

use App\Models\Post as PostModel;
use Illuminate\View\Component;

class Post extends Component {
  public PostModel $post;
  public string $postId;

  public function __construct(PostModel $post) {
    $this->post = $post;
    $this->postId = $post->id;
  }

  public function render() { return view('posts.post'); }
}
