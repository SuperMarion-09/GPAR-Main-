<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrereservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prereservations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reservation_in');
            $table->string('reservation_out');
            $table->string('time_in');
            $table->string('time_out');
            $table->string('fname');
            $table->string('lname');
            $table->string('address');
            $table->string('contact_no');
            $table->string('email');
            $table->string('pool_type');
            $table->integer('no_pool_pax');
            $table->string('room_type');
            $table->integer('room_quantity');
            $table->string('pavilion_name');
            $table->string('event_name');
            $table->string('event_motif');
            $table->string('services');
            $table->string('foods');
            $table->integer('price');
            $table->integer('status');
            $table->string('mode_of_payment');
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
        Schema::dropIfExists('prereservations');
    }
}
