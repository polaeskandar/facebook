<?php

namespace App\View\Components\Comments;

use App\Models\Comment as CommentModel;
use Illuminate\View\Component;

class Comment extends Component {
  public CommentModel $comment;
  public string $commentAuthor;
  public string $commentedOn;
  public int $bodyLength;
  public string $fullBody;
  public string $subBody;

  public function __construct(CommentModel $comment) {
    $this->comment = $comment;
    $this->commentAuthor = $comment->user->name;
    $this->commentedOn = "Commented {$comment->created_at->diffForHumans()}";
    $this->bodyLength = strlen($comment->body);
    $this->fullBody = nl2br($comment->body);
    $this->subBody = substr($comment->body, 0, 200);
  }

  public function render() {
    return view('comments.comment');
  }
}
