<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerReservationController extends Controller
{
     public function show()
    {
    	return view('customer.reservation');
    }
}
