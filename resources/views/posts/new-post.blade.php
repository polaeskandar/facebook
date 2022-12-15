@can('create', \App\Models\Post::class)
  <div class="card new-post">
    <div class="card-body">
      <h5 class="card-title mb-3">What's on your mind?</h5>
      <form action="{{ $createPostRoute }}" method="POST" id="create-post-form">
        <textarea id="post-editor" name="body"></textarea>
        <div class="d-flex gap-2">
          <button type="submit" id="create-post-form-submit" class="btn btn-primary mt-3 w-75 d-flex align-items-center justify-content-center gap-2">
            <span id="create-post-form-submit-spinner" class="spinner-border me-2 d-none"><span class="visually-hidden">Loading...</span></span>
            <span id="create-post-form-submit-icon" class="material-symbols-outlined">edit_square</span>Create Post
          </button>
          <button type="submit" id="schedule-post-btn" class="btn btn-primary mt-3 w-25 d-flex align-items-center justify-content-center gap-2">
            <span id="create-post-form-submit-schedule-icon" class="material-symbols-outlined">schedule</span>Schedule Post
          </button>
        </div>
        <div id="schedule-post-input-container" class="d-none align-items-center gap-2 mt-3">
          <input class="w-100" id="schedule-post-input" type="datetime-local">
          <button type="button" class="btn-close" id="schedule-post-close-btn"></button>
        </div>
      </form>
    </div>
  </div>
@endcan
