<?php

namespace App\View\Components\Posts;

use App\Models\Post as PostModel;
use Illuminate\View\Component;

class Post extends Component {
  public PostModel $post;
  public string $author;
  public string $postedOn;
  public string $fullBody;
  public string $body;
  public int $bodyLength;

  public function __construct(PostModel $post) {
    $this->post = $post;
    $this->author = $post->user->name;
    $this->postedOn = "Posted {$post->created_at->diffForHumans()}";
    $this->fullBody = nl2br($post->body);
    $this->body = substr($this->fullBody, 0, 400);
    $this->bodyLength = strlen($this->fullBody);
  }

  public function render() { return view('posts.post'); }
}
