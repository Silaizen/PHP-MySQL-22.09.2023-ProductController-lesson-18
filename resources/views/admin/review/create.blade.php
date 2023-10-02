@extends('admin.layouts.app')

@section('content')
    <h1>Создать отзыв</h1>

    
@if ($errors ->any())
<div class="alert alert-danger">
  <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
  </ul>
</div>
@endif

    {!! Form::open(['route' => 'review.store']) !!}



    @include('admin.review._form')
    
    {!! Form::close() !!}
    
    
    @endsection

