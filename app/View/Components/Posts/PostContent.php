<?php

namespace App\View\Components\Posts;

use App\Models\Post as PostModel;
use Illuminate\View\Component;

class PostContent extends Component {
  public string $author;
  public string $postedOn;
  public int $bodyLength;
  public string $fullBody;
  public string $subBody;

  public function __construct(PostModel $post) {
    $this->author = $post->user->name;
    $this->postedOn = "Posted {$post->created_at->diffForHumans()}";
    $this->bodyLength = strlen($post->body);
    $this->fullBody = nl2br($post->body);
    $this->subBody = substr($post->body, 0, 400);
  }

  public function render() {
    return view('posts.post-content');
  }
}
