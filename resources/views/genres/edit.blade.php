@extends('layouts.app')

@section('title', 'Edit Genre')

@section('content')
    <div class="edit-container">
        <h1>Edit Genre</h1>

        <form action="{{ route('genres.update', $genre) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Genre Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $genre->name) }}" required>

            <button type="submit">Save Changes</button>
        </form>

        <a href="{{ route('genres.index') }}" class="back-link">Back to Genres</a>
    </div>
@endsection
