<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Laravel PHP Framework</title>
  <style>
    @import url(//fonts.googleapis.com/css?family=Lato:700);

    body {
      margin:0;
      font-family:'Lato', sans-serif;
      text-align:center;
      color: #999;
    }

    .welcome {
      width: 300px;
      height: 200px;
      position: absolute;
      left: 50%;
      top: 50%;
      margin-left: -150px;
      margin-top: -100px;
    }

    a, a:visited {
      text-decoration:none;
    }

    h1 {
      font-size: 32px;
      margin: 16px 0 0 0;
    }
    ul, li{
      margin:0px;
      padding:0px;
    }
    .nav{
      top:0px;
      position:fixed;
      background:#CCC;
      width:100%;
      height:50px;
      text-align:right;
    }
    .nav-items{
      padding-right:20px;
    }
    .nav-item{
      list-style-type: none;
      display:inline-block;
      margin:15px 10px;
    }
    .nav-item a{
      color:#666;
    }
    .nav-item a:hover{
      color:#000;
    }
    .content-wrapper{
      margin-top:50px;
    }
  </style>
</head>
<body>

  <div class="nav">
    <ul class="nav-items">
      <li class="nav-item"><a href="/">Home</a></li>
      <li class="nav-item"><a href="/users">Users</a></li>
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
    {{ $content }}
  </div>

</body>
</html>