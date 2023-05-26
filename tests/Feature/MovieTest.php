<?php

namespace Tests\Feature;

use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovieTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_movie()
    {
        //Создаем данные для фильма
        $movie = [
            'title' => 'Драйв',
            'date' => '25.05.2023',
            'start_time' => '12:00',
            'duration' => '83',
            'description' => 'Описание фильма 1',
            'img' => '/img/image1.jpg',
        ];

        //Создаем фильм
        Movie::create($movie);

        //Проверяем, что он есть в базе данных
        $this->assertDatabaseHas('movies', $movie);
    }
}
