<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieGenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movie1 = Movie::where('title', 'Avengers: Endgame')->first();
        $movie2 = Movie::where('title', 'The Dark Knight')->first();
        $movie3 = Movie::where('title', 'Inception')->first();
        $movie4 = Movie::where('title', 'Titanic')->first();

        $actionGenre = Genre::where('name', 'Action')->first();
        $comedyGenre = Genre::where('name', 'Comedy')->first();
        $dramaGenre = Genre::where('name', 'Drama')->first();
        $romanceGenre = Genre::where('name', 'Romance')->first();

        // Створюємо зв'язки між фільмами і жанрами
        $movie1->genres()->attach([$actionGenre->id]);
        $movie2->genres()->attach([$actionGenre->id, $dramaGenre->id]);
        $movie3->genres()->attach([$dramaGenre->id]);
        $movie4->genres()->attach([$romanceGenre->id, $dramaGenre->id]);
    }
}
