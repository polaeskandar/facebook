@extends('template.template')
@section('content')
  <div class="shortcuts">
    <div class="alert alert-primary" role="alert">
      Shortcuts
    </div>
  </div>
  <div class="posts">
    @auth
      @include('components.new-post')
    @endauth
    @include('components.posts')
  </div>
  <div class="friends">
    <div class="alert alert-primary" role="alert">
      Friends
    </div>
  </div>
@endsection
