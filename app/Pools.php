<?php


namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pools extends Model
{
    //
    use SoftDeletes;
    protected $table="Pools";
    protected $fillables=['id','pool_type','pool_description','pool_price','price_per_head_day','price_per_head_night','minimum_pax'];
    protected $dates=['updated_at','created_at','deleted_at'];
}
