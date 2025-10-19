<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/modal.js') }}"></script>
</head>
<body>
    <header>
        <h1>My Shop</h1>
        <nav>
            <ul>
             <li>
                <a href="{{ route('index') }}">Главная</a>
            </li>

                <li>
                <a href="{{ route('products.index') }}">Каталог</a>
                </li>

                <li>
                <a href="#">Контакты</a>
                </li>
            </ul>
        </nav>
</header>
@if (session('success'))
<div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

 @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>   
        @endif

<main  class="container">
    @yield('content')
</main>

<footer>   
<p> &copy; 2024 My shop. Все права защищены.</p>
</footer>
</body>
</html>