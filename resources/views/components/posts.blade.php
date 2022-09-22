@foreach($posts as $post)
  <div class="card">
    <div class="card-body">
      <p class="card-text">{{ $post->body }}</p>
    </div>
  </div>
@endforeach
