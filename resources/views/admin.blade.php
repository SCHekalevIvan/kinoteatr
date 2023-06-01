@extends('layouts.app')

@section('title')Админ панель@endsection

@section('custom.css')
    <link rel="stylesheet" href="/css/mesta.css">
@endsection

@section('content')
<h1 class="container" style="margin-bottom: 50px;">Забронированные места</h1>

<table>
    <thead>
        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Номер телефона</th>
            <th>Email</th>
            <th>Фильм</th>
            <th>Выбранные места</th>
            <th>К оплате</th>
            <th>Удалить бронь</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bookings as $booking)
            <tr>
                <td>{{ $booking->first_name }}</td>
                <td>{{ $booking->last_name }}</td>
                <td>{{ $booking->phone_number }}</td>
                <td>{{ $booking->email }}</td>
                <td>{{ $booking->movie->title }}</td>
                <td>{{ $booking->selected_seats }}</td>
                <td>{{ $booking->total_price }} Руб.</td>
                <td>
                    <form action="{{ route('admin.deleteBooking', $booking->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn" style ="border-radius: 10px;">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
