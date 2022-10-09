<div class="post">
  <h5 class="card-title d-flex align-items-center justify-content-between mb-0">
    <p class="username d-flex align-items-center gap-2">{{ $author }} <span class="badge text-bg-primary">User</span></p>
    <p class="dates text-muted fs-6 fw-normal">{{ $postedOn }}</p>
  </h5>
  <p class="card-text">{!! $body !!}
    @if ($bodyLength > 400)
      ... Read more
    @endif
  </p>
</div>
