@extends('layouts.layout')

@section('content')
<h1>Добавление товара</h1>
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <input name="name" maxlength="255" type="text" required placeholder="Название товара">
    <textarea name="description"  placeholder="Описание товара"></textarea>
    <input name="price" min="1" type="number" required placeholder="Цена">
    <input name="amount"  min="1" type="number" required placeholder="Количество товара">

    <button type="submit">Добавить товар</button>

</form>
@endsection