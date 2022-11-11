import { postsContainer } from "../Utils/constants";

const loadPostsOnScroll = () => {
  let postsRequestSent = false;

  if (postsContainer) window.addEventListener('scroll', function () {
    if ((window.innerHeight + window.scrollY) + 2000 >= document.body.offsetHeight && !postsRequestSent) {
      postsRequestSent = true;
    }
  });
}

export { loadPostsOnScroll }
