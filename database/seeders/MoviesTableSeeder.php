<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            [
                'title' => 'Драйв',
                'date' => '25.05.2023',
                'start_time' => '12:00',
                'duration' => '83',
                'description' => 'Описание фильма 1',
                'img' => '/img/image1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Реальные пацаны',
                'date' => '25.05.2023',
                'start_time' => '15:00',
                'duration' => '80',
                'description' => 'Описание фильма 2',
                'img' => '/img/image2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Приличные люди',
                'date' => '25.05.2023',
                'start_time' => '16:00',
                'duration' => '75',
                'description' => 'Описание фильма 3',
                'img' => '/img/image3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Жмурки',
                'date' => '25.05.2023',
                'start_time' => '19:00',
                'duration' => '86',
                'description' => 'Описание фильма 4',
                'img' => '/img/image4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
