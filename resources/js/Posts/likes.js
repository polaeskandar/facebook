import { checkLikeRoute, csrfToken, likeUnlikeRoute, userId } from "../Utils/constants";

const likes = () => {
  if (!userId) return;

  document.querySelectorAll('.post-actions').forEach(postActionDiv => {
    const postId = postActionDiv.dataset.postId;
    const likeBtn = postActionDiv.querySelector('.like');

    const formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('post_id', postId);
    formData.append('user_id', userId);

    axios.get(checkLikeRoute, {
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
      axios.post(likeUnlikeRoute, formData);
    });
  });
}

export { likes };
