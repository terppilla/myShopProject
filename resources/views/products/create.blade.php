@extends('layouts.layout')

@section('content')
<div class="form-container">
    <h1>Добавление товара</h1>
    <form action="{{ route('products.store') }}" method="POST" class="product-form">
        @csrf
        
        <div class="form-group">
            <label for="name" class="form-label">Название товара *</label>
            <input id="name" name="name" maxlength="255" type="text" required class="form-input">
        </div>
        
        <div class="form-group">
            <label for="description" class="form-label">Описание товара</label>
            <textarea id="description" name="description" class="form-textarea"></textarea>
        </div>
        
        <div class="form-group">
            <label for="price" class="form-label">Цена *</label>
            <input id="price" name="price" min="1" type="number" required class="form-input">
        </div>
        
        <div class="form-group">
            <label for="amount" class="form-label">Количество товара</label>
            <input id="amount" name="amount" min="0" type="number" class="form-input">
        </div>
        
        <button type="submit" class="product-btn submit-btn">Добавить товар</button>
    </form>
</div>
@endsection