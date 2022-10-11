<div class="alert alert-warning">
  There is nothing here to show ...
  @auth
    Add a new post up there!
  @endauth
  @guest
    Login <a href="{{ $loginLink }}">here</a> to add a new post.
  @endguest
</div>
