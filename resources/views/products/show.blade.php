@extends('layouts.layout')

@section('content')
<div class="product-detail">
    <div class="product-detail-header">
        <h1>{{ $product->name }}</h1>
        <a href="{{ route('products.index') }}" class="back-btn">← Назад к каталогу</a>
    </div>

    <div class="product-detail-content">
        <div class="product-info-section">
            <div class="product-price-large">
                {{ $product->price }} ₽
            </div>
            
            <div class="product-status">
                @if ($product->amount == 0)
                    <span class="status-badge out-of-stock">Нет в наличии</span>
                @else
                    <span class="status-badge in-stock">В наличии: {{ $product->amount }} шт.</span>
                @endif
            </div>

            <div class="product-description-block">
                <h3>Описание товара</h3>
                <p>{{ $product->description ?? 'Описание отсутствует' }}</p>
            </div>

            <div class="product-actions">
                <button class="btn-primary" onclick="openEditModal({{ $product->id }})">
                    Редактировать товар
                </button>
                
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger" onclick="return confirm('Удалить этот товар?')">
                        Удалить товар
                    </button>
                </form>
            </div>
        </div>

        <div class="product-meta-section">
            <div class="meta-card">
                <h4>Информация о товаре</h4>
                <div class="meta-item">
                    <span class="meta-label">ID товара:</span>
                    <span class="meta-value">#{{ $product->id }}</span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Добавлен:</span>
                    <span class="meta-value">{{ $product->created_at->format('d.m.Y H:i') }}</span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Обновлён:</span>
                    <span class="meta-value">{{ $product->updated_at->format('d.m.Y H:i') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Редактировать товар</h3>
        <form id="editForm" method="POST">
            @csrf
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
            
            <button type="submit" class="product-btn">Сохранить изменения</button>
        </form>
    </div>
</div>
@endsection