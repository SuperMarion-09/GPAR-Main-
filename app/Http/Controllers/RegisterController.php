<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Hash;

class RegisterController extends Controller
{
    //
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/
	public function create()
	{
		$this->validate(request(), [
			'uname'=> 'required',
			'email' => 'required|email',
			'password' => 'required|confirmed',
			'fname'=> 'required',
			'lname'=> 'required',
			'mname'=> 'required',
			'contactNo'=> 'required',
			'address'=> 'required',

		]);

		$user = User::create([
			'username' => request('uname'),
			'email' => request('email'),
			'password' => Hash::make(request('password')),
			'first_name' => request('fname'),
			'last_name' => request('lname'),
			'middle_name' => request('mname'),
			'contact_number' => request('contactNo'),
			'address' => request('address'),
			'position' => request('position'),
		]);


		return redirect()->home();
	}

	public function show()
	{
		return view('admin.register.registerSave');
	}
}
