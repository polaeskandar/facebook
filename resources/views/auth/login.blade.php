@extends('template.template')
@section('content')
  <form class="auth-form bg-white p-5 rounded" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-outline mb-4">
      <label class="form-label d-flex align-items-center gap-2" for="email">
        <span class="material-symbols-outlined">mail</span>
        Email Address
      </label>
      <input type="email" name="email" id="email" class="form-control"/>
    </div>
    <div class="form-outline mb-4">
      <label class="form-label d-flex align-items-center gap-2" for="password">
        <span class="material-symbols-outlined">password</span>
        Password
      </label>
      <input type="password" name="password" id="password" class="form-control"/>
    </div>
    <div class="d-flex align-items-center justify-content-between mb-3">
      <div class="d-flex justify-content-center">
        <div class="form-check">
          <input class="form-check-input" name="remember" type="checkbox" value="1" id="remember" checked/>
          <label class="form-check-label" for="remember">Remember me</label>
        </div>
      </div>
      <div><a href="{{ route('forget-password.form') }}">Forgot password?</a></div>
    </div>
    <div><a href="{{ route('register.form') }}">Don't have an account? Register one here!</a></div>
    <button type="submit" class="btn btn-primary btn-block w-100 mt-3">Sign in</button>
  </form>
@endsection
