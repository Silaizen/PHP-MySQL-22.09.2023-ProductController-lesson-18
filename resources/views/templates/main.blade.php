<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
          crossorigin="anonymous">
</head>
<body>
<header>header</header>

<div class="container">
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Main</a>
            <a class="navbar-brand" href="/contacts">Contacts</a>
            
            <a class="navbar-brand" href="/reviews">Reviews</a> 

            <!---
              test Nawbar on 16.09
            -->
<a class="navbar-brand" href="{{ route('category', ['category' => $category->slug]) }}"> {{ $category->name }}</a>
            <!---
              test Nawbar on 16.09
            -->


        <form class="d-flex ml-auto" action="{{ url('/search') }}" method="GET">
          @csrf
          <input class="form-control me-2" type="search" name="query" placeholder="Поиск" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
  </div>
</nav>

@yield('content')
</div>

<footer>footer</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
  crossorigin="anonymous"></script>
</body>
</html>