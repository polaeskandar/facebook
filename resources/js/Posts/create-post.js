import { configureLikes } from "./likes";

const createPost = (postData) => {
  const formData = new FormData();
  formData.append('_token', postData.csrfToken);
  formData.append('body', postData.body);
  formData.append('user_id', postData.userId);

  const submitBtn = document.getElementById('create-post-form-submit');
  const submitBtnIcon = document.getElementById('create-post-form-submit-icon');
  submitBtnIcon.classList.add('d-none')
  submitBtn.classList.add('disabled', 'opacity-75');
  submitBtn.querySelector('#create-post-form-submit-spinner').classList.remove('d-none');

  axios.post('/posts/create', formData)
    .then((response) => {
      const postsContainer = document.getElementById('posts-container');

      if (postsContainer) {
        let postsElement = '';
        postsElement += response.data.posts;
        postsElement += postsContainer.innerHTML;
        postsContainer.innerHTML = postsElement;
      }

     configureLikes();

      document.getElementById('create-post-form')
        .querySelector('.tox-tinymce iframe')
        .contentDocument
        .querySelector('body')
        .innerHTML = '';

      const notificationToast = document.getElementById('notification-toast');
      notificationToast.querySelector('.toast-body').innerText = 'Post created successfully.';
      const toast = new bootstrap.Toast(notificationToast);
      toast.show();
    })
    .catch((err) => {
      console.log(err);
    })
    .finally(() => {
      submitBtnIcon.classList.remove('d-none')
      submitBtn.classList.remove('disabled', 'opacity-75');
      submitBtn.querySelector('#create-post-form-submit-spinner').classList.add('d-none');
    });
}

export { createPost };
