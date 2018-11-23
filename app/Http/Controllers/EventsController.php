<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use DB;
use App\Rooms;
use App\Pools;
use App\Users;
use Image;
use Alert;
class EventsController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
    }
	public function addItem()
	{

		$event=Events::where('category','=','foods')->first();
		if(empty($event))
		{
			Events::create([
				'category' => 'foods',
				'max_pax' => '0',
				'add_price' => '0',
			]);
		}
		else
		{
			Events::where('item_name','=','')->forceDelete();
		}
		$events=Events::where('category','=','foods')->first();

		return view('admin.add_items',compact('events'));
	}
	public function storeItem()
	{

		if(request('category_type')=='services')
		{
			
			$this->validate(request(),[
				'item_price' => 'required',
				'item_name'	=> 'required',
				'item_description' => 'required',


			]);

			
			$events= new Events;
			$events=Events::create([
				'category' => request('category_type'),
				'item_price' => request('item_price'),
				'item_name' => request('item_name'),
				'item_description' => request('item_description'),
				
				
				
			]);
			
			if(request()->hasFile('upload'))
			{
				$events->image_name = request('upload')->getClientOriginalName();
				$events->image_size = request('upload')->getClientSize();


				request('upload')->storeAs('public/upload/items/services',request('upload')->getClientOriginalName());
				$path = public_path('storage/upload/items/services/'.request('upload')->getClientOriginalName());
				$img = Image::make($path)->resize(720,720,function($constraint){
					$constraint->aspectRatio();
				});
				$img->save($path);
			}
			$events->save();

		}
		if(request('category_type')=='pavilion')
		{
			
			$this->validate(request(),[
				'pavilion_price' => 'required|numeric',
				'pavilion_name'	=> 'required',
				'pavilion_description' => 'required',


			]);

			
			$events= new Events;
			$events=Events::create([
				'category' => request('category_type'),
				'item_price' => request('pavilion_price'),
				'item_name' => request('pavilion_name'),
				'item_description' => request('pavilion_description'),
				'pavilion_quantity' => 1,

				
				
				
			]);
			
			if(request()->hasFile('pavilion_upload'))
			{
				$events->image_name = request('pavilion_upload')->getClientOriginalName();
				$events->image_size = request('pavilion_upload')->getClientSize();


				request('pavilion_upload')->storeAs('public/upload/items/pavilion',request('pavilion_upload')->getClientOriginalName());
				$path = public_path('storage/upload/items/pavilion/'.request('pavilion_upload')->getClientOriginalName());
				$img = Image::make($path)->resize(720,720,function($constraint){
					$constraint->aspectRatio();
            });
            $img->save($path);
			}
			if(request()->has('with_pool'))
			{
				$this->validate(request(),[
					'pool_name' => 'required',
					'pool_price' => 'required',
					'pool_description' => 'required',
				]);
				$pools = new Pools;
				$pools = Pools::create([
					'pool_type' => request('pool_name'),
					'pool_price' => request('pool_price'),
					'pool_description' => request('pool_description'),
					'with_event' => request('pavilion_name'),
				]);
				if(request()->hasFile('pool_upload'))
				{
					$pools->image_name = request('pool_upload')->getClientOriginalName();
					$pools->image_size = request('pool_upload')->getClientSize();


				request('pool_upload')->storeAs('public/upload/pool',request('pool_upload')->getClientOriginalName());
				$path = public_path('storage/upload/pool/'.request('pool_upload')->getClientOriginalName());
				$img = Image::make($path)->resize(720,720,function($constraint){
					$constraint->aspectRatio();
            });
            $img->save($path);
				}

				$events->with_pool = request('pool_name');
			}
			$events->save();

		}
		
		if(request('category_type')=='foods')
		{
			
			$this->validate(request(),[
				'item_price' => 'required',
				'item_name'	=> 'required',
				'item_description' => 'required',

			]);
			$events= new Events;
			$events=Events::create([
				'category' => request('category_type'),
				'item_price' => request('item_price'),
				'item_name' => request('item_name'),
				'item_description' => request('item_description'),
				'max_pax' => request('max_pax'),
				'add_price' => request('add_price'),
			]);
			
			if(request()->hasFile('upload'))
			{
				$events->image_name = request('upload')->getClientOriginalName();
				$events->image_size = request('upload')->getClientSize();


				request('upload')->storeAs('public/upload/items/foods',request('upload')->getClientOriginalName());
				$path = public_path('storage/upload/items/foods/'.request('upload')->getClientOriginalName());
				$img = Image::make($path)->resize(720,720,function($constraint){
					$constraint->aspectRatio();
            });
            $img->save($path);
			}
			$events->save();

		}
		

		$events=Events::where('category','=','foods')->first();
		Alert::success('The item is succesfully added','Item Added')->persistent('Close');
		return view('admin.add_items',compact('events'));
		
	}

	public function viewItem()
	{
		$events=Events::where('item_name','!=','')->get();

		return view('admin.view_items', compact('events'));
	}

	public function updateOthers()
	{
		

		$this->validate(request(),[
			'max_pax' => 'required',
			'add_price'	=> 'required',


		]);
		DB::table('events')->where('category','!=','services')->where('category','!=','pavilion')->update([

			'max_pax' => request('max_pax'),
			'add_price' => request('add_price'),

		]);

		$events=Events::where('category','=','foods')->first();
		Alert::success('The item is succesfully updated','Item Updated')->persistent('Close');
		return view('admin.add_items',compact('events'));
	}

	public function editEvent(Events $id)
	{
		return view('admin.edit_items', compact('id'));
	}
	public function updateEvent(Events $id)
	{
		$this->validate(request(),[
			'item_price' => 'required',
			'item_name'	=> 'required',
			'item_description' => 'required',
		]);
		
		Events::where('id', $id->id)->update([
			'item_price' => request('item_price'),
			'item_name'	=> request('item_name'),
			'item_description' => request('item_description'),
		]);

		if(request()->hasFile('upload'))
		{
			Events::where('id', $id->id)->update([
			'image_name' => request('upload')->getClientOriginalName(),
			'image_size'	=> request('upload')->getClientSize(),
		]);

			if(request('category')=='foods')
			{
				request('upload')->storeAs('public/upload/items/foods',request('upload')->getClientOriginalName());
				$path = public_path('storage/upload/items/foods/'.request('upload')->getClientOriginalName());
				$img = Image::make($path)->resize(720,720,function($constraint){
					$constraint->aspectRatio();
				});
				$img->save($path);
			}
			if(request('category')=='pavilion')
			{
				request('upload')->storeAs('public/upload/items/pavilion',request('upload')->getClientOriginalName());
				$path = public_path('storage/upload/items/pavilion/'.request('upload')->getClientOriginalName());
				$img = Image::make($path)->resize(720,720,function($constraint){
					$constraint->aspectRatio();
				});
				$img->save($path);
			}
			if(request('category')=='services')
			{
				request('upload')->storeAs('public/upload/items/services',request('upload')->getClientOriginalName());
				$path = public_path('storage/upload/items/services/'.request('upload')->getClientOriginalName());
				$img = Image::make($path)->resize(720,720,function($constraint){
					$constraint->aspectRatio();
				});
				$img->save($path);
			}

		}
		


		$events=Events::all();
		Alert::success('The item is succesfully updated','Item updated')->persistent('Close');
		return view('admin.view_items',compact('events'));
	}
	public function updateItemStatus()
	{
		if(request('active_change')!="")
		{
			Events::where('id', request('active_change'))->update([
				'item_status' => '1',

			]);
		}
		else{
			Events::where('id', request('deactive_change'))->update([
				'item_status' => '0',

			]);
		}

		$events=Events::where('item_name','!=','')->get();
		Alert::success('The item status is succesfully changed','Item Status')->persistent('Close');
		return view('admin.view_items',compact('events'));
	}

	public function destroy()
	{
		
		Events::where('id',request('deleted_item'))->update(['item_status'=>'0']);
		Events::find(request('deleted_item'))->delete();

		$events=Events::where('item_name','!=','')->get();
		Alert::success('The item is succesfully deleted','Item Deleted')->persistent('Close');
		return view('admin.view_items',compact('events'));
	}
	public function retrieve($id)
	{
		Events::withTrashed()->where('id',$id)->restore();

		$trashPool=DB::table('Pools')->where('deleted_at','!=','0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
		$trashRoom=DB::table('Rooms')->where('deleted_at','!=','0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
		$trashStaff=DB::table('Users')->where('deleted_at','!=','0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
		$trashEvent=DB::table('Events')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
		$trashAlbum=DB::table('Galleries')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();

		$trashReserve=DB::table('reservations')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
		Alert::success('The item is succesfully retrieved','Item Retrieved')->persistent('Close');
        return view ('admin.logs',compact('trashPool','trashRoom','trashStaff','trashEvent','trashAlbum','trashReserve'));
	}	
}
