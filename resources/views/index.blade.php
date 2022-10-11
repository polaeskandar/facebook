@extends('template.template')
@section('content')
  <div class="shortcuts">
    <div class="alert alert-primary" role="alert">
      Shortcuts
    </div>
  </div>
  <div class="posts">
    <x-profile.index-page-image-uploader></x-profile.index-page-image-uploader>
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
