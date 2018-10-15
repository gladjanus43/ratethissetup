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
        <li><a class="nav-link" href="/">Login</a></li>
        <li><a class="nav-link" href="/">Register</a></li>
        <li><a class="nav-link" href="/">Your profile</a></li>
        <li><a class="nav-link" href="/">FAQ</a></li>
    </ul>
</div>

@yield('content')
</body>
</html>