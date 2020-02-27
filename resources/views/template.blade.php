<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url("css/common.css")}}">
    @yield('css','')
    <title>@yield('title','Title')</title>

</head>
<body>
    <header>
        @auth
            {{Auth::user()->name}}

            <form action="{{ route('logout') }}" method="post">
                @csrf
                <input type="submit" value="Logout">
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </header>
    <div class="container">
        @yield("main")
    </div>
</body>
</html>