<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Film::create([
            'title' => 'The Shawshank Redemption',
            'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.',
            'duration_minutes' => 142,
            'release_date' => '1994-09-23',
            'genre' => 'Drama',
            'poster_image_url' => 'https://placehold.co/300x450?text=Shawshank',
        ]);

        Film::create([
            'title' => 'The Godfather',
            'description' => 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.',
            'duration_minutes' => 175,
            'release_date' => '1972-03-24',
            'genre' => 'Crime, Drama',
            'poster_image_url' => 'https://placehold.co/300x450?text=Godfather',
        ]);

        Film::create([
            'title' => 'The Dark Knight',
            'description' => 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham.',
            'duration_minutes' => 152,
            'release_date' => '2008-07-18',
            'genre' => 'Action, Crime, Drama',
            'poster_image_url' => 'https://placehold.co/300x450?text=Dark+Knight',
        ]);
    }
}
