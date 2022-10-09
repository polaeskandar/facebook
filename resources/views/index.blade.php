@extends('template.template')
@section('content')
  <div class="shortcuts">
    <div class="alert alert-primary" role="alert">
      Shortcuts
    </div>
  </div>
  <div class="posts">
    @include('components.upload-image')
    @auth
      @include('posts.new-post')
    @endauth
    @include('posts.posts')
  </div>
  <div class="friends">
    <div class="alert alert-primary" role="alert">
      Friends
    </div>
  </div>
@endsection
