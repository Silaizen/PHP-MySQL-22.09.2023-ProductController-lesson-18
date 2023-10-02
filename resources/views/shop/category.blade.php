@extends('layouts.app')

@section('content')
    <h1>{{ $category->name }}</h1>
    <div>{{ $category->description }}</div>
    @foreach ($products as $product)
        <div>
            <h2>{{ $product->name }}</h2>
            <img src="{{ $product->image }}" alt="{{ $product->name }}">
            <p>Цена: ${{ $product->price }}</p>
            <a href="{{ route('product', ['product' => $product->slug]) }}">Подробнее</a>
        </div>
    @endforeach
@endsection