@include('layouts.head')

<body>
  <!-- persistant nav -->
  <div class="nav">
    <div class="nav-items left">
      <div class="nav-item"><a href="/">Home</a></div>
    </div>
    <ul class="nav-items right">
      @if(Auth::check())
      <li class="nav-item">Hi {{Auth::user()->name}}!</li>
      <li class="nav-item"><a href="users/logout">Logout</a></li>
      @else
      <li class="nav-item"><a href="/users/login">Login</a></li>
      <li class="nav-item"><a href="/users/signup">Signup</a></li>
      @endif
    </ul>
  </div>

  <div class="content-wrapper">
    @yield('content')
  </div>
</body>

@include('layouts.footer')