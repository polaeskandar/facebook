@extends('template.template')
@section('content')
  <style>
    .user-first-letter {
      background-color: rgba(110, 48, 76, 1);
      color: #fff;
      font-size: 5rem;
    }
  </style>
  <main class="row w-100">
    <div class="col-3 details overflow-hidden">
      <h5 class="card-title mb-3">{{ auth()->user()->name }}</h5>
      @if (auth()->user()->image)
        <img src="{{ auth()->user()->image }}" alt="user-{{ auth()->id() }}-image" style="border: 1px solid #ccc;" />
      @else
        <div class="user-first-letter d-flex align-items-center justify-content-center py-4" style="">{{ strtoupper(auth()->user()->name[0]) }}</div>
      @endif
    </div>
    <div class="col-9 timeline">
      <h5 class="card-title mb-3">My Images</h5>

      <div id="carouselExampleIndicators" class="carousel slide mb-3" data-bs-ride="true">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ auth()->user()->image }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <hr class="mb-3">

      <h5 class="card-title mb-3">My Posts</h5>

      <div class="d-grid gap-4" style="grid-template-columns: repeat(3, 1fr)">

        <div class="card">
          <img src="{{ auth()->user()->image }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>

        <div class="card">
          <img src="{{ auth()->user()->image }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>

        <div class="card">
          <img src="{{ auth()->user()->image }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>

        <div class="d-flex flex-col justify-content-start card">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>

        <div class="card">
          <img src="{{ auth()->user()->image }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>

      </div>

    </div>
  </main>
@endsection
