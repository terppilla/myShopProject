<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
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

<main  class="container">
    @yield('content')
</main>

<footer>   
<p> &copy; 2024 My shop. Все права защищены.</p>
</footer>
</body>
</html>