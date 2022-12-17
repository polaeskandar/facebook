<div class="post-content">
  <h5 class="card-title d-flex align-items-center justify-content-start gap-2 my-2">
    @if ($showAuthorImage)
      <a href="{{ route('profile.index', ['id' => $author->id]) }}">
        <img class="author-image" src="{{ $authorImage->image }}" alt="{{ $author->name }}">
      </a>
    @else
      <a href="{{ route('profile.index', ['id' => $author->id]) }}">
        <div class="author-first-letter bg-primary">{{ $authorImage }}</div>
      </a>
    @endif
    <span class="username d-flex align-items-center gap-2">
      <a href="{{ route('profile.index', ['id' => $author->id]) }}" class="text-decoration-none">{{ $author->name }}</a>
    </span>
    <span class="dates text-muted fs-6 fw-normal ms-auto">{{ $postedOn }}</span>
  </h5>
  <p class="card-text">{!! $fullBody !!}</p>
</div>
