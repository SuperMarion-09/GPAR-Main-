<?php

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;
class Reservation extends Model
{
     use SoftDeletes;
    protected $table="reservations";
    protected $dates=['updated_at','created_at','deleted_at'];
}
