<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
class Gallery extends Model
{
    //

     use SoftDeletes;
    protected $table="galleries";
    protected $dates=['updated_at','created_at','deleted_at'];
}
