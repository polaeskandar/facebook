<div class="post card" id="post-{{ $postId }}">
  <div class="card-body d-flex flex-column">
    <x-posts.post-content :post="$post"></x-posts.post-content>
    <x-posts.post-actions :post="$post"></x-posts.post-actions>
    <hr />
    <x-comments.comments-list :comments="$post->comments"></x-comments.comments-list>
  </div>
</div>
