<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rooms;
use App\Pools;
use App\Events;
use App\Users;
use Image;
use DB;
use Alert;
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
        if(($is=Rooms::where('type','=',request('roomType'))->count()) <= 0)
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
            $path = public_path('storage/upload/room/'.request('image')->getClientOriginalName());
            $img = Image::make($path)->resize(720,720,function($constraint){
                $constraint->aspectRatio();
            });
            $img->save($path);

            $room->image_name=request('image')->getClientOriginalName();
            $room->image_size=request('image')->getClientSize();
        }
        else
        {

        }

        $room->save();
    }
     Alert::success('The room is succesfully added','Room Added')->persistent('Close');
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
      $path = public_path('storage/upload/room/'.request('upload')->getClientOriginalName());
            $img = Image::make($path)->resize(720,720,function($constraint){
                $constraint->aspectRatio();
            });
            $img->save($path);
 }


 $room=Rooms::all();
 Alert::success('The room is succesfully updated','Room Updated')->persistent('Close');
 return view('admin.view_rooms',compact('room'));
}
public function destroy()
{
   Rooms::where('id',request('deleted_room'))->update(['room_status'=>'0']);
        Rooms::find(request('deleted_room'))->delete();

    $room= Rooms::all();
    Alert::success('The room is succesfully deleted','Room Deleted')->persistent('Close');
    return view('admin.view_rooms',compact('room'));
}
public function retrieve($id)
{
    Rooms::where('id',$id)->update(['room_status'=>'1']);
    Rooms::withTrashed()->where('id',$id)->restore();

    $trashPool=DB::table('Pools')->where('deleted_at','!=','0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
    $trashRoom=DB::table('Rooms')->where('deleted_at','!=','0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
    $trashStaff=DB::table('Users')->where('deleted_at','!=','0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
    $trashEvent=DB::table('Events')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
    $trashAlbum=DB::table('Galleries')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();

    $trashReserve=DB::table('reservations')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
        Alert::success('The room is succesfully retrieved','Room Retrieved')->persistent('Close');
        return view ('admin.logs',compact('trashPool','trashRoom','trashStaff','trashEvent','trashAlbum','trashReserve'));
}
public function updateRoomStatus()
{
    
    if(request('active_change')!="")
        {
            Rooms::where('id', request('active_change'))->update([
                'room_status' => '1',

            ]);

        }
        else{
            Rooms::where('id', request('deactive_change'))->update([
                'room_status' => '0',

            ]);
        }

        $room=Rooms::all();
        Alert::success('The room status is succesfully changed','Room Status')->persistent('Close');
        return view('admin.view_rooms',compact('room'));
}
}
