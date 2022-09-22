@extends('template.template')
@section('content')

<form class="auth-form" method="POST" action="{{ route('register') }}">
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @csrf
  <div class="form-outline mb-4">
    <label class="form-label" for="name">Name</label>
    <input type="text" id="name" name="name" class="form-control" required />
  </div>

  <div class="form-outline mb-4">
    <label class="form-label" for="email">Email address</label>
    <input type="email" id="email" name="email" class="form-control" required />
  </div>

  <div class="form-outline mb-4">
    <label class="form-label" for="password">Password</label>
    <input type="password" id="password" name="password" class="form-control" required />
  </div>

  <div class="form-outline mb-4">
    <label class="form-label" for="password_confirmation">Password Confirmation</label>
    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required />
  </div>

  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" name="remember" id="remember" />
        <label class="form-check-label" for="remember">Remember me</label>
      </div>
    </div>
    <div class="col"><a href="{{ route('forget-password.form') }}">Forgot password?</a></div>
  </div>

  <div class="mb-4"><a href="{{ route('login.form') }}">Already have an account? Login here!</a></div>

  <button type="submit" class="btn btn-primary btn-block w-100 mb-4">Sign in</button>
</form>
@endsection
