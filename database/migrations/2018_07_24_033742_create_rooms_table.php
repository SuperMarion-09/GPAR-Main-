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
            $table->string('type');
            $table->text('room_description');
            $table->integer('room_quantity');
            $table->integer('room_price');
            $table->integer('room_status')->default(0);
            $table->string('room_tel_no');
            $table->text('room_cancellation_type');
            $table->string('image_name');
            $table->string('image_size');
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
        Schema::dropIfExists('rooms');
    }
}
