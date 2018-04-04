<!doctype html>
<html lang="en">
<head>
    <title>@yield('title', 'Foobooks')</title>
    <meta charset='utf-8'>
    <link href='/css/p3.css' type='text/css' rel='stylesheet'>

    @stack('head')
</head>
<body>

<header>

</header>

<section>
    @yield('content')
</section>

<footer>

</footer>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

@stack('body')

</body>
</html>