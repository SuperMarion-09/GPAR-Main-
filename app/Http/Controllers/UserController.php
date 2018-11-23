<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Events;
use App\Pools;
use App\Rooms;
use App\reservation;
use App\Comments;
use App\Gallery;
use DB;
use Auth;
use Image;
use App\settings;
use Carbon\carbon;
use Redirect;
use Alert;

use Charts;

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
        $comments=comments::all();
        $yo=0;
        $sale=0;
        $res_today=reservation::whereDate('created_at','=',Carbon::today())->get();
        $res_today->count();

        
        foreach ($res_today as $value) {
            $yo=$value->count();
            $sale+=$value->price;
        }

        $fee=0;
        $feed=Comments::whereDate('created_at','=',Carbon::today())->get();

        foreach ($feed as $value) {
            $fee=$value->count();
        }
       
        return view ('admin.index',compact('accepted','comments','yo','fee','sale'));
    }
    public function viewStaff()
    {
        $user=User::where('position','!=','CEO')->get();

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
        $trashAlbum=DB::table('Galleries')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
        $trashReserve=DB::table('reservations')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();

        return view ('admin.logs',compact('trashPool','trashRoom','trashStaff','trashEvent','trashAlbum','trashReserve'));
    }
    public function charts()
    {
       
      
        $res=reservation::selectRaw("MONTH(created_at) as month")->get();;
        
            
                   

        return view('admin.chart',compact("res"));
       
    }
    public function feedbacks()
    {
    	return view ('admin.feedbacks');
    }
    public function resortSetting()
    {
        $settings=settings::all();
    	return view ('admin.resort_setting',compact("settings"));
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
           $path = public_path('storage/upload/staff/'.request('upload')->getClientOriginalName());
           $img = Image::make($path)->resize(720,720,function($constraint){
            $constraint->aspectRation();
        });
           $img->save($path);
       }
        Alert::success('The profile is succesfully updated','Profile Updated')->persistent('Close');
       return view('admin.profile_setting');
   }
   public function updateresortsetting($id)
   {

        Settings::where('id','=',$id)->update([
            'resorts_fname'=>request('fname'),
            'resorts_lname'=>request('lname'),
            'email'=>request('email'),
            'contact_no'=>request('contact'),
            'events_prior'=>request('event'),
            'others_prior'=>request('other'),

        ]);
     Alert::success('The resort settings is succesfully updated','Resort Setting Updated')->persistent('Close');
        return redirect::route('home');

   }
   
}
