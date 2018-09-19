<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\AcceptedReservation;

use App\Rooms;
use App\Pools;
use App\Reservation;
use App\Events;
use DateTime;
use carbon\carbon;
use App\prereservations;
class CustomerReservationController extends Controller
{
	public function show()
	{
		$rooms=Rooms::all();
		$pools=Pools::all();
		$events=Events::where('category','=','pavilion')->get();
		return view('customer.reservation',compact('rooms','pools','events'));
	}
	public function storeReserve()
	{

		if(request('service_type')=='events')
		{

			prereservations::create([
				'reservation_in' => request('date_in'),
				'reservation_out' => request('date_out'),
				'time_in' => request('time_in'),
				'time_out' => request('time_out'),
				'fname' => request('fname'),
				'lname' => request('lname'),
				'address' => request('address'),
				'contact_no' => request('contact_no'),
				'email' => request('email'),
				'pavilion_name' => request('pav_name'),
				'event_motif' => request('event_motif'),
				'event_name' => request('event_name'),
				'services' => request('services'),
				'foods' => request('foods'),
				'price' => request('total_price'),
				'mode_of_payment' => 'cash',

			]);
			$rooms=Rooms::all();
			$pools=Pools::all();
			$events=Events::where('category','=','pavilion')->get();
			return view('customer.reservation',compact('rooms','pools','events'));

		}
		if(request('service_type')=='rooms')
		{

			prereservations::create([
				'reservation_in' => request('date_in'),
				'reservation_out' => request('date_out'),
				'time_in' => request('time_in'),
				'time_out' => request('time_out'),
				'fname' => request('fname'),
				'lname' => request('lname'),
				'address' => request('address'),
				'contact_no' => request('contact_no'),
				'email' => request('email'),
				'room_type' => request('room_type'),
				'room_quantity' => request('room_quantity'),
				'price' => request('total_price'),
				'mode_of_payment' => 'cash',

			]);
			$rooms=Rooms::all();
			$pools=Pools::all();
			$events=Events::where('category','=','pavilion')->get();
			return view('customer.reservation',compact('rooms','pools','events'));

		}
		if(request('service_type')=='pools')
		{
			

			prereservations::create([
				'reservation_in' => request('date_in'),
				'reservation_out' => request('date_out'),
				'time_in' => request('time_in'),
				'time_out' => request('time_out'),
				'fname' => request('fname'),
				'lname' => request('lname'),
				'address' => request('address'),
				'contact_no' => request('contact_no'),
				'email' => request('email'),
				'pool_type' => request('pool_type'),
				'price' => request('total_price'),
				'mode_of_payment' => 'cash',

			]);
			$rooms=Rooms::all();
			$pools=Pools::all();
			$events=Events::where('category','=','pavilion')->get();
			return view('customer.reservation',compact('rooms','pools','events'));

		}
	}
	public function check()
	{

		if(request('service_type')=='poolserv')
		{
			$in=request('date_in');
			$out=request('date_out');
			

			if(Reservation::where('reservation_type','=','pool'))
			{


				$res = Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out);

				if($res->exists())
				{
					$res = Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out)->get();
					foreach ($res as  $res) 
					{
						if($res->reservation_service==request('pool_name'))
						{


							$pool=Pools::where('pool_type','=', $res->reservation_service)->get();
							foreach ($pool as  $pol) 
							{
								$temp_pool_quantity=($res->reservation_quantity - $pol->pool_quantity);


							}
							if($temp_pool_quantity==0)
							{
								session()->flash('notif','No Available Pools for this date, sorry.');
								$pools=Pools::all();
								$rooms=Rooms::all();
								$events=Events::all();
								return view('customer.reservation',compact('rooms','pools','events','date'));

							}


						}
					}

				}
				else
				{
					session()->flash('notif','You may proceed we have pools to this date!');
					
					$s_type=request('service_type');
					$pool_type=request('pool_name');

					$poolk=Pools::where('pool_type','=',$pool_type)->get();


					return view('customer.add_reservation_check_pool',compact('in','out','pool_type','poolk'));

				}
			}
		}
		
		if(request('service_type')=='roomserv')
		{
			
			$in=request('date_in');
			$out=request('date_out');


			if(Reservation::where('reservation_type','=','room'))
			{


				$res = Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out);

				if($res->exists())
				{
					$res = Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out)->get();
					foreach ($res as  $res) 
					{
						if($res->reservation_service==request('room_name'))
						{


							$room=rooms::where('type','=', $res->reservation_service)->get();
							foreach ($room as  $rom) 
							{

								$temp_room_quantity=($rom->room_quantity-$res->reservation_quantity);


							}
							if($temp_room_quantity==0)
							{
								session()->flash('notif','No Available Pools for this date, sorry.');
								$pools=Pools::all();
								$rooms=Rooms::all();
								$events=Events::all();
								return view('customer.reservation',compact('rooms','pools','events','date'));

							}
							else
							{
								session()->flash('notif','You may proceed we have  rooms to this date!');
								$s_type=request('service-type');
								$room_type=request('room_name');

								$roomk=Rooms::where('type','=',$room_type)->get();
								$temp_room_quantity=$temp_room_quantity;

								return view('customer.add_reservation_check_room',compact('in','out','room_type','roomk','temp_room_quantity'));
							}


						}
					}

				}
				else
				{
					$room=rooms::where('type','=', request('room_name'))->get();
					foreach ($room as  $rom) 
					{

						$temp_room_quantity=$rom->room_quantity;


					}

					session()->flash('notif','You may proceed we have '.$temp_room_quantity.' rooms to this date!');
					$s_type=request('service-type');
					$room_type=request('room_name');

					$roomk=Rooms::where('type','=',$room_type)->get();
					$temp_room_quantity=$temp_room_quantity;

					return view('customer.add_reservation_check_room',compact('in','out','room_type','roomk','temp_room_quantity'));
				}
			}
		}
		if(request('service_type')=='eventserv')
		{
			$in=request('date_in');
			$out=request('date_out');


			if(Reservation::where('reservation_type','=','event'))
			{


				$res = Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out);

				if($res->exists())
				{
					$res = Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out)->get();
					foreach ($res as  $res) 
					{
						if($res->reservation_service==request('pavilion_name'))
						{


							$pool=Events::where('item_name','=', $res->reservation_service)->get();
							foreach ($event as  $event) 
							{
								$temp_event_quantity=($res->reservation_quantity - $event->pavilion_quantity);
								dd($temp_event_quantity);

							}
							if($temp_event_quantity==0)
							{
								session()->flash('notif','No Available events for this date, sorry.');
								$pools=Pools::all();
								$rooms=Rooms::all();
								$events=Events::all();
								return view('admin.add_reservation',compact('rooms','pools','events','date'));

							}


						}
					}

				}
				else
				{
					session()->flash('notif','You may proceed we have this Pavilion in this date!');
					$s_type=request('service-type');
					$pavilion_type=request('pavilion_name');


					$pavk=Events::where('item_name','=',$pavilion_type)->get();
					$events=Events::all();

					return view('customer.add_reservation_check_event',compact('in','out','event_type','pavk','events'));

				}
			}

		}



	}
	public function customer_summary()
	{
		$new_dayIn= new DateTime(request('date_in'));
		$new_dayOut= new DateTime(request('date_out'));
		$interval =$new_dayIn->diff($new_dayOut);
		$days = $interval->format('%a');
		
		if (request('service_type')=='pool_type')
		{ 


			$in = new DateTime(request('time_in'));
			$out = new DateTime(request('time_out'));
			$ti = $in->format('h:i a');
			$to = $out->format('h:i a');


			$reservation_type = request('service_type');
			$pool_type = request('pool_type');
			$pool_price = request('pool_price');
			$pool_description = request('pool_description');
			$date_in = \Carbon\Carbon::parse(request('date_in'))->format('F j,Y');
			$date_out = \Carbon\Carbon::parse(request('date_out'))->format('F j,Y');
			$time_in = $ti;
			$time_out = $to;
			$fname = request('fname');
			$lname = request('lname');
			$email = request('email');
			$address = request('address');
			$contact_no = request('contact');
			$gender = request('gender');


			$service_type=request('service_type');

			return view('customer.view_pool_summary',compact('service_type','date_in','date_out','time_in','time_out','fname','lname','email','address','contact_no','gender','pool_type','pool_price','pool_description'));

		}
		if (request('service_type')=='room_type')
		{       

			$in = new DateTime(request('time_in'));
			$out = new DateTime(request('time_out'));
			$ti = $in->format('h:i a');
			$to = $out->format('h:i a');


			$reservation_type = request('service-type');
			$room_type = request('room_type');
			$room_price = request('room_price');
			$room_description = request('room_description');
			$date_in = \Carbon\Carbon::parse(request('date_in'))->format('F j,Y');
			$date_out = \Carbon\Carbon::parse(request('date_out'))->format('F j,Y');
			$time_in = $ti;
			$time_out = $to;
			$fname = request('fname');
			$lname = request('lname');
			$email = request('email');
			$address = request('address');
			$contact_no = request('contact');
			$gender = request('gender');
			$room_quantity=request('room_quantity');

			$totalr=0;
			$room = Rooms::where('type','=',$room_type)->get();
			foreach ($room as  $value) {
				$totalr = $value->room_price ;
			}
			$totalr=$totalr*$room_quantity;



			$service_type=request('service_type');
			return view('customer.view_room_summary',compact('room_reservation','totalr','service_type','reservation_type','room_type','room_price','room_description','date_in','date_out','time_in','time_out','fname','lname','email','address','contact_no','gender','room_quantity'));

		}
		if (request('service_type')=='event_type')
		{       
			$in = new DateTime(request('time_in'));
			$out = new DateTime(request('time_out'));
			$ti = $in->format('h:i a');
			$to = $out->format('h:i a');


			$reservation_type= request('service-type');
			$pav_type = request('pav_type');
			$pav_price = request('pav_price');
			$pav_description = request('pav_description');
			$date_in = \Carbon\Carbon::parse(request('date_in'))->format('F j,Y');
			$date_out = \Carbon\Carbon::parse(request('date_out'))->format('F j,Y');
			$time_in = $ti;
			$time_out = $to;
			$fname = request('fname');
			$lname = request('lname');
			$email = request('email');
			$address = request('address');
			$contact_no = request('contact');
			$gender = request('gender');
			$event_name = request('event_name');
			$event_motif = request('event_motif');

			$food_checked=Input::get('foods');
			$services_checked=Input::get('services');
			$totalf=0;
			$totals=0;

			if($food_checked!=""){
				foreach ($food_checked as  $value) {
					$f_price=Events::where('item_name','=', $value)->get();

					$f_item= Events::where('item_name','=', $value)->pluck('item_name');
				}

				foreach ($f_price as $value) {
					$totalf += $value->item_price;
				}
			}
			else{
				$f_item=[];
			}
			if($services_checked!=""){
				foreach ($services_checked as  $value) {
					$s_price=Events::where('item_name','=', $value)->get();

					$s_item= Events::where('item_name','=', $value)->pluck('item_name');
				}
				foreach ($s_price as $value) {
					$totals += $value->item_price;
				}
			}
			else
			{
				$s_item=[];
			}



			$total=0;
			$total = $totalf+$totals+request('pav_price');




			$service_type=request('service_type');
			return view('customer.view_event_summary',compact('total','datums','service_type','f_item','s_item','reservation_type','pav_type','pav_price','pav_description','date_in','date_out','time_in','time_out','fname','lname','email','address','contact_no','gender','event_name','event_motif'));

		}




	}
}
