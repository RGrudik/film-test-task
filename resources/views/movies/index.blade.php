<!-- resources/views/movies/index.blade.php -->
@extends('layouts.app')

@section('title', 'All Movies')

@section('content')
    <div class="movies-page">
        <h1>All Movies</h1>

        <!-- Кнопка для додавання фільму -->
        <a href="{{ route('movies.create') }}" class="btn">Add Movie</a>

        <table>
            <thead>
            <tr>
                <th>Title</th>
                <th>Published</th>
                <th>Poster</th>
                <th>Genre</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->is_published ? 'Yes' : 'No' }}</td>
                    <td><img src="{{ $movie->getPosterUrl() }}" alt="Poster" width="100"></td>
                    <td>
                        @foreach ($movie->genres as $genre)
                            <span class="badge bg-primary">{{ $genre->name }}</span>
                        @endforeach
                    </td>
                    <td class="actions">
                        <a href="{{ route('movies.edit', $movie) }}">Edit</a>

                        @if (!$movie->is_published)
                            <form action="{{ route('movies.publish', $movie) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit">Publish</button>
                            </form>
                        @endif

                        <!-- Кнопка видалення -->
                        <form action="{{ route('movies.destroy', $movie) }}" method="POST" style="display:inline;"
                              onsubmit="return confirm('Are you sure you want to delete this movie?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: red;">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
