<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">
    <title>ГрумRoom</title>
</head>
<body>
    <header>
        <div class="header-content in-center disp-flex justify-between align-center">
            <div class="header-left">
                <div class="logo"><img src="lev.png" width="150px" height="100px"></div>
            </div>
            <div class="main-main-nav">
            <ul class="main-nav">
                <li class="nav-li"><a href="{{ route('main') }}">Главная</a></li>
                <li class="nav-li"><a href="{{ route('client.index') }}">Заявки</a></li>
                <li class="nav-li"><a href="{{ route('client.new_bid') }}">Создать заявки</a></li>
                <li class="nav-li"><a href="{{ route('admin.index') }}">Админ-панель</a></li>
            </ul>
            </div>
            <div class="header-right">
                @guest
                    <a href="{{ route('login') }}">
                        <button class="btn-login">Войти</button>
                    </a>
                @endguest
                @auth
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input type="submit" value="Выйти" class="btn-login">
                    </form>
                @endauth
            </div>
        </div>
    </header>

    <div class="content mt-10 w-1040 in-center">
        @yield('content')
    </div>


</body>
</html>
