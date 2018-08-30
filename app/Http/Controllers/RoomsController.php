<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rooms;

class RoomsController extends Controller
{
    //
    public function viewRooms()
    {
    	return view ('admin.view_rooms');
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

    	$room->save();

    	return redirect('/admin/room/add_rooms');
    }
}
