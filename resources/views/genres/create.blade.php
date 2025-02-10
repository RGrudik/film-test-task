@extends('layouts.app')

@section('title', 'Create Genre')

@section('content')
    <div class="create-container">
        <h1>Create Genre</h1>

        <form action="{{ route('genres.store') }}" method="POST">
            @csrf

            <label for="name">Genre Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>

            <button type="submit">Create Genre</button>
        </form>

        <a href="{{ route('genres.index') }}" class="back-link">Back to Genres</a>
    </div>
@endsection
