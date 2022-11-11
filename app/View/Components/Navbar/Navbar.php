<?php

namespace App\View\Components\Navbar;

use Illuminate\View\Component;

class Navbar extends Component {
  public string $indexLink;
  public string $loginLink;
  public string $registerLink;
  public string $logoutLink;
  public string $profileLink;
  public string $currentRouteName;
  public string|null $userName;

  public function __construct() {
    $this->indexLink = route('index');
    $this->loginLink = route('login.form');
    $this->registerLink = route('register.form');
    $this->logoutLink = route('logout');
    $this->profileLink = route('profile.index', ['id' => auth()->check() ? auth()->id() : 1]);
    $this->currentRouteName = request()->route()->getName();
    $this->userName = auth()->user()?->name;
  }

  public function render() {
    return view('navbar.navbar');
  }
}
