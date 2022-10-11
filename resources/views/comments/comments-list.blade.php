<div class="comments px-2">
  @forelse($comments as $comment)
    <x-comments.comment :comment="$comment"></x-comments.comment>
    @if(!$loop->last)
      <hr />
    @endif
  @empty
    <x-comments.no-comments></x-comments.no-comments>
  @endforelse
</div>
