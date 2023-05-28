
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
<nav class="nav" style="display: flex;justify-content: space-around">
    <a class="nav-link " href="{{route('home')}}">Главная</a>
    <a class="nav-link" href="{{route('createOwner')}}">Добавить пользователя</a>
    <a class="nav-link" href="{{route('allCars')}}">Все машины</a>
    <a class="nav-link" href="{{route('searchCar')}}">Поиск машины</a>
</nav>

@yield('content')
</body>
</html>
