@extends('admin.layouts.app')

@section('content')
    <h1>Редактировать отзыв  {{$review->name}}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($review, ['route' => ['review.update', $review->id], 'method' => 'put']) !!}



@include('admin.review._form')

{!! Form::close() !!}

@endsection