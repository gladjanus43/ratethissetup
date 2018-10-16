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

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="navbar">
    <ul>
        <li class="nav">Logo</li>
    </ul>
    <ul class="nav justify-content-end">
        @if(Auth::check())
            <li><a class="nav-link" href="/">Your profile</a></li>
            <li><a class="nav-link" href="/logout">Log out</a></li>
        @else
            <li><a class="nav-link" href="/login">Login</a></li>
            <li><a class="nav-link" href="/register">Register</a></li>
        @endif

        <li><a class="nav-link" href="/">FAQ</a></li>
    </ul>
</div>

@yield('content')
</body>
</html>