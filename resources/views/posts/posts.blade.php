<div class="posts-container" id="posts-container">
  @forelse($posts as $post)
    <div class="card" id="post-{{ $post->id }}">
      <div class="card-body d-flex flex-column">
        <x-posts.post :post="$post"></x-posts.post>

        <small class="text-muted align-self-end mt-3">{{ $post->comments->count() }} Comment(s)</small>
        <hr class="mb-0"/>

        <!-- TODO: Separate to a comments component -->
        <div class="comments px-2 mt-3">
          @forelse($post->comments as $comment)
            <div class="comment mt-3">
              <h6 class="user d-flex align-items-center justify-content-between mb-0">
                <p class="username d-flex align-items-center gap-2">{{ $comment->user->name }} <span class="badge text-bg-primary">User</span></p>
                <p class="dates text-muted fs-6 fw-normal">Commented {{ $post->created_at->diffForHumans() }}</p>
              </h6>
              <div class="content">{{ substr($comment->body, 0, 200) }}...</div>
              @if(!$loop->last)
                <hr/>
              @endif
            </div>
          @empty
            Be the first one to comment on this post...
          @endforelse
        </div>


      </div>
    </div>
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
