import { createPost } from './create-post'

const createPostForm = document.getElementById('create-post-form');

createPostForm && tinymce.init({
  selector: '#post-editor',
  plugins: ['link', 'anchor', 'wordcount', 'code', 'insertdatetime', 'table'],
  toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link'
});

createPostForm && createPostForm.addEventListener('submit', function (event) {
  event.preventDefault();
  const form = event.target;
  const csrfToken = document.querySelector('meta[name="_token"]').getAttribute('content');
  const body = form.querySelector('.tox-tinymce iframe').contentDocument.querySelector('body').innerHTML;
  const userId = localStorage.getItem('user_id');
  createPost({ csrfToken, body, userId });
});
