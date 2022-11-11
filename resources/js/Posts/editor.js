import { createPostForm, csrfToken, postImagesUploadRoute } from "../Utils/constants";

const filePickerHandler = (callback, _value, _meta) => {
  const input = document.createElement('input');
  input.setAttribute('type', 'file');
  input.setAttribute('accept', 'image/*');

  input.addEventListener('change', (event) => {
    const file = event.target.files[0];
    const formData = new FormData();

    formData.append('_token', csrfToken);
    formData.append('image', file);

    axios.post(postImagesUploadRoute, formData, {
      headers: { 'Content-Type': 'multipart/form-data' }
    }).then(response => callback(response.data.image, { title: file.name }));
  });

  input.click();
}

export function initEditor() {
  if (!createPostForm) return;

  tinymce.init({
    selector: '#post-editor',
    plugins: ['link', 'anchor', 'wordcount', 'code', 'insertdatetime', 'table', 'image'],
    toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    file_picker_callback: filePickerHandler,
  });
}
