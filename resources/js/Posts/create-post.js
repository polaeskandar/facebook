const createPost = (postData) => {
  const formData = new FormData();
  formData.append('_token', postData.csrfToken);
  formData.append('body', postData.body);
  formData.append('user_id', postData.userId);

  axios.post('/posts/create', formData)
    .then((response) => {
      const postsContainer = document.getElementById('posts-container');
      if (postsContainer) document.getElementById('posts-container').innerHTML = response.data.posts;

      document.getElementById('create-post-form')
        .querySelector('.tox-tinymce iframe')
        .contentDocument
        .querySelector('body')
        .innerHTML = '';
    })
    .catch((err) => {
      console.log(err);
    });
}

export { createPost };
