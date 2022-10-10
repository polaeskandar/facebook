<div class="card" id="post-{{ $post->id }}">
  <div class="card-body d-flex flex-column">
    <div class="post">
      <h5 class="card-title d-flex align-items-center justify-content-between mb-0">
        <p class="username d-flex align-items-center gap-2">{{ $author }}<span class="badge text-bg-primary">User</span></p>
        <p class="dates text-muted fs-6 fw-normal">{{ $postedOn }}</p>
      </h5>
      <p class="card-text">{!! $subBody !!}
        @if ($bodyLength > 400)
          ... Read more
        @endif
      </p>
    </div>

    <small class="text-muted align-self-end mt-3">{{ $post->comments->count() }} Comment(s)</small>
    <hr class="mb-0"/>

    <x-posts.comments-list :comments="$post->comments"></x-posts.comments-list>
  </div>
</div>
