@extends('layouts.app')

@section('title')Фортуна - кинотеатр бронирование@endsection

@section('custom.css')
    <link rel="stylesheet" href="/css/mesta.css">
@endsection

@section('content')
  <div class="container">
    <h1>Выберите место в кинотеатре</h1>
    <div class="screen">Экран</div>
    <div>   </div>
    <div>   </div>
    <div class="row">
      <div class="seat" data-name="A1"></div>
      <div class="seat" data-name="A2"></div>
      <div class="seat" data-name="A3"></div>
      <div class="seat" data-name="A4"></div>
      <div class="seat" data-name="A5"></div>
      <div class="seat" data-name="A6"></div>
      <div class="seat" data-name="A7"></div>
      <div class="seat" data-name="A8"></div>
    </div>
    <div class="row">
      <div class="seat" data-name="B1"></div>
      <div class="seat" data-name="B2"></div>
      <div class="seat" data-name="B3"></div>
      <div class="seat" data-name="B4"></div>
      <div class="seat" data-name="B5"></div>
      <div class="seat" data-name="B6"></div>
      <div class="seat" data-name="B7"></div>
      <div class="seat" data-name="B8"></div>
    </div>
    <div class="row">
      <div class="seat" data-name="C1"></div>
      <div class="seat" data-name="C2"></div>
      <div class="seat" data-name="C3"></div>
      <div class="seat" data-name="C4"></div>
      <div class="seat" data-name="C5"></div>
      <div class="seat" data-name="C6"></div>
      <div class="seat" data-name="C7"></div>
      <div class="seat" data-name="C8"></div>
    </div>
  </div>
  <p id="totalPrice">Стоимость одного места 1000р.</p>
  <h1 class="container">Введите информацию для бронирования</h1>
  <form id="bookingForm" action="{{ route('bookings.store', $movie) }}" method="POST">
    @csrf
    {{-- Поля для заполнения --}}
    <input type="text" name="first_name" placeholder="Имя" required>
    <input type="text" name="last_name" placeholder="Фамилия" required>
    <input type="text" name="phone_number" placeholder="Номер телефона" required>
    <input type="email" name="email" placeholder="Email" required>

    {{-- скрытые поля --}}
    <input type="hidden" name="movie_id" value="{{ $movie->id }}">
    <input type="hidden" name="selected_seats" id="selectedSeatsInput">
    <input type="hidden" name="total_price" id="totalPriceInput">
    <button type="submit" class="bot1">Забронировать</button>
  </form>
@endsection

@section('script')
  <script>
    const seats = document.querySelectorAll('.seat');
    const selectedSeats = JSON.parse(localStorage.getItem('selectedSeats')) || [];
    const seatPrice = 1000; // стоимость одной ячейки

    // Загрузка забронированных мест из БД
    const reservedSeats = {!! json_encode($reservedSeats) !!};

    seats.forEach(seat => {
      if (reservedSeats.some(reservedSeat => reservedSeat.includes(seat.dataset.name))) {
        seat.classList.add('reserved');
      }

      seat.addEventListener('click', () => {
        if (seat.classList.contains('selected')) {
          seat.classList.remove('selected');
          const index = selectedSeats.indexOf(seat.dataset.name);
          if (index !== -1) {
            selectedSeats.splice(index, 1);
          }
        } else {
          seat.classList.add('selected');
          selectedSeats.push(seat.dataset.name);
        }

        // Очистка предыдущих значений из localStorage
        localStorage.removeItem('totalPrice');
        localStorage.removeItem('selectedSeats');

        const totalPrice = selectedSeats.length * seatPrice;

        if (totalPrice !== 0) {
          localStorage.setItem('totalPrice', totalPrice);
        }

        if (selectedSeats.length !== 0) {
          localStorage.setItem('selectedSeats', JSON.stringify(selectedSeats));
        }

        document.getElementById('selectedSeatsInput').value = JSON.stringify(selectedSeats);
        document.getElementById('totalPriceInput').value = totalPrice;
      });
    });

    // Очистка localStorage после отправки формы
    window.addEventListener('load', () => {
      const form = document.getElementById('bookingForm');
      form.addEventListener('submit', () => {
        localStorage.removeItem('totalPrice');
        localStorage.removeItem('selectedSeats');
      });
    });
  </script>
@endsection