<!doctype html>
<html lang="en">
<head>

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Stylesheet -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

@yield('content')

<!-- Scripts -->
<script src="https://kit.fontawesome.com/75c10671df.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}" ></script>
</body>
</html>
