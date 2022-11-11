const replacePostsContainer = (postsString) => {
  const postsContainer = document.getElementById('posts-container');
  if (!postsContainer) { return }

  let postsElement = '';
  postsElement += postsString;
  postsElement += postsContainer.innerHTML;
  postsContainer.innerHTML = postsElement;
}

export { replacePostsContainer }
