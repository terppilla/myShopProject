@extends('layouts.layout')

@section('content')
<div class="products-header">
    <h2>Наши товары</h2>
</div>

@if ($products->count() == 0) 
    <div class="no-products">
        <p>Товары пока не добавлены</p>
    </div>
@else
    <div class="products-grid"> 
        @foreach($products as $product)
            <div class="product-card"> 
                <div class="product-info">
                    <h3 class="product-name">{{ $product->name }}</h3>
                    <p class="product-description">{{ $product->description ?? 'Описание отсутствует' }}</p>
                    <div class="product-price">{{ $product->price }} ₽</div>
                    <div class="product-amount">
                        @if ($product->amount == 0)
                            <span class="out-of-stock">Товар не в наличии</span>
                        @else
                            <span class="in-stock">В наличии: {{ $product->amount }} шт.</span>
                        @endif
                    </div>
                </div>
            </div>  
        @endforeach  
    </div>  
@endif  
@endsection