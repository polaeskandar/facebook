import { createPost } from './create-post'

const createPostForm = document.getElementById('create-post-form');

createPostForm && tinymce.init({
  selector: '#post-editor',
  plugins: ['link', 'anchor', 'wordcount', 'code', 'insertdatetime', 'table', 'image'],
  toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  file_picker_callback: (callback, value, meta) => {
    const input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');

    input.addEventListener('change', (event) => {
      const file = event.target.files[0];
      const formData = new FormData();

      formData.append('_token', document.querySelector('meta[name="_token"]').getAttribute('content'));
      formData.append('image', file);

      axios.post('/posts/image/upload', formData, {
        headers: { 'Content-Type': 'multipart/form-data' }
      }).then(response => {
        callback(response.data.image, { title: file.name });
      });
    });
    input.click();
  },
});

createPostForm && createPostForm.addEventListener('submit', function (event) {
  event.preventDefault();
  const form = event.target;
  const csrfToken = document.querySelector('meta[name="_token"]').getAttribute('content');
  const body = form.querySelector('.tox-tinymce iframe').contentDocument.querySelector('body').innerHTML;
  const userId = localStorage.getItem('user_id');
  createPost({ csrfToken, body, userId });
});
