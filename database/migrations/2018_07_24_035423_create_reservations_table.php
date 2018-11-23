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
            $table->integer('reservation_id')->unique();
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
            $table->string('pool_type');
            $table->integer('pool_quantity');
            $table->integer('pool_pax');
            $table->string('room_type');
            $table->integer('room_quantity');
            $table->string('event_type');
            $table->integer('event_quantity');
            $table->integer('event_pax');
            $table->string('event_foods');
            $table->string('event_service');
            $table->string('event_details');
            $table->integer('price');
            $table->integer('balance');
            $table->string('payment_mode');
            $table->timestamps();
            $table->datetime('deleted_at');
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
