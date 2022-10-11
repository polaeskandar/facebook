@auth
  <script>if (!localStorage.getItem('user_id')) localStorage.setItem('user_id', '{{ auth()->id() }}');</script>
@endauth
@guest
  <script>if (localStorage.getItem('user_id')) localStorage.removeItem('user_id');</script>
@endguest
