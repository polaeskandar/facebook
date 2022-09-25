<div class="card new-post">
  <div class="card-body">
    <h5 class="card-title">What's on your mind?</h5>
    <form action="{{ route('post.create') }}" method="POST">
      @csrf
      <input type="hidden" name="user_id" value="{{ auth()->id() }}">
      <textarea class="form-control my-3" rows="6" name="body"></textarea>
      <button type="submit" class="btn btn-primary w-100 d-flex align-items-center justify-content-center gap-1 py-2">
        <span class="material-symbols-outlined">edit_square</span>Create Post
      </button>
    </form>
  </div>
</div>
