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
    <a href="/">Главная</a>
    <a href="{{ route('products.index') }}">Товары</a>
    
    @auth
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}">Админ-панель</a>
            <a href="{{ route('products.create') }}">Добавить товар</a>
        @endif
        
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Выйти</button>
        </form>
    @else
        <a href="{{ route('login.form') }}">Войти</a>
        <a href="{{ route('register.form') }}">Регистрация</a>
    @endauth
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