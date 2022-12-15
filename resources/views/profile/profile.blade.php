@extends('template.template')
@section('content')
  <main class="row w-100">
    <div class="col-3 details overflow-hidden">
      <h5 class="card-title mb-3">{{ $user->name }}</h5>
      <x-profile.profile-image :user="$user"></x-profile.profile-image>
    </div>
    <div class="col-9 timeline">
      <x-profile.images-slider :user="$user"></x-profile.images-slider>
      <x-profile.posts-list :user="$user"></x-profile.posts-list>
    </div>
  </main>
@endsection
