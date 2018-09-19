<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
    	return view('customer.index');
    }
    public function a_pool()
    {
    	return view('customer.amenities.a-pools');
    }
     public function a_event()
    {
        return view('customer.amenities.a-events');
    }
     public function a_room()
    {
    	return view('customer.amenities.a-rooms');
    }
      public function gallery()
    {
    	return view('customer.gallery');
    }
      public function contact_us()
    {
    	return view('customer.contact_us');
    }
    public function about_us()
    {
    	return view('customer.about_us');
    }
}
