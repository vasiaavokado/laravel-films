<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<header class="navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="{{url("/admin")}}">AdminPanel</a>


        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{url("/admin")}}">Добавить фильм</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url("/admin/users")}}">Пользователи</a>
            </li>

        </ul>
    <div class="flex-grow-1"></div>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <input type="submit" value="Logout">
    </form>

</header>


@yield("content")

</body>
</html>