<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ $indexLink }}">FaceBook</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLinks">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarLinks">
      <ul class="navbar-nav me-auto gap-2 mb-2 mb-lg-0">
        <li class="nav-item d-flex align-items-center gap-2">
          <span class="material-symbols-outlined">home</span>
          <a class="nav-link {{ $currentRouteName === 'index' ? 'active' : '' }} p-0" href="{{ $indexLink }}">Home</a>
        </li>
        @guest
          <li class="nav-item d-flex align-items-center gap-2">
            <span class="material-symbols-outlined">login</span>
            <a class="nav-link {{ $currentRouteName === 'login.form' ? 'active' : '' }} p-0" href="{{ $loginLink }}">Login</a>
          </li>
          <li class="nav-item d-flex align-items-center gap-2">
            <span class="material-symbols-outlined">edit</span>
            <a class="nav-link {{ $currentRouteName === 'register.form' ? 'active' : '' }} p-0" href="{{ $registerLink }}">Register</a>
          </li>
        @endguest
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown">
              <span class="material-symbols-outlined">account_circle</span>{{ $userName }}
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item d-flex align-items-center gap-2" href="{{ $profileLink }}">
                  <span class="material-symbols-outlined">account_box</span>My Profile
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="dropdown-item d-flex align-items-center gap-2" href="{{ $logoutLink }}">
                  <span class="material-symbols-outlined">logout</span>Logout
                </a>
              </li>
            </ul>
          </li>
        @endauth
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2 w-100" type="search" placeholder="Search something...">
        <button class="btn btn-outline-success d-flex align-items-center gap-2" type="submit">
          Search<span class="material-symbols-outlined">search</span></button>
      </form>
    </div>
  </div>
</nav>
