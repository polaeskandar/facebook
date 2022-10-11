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
      <x-posts.new-post></x-posts.new-post>
    @endauth
    <x-posts.posts-list :posts="$posts"></x-posts.posts-list>
  </div>

  <div class="friends">
    <div class="alert alert-primary" role="alert">
      Friends
    </div>
  </div>
@endsection
