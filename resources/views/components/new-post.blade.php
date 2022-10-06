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
    <form action="{{ route('post.create') }}" method="POST" id="create-post-form">
      @csrf
      <input type="hidden" name="user_id" value="{{ auth()->id() }}">
      <textarea id="post-editor" name="body"></textarea>
      <button type="submit" class="btn btn-primary mt-3 w-100 d-flex align-items-center justify-content-center gap-1 py-2">
        <span class="material-symbols-outlined">edit_square</span>Create Post
      </button>
    </form>
  </div>
</div>

<script>
  tinymce.init({
    selector: '#post-editor',
    plugins: ['link', 'anchor', 'wordcount', 'code', 'insertdatetime', 'table'],
    toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link'
  });

  document.getElementById('create-post-form').addEventListener('submit', function (event) {
    event.preventDefault();

    const form = event.target;
    const csrfToken = "{{ csrf_token() }}";
    const body = form.querySelector('.tox-tinymce iframe').contentDocument.querySelector('body').innerHTML;
    const userId = "{{ auth()->id() }}";

    const formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('body', body);
    formData.append('user_id', userId);

    axios.post('/posts/create', formData)
      .then((response) => {
        document.getElementById('posts-container').innerHTML = response.data.posts;
      })
      .catch((err) => {
        console.log(err);
      });
  });
</script>
