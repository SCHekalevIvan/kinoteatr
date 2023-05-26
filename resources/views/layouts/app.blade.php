<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style_gs.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
    @yield('custom.css')

</head>
<body>
    
<header style="display: flex; justify-content: space-between; top: 0; left: 0; right: 0; padding: 20px;">
    <div>
      <p id="test1">Кинотеатр "Фортуна"</p>
    </div>
    <div>
      <a href="{{ route('index') }}">Главная</a>
    </div>
</header>

<main class="py-4">
    @yield('content')
</main>

@yield('footer')

@yield('script')

</body>
</html>