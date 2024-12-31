
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel='stylesheet' href="{{ asset('css/registration.css') }}">
    @yield('script')
</head>
<body>
<article class="Contenitore">
    <section class="pick">
    </section>
    
    <section class="Credenziali">
        @yield('content')
    </section>
</article>
</body>
</html>