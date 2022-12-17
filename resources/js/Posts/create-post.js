import { likes } from "./likes";
import { notify } from "../Utils/notification";
import { createPostForm, createPostRoute, csrfToken, schedulePostsInput, userId } from "../Utils/constants";
import { endBtnLoadingState, initBtnLoadingState } from "../Utils/loading-state";
import { replacePostsContainer } from "./replace-posts-container";
import { clearIframeContents, getIframeContents } from "../Utils/utils";


export function createPost() {
  if (!createPostForm) return;

  createPostForm.addEventListener('submit', function (event) {
    event.preventDefault();
    const body = getIframeContents('.tox-tinymce iframe');
    const schedulePostsInput = document.getElementById('schedule-post-input');

    const formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('body', body);
    formData.append('user_id', userId);
    formData.append('post_on', schedulePostsInput.value);

    initBtnLoadingState('create-post-form-submit', 'create-post-form-submit-icon', 'create-post-form-submit-spinner');

    axios.post(createPostRoute, formData)
      .then((response) => {
        if (!schedulePostsInput.value) replacePostsContainer(response.data.posts);
        likes();
        notify(!schedulePostsInput.value ? 'Post created successfully.' : 'Post has been scheduled successfully.');
        clearPostForm();
      })
      .catch((err) => console.error(err))
      .finally(() => {
        endBtnLoadingState('create-post-form-submit', 'create-post-form-submit-icon', 'create-post-form-submit-spinner');
      });
  });
}

function clearPostForm() {
  if (!createPostForm) return;
  clearIframeContents('.tox-tinymce iframe');
  document.getElementById('schedule-post-input').value = null;
}
