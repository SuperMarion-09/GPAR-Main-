<?php

namespace App;



class prereservations extends Model
{
	protected $table="prereservations";
    protected $fillables=['id','reservation_in','reservation_out','time_in','time_out','fname','lname','address','email','contact_no','pool_type','no_pool_pax','room_type','room_quantity','pavilion_name','event_motif','event_motif','foods','services','price','status','mode_of_payment'];
     protected $dates=['updated_at','created_at'];
}
