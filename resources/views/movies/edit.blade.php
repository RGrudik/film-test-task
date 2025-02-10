@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Редагувати фільм</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('movies.update', $movie) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Назва фільму</label>
                <input type="text" id="title" name="title" class="form-control"
                       value="{{ old('title', $movie->title) }}" required>
            </div>

            <div class="form-group">
                <label for="is_published">Публікація</label>
                <select name="is_published" id="is_published" class="form-control">
                    <option value="0" {{ old('is_published', $movie->is_published) == 0 ? 'selected' : '' }}>Не
                        опубліковано
                    </option>
                    <option value="1" {{ old('is_published', $movie->is_published) == 1 ? 'selected' : '' }}>
                        Опубліковано
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="genres">Жанри</label>
                <select name="genres[]" id="genres" class="form-control" multiple>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}"
                                @if(in_array($genre->id, $movie->genres->pluck('id')->toArray())) selected @endif>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="poster">Постер</label>
                <input type="file" id="poster" name="poster" class="form-control">
                @if($movie->poster)
                    <p>Поточний постер: <img src="{{ $movie->getPosterUrl() }}" alt="Poster" width="150"></p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Зберегти зміни</button>
        </form>

    </div>
@endsection
