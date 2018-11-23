<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pools;
use App\Staff;
use App\Rooms;
use App\Events;
use DB;
use Carbon\Carbon;
use Image;
use Alert;

class PoolsController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
    }
   
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
        
    	$pool->pool_description=request('description');
        if(request()->hasFile('image'))
        {
            $picture=request('image')->getClientOriginalName();
            request('image')->storeAs('public/upload/pool',$picture);
            $path = public_path('storage/upload/pool/'.$picture);
            $img = Image::make($path)->resize(720,720,function($constraint){
                $constraint->aspectRatio();
            });
            $img->save($path);

            $pool->image_name = request('image')->getClientOriginalName();
            $pool->image_size = request('image')->getClientSize();
        }

    	$pool->save();

         Alert::success('The pool is succesfully added','Pool Added')->persistent('Close');
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
            
            'pool_description' => request('new_description'),

        ]);
        if(request()->hasFile('upload'))
        {
            Pools::where('id',$id->id)->update([
                'image_name' => request('upload')->getClientOriginalName(),
                'image_size' => request('upload')->getClientSize(),
            ]);

            request('upload')->storeAs('public/upload/pool',request('upload')->getClientOriginalName());
            $path = public_path('storage/upload/pool/'.request('upload')->getClientOriginalName());
            $img = Image::make($path)->resize(720,720,function($constraint){
                $constraint->aspectRatio();
            });
            $img->save($path);            
        }

        $pool= Pools::all();
         Alert::success('The pool is succesfully updated','Pool Updated')->persistent('Close');
        return view('admin.view_pools',compact('pool'));
    }

    public function destroy(Pools $id)
    {
       Pools::where('id',request('deleted_pool'))->update(['pool_status'=>'0']);
       Pools::find(request('deleted_pool'))->delete();

       $pool= Pools::all();

    
         Alert::success('The pool is succesfully deleted','Pool Deleted')->persistent('Close');
        return view('admin.view_pools',compact('pool'));
    }

    public function retrieve($id)
    {
        Pools::withTrashed()->where('id',$id)->restore();

        $trashPool=DB::table('Pools')->where('deleted_at','!=','0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
        $trashRoom=DB::table('Rooms')->where('deleted_at','!=','0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
        $trashStaff=DB::table('Users')->where('deleted_at','!=','0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
        $trashEvent=DB::table('Events')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
        $trashAlbum=DB::table('Galleries')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();

       $trashReserve=DB::table('reservations')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
         Alert::success('The pool is succesfully retrieved','Pool Retrieved')->persistent('Close');
        return view ('admin.logs',compact('trashPool','trashRoom','trashStaff','trashEvent','trashAlbum','trashReserve'));
    }
    public function updatePoolStatus()
    {
         if(request('active_change')!="")
        {
            Pools::where('id', request('active_change'))->update([
                'pool_status' => '1',

            ]);

        }
        else{
            Pools::where('id', request('deactive_change'))->update([
                'pool_status' => '0',

            ]);
        }

        $pool=Pools::all();
         Alert::success('The pool status is succesfully changed','Pool Status')->persistent('Close');
        return view('admin.view_pools',compact('pool'));
    }

}
