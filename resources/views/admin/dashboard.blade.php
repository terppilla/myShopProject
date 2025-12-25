@extends('layouts.layout')

@section('content')
<div class="admin-container">
    <h1>Панель администратора</h1>
    
    <div class="admin-stats">
        <div class="stat-card">
            <h3>Всего товаров</h3>
            <p>{{ $totalProducts }}</p>
        </div>
    </div>

    <div class="admin-links">
        <h3>Быстрые действия:</h3>
        <a href="{{ route('products.create') }}" class="btn-primary">Добавить новый товар</a>
        <a href="{{ route('products.index') }}" class="btn-secondary">Управление всеми товарами</a>
        <a href="/" class="btn-tertiary">На главную</a>
    </div>
    
    <div class="admin-section">
        <h3>Последние добавленные товары:</h3>
        @php
            $recentProducts = \App\Models\Product::latest()->take(5)->get();
        @endphp
        
        @if($recentProducts->count() > 0)
        <ul class="recent-products">
            @foreach($recentProducts as $product)
            <li>
                <span>{{ $product->name }}</span>
                <span class="price">{{ $product->price }} ₽</span>
                <span class="amount">({{ $product->amount }} шт.)</span>
            </li>
            @endforeach
        </ul>
        @else
        <p>Товары еще не добавлены</p>
        @endif
    </div>
</div>
@endsection