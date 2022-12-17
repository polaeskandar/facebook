<?php

namespace App\View\Components\Posts;

use App\Models\Post as PostModel;
use App\Models\ProfileImage as ProfileImageModel;
use App\Models\User;
use Illuminate\View\Component;

class PostContent extends Component {
  public User $author;
  public bool $showAuthorImage;
  public ProfileImageModel|string $authorImage;
  public string $postedOn;
  public int $bodyLength;
  public string $fullBody;
  public string $subBody;

  public function __construct(PostModel $post) {
    $this->author = $post->user;
    $this->showAuthorImage = $this->author->profileImages->count();
    $this->authorImage = $this->showAuthorImage ? $this->author->profileImages->last() : strtoupper($this->author->name[0]);
    $this->postedOn = "Posted {$post->posted_on->diffForHumans()}";
    $this->bodyLength = strlen($post->body);
    $this->fullBody = nl2br($post->body);
    $this->subBody = substr($post->body, 0, 400);
  }

  public function render() {
    return view('posts.post-content');
  }
}
