@extends('admin.layouts.app')

@section('content')
    <h1>Отзывы</h1>

    <a href="{{ route('review.create') }}" class="btn btn-primary">Добавить отзыв</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Текст</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $review->name }}</td>
                    <td>{{ $review->text }}</td>
                    <td>
                        <a href="{{route('review.edit', ['review'=>$review->id])}}" class="btn btn-warning">Edit</a>
                        {!! Form::open(['route'=> ['review.destroy', $review->id],
                        'method' => 'delete'])!!}
            
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            
                        {!! Form::close() !!}
                        </td>
                     </tr>
                    @endforeach
                </tbody>
    </table>
@endsection