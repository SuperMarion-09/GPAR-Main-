<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reservation_type');
            $table->datetime('reservation_in');
            $table->datetime('reservation_out');
            $table->time('time_in');
            $table->time('time_out');
            $table->string('fname');
            $table->string('lname');
            $table->string('address');
            $table->string('contact_no');
            $table->string('email');
            $table->string('reservation_service');
            $table->integer('reservation_quantity');
            $table->string('reservation_details');
            $table->integer('price');
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
        Schema::dropIfExists('reservations');
    }
}
