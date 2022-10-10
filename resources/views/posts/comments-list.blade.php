<div class="comments px-2 mt-3">
  @forelse($comments as $comment)
    <x-posts.comment :comment="$comment"></x-posts.comment>
    @if(!$loop->last)
      <hr/>
    @endif
  @empty
    Be the first one to comment on this post...
  @endforelse
</div>
