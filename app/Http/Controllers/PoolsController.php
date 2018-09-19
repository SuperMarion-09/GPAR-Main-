<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pools;
use App\Staff;
use App\Rooms;
use App\Events;
use DB;
use Carbon\Carbon;


class PoolsController extends Controller
{
    //
   
    public function viewPool()
    {
    	$pool = Pools::all();




    	return view ('admin.view_pools', compact('pool'));
    }
     public function addPool()
    {
    	return view ('admin.add_pools');
    }

     public function store()
    {
    	$pool = new Pools;
        $pool->pool_type = request('pool_type');
        $pool->pool_price = request('pool_price');
    	$pool->minimum_pax=request('min_pax');
        $pool->price_per_head_day = request('addPricePerHead_day');
        $pool->price_per_head_night = request('addPricePerHead_night');
    	$pool->pool_description=request('description');
        if(request()->hasFile('image'))
        {
            $picture=request('image')->getClientOriginalName();
            request('image')->storeAs('public/upload/pool',$picture);

            $pool->image_name = request('image')->getClientOriginalName();
            $pool->image_size = request('image')->getClientSize();
        }

    	$pool->save();


    	return redirect('/admin/pool/add_pools');
    }
    public function edit(Pools $id)
    {
        return view('admin.edit_pool', compact('id'));
    }
    public function update(Pools $id)
    {
        Pools::where('id',$id->id)->update([
            'pool_type' => request('new_type'),
            'pool_price' => request('new_price'),
            'minimum_pax' => request('new_min_pax'),
            'price_per_head_day' => request('new_add_price_day'),
            'price_per_head_night' => request('new_add_price_night'),
            'pool_description' => request('new_description'),

        ]);
        if(request()->hasFile('upload'))
        {
            Pools::where('id',$id->id)->update([
                'image_name' => request('upload')->getClientOriginalName(),
                'image_size' => request('upload')->getClientSize(),
            ]);

            request('upload')->storeAs('public/upload/pool',request('upload')->getClientOriginalName());            
        }

        $pool= Pools::all();

        return view('admin.view_pools',compact('pool'));
    }

    public function destroy(Pools $id)
    {
        Pools::find($id->id)->delete();

        $pool= Pools::all();

        return view('admin.view_pools',compact('pool'));
    }

    public function retrieve($id)
    {
        Pools::withTrashed()->where('id',$id)->restore();

        $trashPool=DB::table('Pools')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
        $trashRoom=DB::table('Rooms')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
        $trashEvent=DB::table('Pools')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
        $trashStaff=DB::table('Users')->where('deleted_at','!=','0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();

        return view ('admin.logs',compact('trashPool','trashRoom','trashEvent','trashStaff'));
    }

}
