<script>
  // tinymce.init({
  //   selector: 'textarea#post-textarea',
  //   plugins: 'image',
  //   toolbar: 'image',
  //   file_picker_callback: (callback, value, meta) => {
  //     const input = document.createElement('input');
  //     input.setAttribute('type', 'file');
  //     input.setAttribute('accept', 'image/*');
  //
  //     input.addEventListener('change', (e) => {
  //       const file = e.target.files[0];
  //       const formData = new FormData();
  //       formData.append('_token', '{{ csrf_token() }}');
  //       formData.append('image', file);
  //       axios.post('/images', formData, {
  //         headers: {'Content-Type': 'multipart/form-data'}
  //       });
  //
  //       callback('http://localhost:8000/storage/images/1664916311_jZvGypwTb2_jpeg.jpg', {title: file.name});
  //     });
  //     input.click();
  //   },
  // });
</script>

<div class="card new-post">
  <div class="card-body">
    <h5 class="card-title mb-3">What's on your mind?</h5>
    <form action="{{ $createPostRoute }}" method="POST" id="create-post-form">
      <textarea id="post-editor" name="body"></textarea>
      <button type="submit" id="create-post-form-submit" class="btn btn-primary mt-3 w-100 d-flex align-items-center justify-content-center gap-1 py-2">
        <span id="create-post-form-submit-spinner" class="spinner-border me-2 d-none"><span class="visually-hidden">Loading...</span></span>
        <span id="create-post-form-submit-icon" class="material-symbols-outlined">edit_square</span>Create Post
      </button>
    </form>
  </div>
</div>
