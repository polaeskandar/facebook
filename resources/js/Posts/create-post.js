import { likes } from "./likes";
import { notify } from "../Utils/notification";
import { createPostForm, createPostRoute, csrfToken, userId } from "../Utils/constants";
import { endBtnLoadingState, initBtnLoadingState } from "../Utils/loading-state";
import { replacePostsContainer } from "./replace-posts-container";
import { clearIframeContents, getIframeContents } from "../Utils/utils";

export function createPost() {
  if (!createPostForm) return;

  createPostForm.addEventListener('submit', function (event) {
    event.preventDefault();
    const body = getIframeContents('.tox-tinymce iframe');

    const formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('body', body);
    formData.append('user_id', userId);

    initBtnLoadingState('create-post-form-submit', 'create-post-form-submit-icon', 'create-post-form-submit-spinner');
    axios.post(createPostRoute, formData)
      .then((response) => {
        replacePostsContainer(response.data.posts);
        likes();
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
  clearIframeContents('.tox-tinymce iframe');
}
