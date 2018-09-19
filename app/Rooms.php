<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;


class Rooms extends Model
{
    //
    use SoftDeletes;
    protected $fillables=['id','type','room_description','room_price','room_quantity','room_tel_no','room_cancellation_type'];
    protected $dates=['updated_at','created_at','deleted_at'];
   
}
