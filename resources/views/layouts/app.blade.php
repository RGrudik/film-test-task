<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Movies & Genres')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<header>
    <nav>
        <ul class="menu">
            <li><a href="{{ route('genres.index') }}">All Genres</a></li>
            <li><a href="{{ route('genres.create') }}">Add Genre</a></li>

            <li><a href="{{ route('movies.index') }}">All Movies</a></li>
            <li><a href="{{ route('movies.create') }}">Add Movie</a></li>
        </ul>
    </nav>
</header>

<div class="container">
    @yield('content')
</div>

<footer>
    <p>&copy; 2025 Movie Database</p>
</footer>
</body>
</html>
