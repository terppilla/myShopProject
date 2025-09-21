@extends('layouts.layout')

@section('content')
<h2>Наши товары</h2>

<table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Цена</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product['id'] }}</td>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['price'] }}</td>
            </tr>
            @endforeach
         </tbody>
         </table>
@endsection