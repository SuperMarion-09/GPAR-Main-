<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Hash;

class StaffController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function storeStaff()
    {
    	$this->validate(request(), [
			'uname'=> 'required',
			'email' => 'required|email',
			'password' => 'required|confirmed',
			'fname'=> 'required',
			'lname'=> 'required',
			'mname'=> 'required',
			'contact_no'=> 'required',
			'address'=> 'required',
			'gender' => 'required',
			'position' => 'required',

		]);
		$user = new User;
		$user=User::create([
			'username' => request('uname'),
			'email' => request('email'),
			'password' => Hash::make(request('password')),
			'first_name' => request('fname'),
			'last_name' => request('lname'),
			'middle_name' => request('mname'),
			'contact_number' => request('contact_no'),
			'address' => request('address'),
			'gender' => request('gender'),
			'position' => request('position'),

		]);

		
		if(request()->hasFile('upload'))
		{
			

			$user->image_name = request('upload')->getClientOriginalName();
			$user->image_size = request('upload')->getClientSize();


			request('upload')->storeAs('public/upload/staff',request('upload')->getClientOriginalName());

		}
		$user->save();
		return view('admin.add_staff');
    }
}
