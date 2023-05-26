@extends('layouts.app')

@section('title')Фортуна - кинотеатр@endsection

@section('content')

<section>
    <div class="container">
        <h1 class="text-center text-black mt-5 pb-5">Сеансы сегодня</h1>
        <div class="items mb-5" style="display: flex; justify-content: space-between; flex-wrap:wrap;">
            @foreach($movies as $movie)
            <form action="booking.html">
                <div class="item text-white mb-4"
                    style="display: flex; border-radius: 30px; overflow: hidden; width: 550px; background-color: #000421;">
                    <img class="img-fluid" src="{{ $movie->img }}" style="height:350px;">
                    <div class="content p-4">
                        <h3>{{ $movie->title }}</h3>
                        <p style="color: rgb(105, 105, 105);"><i>Пермь, ул. Профессора Дедюкина</i></p>
                        <p>Длительность: {{ $movie->duration }} мин</p>
                        <p>Дата: {{ $movie->date }}</p>
                        <p>Время начала: {{ $movie->start_time }}</p>
                        <!-- Предполагается, что время окончания можно вычислить, добавив длительность к времени начала -->
                        <p>Время окончания: {{ date('H:i', strtotime($movie->start_time) + ($movie->duration * 60)) }}</p>
                        <a href="{{ route('booking', ['movie' => $movie->id]) }}" style="border-radius: 50px; border: solid #619cae; color: #619cae;">Купить билет</a>
                    </div>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</section>
@endsection

@section('footer')
<section class="pt-5 pb-5" style="background-color: #000421;">
    <footer>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <h2 class="text-white">Наш номер телефона:</h2>
                    <p class="card-text text-white">8 (800) 100-10-10</p>
                </div>
                <div class="col">
    
                </div>
                    <li class="nav-item">
                        <a class="nav-link text-white">Ваш город: Пермь</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</section>
@endsection