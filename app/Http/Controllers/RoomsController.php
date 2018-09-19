<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rooms;
use App\Pools;
use App\Events;
use App\Users;
use DB;

class RoomsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function viewRooms()
    {
        $room=Rooms::all();
    	return view ('admin.view_rooms', compact('room'));
    }
    public function addRooms()
    {
    	return view ('admin.add_rooms');

    }
    public function storeRoom()
    {
    	$room = new Rooms;

    	$room->type=request('roomType');
    	$room->room_description=request('roomDetails');
    	$room->room_quantity=request('roomQuantity');
    	$room->room_price=request('roomPrice');
    	$room->room_cancellation_type=request('roomTypeCancellation');
    	$room->room_tel_no=request('roomTelNo');


        if(request()->hasFile('image'))
        {
            $picture=request('image')->getClientOriginalName();
        
            request('image')->storeAs('public/upload/room',$picture);

            $room->image_name=request('image')->getClientOriginalName();
            $room->image_size=request('image')->getClientSize();
        }

    	$room->save();

    	return redirect('/admin/room/add_rooms');
    }
    public function edit(Rooms $id)
    {
         return view('admin.edit_room', compact('id'));
    }
    public function update(Rooms $id)
    {
        Rooms::where('id',$id->id)->update([
            'type' => request('new_type'),
            'room_description' => request('new_description'),
            'room_quantity' => request('new_quantity'),
            'room_price' => request('new_price'),
            
        ]);
        if(request()->hasFile('upload'))
        {
             Rooms::where('id',$id->id)->update([
                'image_name' => request('upload')->getClientOriginalName(),
                'image_size' => request('upload')->getClientSize(),
             ]);
             request('upload')->storeAs('public/upload/room', request('upload')->getClientOriginalName());
        }

        
       $room=Rooms::all();
        return view('admin.view_rooms',compact('room'));
    }
    public function destroy(Rooms $id)
    {
        Rooms::where('id',$id->id)->update(['room_status'=>'0']);   
        Rooms::find($id->id)->delete();
       
        $room= Rooms::all();

        return view('admin.view_rooms',compact('room'));
    }
    public function retrieve($id)
    {
        Rooms::where('id',$id)->update(['room_status'=>'1']);
        Rooms::withTrashed()->where('id',$id)->restore();

        $trashRoom=DB::table('Rooms')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();

        $trashPool=DB::table('Pools')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
        $trashEvent=DB::table('Pools')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
         $trashStaff=DB::table('Users')->where('deleted_at','!=','0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();

        return view ('admin.logs',compact('trashRoom','trashPool','trashEvent','trashStaff'));
    }
}
