<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

/**
 * Контроллер домашней страницы.
 */
class HomeController extends Controller
{
    /**
     * Отображение главной страницы.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $movies = Movie::all();
        return view('index', [
            'movies' => $movies
        ]);
    }
}
