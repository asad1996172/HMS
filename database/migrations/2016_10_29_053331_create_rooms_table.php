<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->float('ratings');
            $table->integer('roomtype_id');
            $table->integer('price');
            $table->integer('beds');
            $table->integer('sofabeds');
            $table->integer('room_size');
            $table->integer('max_people');
            $table->integer('room_number')->unique();
            $table->text('description');
            $table->integer('room_service')->default(0);
            $table->integer('laundary_service')->default(0);
            $table->integer('pets')->default(0);
            $table->integer('internet')->default(0);
            $table->integer('security')->default(0);
            $table->integer('bar')->default(0);
            $table->integer('floor_number');

            $table->integer('booked')->default(0);
            $table->date('ending_date_of_booking')->nullable();
            $table->integer('status')->default(0);
            $table->integer('facilities_for_disabled')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
