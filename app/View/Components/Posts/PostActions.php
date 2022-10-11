<?php

namespace App\View\Components\Posts;

use App\Models\Post as PostModel;
use Illuminate\View\Component;

class PostActions extends Component {
  public PostModel $post;
  public string $postId;
  public string $commentsCount;

  public function __construct(PostModel $post) {
    $this->post = $post;
    $this->postId = $post->id;
    $this->commentsCount = $post->comments->count() > 1
      ? "{$post->comments->count()} Comments"
      : "{$post->comments->count()} Comment";
  }

  public function render() {
    return view('posts.post-actions');
  }
}
