<!DOCTYPE html>
<html>
<head>
    <title>Отзывы</title>
</head>
<body>
    <h1>Отзывы</h1>
    
    <ul>
        @foreach ($reviews as $review)
            <li>
                <strong>{{ $review->name }}</strong><br>
                {{ $review->text }}<br>
                Дата: {{ $review->created_at->format('d.m.Y') }}
            </li>
        @endforeach
    </ul>
</body>
</html>