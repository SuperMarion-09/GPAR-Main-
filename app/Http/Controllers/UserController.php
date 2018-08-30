<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	return view ('admin.index');
    }
    public function viewAdmin()
    {
    	return view ('admin.view_admin');
    }
    public function viewCustomer()
    {
    	return view ('admin.view_customer');
    }
    public function logs()
    {
    	return view ('admin.logs');
    }
    public function feedbacks()
    {
    	return view ('admin.feedbacks');
    }
    public function resortSetting()
    {
    	return view ('admin.resort_setting');
    }
   
}
