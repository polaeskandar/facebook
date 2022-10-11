<?php

namespace App\View\Components\Scripts;

use Illuminate\View\Component;

class ScriptsList extends Component {
  public function __construct() {}
  public function render() { return view('scripts.scripts-list'); }
}
