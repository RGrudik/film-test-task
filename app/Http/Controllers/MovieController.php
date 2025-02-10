<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        $genres = Genre::all(); // Отримуємо всі жанри з бази даних
        return view('movies.index', compact('movies', 'genres'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:15000',
            'is_published' => 'nullable|boolean',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
        ]);

        $movie = new Movie();
        $movie->title = $request->input('title');
        $movie->is_published = $request->input('is_published', false);

        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
            $movie->poster = $posterPath;
        } else {
            $movie->poster = 'default-poster.jpg';
        }

        $movie->save();

        $movie->genres()->attach($validated['genres']);

        return redirect()->route('movies.index');
    }

    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:15000',
            'is_published' => 'nullable|boolean',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
        ]);

        $movie->title = $request->title;
        $movie->is_published = $request->is_published;

        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
            $movie->poster = $posterPath;
        }

        $movie->genres()->sync($validated['genres']);

        $movie->save();

        return redirect()->route('movies.index')->with('success', 'Фільм успішно оновлено!');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully');
    }

    /**
     *
     * @param \App\Models\Movie $movie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function publish(Movie $movie)
    {
        $movie->publish();
        return redirect()->route('movies.index')->with('success', 'Movie published successfully!');
    }
}
