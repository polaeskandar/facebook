@extends('template.template')
@section('content')
  <form class="auth-form bg-white p-5 rounded" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-outline mb-4">
      <label class="form-label d-flex align-items-center gap-2" for="name">
        <span class="material-symbols-outlined">badge</span>
        Name
      </label>
      <input type="text" id="name" name="name" class="form-control" required/>
    </div>
    <div class="form-outline mb-4">
      <label class="form-label d-flex align-items-center gap-2" for="email">
        <span class="material-symbols-outlined">mail</span>
        Email Address
      </label>
      <input type="email" id="email" name="email" class="form-control" required/>
    </div>
    <div class="form-outline mb-4">
      <label class="form-label d-flex align-items-center gap-2" for="password">
        <span class="material-symbols-outlined">password</span>
        Password
      </label>
      <input type="password" id="password" name="password" class="form-control" required/>
    </div>
    <div class="form-outline mb-4">
      <label class="form-label d-flex align-items-center gap-2" for="password_confirmation">
        <span class="material-symbols-outlined">password</span>
        Password Confirmation
      </label>
      <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required/>
    </div>
    <div class="form-check">
      <input class="form-check-input" name="remember" type="checkbox" value="1" id="remember" checked/>
      <label class="form-check-label" for="remember">Remember me</label>
    </div>
    <div class="mt-3"><a href="{{ route('login.form') }}">Already have an account? Login here!</a></div>
    <button type="submit" class="btn btn-primary btn-block w-100 mt-3">Sign up</button>
  </form>
@endsection
