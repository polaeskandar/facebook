const configureLikes = () => {
  const userId = localStorage.getItem('user_id')
  if (!userId) return;

  document.querySelectorAll('.post-actions').forEach(postActionDiv => {
    const postId = postActionDiv.dataset.postId;
    const likeBtn = postActionDiv.querySelector('.like');

    const formData = new FormData();
    formData.append('_token', document.querySelector('meta[name="_token"]').getAttribute('content'));
    formData.append('post_id', postId);
    formData.append('user_id', userId);

    axios.get('/posts/check-like', {
      params: {
        post_id: postId,
        user_id: userId
      }
    }).then(response => {
      if (response.data.liked) likeBtn.classList.add('active');
      else likeBtn.classList.remove('active')
    });

    likeBtn.addEventListener('click', (event) => {
      event.target.classList.toggle('active');
      axios.post('/posts/like-unlike', formData).then(response => {});
    });

  });
}

export { configureLikes };
