<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sports_centers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sport_id'); // Assuming each sports center references one sport
            $table->string('name');
            $table->string('location');
            $table->timestamps();

            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sports_centers');
    }
};
