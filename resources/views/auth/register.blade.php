@extends('layouts.layout')

@section('content')
<div class="form-container">
    <h1>Регистрация</h1>
    
    {{-- Вывод ошибок --}}
    @if($errors->any())
        <div class="alert alert-error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    
    <form action="{{ route('register') }}" method="POST" class="product-form">
        @csrf
          
        <div class="form-group">
            <label for="first_name" class="form-label">Имя *</label>
            <input id="first_name" name="first_name" type="text" required class="form-input" 
                   value="{{ old('first_name') }}" placeholder="Введите ваше имя">
        </div>
        
        <div class="form-group">
            <label for="last_name" class="form-label">Фамилия *</label>
            <input id="last_name" name="last_name" type="text" required class="form-input" 
                   value="{{ old('last_name') }}" placeholder="Введите вашу фамилию">
        </div>
        
        <div class="form-group">
            <label for="login" class="form-label">Логин *</label>
            <input id="login" name="login" type="text" required class="form-input" 
                   value="{{ old('login') }}" placeholder="Придумайте логин (минимум 3 символа)">
        </div>
        
        <div class="form-group">
            <label for="email" class="form-label">Email *</label>
            <input id="email" name="email" type="email" required class="form-input" 
                   value="{{ old('email') }}" placeholder="example@mail.ru">
        </div>
        
        <div class="form-group">
            <label for="phone" class="form-label">Телефон *</label>
            <input id="phone" name="phone" type="tel" required class="form-input" 
                   value="{{ old('phone') }}" placeholder="+7XXX-XXX-XX-XX">
        </div>
        
        <div class="form-group">
            <label for="password" class="form-label">Пароль *</label>
            <input id="password" name="password" type="password" required class="form-input" 
                   placeholder="Минимум 6 символов">
        </div>
        
        <div class="form-group">
            <label for="password_confirmation" class="form-label">Подтверждение пароля *</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required 
                   class="form-input" placeholder="Повторите пароль">
        </div>
        
        <button type="submit" class="submit-btn">Зарегистрироваться</button>
        
        <div style="text-align: center; margin-top: 20px;">
            <p>Уже есть аккаунт? <a href="{{ route('login.form') }}">Войдите</a></p>
        </div>
    </form>
</div>
@endsection