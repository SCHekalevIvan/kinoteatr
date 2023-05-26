<?php

namespace Tests\Feature;

use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookingTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_booking()
    {
        // Создаем данные для фильма
        $movieData = [
            'title' => 'Драйв',
            'date' => '25.05.2023',
            'start_time' => '12:00',
            'duration' => '83',
            'description' => 'Описание фильма 1',
            'img' => '/img/image1.jpg',
        ];

        // Создаем фильм и сохраняем его
        $movie = Movie::create($movieData);

        // Данные для создания бронирования
        $bookingData = [
            'first_name' => 'Иван',
            'last_name' => 'Щекалев',
            'phone_number' => '+123456789',
            'email' => 'ivan@mail.ru',
            'selected_seats' => '["A1", "A2"]',
            'total_price' => 1000,
            'movie_id' => $movie->id,
        ];

        // Отправка POST-запроса для создания бронирования
        $response = $this->post(route('bookings.store', ['movie' => $movie->id]), $bookingData);

        // Проверка успешного создания бронирования (перенаправление)
        $response->assertStatus(302);

        // Проверка наличия созданного бронирования в базе данных
        $this->assertDatabaseHas('bookings', $bookingData);
    }
}
