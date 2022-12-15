@extends('template.template')
@section('content')
  <form class="auth-form bg-white p-5 rounded" method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="form-outline mb-4">
      <label class="form-label d-flex align-items-center gap-2" for="email">
        <span class="material-symbols-outlined">mail</span>
        Email Address
      </label>
      <input type="email" name="email" id="email" class="form-control"/>
    </div>
    <div class="mb-3"><a href="{{ route('register.form') }}">Don't have an account? Register one here!</a></div>
    <button type="submit" class="btn btn-primary btn-block w-100">Send Reset Link</button>
  </form>
@endsection

