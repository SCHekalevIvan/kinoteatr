<?php

namespace Tests\Feature;

use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoutsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_index_adress()
    {
        //Проверяем основную страницу
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_admin_adress()
    {
        //Проверяем страницу администратора
        $response = $this->get('/admin');
        $response->assertStatus(200);
    }

    public function test_booking_adress()
    {
        //Записываем данные для фильма
        $movie = [
            'title' => 'Драйв',
            'date' => '25.05.2023',
            'start_time' => '12:00',
            'duration' => '83',
            'description' => 'Описание фильма 1',
            'img' => '/img/image1.jpg',
        ];
    
        //Создаем фильм
        $createdMovie = Movie::create($movie);
    
        //Отправляем запрос на страницу
        $response = $this->get(route('booking', ['movie' => $createdMovie->id]));
        $response->assertStatus(200);
    }
}
