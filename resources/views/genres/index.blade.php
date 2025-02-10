@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Жанри</h1>

        <div class="d-flex justify-content-between">
            <a href="{{ route('genres.create') }}" class="btn btn-primary">Додати новий жанр</a>
            <a href="{{ route('movies.index') }}" class="btn btn-secondary">Переглянути фільми</a>
        </div>

        @if ($genres->isEmpty())
            <p class="empty-message">Жанри не знайдено.</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Назва жанру</th>
                    <th>Дії</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($genres as $genre)
                    <tr>
                        <td>{{ $genre->id }}</td>
                        <td>{{ $genre->name }}</td>
                        <td>
                            <a href="{{ route('genres.edit', $genre) }}" class="btn btn-warning">Редагувати</a>
                            <form action="{{ route('genres.destroy', $genre) }}" method="POST" style="display:inline;"
                                  onsubmit="return confirm('Ви впевнені, що хочете видалити цей жанр?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Видалити</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
