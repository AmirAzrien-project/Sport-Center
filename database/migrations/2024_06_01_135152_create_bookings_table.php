<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            //$table->id();
            $table->increments('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('court');
            $table->date('date')->default(now()); // Example: default to current date
            $table->string('approval')->default('Pending'); // Use 'Pending' directly as default
            $table->time('start_booking_time');
            $table->time('end_booking_time');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
