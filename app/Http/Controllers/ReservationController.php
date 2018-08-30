<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    //
    public function viewReservation()
    {
    	return view('admin.view_reservation');
    }
     public function addReservation()
    {
    	return view('admin.add_reservation');
    }

    


}
