@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Додати новий фільм</h1>

        <!-- resources/views/movies/create.blade.php -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Назва фільму -->
            <div class="form-group">
                <label for="title">Назва фільму</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <!-- Статус публікації -->
            <div class="form-group">
                <label for="is_published">Публікація</label>
                <select id="is_published" name="is_published" class="form-control" required>
                    <option value="1">Опубліковано</option>
                    <option value="0" selected>Не опубліковано</option>
                </select>
            </div>

            <!-- Плакат фільму -->
            <div class="form-group">
                <label for="poster">Плакат</label>
                <input type="file" id="poster" name="poster" class="form-control-file">
            </div>

            <!-- Жанри -->
            <div class="form-group">
                <label for="genres">Жанри</label>
                <select id="genres" name="genres[]" class="form-control" multiple required>
                    @foreach ($genres as $genre)
                        <option
                            value="{{ $genre->id }}" {{ in_array($genre->id, old('genres', [])) ? 'selected' : '' }}>{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Додати фільм</button>
        </form>
    </div>
@endsection
