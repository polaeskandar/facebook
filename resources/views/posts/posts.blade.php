<div class="posts-container" id="posts-container">
  @forelse($posts as $post)
    <x-posts.post :post="$post"></x-posts.post>
  @empty
    <div class="alert alert-warning">
      There is nothing here to show ...
      @auth
        Add a new post up there!
      @elseauth
        Login <a href="{{ route('login.form') }}">here</a> to add a new post.
      @endauth
    </div>
  @endforelse
</div>
