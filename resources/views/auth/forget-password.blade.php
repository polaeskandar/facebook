@extends('template.template')
@section('content')
  <form class="auth-form" method="POST" action="{{ route('password.email') }}">
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
      <label class="form-label" for="email">Email address</label>
      <input type="email" name="email" id="email" class="form-control" />
    </div>

    <div class="mb-4"><a href="{{ route('register.form') }}">Don't have an account? Register one here!</a></div>
    <button type="submit" class="btn btn-primary btn-block w-100 mb-4 ">Send Reset Link</button>
  </form>
@endsection
