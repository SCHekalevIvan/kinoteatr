<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

/**
 * Контроллер бронирования.
 */
class BookingController extends Controller
{
    /**
     * Отображает страницу бронирования для указанного фильма.
     *
     * @param  Movie $movie Фильм, для которого отображается страница бронирования.
     * @return \Illuminate\View\View
     */
    public function index(Movie $movie)
    {
        // return view('booking', ['movie' => $movie]);
        $reservedSeats = Booking::where('movie_id', $movie->id)->pluck('selected_seats')->toArray();

        // $reservedSeats = Booking::pluck('selected_seats')->toArray();
        $reservedSeats = array_map(function ($seats) {
             return json_decode($seats);
        }, $reservedSeats);

        // dd($reservedSeats);
        return view('booking', ['movie' => $movie, 'reservedSeats' => $reservedSeats]);
    }

    /**
     * Создает новое бронирование для указанного фильма.
     *
     * @param  Request $request Входные данные запроса.
     * @param  Movie   $movie   Фильм, для которого создается бронирование.
     * @param  Store   $session Объект сессии.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Movie $movie, Store $session)
    {
        // Валидация входных данных
        $validatedData = $request->all();

        // Создание нового бронирования
        Booking::create($validatedData);

        // Очистка значения selected-seats в сессии
        $validatedData['selected_seats'] = null;

        // Возвращение ответа или редирект на другую страницу
        return redirect()->back()->with('success', 'Бронирование успешно сохранено!');
    }
}
