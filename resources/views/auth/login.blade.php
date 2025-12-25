@extends('layouts.layout')

@section('content')
<div class="form-container">
    <h1>Вход</h1>
    
    @if($errors->any())
        <div class="alert alert-error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    
    <form action="{{ route('login') }}" method="POST" class="product-form">
        @csrf
          
        <div class="form-group">
            <label for="login" class="form-label">Логин</label>
            <input id="login" name="login" type="text" required class="form-input" 
                   value="{{ old('login') }}">
        </div>
        
        <div class="form-group">
            <label for="password" class="form-label">Пароль</label>
            <input id="password" name="password" type="password" required class="form-input">
        </div>
        
        <button type="submit" class="submit-btn">Войти</button>
    </form>
</div>
@endsection