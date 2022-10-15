const configureLikes = () => {
  document.querySelectorAll('.post-actions').forEach(postActionDiv => {
    postActionDiv.querySelector('.like').addEventListener('click', function (event) {
      event.target.classList.toggle('active');
      const postId = event.target.parentNode.dataset.postId;
    });
  });
}

export { configureLikes };
