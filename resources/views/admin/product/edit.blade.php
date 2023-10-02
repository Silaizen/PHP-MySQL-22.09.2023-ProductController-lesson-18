@extends('admin.layouts.app')

@section('content')
<h1>Edit Product {{$product->name}}</h1>

@if ($errors -> any())
   <div class = "alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
   </div>
@endif

{!! Form::model($product, ['route' => ['product.update', $product->id], 'method' => 'put']) !!}



@include('admin.product._form')

{!! Form::close() !!}

@endsection