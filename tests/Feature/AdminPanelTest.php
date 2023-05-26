<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_panel_contains_bookings_and_can_delete_booking()
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

        // Создаем бронирование и сохраняем его
        $booking = Booking::create($bookingData);

        // Отправка GET-запроса на страницу админ-панели
        $response = $this->get(route('admin'));

        // Проверка успешного отображения страницы админ-панели
        $response->assertStatus(200);

        // Проверка наличия созданного бронирования в списке бронирований на странице админ-панели
        $response->assertSee($booking->first_name);
        $response->assertSee($booking->last_name);
        $response->assertSee($booking->phone_number);
        $response->assertSee($booking->email);

        // Отправка DELETE-запроса для удаления бронирования
        $deleteResponse = $this->delete(route('admin.deleteBooking', ['id' => $booking->id]));

        // Проверка успешного удаления бронирования (перенаправление)
        $deleteResponse->assertStatus(302);

        // Проверка перенаправления на страницу админ-панели после удаления
        $deleteResponse->assertRedirect(route('admin'));

        // Проверка отсутствия удаленного бронирования в списке бронирований на странице админ-панели
        $responseAfterDelete = $this->get(route('admin'));
        $responseAfterDelete->assertDontSee($booking->first_name);
        $responseAfterDelete->assertDontSee($booking->last_name);
        $responseAfterDelete->assertDontSee($booking->phone_number);
        $responseAfterDelete->assertDontSee($booking->email);
    }
}
