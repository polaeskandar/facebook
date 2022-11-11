@if ($showImagesCarousel)
  <h5 class="card-title mb-3">My Images</h5>
  <div id="profileImagesCarouselIndicators" class="carousel slide mb-3" data-bs-ride="true">
    <div class="carousel-indicators">
      @foreach($profileImages as $profileImage)
        <button type="button" data-bs-target="#profileImagesCarouselIndicators" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></button>
      @endforeach
    </div>

    <div class="carousel-inner">
      @foreach($profileImages as $profileImage)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
          <img src="{{ $profileImage->image }}" class="d-block w-100">
        </div>
      @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#profileImagesCarouselIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#profileImagesCarouselIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <hr class="mb-3">
@endif
