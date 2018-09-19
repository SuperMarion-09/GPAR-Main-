<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use DB;
use App\Rooms;
use App\Pools;
use App\Users;
class EventsController extends Controller
{
    //
	public function addItem()
	{
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
			}
			$events->save();

		}
		if(request('category_type')=='pavilion')
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
				'pavilion_quantity' => 1,
				
				
				
			]);
			
			if(request()->hasFile('upload'))
			{
				$events->image_name = request('upload')->getClientOriginalName();
				$events->image_size = request('upload')->getClientSize();


				request('upload')->storeAs('public/upload/items/pavilion',request('upload')->getClientOriginalName());
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
			}
			$events->save();

		}
		

		$events=Events::where('category','=','foods')->first();
		return view('admin.add_items',compact('events'));
		
	}

	public function viewItem()
	{
		$events=Events::all();

		return view('admin.view_items', compact('events'));
	}

	public function updateOthers()
	{
		

		$this->validate(request(),[
			'max_pax' => 'required',
			'add_price'	=> 'required',


		]);
		DB::table('events')->where('category','!=','services')->update([

			'max_pax' => request('max_pax'),
			'add_price' => request('add_price'),

		]);

		$events=Events::where('category','=','foods')->first();
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


			request('upload')->storeAs('public/upload/items/foods',request('upload')->getClientOriginalName());
		}
		


		$events=Events::all();
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

		$events=Events::all();
		return view('admin.view_items',compact('events'));
	}

	public function destroy()
	{
		;
		Events::where('id',request('deleted_item'))->update(['item_status'=>'0']);
		Events::find(request('deleted_item'))->delete();

		$events= Events::all();

		return view('admin.view_items',compact('events'));
	}
	public function retrieve($id)
	{
		Events::withTrashed()->where('id',$id)->restore();

		$trashEvent=DB::table('Pools')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
		$trashPool=DB::table('Pools')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
		$trashRoom=DB::table('Rooms')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
		$trashStaff=DB::table('Users')->where('deleted_at','!=','0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
		return view ('admin.logs',compact('trashPool','trashRoom','trashEvent','trashStaff'));
	}	
}
