<style>
  .errors-container {
    position: fixed;
    left: 0;
    right: 0;
    bottom: 0;
    margin: 1rem 2rem;
    opacity: 0;
    transition: all .3s ease-out;
  }

  .errors-container.active {
    position: fixed;
    opacity: 1;
  }
</style>

@if ($errors->any())
  <div class="errors-container alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
