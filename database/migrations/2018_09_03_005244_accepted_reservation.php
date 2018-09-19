<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AcceptedReservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PreReservation', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_in_reservation');
            $table->date('date_out_reservation');
            $table->time('time_in');
            $table->time('time_out');
            $table->string('pool_type');
            $table->integer('no_pax_pool');
            $table->string('room_type');
            $table->integer('pool_quantity');
            $table->string('pavilion_name');
            $table->string('event_name');
            $table->string('event_motif');
            $table->string('services');
            $table->string('foods');
            $table->integer('price');
            $table->string('status');
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
        //
    }
}
