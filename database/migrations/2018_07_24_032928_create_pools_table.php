<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pool_type');
            $table->string('pool_status')->default(0);
            $table->integer('pool_price');
            $table->string('price_per_head_day');
            $table->string('price_per_head_night');
            $table->string('minimum_pax');
            $table->text('pool_description');
            $table->integer('pool_quantity')->default(1);
            $table->string('with_event')->default(Null);
            $table->string('image_name');
            $table->string('image_size');
            $table->timestamps();
            $table->datetime('deleted_at')->default(Null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pools');
    }
}
