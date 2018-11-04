<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>

    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<nav class="navbar nav bg-white ">
    <div class="d-flex justify-content-between">
        <a href="/">
            <img src="{{asset('images/rts_logo.png')}}" height="50px" width="auto"/>
        </a>
        <a class="nav-link" href="/setups">Setups</a>
    </div>
    <div class="d-flex justify-content-between">
        @if(Auth::check())
            <a class="nav-link" href="/create">Enter Setup</a>
            <a class="nav-link" href="/myprofile">Your profile</a>
            @if(Auth::user()->is_admin == true)
                <a class="nav-link" href="/admin">Admin</a>
            @endif
            <a class="nav-link" href="/logout">Log out</a>
        @else
            <a class="nav-link" href="/login">Login</a>
            <a class="nav-link" href="/register">Register</a>
        @endif


    </div>
</nav>

@yield('content')

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>