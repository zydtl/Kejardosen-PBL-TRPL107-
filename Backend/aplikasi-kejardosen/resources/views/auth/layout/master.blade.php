<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/auth/asset/css/login.css') }}">
    <link rel="icon" href="{{asset('assets/dashboard/asset/img/kejardosen-logo-circle.png')}}">
    <link rel="stylesheet" href="{{asset('assets/auth/asset/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
</head>
<body class="custom-body">

    @yield('content')

    <script src="{{asset('assets/auth/asset/script.js')}}"></script>
</body>
</html>
