<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция для создания таблицы "movies".
 */
return new class extends Migration
{
    /**
     * Применение миграции.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');//Название
            $table->string('date');//Дата
            $table->string('start_time');//Время начала
            $table->integer('duration'); // Продолжительность
            $table->text('description');//Описание
            $table->string('img'); //
            $table->timestamps();
        });
    }

    /**
     * Отмена миграции.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
};
