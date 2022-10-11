<div class="posts-container" id="posts-container">
  @forelse($posts as $post)
    <x-posts.post :post="$post"></x-posts.post>
  @empty
    <x-posts.no-posts></x-posts.no-posts>
  @endforelse
</div>

<script>
  document.querySelectorAll('.post-actions').forEach(postActionDiv => {
    postActionDiv.querySelector('.like').addEventListener('click', function (event) {
      event.target.classList.toggle('active');
      console.log(event.target.parentNode.dataset.postId);
    });
  });
</script>
