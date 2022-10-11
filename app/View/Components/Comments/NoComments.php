<?php

namespace App\View\Components\Comments;

use Illuminate\View\Component;

class NoComments extends Component {
  public function __construct() {}
  public function render() { return view('comments.no-comments'); }
}
