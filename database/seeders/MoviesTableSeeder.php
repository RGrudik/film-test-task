<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::create([
            'title' => 'Avengers: Endgame',
            'publication_status' => 'Published',
            'poster_url' => 'https://example.com/avengers.jpg'
        ]);

        Movie::create([
            'title' => 'The Dark Knight',
            'publication_status' => 'Published',
            'poster_url' => 'https://example.com/dark_knight.jpg'
        ]);

        Movie::create([
            'title' => 'Inception',
            'publication_status' => 'Draft',
            'poster_url' => 'https://example.com/inception.jpg'
        ]);

        Movie::create([
            'title' => 'Titanic',
            'publication_status' => 'Published',
            'poster_url' => 'https://example.com/titanic.jpg'
        ]);
    }
}
