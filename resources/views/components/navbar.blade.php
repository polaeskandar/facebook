<nav class="navbar navbar-expand-lg bg-light" style="border-bottom: 1px solid rgba(0, 0, 0, 0.1)">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('index') }}">FaceBook</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ \Request::route()->getName() === 'index' ? 'active' : '' }}" href="{{ route('index')}}">Home</a>
        </li>
        @guest
          <li class="nav-item">
            <a class="nav-link {{ \Request::route()->getName() === 'login.form' ? 'active' : '' }}" href="{{ route('login.form') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ \Request::route()->getName() === 'register.form' ? 'active' : '' }}" href="{{ route('register.form') }}">Register</a>
          </li>
        @endguest
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ auth()->user()->name }}</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('profile.page') }}">My Profile</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
            </ul>
          </li>
        @endauth
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
