<h5 class="card-title mb-3">My Posts</h5>

<div class="d-grid gap-4 {{ $posts->count() ? 'profile-page-posts' : 'profile-page-no-posts' }}">
  @forelse($posts as $post)
    <div class="card">
      <div class="card-body">
        <p class="card-text">{!! $post->body !!} </p>
        <a href="#" class="btn btn-primary">Show full post</a>
      </div>
    </div>
  @empty
    <div class="alert alert-warning">
      No posts to show.
    </div>
  @endforelse
</div>
