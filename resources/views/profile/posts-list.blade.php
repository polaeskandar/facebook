<h5 class="card-title mb-3">My Posts</h5>

<div class="d-grid gap-4" style="grid-template-columns: repeat(3, 1fr)">

  @foreach($posts as $post)
    <div class="card">
      <div class="card-body">
        <p class="card-text">{!! $post->body !!} </p>
        <a href="#" class="btn btn-primary">Show full post</a>
      </div>
    </div>
  @endforeach
</div>
