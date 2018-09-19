<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Events;
use App\Pools;
use App\Rooms;
use App\reservation;
use DB;
use Auth;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $accepted=reservation::all();
    	return view ('admin.index',compact('accepted'));
    }
    public function viewStaff()
    {
        $user=User::all()->except(['position','CEO']);

        return view ('admin.view_admin',compact('user'));
    }
    public function addStaff()
    {
    	return view ('admin.add_staff');
    }
    public function logs()
    {  
        $trashPool=DB::table('Pools')->where('deleted_at','!=','0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
        $trashRoom=DB::table('Rooms')->where('deleted_at','!=','0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
        $trashStaff=DB::table('Users')->where('deleted_at','!=','0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
        $trashEvent=DB::table('Events')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();

        return view ('admin.logs',compact('trashPool','trashRoom','trashStaff','trashEvent'));
    }
    
    public function feedbacks()
    {
    	return view ('admin.feedbacks');
    }
    public function resortSetting()
    {
    	return view ('admin.resort_setting');
    }
    public function profileSetting()
    {
        return view ('admin.profile_setting');
    }
    public function editProfile()
    {
        return view ('admin.edit_profile');
    }
    public function updateProfile()
    {
        if((request('password')&&request('password_confirmation'))!="")
        {
            $this->validate(request(), [

                'email' => 'required|email',
                'password' => 'required|confirmed',
                'fname'=> 'required',
                'lname'=> 'required',
                'mname'=> 'required',
                'contact_no'=> 'required',
                'address'=> 'required',
                'gender' => 'required',


            ]);

            $user = Auth::user();

            User::where('id',$user->id)->update([
                'first_name' => request('fname'),
                'last_name' => request('lname'),
                'email' => request('email'),
                'address' => request('address'),
                'gender' => request('gender'),
                'contact_number' => request('contact_no'),
                'password' => hash::make(request('password')),
            ]);
        }
        else{
            $user = Auth::user();

            User::where('id',$user->id)->update([
                'first_name' => request('fname'),
                'last_name' => request('lname'),
                'email' => request('email'),
                'address' => request('address'),
                'gender' => request('gender'),
                'contact_number' => request('contact_no'),
            ]);   
        }
        if(request()->hasFile('upload'))
        {
           User::where('id',$user->id)->update([
            'image_name' => request('upload')->getClientOriginalName(),
            'image_size' => request('upload')->getClientSize(),
        ]);

           request('upload')->storeAs('public/upload/staff',request('upload')->getClientOriginalName());
       }

       return view('admin.profile_setting');
   }
   
}
