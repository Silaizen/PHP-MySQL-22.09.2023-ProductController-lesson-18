@extends('admin.layouts.app')

@section('content')
    <h1>Отзыв</h1>

    <table class="table">
        <tbody>
            <tr>
                <th>Имя:</th>
                <td>{{ $review->name }}</td>
            </tr>
            <tr>
                <th>Текст отзыва:</th>
                <td>{{ $review->text }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('review.index') }}" class="btn btn-primary">Назад к списку отзывов</a>
@endsection