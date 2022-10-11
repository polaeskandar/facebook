<?php

namespace App\View\Components\Comments;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class CommentsList extends Component {
  public Collection $comments;

  public function __construct(Collection $comments) {
    $this->comments = $comments;
  }

  public function render() {
    return view('comments.comments-list');
  }
}
