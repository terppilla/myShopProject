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
    @if(auth()->check() && auth()->user()->role === 'admin')
        <a class="product-btn add" href="{{ route('products.create')}}">Добавить товар</a>
    @endif
    
    <div class="products-grid"> 
        @foreach($products as $product)
            <div class="product-card"> 
                <div class="product-info">
                <div class="product-image">
              @if($product->image)
             <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-thumb">
         @else
             <div class="no-image">Нет изображения</div>
         @endif
            </div>
                    <a class="product-name product-link" href="{{ route('products.show', $product->id)}}">{{ $product->name }}</a>
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
                
                @if(auth()->check() && auth()->user()->role === 'admin')
                <div class="product-buttons">
                    <button class="product-btn" onclick="openEditModal({{ $product->id}})">Редактировать</button>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="product-btn delete" onclick="return confirm('Удалить товар?')">
                            Удалить
                        </button>
                    </form>
                </div>
                @endif
            </div>  
        @endforeach  
    </div>  
@endif  

<div id="editModal" class="modal">
    <div class="modal-content">
    <span class="close" onclick="closeEditModal()">&times;</span>
        <h3>Редактировать товар</h3>
        <form id="editForm" method="POST" enctype="multipart/form-data">            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="edit_id">
            
            <div class="form-group">
                <label for="edit_name" class="form-label">Название товара *</label>
                <input type="text" name="name" id="edit_name" required class="form-input">
            </div>
            
            <div class="form-group">
                <label for="edit_description" class="form-label">Описание</label>
                <textarea name="description" id="edit_description" class="form-textarea"></textarea>
            </div>
            
            <div class="form-group">
                <label for="edit_price" class="form-label">Цена *</label>
                <input type="number" name="price" id="edit_price" required min="1" class="form-input">
            </div>
            
            <div class="form-group">
                <label for="edit_amount" class="form-label">Количество</label>
                <input type="number" name="amount" id="edit_amount" min="0" class="form-input">
            </div>

            <div class="form-group">
    <label for="edit_image" class="form-label">Изображение товара</label>
    <input type="file" name="image" id="edit_image" class="form-input" accept="image/*">
            
            <button type="submit" class="product-btn">Сохранить изменения</button>
        </form>
    </div>
</div>
@endsection