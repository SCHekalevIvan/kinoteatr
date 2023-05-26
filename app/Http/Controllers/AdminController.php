<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

/**
 * Контроллер административной панели.
 */
class AdminController extends Controller
{
    /**
     * Отображает страницу административной панели со всеми бронированиями.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('admin', ['bookings' => $bookings]);
    }

    /**
     * Удаляет бронирование по указанному идентификатору.
     *
     * @param  int $id Идентификатор бронирования.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteBooking($id)
    {
    $booking = Booking::findOrFail($id);
    $booking->delete();

    return redirect()->route('admin')->with('success', 'Запись успешно удалена');
    }
}
