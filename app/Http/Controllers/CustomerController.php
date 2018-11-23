<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\settings;
use App\Gallery;
use App\Events;
use App\Pools;
use App\Rooms;
use Alert;


class CustomerController extends Controller
{
    public function index()
    {
        $settings=settings::all();
         $a_room=Rooms::where('room_status','!=','0')->get();
          $gallery=Gallery::where('album_type','=','events')->get();
          
    	return view('customer.index',compact("settings","a_room","gallery"));
    }
    public function a_pool()
    {
         $settings=settings::all();
         $a_pool=Pools::all();
    	return view('customer.amenities.a-pools',compact("settings","a_pool"));
    }
     public function a_event()
    {
        $settings=settings::all();
        $a_fevent=Events::where('category','=','foods')->where('item_status','!=','0')->get();
        $a_sevent=Events::where('category','=','services')->where('item_status','!=','0')->get();
        $a_pevent=Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
        return view('customer.amenities.a-events',compact("settings","a_fevent","a_sevent","a_pevent"));
    }
     public function a_room()
    {
         $settings=settings::all();
         $a_room=Rooms::where('room_status','!=','0')->get();
    	return view('customer.amenities.a-rooms',compact("settings","a_room"));
    }
      public function gallery()
    {
        $settings=settings::all();
        $gallery=Gallery::all();
    	return view('customer.gallery',compact("settings","gallery"));
    }
      public function viewpicture($id)
    {
        $settings=settings::all();
        $gallery = Gallery::where('id','=',$id)->get();
        return view('customer.view_image',compact("settings","gallery"));
    }
      public function contact_us()
    {
         $settings=settings::all();
    	return view('customer.contact_us',compact("settings"));
    }
    public function about_us()
    {
         $settings=settings::all();
    	return view('customer.about_us',compact("settings"));
    }
}
