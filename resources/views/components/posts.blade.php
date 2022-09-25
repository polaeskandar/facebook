@foreach($posts as $post)
  <div class="card">
    <div class="card-body">
      <h5 class="card-title d-flex align-items-center gap-2">{{ $post->user->name }}<span class="badge text-bg-primary">User</span></h5>
      <p class="card-text">{!! nl2br($post->body) !!}</p>
    </div>
  </div>
@endforeach
