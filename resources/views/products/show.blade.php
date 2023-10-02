@extends('templates.main')

@section('content')
    <h1>{{ $product->name }}</h1>
    <img src="{{ $product->image }}" alt="{{ $product->name }}">
    <p>Цена: ${{ $product->price }}</p>
    <p>Описание: {{ $product->description }}</p>

    <h2>Отзывы к товару:</h2>
    @foreach ($product->reviews as $review)
        <div>
            <h3>{{ $review->name }}</h3>
            <p>{{ $review->text }}</p>
        </div>
    @endforeach
@endsection