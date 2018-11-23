<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->string('item_status')->default(0);
            $table->integer('item_price');
            $table->string('item_name');
            $table->string('item_description');
            $table->string('image_name');
            $table->string('image_size');
            $table->string('max_pax');
            $table->integer('add_price');
            $table->integer('pavilion_quantity');
            $table->string('with_pool');
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
        Schema::dropIfExists('events');
    }
}
