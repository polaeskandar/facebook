<div class="card">
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action="{{ route('user.profile-image.upload') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="profile-image" class="form-label">Email address</label>
        <input type="file" class="form-control" id="profile-image" name="image">
      </div>
      <button type="submit" class="btn btn-primary w-100">Upload Image</button>
    </form>
  </div>
</div>
