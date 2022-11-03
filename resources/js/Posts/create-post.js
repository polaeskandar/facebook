import { configureLikes } from "./likes";
import { notify } from "../Utils/notification";
import { createPostForm, csrfToken } from "../Utils/constants";
import { endBtnLoadingState, initBtnLoadingState } from "../Utils/loading-state";
import { replacePostsContainer } from "../Posts/replacePostsContainer";

export function createPost() {
  if (!createPostForm) return;

  createPostForm.addEventListener('submit', function (event) {
    event.preventDefault();
    const form = event.target;
    const body = form.querySelector('.tox-tinymce iframe').contentDocument.querySelector('body').innerHTML;
    const userId = localStorage.getItem('user_id');

    const formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('body', body);
    formData.append('user_id', userId);

    initBtnLoadingState('create-post-form-submit', 'create-post-form-submit-icon', 'create-post-form-submit-spinner');

    axios.post('/posts/create', formData)
      .then((response) => {
        replacePostsContainer(response.data.posts);
        configureLikes();
        clearPostForm();
        notify('Post created successfully.');
      })
      .catch((err) => console.log(err))
      .finally(() => {
        endBtnLoadingState('create-post-form-submit', 'create-post-form-submit-icon', 'create-post-form-submit-spinner');
      });
  });
}

function clearPostForm() {
  if (!createPostForm) return;

  createPostForm
    .querySelector('.tox-tinymce iframe')
    .contentDocument
    .querySelector('body')
    .innerHTML = '';
}
