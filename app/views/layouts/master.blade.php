@include('layouts.head')

<body>
  <!-- persistant nav -->
  <div class="nav">
    <div class="container">
      <div class="nav-items left">
        <div class="nav-item"><a href="/">Home</a></div>
      </div>
      <ul class="nav-items right">
        @if(Auth::check())
        <li class="nav-item"><a href="/user/{{Auth::user()->id}}"><img class="avatar_url" src="{{Auth::user()->avatar_url}}">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</a></li>
        <li class="nav-item"><a href="/account/logout">Logout</a></li>
        @else

        <!-- login button -->
        <li class="nav-item login-btn"><a href="/account/login"><svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="100px" height="47.275px" viewBox="0 0 100 47.275" enable-background="new 0 0 100 47.275" xml:space="preserve">
<path fill="#FFF" d="M98.923,19.999l-8.049-8.122H43.727C39.696,4.775,32.131-0.019,23.446,0C10.507-0.027,0.029,10.559,0,23.599
  C0.029,36.67,10.507,47.255,23.446,47.275c8.661-0.014,16.209-4.793,20.247-11.876h9.483l7.512-7.51l5.747,5.749l5.517-5.518
  l5.669,5.667l5.747-5.744l5.747,5.744l9.809-9.805C100.341,22.505,100.377,21.469,98.923,19.999z M13.18,29.808
  c-3.458-0.032-6.239-2.846-6.207-6.286c-0.032-3.487,2.749-6.299,6.207-6.283c3.401-0.018,6.182,2.796,6.208,6.283
  C19.363,26.962,16.582,29.775,13.18,29.808z"/>
</svg>Login</a></li>

        <!-- sign up button -->
        <li class="nav-item signup-btn"><a href="/account/signup"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="100px" height="100px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
<g>
  <path fill="#000000" d="M66.04,63.115c-2.493-1.092-9.397-2.943-10.226-6.084c-1.304-4.964,3.645-8.747,5.845-12.655   c2.315-4.122,4.247-9.699,4.625-14.361c1.354-16.731-8.905-26.52-23.61-24.826c-10.693,1.23-17.08,9.203-17.769,19.47   c-0.701,10.46,3.179,18.187,7.302,23.852c1.803,2.479,3.696,4.074,3.408,7.059C35.274,59.1,31.5,60.084,28.8,61.168   c-3.202,1.287-6.646,3.238-8.276,4.138c-5.606,3.099-11.761,6.828-13.144,11.927c-3.064,11.306,7.281,14.729,15.82,16.309   C30.532,94.895,38.794,95,45.593,95c12.293,0,34.405-0.492,37.97-9.733c1.013-2.624,0.577-6.804,0-8.521   C81.326,70.083,72.4,65.91,66.04,63.115z"/>
  <path fill="#000000" d="M92.119,47.241h-5.192V42.05c0-0.579-0.47-1.05-1.05-1.05h-3.414c-0.582,0-1.051,0.471-1.051,1.05v5.191   h-5.193c-0.579,0-1.049,0.47-1.049,1.052v3.414c0,0.582,0.47,1.051,1.049,1.051h5.193v5.194c0,0.579,0.469,1.048,1.051,1.048h3.414   c0.58,0,1.05-0.469,1.05-1.048v-5.194h5.192c0.578,0,1.051-0.469,1.051-1.051v-3.414C93.17,47.711,92.697,47.241,92.119,47.241z"/>
</g>
</svg> Signup</a></li>
        @endif
      </ul>
    </div>
  </div>

  <div class="content-wrapper">
    @yield('content')
  </div>
</body>

@include('layouts.footer')