@extends('template.template')
@section('content')
  <form class="auth-form" method="POST" action="{{ route('register') }}">
    @include('components.errors-container')
    @csrf
    <div class="form-outline mb-4">
      <label class="form-label" for="name">Name</label>
      <input type="text" id="name" name="name" class="form-control" required/>
    </div>
    <div class="form-outline mb-4">
      <label class="form-label" for="email">Email address</label>
      <input type="email" id="email" name="email" class="form-control" required/>
    </div>
    <div class="form-outline mb-4">
      <label class="form-label" for="password">Password</label>
      <input type="password" id="password" name="password" class="form-control" required/>
    </div>
    <div class="form-outline mb-4">
      <label class="form-label" for="password_confirmation">Password Confirmation</label>
      <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required/>
    </div>
    <div class="form-check">
      <input class="form-check-input" name="remember" type="checkbox" value="1" id="remember" checked/>
      <label class="form-check-label" for="remember">Remember me</label>
    </div>
    <div class="mb-4"><a href="{{ route('login.form') }}">Already have an account? Login here!</a></div>
    <button type="submit" class="btn btn-primary btn-block w-100 mb-4">Sign up</button>
  </form>
@endsection
