const postsContainer = document.getElementById('posts-container');

let requestSend = false;

if (postsContainer) window.addEventListener('scroll', function () {
  if ((window.innerHeight + window.scrollY) + 2000 >= document.body.offsetHeight && !requestSend) {
    sendRequest();
    requestSend = true;
  }
});

function sendRequest() {
  console.log('Loading posts...')
}
