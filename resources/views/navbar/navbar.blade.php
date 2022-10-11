<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ $indexLink }}">FaceBook</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLinks">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarLinks">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ $currentRouteName === 'index' ? 'active' : '' }}" href="{{ $indexLink }}">Home</a>
        </li>
        @guest
          <li class="nav-item">
            <a class="nav-link {{ $currentRouteName === 'login.form' ? 'active' : '' }}" href="{{ $loginLink }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ $currentRouteName === 'register.form' ? 'active' : '' }}" href="{{ $registerLink }}">Register</a>
          </li>
        @endguest
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">{{ $userName }}</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ $profileLink }}">My Profile</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="{{ $logoutLink }}">Logout</a></li>
            </ul>
          </li>
        @endauth
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search something...">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
