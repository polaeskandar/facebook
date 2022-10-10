@if (auth()->id() && !auth()->user()->image)
  <div class="card" id="upload-image-container">
    <div class="card-body d-flex flex-column">
      <div class="header d-flex align-items-center justify-content-between mb-3 mt-1">
        <h5 class="card-title">Upload your profile image now!</h5>
        <button type="button" class="btn-close" id="upload-image-close"></button>
      </div>
      <div class="content">
        <form action="{{ route('profile.image.upload') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="file" class="form-control mb-3" id="profile-image" name="image">
          <button type="submit" class="btn btn-primary w-100">Upload Image</button>
        </form>
      </div>
    </div>
  </div>
@endif
