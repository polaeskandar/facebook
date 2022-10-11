<?php

namespace App\View\Components\Scripts;

use Illuminate\View\Component;

class UserId extends Component {
  public function __construct() {}
  public function render() { return view('scripts.user-id'); }
}
