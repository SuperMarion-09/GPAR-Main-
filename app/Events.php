<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
class Events extends Model
{
    //
    use SoftDeletes;
    protected $table="Events";
    protected $fillables=['category','item_status','item_price','item_name','item_description','max_pax','add_price'];
     protected $dates=['updated_at','created_at','deleted_at'];
}
