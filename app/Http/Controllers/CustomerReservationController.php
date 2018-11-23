<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\AcceptedReservation;
use Illuminate\Support\MessageBag;
use Alert;

use App\Rooms;
use App\Pools;
use App\Reservation;
use App\Events;
use DateTime;
use carbon\carbon;
use App\prereservations;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\settings;


use URL;
use Session;
use Redirect;
use App\Mail\VerifyEmail;


use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;



class CustomerReservationController extends Controller
{
	private $_api_context;
	 public function __construct()
    {
       
        
        /** setup PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential('AfQhii6Pqek8WLc0CLPWRE8I8vQyvTLvSp4ooXSCC0bmyCESS2zoIH94Fh78XeFaiqs9HmC0Jcl6ZuzX', 'ECpIhbam753EV-CkXfKqlKjo-jMYQkgfiwtTzxeJ5WaY689OeRS1jpGOVlaXsNNvLauZNzEjKNHVUowJ'));
        $config=array('mode' => 'sandbox','http.ConnectionTimeOut' => 1000,'log.LogEnabled' => true,'log.FileName' => storage_path() . '/logs/paypal.log','log.LogLevel' => 'FINE');
   		$this->_api_context->setConfig($config);
    }

	public function show()
	{
		$rooms=Rooms::where('room_status','!=','0')->get();
		$pools=Pools::where('pool_status','!=','0')->get();
		$events=Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
		$settings=settings::all();
		return view('customer.reservation',compact('rooms','pools','events','settings'));
	}
	
	public function storeReserve(Request $request)
	{
		
		if(request('btnSubmit') == 'Cash')
		{
			if(request('service_type')=='events')
		
		{
			$total_service_price = 0;
			$total_food_price = 0;
			
			$user = new prereservations;

			$services=array();
			if(request('services')!="")
			{
				foreach (request('services') as $value) 
				{
					$services[]=$value;

				}
				$user->services = implode(',',$services);
			}
			$foods=array();
			if(request('foods')!="")
			{
				foreach (request('foods') as $value) 
				{
					$foods[]=$value;
				}
				$user->foods = implode(',',$foods);
				
			}
			
				
			if(request('pool_type')!="")
			{
				$user->pool_type = request('pool_type');
			}
			if(request('room_type')!="")
			{
				$user->room_type = request('room_type');
					$user->room_quantity = request('no_room');
			
			}


			$user->reservation_type = 'events';
			$user->reservation_in = request('date_in');
			$user->reservation_out= request('date_out');
			$user->time_in= request('time_in');
			$user->time_out= request('time_out');
			$user->fname= request('fname');
			$user->lname= request('lname');
			$user->address= request('address');
			$user->contact_no= request('contact_no');
			$user->email= request('email');
			$user->pavilion_name= request('pav_type');
			$user->event_motif= request('event_motif');
			$user->event_name= request('event_name');
			$user->price= request('total_price');
			$user->mode_of_payment = 'cash';
			
			

			$user->save();
			$rooms=Rooms::all();
			$pools=Pools::all();
			$events=Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
			Alert::success('Thank you for reserving!','Reservation Success')->persistent('Close!');
			return redirect()->route('Customer.index');

		}
		if(request('service_type')=='rooms')
		{

			prereservations::create([
				'reservation_type' => 'rooms',
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
			$events=Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
			Alert::success('Thank you for reserving!','Reservation Success')->persistent('Close!');
			return redirect()->route('Customer.index');
		}
		if(request('service_type')=='pools')
		{
			

			prereservations::create([
				'reservation_type' => 'pools',
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
			$events=Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
			Alert::success('Thank you for reserving!','Reservation Success')->persistent('Close!');
			return redirect()->route('Customer.index');

		}
		}
		else
		{
			if(request('service_type')=='events')
			{
				$food=array();
				$fo = request('food');
				if($fo!="")
				{
					foreach ($fo as $foods) {
						$food[]=$foods; 
					}
				}
				
				$service=array();
				$serv = request('services');
				if($serv != "")
				{
					foreach ($serv as $services) {
						$service[]=$services; 
					}
				}
			

				$payer = new Payer();
				$payer->setPaymentMethod('paypal');

				$item_1 = new Item();

				$item_1->setName('Item 1') /** item name **/
				->setCurrency('PHP')
				->setQuantity(1)
				->setPrice($request->get('total_price')); /** unit price **/

				$item_list = new ItemList();
				$item_list->setItems(array($item_1));

				$amount = new Amount();
				$amount->setCurrency('PHP')
				->setTotal($request->get('total_price'));

				$transaction = new Transaction();
				$transaction->setAmount($amount)
				->setItemList($item_list)
				->setDescription('Your transaction description');

				$redirect_urls = new RedirectUrls();
				Alert::success('Thank you for reserving!','Reservation Information')->persistent('Close');
				$redirect_urls->setReturnUrl(route('Customer.index')) /** Specify return URL **/
				->setCancelUrl(route('Customer.index'));

				$event_details = request('event_motif').",".request('event_name');




			

				$payment = new Payment();
				Alert::success('Thank you for reserving!','Reservation Information')->persistent('Close');
				$payment->setIntent('Sale')
				->setPayer($payer)
				->setRedirectUrls($redirect_urls)
				->setTransactions(array($transaction));
				/** dd($payment->create($this->_api_context));exit; **/
				try {

					$payment->create($this->_api_context);
					$reservation= new Reservation;

					$reservation->reservation_id ='789'.rand(1,10000);
					$reservation->reservation_type ='events';
					$reservation->reservation_in = request('date_in');
					$reservation->reservation_out = request('date_out');
					$reservation->time_in = request('time_in');
					$reservation->time_out = request('time_out');
					$reservation->fname = request('fname');
					$reservation->lname = request('lname');
					$reservation->address = request('address');
					$reservation->contact_no = request('contact_no');
					$reservation->email = request('email');
					$reservation->event_type = request('pav_type');
					$reservation->event_quantity ='1';
					$reservation->event_details = $event_details;
					$reservation->price = request('total_price');
					$reservation->event_foods = implode(',',$food);
					$reservation->event_service = implode(',',$service);
					$reservation->payment_mode = 'Paypal';

					if((request('room_type')!="") && (request('no_room')!=""))
					{
						$reservation->room_type=request('room_type');
						$reservation->room_quantity=request('no_room');
					}
					if(request('pool_type')!="")
					{
						$reservation->pool_type=request('pool_type');
						$reservation->pool_quantity='1';
					}
					$reservation->save();

				} catch (\PayPal\Exception\PPConnectionException $ex) {

					if (\Config::get('app.debug')) {

						\Session::put('error', 'Connection timeout');
						Alert::error('Connection timeout','Error')->persistent('Close');
						return Redirect::route('customer.reservation');

					} else {

						\Session::put('error', 'Some error occur, sorry for inconvenient');
						Alert::error('Some error occur, sorry for inconvenient','Error')->persistent('Close');
						return Redirect::route('customer.reservation');

					}

				}

				foreach ($payment->getLinks() as $link) {

					if ($link->getRel() == 'approval_url') {

						$redirect_url = $link->getHref();
						break;

					}

				}

				/** add payment ID to session **/
				Session::put('paypal_payment_id', $payment->getId());

				if (isset($redirect_url)) {

					/** redirect to paypal **/
					return Redirect::away($redirect_url);

				}

				\Session::put('error', 'Unknown error occurred');
				return Redirect::route('paywithpaypal');
			}
			if(request('service_type')=='rooms')
			{
				
				$payer = new Payer();
				$payer->setPaymentMethod('paypal');

				$item_1 = new Item();

				$item_1->setName('Item 1') /** item name **/
				->setCurrency('PHP')
				->setQuantity(1)
				->setPrice($request->get('total_price')); /** unit price **/

				$item_list = new ItemList();
				$item_list->setItems(array($item_1));

				$amount = new Amount();
				$amount->setCurrency('PHP')
				->setTotal($request->get('total_price'));

				$transaction = new Transaction();
				$transaction->setAmount($amount)
				->setItemList($item_list)
				->setDescription('Your transaction description');

				$redirect_urls = new RedirectUrls();
				Alert::success('Thank you for reserving!','Reservation Information')->persistent('Close');
				$redirect_urls->setReturnUrl(route('Customer.index')) /** Specify return URL **/
				->setCancelUrl(route('Customer.index'));

				$event_details = request('event_motif').",".request('event_name');




			

				$payment = new Payment();
				Alert::success('Thank you for reserving!','Reservation Information')->persistent('Close');
				$payment->setIntent('Sale')
				->setPayer($payer)
				->setRedirectUrls($redirect_urls)
				->setTransactions(array($transaction));
				/** dd($payment->create($this->_api_context));exit; **/
				try {

					$payment->create($this->_api_context);
					Reservation::create([
						'reservation_in' => request('date_in'),
						'reservation_out' => request('date_out'),
						'reservation_id' => '456'.rand(1,10000),
						'reservation_type' => 'rooms',
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
						'payment_mode' => 'Paypal',

						]);

				} catch (\PayPal\Exception\PPConnectionException $ex) {

					if (\Config::get('app.debug')) {

						\Session::put('error', 'Connection timeout');
						Alert::error('Connection timeout','Error')->persistent('Close');

						return Redirect::route('customer.reservation');

					} else {

						\Session::put('error', 'Some error occur, sorry for inconvenient');
						Alert::error('Some error occur, sorry for inconvenient','Error')->persistent('Close');
						return Redirect::route('customer.reservation');

					}

				}

				foreach ($payment->getLinks() as $link) {

					if ($link->getRel() == 'approval_url') {

						$redirect_url = $link->getHref();
						break;

					}

				}

				/** add payment ID to session **/
				Session::put('paypal_payment_id', $payment->getId());

				if (isset($redirect_url)) {

					/** redirect to paypal **/
					return Redirect::away($redirect_url);

				}

				\Session::put('error', 'Unknown error occurred');
				return Redirect::route('paywithpaypal');
			}
			if(request('service_type')=='pools')
			{
				$payer = new Payer();
				$payer->setPaymentMethod('paypal');

				$item_1 = new Item();

				$item_1->setName('Item 1') /** item name **/
				->setCurrency('PHP')
				->setQuantity(1)
				->setPrice($request->get('total_price')); /** unit price **/

				$item_list = new ItemList();
				$item_list->setItems(array($item_1));

				$amount = new Amount();
				$amount->setCurrency('PHP')
				->setTotal($request->get('total_price'));

				$transaction = new Transaction();
				$transaction->setAmount($amount)
				->setItemList($item_list)
				->setDescription('Your transaction description');

				$redirect_urls = new RedirectUrls();
				Alert::success('Thank you for reserving!','Reservation Information')->persistent('Close');
				$redirect_urls->setReturnUrl(route('Customer.index')) /** Specify return URL **/
				->setCancelUrl(route('Customer.index'));

				$event_details = request('event_motif').",".request('event_name');




			

				$payment = new Payment();
				Alert::success('Thank you for reserving!','Reservation Information')->persistent('Close');
				$payment->setIntent('Sale')
				->setPayer($payer)
				->setRedirectUrls($redirect_urls)
				->setTransactions(array($transaction));
				/** dd($payment->create($this->_api_context));exit; **/
				try {

					$payment->create($this->_api_context);
					Reservation::create([
						'reservation_in' => request('date_in'),
						'reservation_out' => request('date_out'),
						'reservation_id' => '123'.rand(1,10000),
						'reservation_type' => 'pools',
						'time_in' => request('time_in'),
						'time_out' => request('time_out'),
						'fname' => request('fname'),
						'lname' => request('lname'),
						'address' => request('address'),
						'contact_no' => request('contact_no'),
						'email' => request('email'),
						'pool_type' => request('pool_type'),
						'pool_quantity' => '1',
						'pool_pax' => request('pool_pax'),
						'price' => request('total_price'),
						'payment_mode' => 'Paypal',

					]);

				} catch (\PayPal\Exception\PPConnectionException $ex) {

					if (\Config::get('app.debug')) {

						\Session::put('error', 'Connection timeout');
						Alert::error('Connection timeout','Error')->persistent('Close');
						return Redirect::route('customer.reservation');

					} else {

						\Session::put('error', 'Some error occur, sorry for inconvenient');
						Alert::error('Some error occur, sorry for inconvenient','Error')->persistent('Close');
						return Redirect::route('customer.reservation');

					}

				}

				foreach ($payment->getLinks() as $link) {

					if ($link->getRel() == 'approval_url') {

						$redirect_url = $link->getHref();
						break;

					}

				}

				/** add payment ID to session **/
				Session::put('paypal_payment_id', $payment->getId());

				if (isset($redirect_url)) {

					/** redirect to paypal **/
					return Redirect::away($redirect_url);

				}

				\Session::put('error', 'Unknown error occurred');
				return Redirect::route('paywithpaypal');
			}
		}
	}
	public function check()
	{
		if(request('date_in') > request('date_out'))
		{
			return redirect::route('customer.reservation')->withErrors(['token' => 'Error, the date are not valid!']);
		}
		$this->validate(request(),[
			'date_in' => 'required|after:yesterday',
		]);
		


		if(request('service_type')=='poolserv')
		{
			$in=request('date_in');
			$out=request('date_out');
				
			$this->validate(request(),[
			'service_type' => 'required',
			'date_in' => 'required',
			'date_out' => 'required',
			'pool_name' => 'required',
			]);
			if(Reservation::where('reservation_type','=','pools'))
			{


				$res = Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out)->where('reservation_type','=','pools');
				$pool_res = Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out)->where('reservation_type','=','events');

                if($pool_res->exists()){
                    $pool_res = Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out)->where('reservation_type','=','events')->get();


                    foreach ($pool_res as $pool_res) {
                        $reserve = Pools::where('with_event','=',$pool_res->event_type);
                        if($reserve->exists())
                        {
                                

                                
                                session()->flash('notif','Sorry this type of Pool is not available for this date!.');
                                $rooms=Rooms::where('room_status','!=','0')->get();
                                $pools=Pools::where('pool_status','!=','0')->get();
								$events=Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
								 $settings=settings::all();
								return view('customer.reservation',compact('rooms','pools','events','date','settings'));

                            
                        }
                    }
                }
				if($res->exists())
				{

					$res = Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out)->where('reservation_type','=','pools')->get();
					
					foreach ($res as  $res) 
					{
						
						if($res->pool_type==request('pool_name'))
						{
							

							$pool=Pools::where('pool_type','=', $res->pool_type)->get();
							
							foreach ($pool as  $pol) 
							{
								$temp_pool_quantity=($res->pool_quantity - $pol->pool_quantity);
								


							}

							if($temp_pool_quantity<=0)
							{
								session()->flash('notif','Sorry this type of Pool is not available for this date!.');
								$rooms=Rooms::where('room_status','!=','0')->get();
								$pools=Pools::where('pool_status','!=','0')->get();
								$events=Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
								return redirect()->route('customer.reservation',compact('rooms','pools','events','date'));

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
					 $settings=settings::all();

					return view('customer.add_reservation_check_pool',compact('in','out','pool_type','poolk','settings'));

				}
			}
		}
		
		if(request('service_type')=='roomserv')
		{
			
			$in=request('date_in');
			$out=request('date_out');
			$this->validate(request(),[
			'service_type' => 'required',
			'date_in' => 'required',
			'date_out' => 'required',
			'room_name' => 'required',
			]);

			if(Reservation::where('reservation_type','=','rooms'))
			{


				$res = Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out)->where('reservation_type','=','rooms');



				if($res->exists())
				{
					$res = Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out)->get();
					foreach ($res as  $res) 
					{
						if($res->room_type==request('room_name'))
						{
							$room=Rooms::where('type','=', $res->room_type)->get();
							foreach ($room as  $rom) 
							{


								if(request('no_rooms') > $rom->room_quantity)
								{
									session()->flash('notif','Sorry we have only '.$res->room_quantity.' number of rooms');
									$rooms=Rooms::where('room_status','!=','0')->get();
									$pools=Pools::where('pool_status','!=','0')->get();
									$events=Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
									return redirect()->route('customer.reservation',compact('rooms','pools','events','date'));

								}
								else
								{

									$temp_room_quantity=($rom->room_quantity-$res->room_quantity);

								}
							}
							if($temp_room_quantity<=0)
							{
								session()->flash('notif','Sorry this type of Rooms is not available for this date!.');
								$rooms=Rooms::where('room_status','!=','0')->get();
								$pools=Pools::where('pool_status','!=','0')->get();
								$events=Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
								return redirect()->route('customer.reservation',compact('rooms','pools','events','date'));

							}
							else
							{
								session()->flash('notif','You may proceed we have '.$temp_room_quantity.' rooms to this date!');
								$s_type=request('service-type');
								$room_type=request('room_name');

								$roomk=Rooms::where('type','=',$room_type)->get();
								$temp_room_quantity=$temp_room_quantity;
								 $settings=settings::all();
								return view('customer.add_reservation_check_room',compact('in','out','room_type','roomk','temp_room_quantity','settings'));
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
					 $settings=settings::all();
					return view('customer.add_reservation_check_room',compact('in','out','room_type','roomk','temp_room_quantity','settings'));
				}
			}
		}
		if(request('service_type')=='eventserv')
		{
			$in=request('date_in');
			$out=request('date_out');

			$this->validate(request(),[
			'service_type' => 'required',
			'date_in' => 'required',
			'date_out' => 'required',
			'pavilion_name' => 'required',
			]);
			if(Reservation::where('reservation_type','=','events'))
			{


				$res = Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out)->where('reservation_type','=','events');


				if($res->exists())
				{

					$res = Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out)->get();

					foreach ($res as  $res) 
					{
						
						if($res->event_type==request('pavilion_name'))
						{


							$event=Events::where('item_name','=', $res->event_type)->get();
							foreach ($event as  $event) 
							{
								$temp_event_quantity=($res->event_quantity - $event->pavilion_quantity);
								
							}
						
							if($temp_event_quantity<=0)
							{
								session()->flash('notif','Sorry this type of pavilion is not available for this date, Please check for others!.');
								$rooms=Rooms::where('room_status','!=','0')->get();
								$pools=Pools::where('pool_status','!=','0')->get();
								$events=Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
								return redirect()->route('customer.reservation',compact('rooms','pools','events','date'));

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
					$event_pax = Events::where('category','=','foods')->get();
					$rooms=Rooms::where('room_status','!=','0')->get();
        			$pools=Pools::where('pool_status','!=','0')->where('with_event','=',$pavilion_type)->orwhere('with_event','=','')->get();
        			 $settings=settings::all();
					return view('customer.add_reservation_check_event',compact('in','out','event_type','pavk','events','pools','rooms','settings','event_pax'));

				}
			}

		}



	}
	public function customer_summary(MessageBag $message_bag)
	{

		$new_dayIn= new DateTime(request('date_in'));
		$new_dayOut= new DateTime(request('date_out'));
		$interval =$new_dayIn->diff($new_dayOut);
		$days = $interval->format('%a');
		if($days==0)
		{
			$days=1;
		}
		
		if (request('service_type')=='pool_type')
		{ 


			$in = new DateTime(request('time_in'));
			$out = new DateTime(request('time_out'));
			$ti = $in->format('h:i a');
			$to = $out->format('h:i a');

			

			$reservation_type = request('service_type');
			$pool_type = request('pool_type');
			$pool_price = request('pool_price')*$days;
			$pool_description = request('pool_description');
			$pool_pax = request('pool_pax');
			$date_in = request('date_in');
			$date_out = request('date_out');
			$time_in = $ti;
			$time_out = $to;
			$fname = request('fname');
			$lname = request('lname');
			$email = request('email');
			$address = request('address');
			$contact_no = request('contact');
			$gender = request('gender');


			$service_type=request('service_type');
			 $settings=settings::all();

			$confirmation_code[] = str_random(30);
			 

			 \Mail::send('customer.mail.verify_email',compact('confirmation_code'), function($message) {
            $message->to(request('email'))
                ->subject('Verify your email address');
               });
			
			return view('customer.mail.verify',compact('service_type','date_in','date_out','time_in','time_out','fname','lname','email','address','contact_no','gender','pool_type','pool_price','pool_description','pool_pax','settings','confirmation_code'));

		}
		if (request('service_type')=='room_type')
		{ 

			

			$room=Rooms::where('type','=', request('room_type'))->get();
			foreach ($room as  $rom) 
			{

				if(request('room_quantity') > $rom->room_quantity)
				{
					
					$message_bag->add('token','Sorry we have only '.$rom->room_quantity.' number of rooms');
					
					$in=request('date_in');
					$out=request('date_out');
					$rooms=Rooms::where('room_status','!=','0')->get();
					$pools=Pools::where('pool_status','!=','0')->get();
					$events=Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
					$roomk=Rooms::where('type','=',request('room_type'))->get();

					$temp_room_quantity=request('temp_room_quantity');
					 $settings=settings::all();
					return view('customer.add_reservation_check_room',compact('in','out','rooms','pools','roomk','temp_room_quantity','settings'))->withErrors($message_bag);
				}

			}
			if(request('temp_room_quantity') > request('room_quantity'))
			{
				$message_bag->add('token','Sorry we have only '.request('temp_room_quantity').' number of rooms');
					
					$in=request('date_in');
					$out=request('date_out');
					$rooms=Rooms::where('room_status','!=','0')->get();
					$pools=Pools::where('pool_status','!=','0')->get();
					$events=Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
					$roomk=Rooms::where('type','=',request('room_type'))->get();

					$temp_room_quantity=request('temp_room_quantity');
					 $settings=settings::all();
					return view('customer.add_reservation_check_room',compact('in','out','rooms','pools','roomk','temp_room_quantity','settings'))->withErrors($message_bag);
			}
			$in = new DateTime(request('time_in'));
			$out = new DateTime(request('time_out'));
			$ti = $in->format('h:i a');
			$to = $out->format('h:i a');


			$reservation_type = request('service-type');
			$room_type = request('room_type');
			$room_price = request('room_price');
			$room_description = request('room_description');
			$date_in = request('date_in');
			$date_out = request('date_out');
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
			$totalr=($totalr*$room_quantity)*$days;

			

			$service_type=request('service_type');
			 $settings=settings::all();
			$confirmation_code[] = str_random(30);
			
			 \Mail::send('customer.mail.verify_email',compact('confirmation_code'), function($message) {
            $message->to(request('email'))
                ->subject('Verify your email address');
               });
			return view('customer.mail.verify',compact('room_reservation','totalr','service_type','reservation_type','room_type','room_price','room_description','date_in','date_out','time_in','time_out','fname','lname','email','address','contact_no','gender','room_quantity','settings','confirmation_code'));

		}
		if (request('service_type')=='event_type')
		{       
			$in = new DateTime(request('time_in'));
			$out = new DateTime(request('time_out'));
			$ti = $in->format('h:i a');
			$to = $out->format('h:i a');
			
			$add_pax_price=0;

			$reservation_type= request('service_type');
			$pav_type = request('pav_type');
			$pav_price = request('pav_price');
			$pav_description = request('pav_description');
			$date_in = request('date_in');
			$date_out = request('date_out');
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
			$add_pax = request('add_pax');

			$reservation_in = request('date_in');
			$reservation_out = request('date_out');

			

			$final_pool_price=0;

        if(request('pool_type') != "")
        {


            $pool_type = request('pool_type');

            $res = Reservation::whereDate('reservation_out','>=',$reservation_in)->whereDate('reservation_in','<=',$reservation_out)->where('reservation_type','=','pools');
           
            if($res->exists())
            {
               $res = Reservation::whereDate('reservation_out','>=',request('date_in'))->whereDate('reservation_in','<=',request('date_out'))->get();
               foreach ($res as  $res) 
               {
                
                    if($res->pool_type == $pool_type)
                    {

                        $pool=Pools::where('pool_type','=', $res->pool_type)->get();

                        foreach ($pool as  $pol) 
                        {
                            $temp_pool_quantity=($res->pool_quantity - $pol->pool_quantity);

                        }

                        if($temp_pool_quantity==0)
                        {
                            
                          
                           $in=request('date_in');
                           $out=request('date_out');
                           $s_type=request('service-type');
                           $pavilion_type=request('pav_type');


                           $pavk=Events::where('item_name','=',$pavilion_type)->get();
                           $events=Events::all();
                           $rooms=Rooms::where('room_status','!=','0')->get();
                           $pools=Pools::where('pool_status','!=','0')->where('with_event','=',$pavilion_type)->orwhere('with_event','=','')->get();
                            $settings=settings::all();
                        return view('customer.add_reservation_check_event',compact('in','out','settings','event_type','pavk','events','rooms','pools'))->withErrors(['token' => 'Sorry this type pool of is not available in this date!']);

                       }
                       
                    }
                     else
                        {
                            $pool_type = request('pool_type');
                            $pool_price = Pools::where('pool_type','=', $pool_type)->get();
                            foreach ($pool_price as  $price) {
                                $price_pool=$price->pool_price;
                            }
                            $final_pool_price = $price_pool;

                           
                        }
                }
            }
            else
            {
                $pool_type = request('pool_type');
                 $pool_price = Pools::where('pool_type','=', $pool_type)->get();
                foreach ($pool_price as  $price) {
                    $price_pool=$price->pool_price;
                }
                $final_pool_price = $price_pool;
           
           
            }
        }
        $final_room_price=0;
         if(request('room_type')!= '')
        {
             $res = Reservation::whereDate('reservation_out','>=',request('date_in'))->whereDate('reservation_in','<=',request('date_out'))->where('reservation_type','=','rooms');

            if($res->exists())
            {
               $res = Reservation::whereDate('reservation_out','>=',request('date_in'))->whereDate('reservation_in','<=',request('date_out'))->get();
               foreach ($res as  $res) 
               {
                        if($res->room_type==request('room_name'))
                        {
                            $room=Rooms::where('type','=', $res->room_type)->get();
                            foreach ($room as  $rom) 
                            {
                                if(request('no_rooms') > $rom->room_quantity)
                                {
                                    $message_bag->add('token','Sorry we have only '.$res->room_quantity.' number of rooms');
                                     $in=request('date_in');
                                   $out=request('date_out');
                                   $s_type=request('service-type');
                                   $pavilion_type=request('pav_type');


                                   $pavk=Events::where('item_name','=',$pavilion_type)->get();
                                   $events=Events::all();
                                   $rooms=Rooms::where('room_status','!=','0')->get();
                                   $pools=Pools::where('pool_status','!=','0')->where('with_event','=',$pavilion_type)->orwhere('with_event','=','')->get();

                                return view('admin.add_reservation_check_event',compact('in','out','event_type','pavk','events','rooms','pools'))->withErrors($message_bag);
                                }
                                else
                                {

                                    $temp_room_quantity=($rom->room_quantity-$res->room_quantity);
                                }
                            }
                            if($temp_room_quantity==0)
                            {
                                $message_bag->add('token','Sorry this type of room is not available for this date');
                                     $in=request('date_in');
                                   $out=request('date_out');
                                   $s_type=request('service-type');
                                   $pavilion_type=request('pav_type');


                                   $pavk=Events::where('item_name','=',$pavilion_type)->get();
                                   $events=Events::all();
                                   $rooms=Rooms::where('room_status','!=','0')->get();
                                   $pools=Pools::where('pool_status','!=','0')->where('with_event','=',$pavilion_type)->orwhere('with_event','=','')->get();

                                return view('admin.add_reservation_check_event',compact('in','out','event_type','pavk','events','rooms','pools'))->withErrors($message_bag);
                            }
                           if( request('no_rooms') > $temp_room_quantity)
                            {
                                $message_bag->add('token','Sorry we only have '.$temp_room_quantity.' for this date');
                                $in=request('date_in');
                                   $out=request('date_out');
                                   $s_type=request('service-type');
                                   $pavilion_type=request('pav_type');


                                   $pavk=Events::where('item_name','=',$pavilion_type)->get();
                                   $events=Events::all();
                                   $rooms=Rooms::where('room_status','!=','0')->get();
                                   $pools=Pools::where('pool_status','!=','0')->where('with_event','=',$pavilion_type)->orwhere('with_event','=','')->get();

                                return view('admin.add_reservation_check_event',compact('in','out','event_type','pavk','events','rooms','pools'))->withErrors($message_bag);
                            }
                            else
                            {
                                $no_rooms = request('no_rooms');
                                $room_type = request('room_type');
                                $room_price = Rooms::where('type','=', $room_type)->get();
                                foreach ($room_price as  $room_price) {
                                    $price_room=$room_price->room_price;
                                }

                                $final_room_price = $price_room * $no_rooms;
                            }
                        }
                }

            }
            else
            {
                $no_rooms = request('no_rooms');
                $room_type = request('room_type');

                 $room_price = Rooms::where('type','=', $room_type)->get();
                foreach ($room_price as  $room_price) {
                    $price_room=$room_price->room_price;
                }

                $final_room_price = $price_room * $no_rooms;
            }
        }







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
				$pax = Events::where('category','=','foods')->pluck('add_price');
                    foreach($pax as $pax)
                    {
                        $add_pax_price = request('add_pax')*$pax;
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
			$total = ($totalf+$totals+request('pav_price')+$final_room_price+$final_pool_price+$add_pax_price)*$days;


    		$pool_type = request('pool_type');
   			$room_type = request('room_type');
    		$no_room =  request('no_rooms');




    		 $settings=settings::all();
			$service_type=request('service_type');
				$confirmation_code[] = str_random(30);
			
			 \Mail::send('customer.mail.verify_email',compact('confirmation_code'), function($message) {
            $message->to(request('email'))
                ->subject('Verify your email address');
               });

			return view('customer.mail.verify',compact('total','datums','service_type','f_item','s_item','reservation_type','pav_type','pav_price','pav_description','date_in','date_out','time_in','time_out','fname','lname','email','address','contact_no','gender','event_name','event_motif','pool_type','room_type','no_room','settings','confirmation_code'));

		}




	}

	public function verified()
	{


		if(request('submit') == 'back')
		{
			$new_dayIn= new DateTime(request('date_in'));
			$new_dayOut= new DateTime(request('date_out'));
			$interval =$new_dayIn->diff($new_dayOut);
			$days = $interval->format('%a');
			if($days==0)
			{
				$days=1;
			}
			$confirmation_code[]=request('certified_verification');
			if(request('service_type') == 'pool_type')
			{
					$in = new DateTime(request('time_in'));
					$out = new DateTime(request('time_out'));
					$ti = $in->format('h:i a');
					$to = $out->format('h:i a');

					

					$reservation_type = request('service_type');
					$pool_type = request('pool_type');
					$pool_price = request('pool_price')*$days;
					$pool_description = request('pool_description');
					$pool_pax = request('pool_pax');

					$time_in = $ti;
					$time_out = $to;
					$in = request('date_in');
					$out = request('date_out');
					$fname = request('fname');
					$lname = request('lname');
					$email = request('email');
					$address = request('address');
					$contact_no = request('contact');
					$gender = request('gender');
					Alert::warning('Sorry Invalid Code','Invalid Input');

					$service_type=request('service_type');
					$settings=settings::all();
					session()->flash('notif','You may proceed we have pools to this date!');
					
					$s_type=request('service_type');
					$pool_type=request('pool_type');

					$poolk=Pools::where('pool_type','=',$pool_type)->get();
					 $settings=settings::all();

					return view('customer.add_reservation_check_pool',compact('in','out','pool_type','poolk','settings'));
			}
			if(request('service_type') == 'room_type')
			{
					$in = new DateTime(request('time_in'));
					$out = new DateTime(request('time_out'));
					$ti = $in->format('h:i a');
					$to = $out->format('h:i a');

					$reservation_type = request('service-type');
					$room_type = request('room_type');
					$room_price = request('room_price');
					$room_description = request('room_description');
					
					$time_in = $ti;
					$time_out = $to;
					$in = request('date_in');
					$out = request('date_out');
					$fname = request('fname');
					$lname = request('lname');
					$email = request('email');
					$address = request('address');
					$contact_no = request('contact');
					$gender = request('gender');
					$room_quantity=request('room_quantity');
					$room_reservation=request('room_reservation');
					$totalr=request('totalr');
					$service_type=request('service_type');
					$settings=settings::all();
					$room=rooms::where('type','=', request('room_type'))->get();
					foreach ($room as  $rom) 
					{

						$temp_room_quantity=$rom->room_quantity;


					}
					$s_type=request('service_type');
					$room_type=request('room_type');

					$roomk=Rooms::where('type','=',$room_type)->get();
					$temp_room_quantity=$temp_room_quantity;
					 $settings=settings::all();
					return view('customer.add_reservation_check_room',compact('in','out','room_type','roomk','temp_room_quantity','settings'));
			}
			if(request('service_type') == 'event_type')
			{
				$in = new DateTime(request('time_in'));
				$out = new DateTime(request('time_out'));
				$ti = $in->format('h:i a');
				$to = $out->format('h:i a');

				$reservation_type= request('service_type');
				$pav_type = request('pav_type');
				$pav_price = request('pav_price');
				$pav_description = request('pav_description');
				
				$time_in = $ti;
				$time_out = $to;
				$in = request('date_in');
				$out = request('date_out');
				$fname = request('fname');
				$lname = request('lname');
				$email = request('email');
				$address = request('address');
				$contact_no = request('contact');
				$gender = request('gender');
				$event_name = request('event_name');
				$event_motif = request('event_motif');
				$add_pax = request('add_pax');

				$pool_type=request('pool_type');
				$room_type=request('room_type');
				$no_room=request('no_room');

				$reservation_in = request('date_in');
				$reservation_out = request('date_out');
				$total = request('total');
				$datums=request('datums');
				$service_type = request('service_type');
				$f_item=request('f_item');
				$s_item=request('s_item');
				$settings=settings::all();

				Alert::warning('Sorry Invalid Code','Invalid Input')->persistent('close');
				session()->flash('notif','You may proceed we have this Pavilion in this date!');
					$s_type=request('service_type');
					$pavilion_type=request('pav_type');


					$pavk=Events::where('item_name','=',$pavilion_type)->get();
					$events=Events::all();
					$event_pax = Events::where('category','=','foods')->get();
					$rooms=Rooms::where('room_status','!=','0')->get();
        			$pools=Pools::where('pool_status','!=','0')->where('with_event','=',$pavilion_type)->orwhere('with_event','=','')->get();
        			 $settings=settings::all();
					return view('customer.add_reservation_check_event',compact('in','out','event_type','pavk','events','pools','rooms','settings','event_pax'));
			}
			
		}

		if(request('verification') != request('certified_verification'))
		{
			$new_dayIn= new DateTime(request('date_in'));
			$new_dayOut= new DateTime(request('date_out'));
			$interval =$new_dayIn->diff($new_dayOut);
			$days = $interval->format('%a');
			if($days==0)
			{
				$days=1;
			}
			$confirmation_code[]=request('certified_verification');
			if(request('service_type') == 'pool_type')
			{
					$in = new DateTime(request('time_in'));
					$out = new DateTime(request('time_out'));
					$ti = $in->format('h:i a');
					$to = $out->format('h:i a');

					

					$reservation_type = request('service_type');
					$pool_type = request('pool_type');
					$pool_price = request('pool_price')*$days;
					$pool_description = request('pool_description');
					$pool_pax = request('pool_pax');
					$date_in = request('date_in');
					$date_out = request('date_out');
					$time_in = $ti;
					$time_out = $to;
					$fname = request('fname');
					$lname = request('lname');
					$email = request('email');
					$address = request('address');
					$contact_no = request('contact');
					$gender = request('gender');
					Alert::warning('Sorry Invalid Code','Invalid Input')->persistent('close');

					$service_type=request('service_type');
					$settings=settings::all();
					return view('customer.mail.verify',compact('service_type','date_in','date_out','time_in','time_out','fname','lname','email','address','contact_no','gender','pool_type','pool_price','pool_description','pool_pax','settings','confirmation_code'))->withErrors(['token','Error Invalid Confirmation Id']);
			}
			if(request('service_type') == 'room_type')
			{
					$in = new DateTime(request('time_in'));
					$out = new DateTime(request('time_out'));
					$ti = $in->format('h:i a');
					$to = $out->format('h:i a');

					$reservation_type = request('service-type');
					$room_type = request('room_type');
					$room_price = request('room_price');
					$room_description = request('room_description');
					$date_in = request('date_in');
					$date_out = request('date_out');
					$time_in = $ti;
					$time_out = $to;
					$fname = request('fname');
					$lname = request('lname');
					$email = request('email');
					$address = request('address');
					$contact_no = request('contact');
					$gender = request('gender');
					$room_quantity=request('room_quantity');
					$room_reservation=request('room_reservation');
					$totalr=request('totalr');
					$service_type=request('service_type');
					$settings=settings::all();
					Alert::warning('Sorry Invalid Code','Invalid Input')->persistent('close');

					return view('customer.mail.verify',compact('room_reservation','totalr','service_type','reservation_type','room_type','room_price','room_description','date_in','date_out','time_in','time_out','fname','lname','email','address','contact_no','gender','room_quantity','settings','confirmation_code'));
			}
			if(request('service_type') == 'event_type')
			{
				$in = new DateTime(request('time_in'));
				$out = new DateTime(request('time_out'));
				$ti = $in->format('h:i a');
				$to = $out->format('h:i a');

				$reservation_type= request('service_type');
				$pav_type = request('pav_type');
				$pav_price = request('pav_price');
				$pav_description = request('pav_description');
				$date_in = request('date_in');
				$date_out = request('date_out');
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
				$add_pax = request('add_pax');

				$pool_type=request('pool_type');
				$room_type=request('room_type');
				$no_room=request('no_room');

				$reservation_in = request('date_in');
				$reservation_out = request('date_out');
				$total = request('total');
				$datums=request('datums');
				$service_type = request('service_type');
				$f_item=request('f_item');
				$s_item=request('s_item');
				$settings=settings::all();

				Alert::warning('Sorry Invalid Code','Invalid Input')->persistent('close');
				return view('customer.mail.verify',compact('total','datums','service_type','f_item','s_item','reservation_type','pav_type','pav_price','pav_description','date_in','date_out','time_in','time_out','fname','lname','email','address','contact_no','gender','event_name','event_motif','pool_type','room_type','no_room','settings','confirmation_code'));
			}
			
		}


		$new_dayIn= new DateTime(request('date_in'));
		$new_dayOut= new DateTime(request('date_out'));
		$interval =$new_dayIn->diff($new_dayOut);
		$days = $interval->format('%a');
		if($days==0)
		{
			$days=1;
		}
		
		if (request('service_type')=='pool_type')
		{ 


			$in = new DateTime(request('time_in'));
			$out = new DateTime(request('time_out'));
			$ti = $in->format('h:i a');
			$to = $out->format('h:i a');

			

			$reservation_type = request('service_type');
			$pool_type = request('pool_type');
			$pool_price = request('pool_price')*$days;
			$pool_description = request('pool_description');
			$pool_pax = request('pool_pax');
			$date_in = request('date_in');
			$date_out = request('date_out');
			$time_in = $ti;
			$time_out = $to;
			$fname = request('fname');
			$lname = request('lname');
			$email = request('email');
			$address = request('address');
			$contact_no = request('contact_no');
			$gender = request('gender');


			$service_type=request('service_type');
			 $settings=settings::all();

			
			
			return view('customer.view_pool_summary',compact('service_type','date_in','date_out','time_in','time_out','fname','lname','email','address','contact_no','gender','pool_type','pool_price','pool_description','pool_pax','settings','confirmation_code'));

		}
		if (request('service_type')=='room_type')
		{ 

			

			$room=Rooms::where('type','=', request('room_type'))->get();
			foreach ($room as  $rom) 
			{

				if(request('room_quantity') > $rom->room_quantity)
				{
					
					$message_bag->add('token','Sorry we have only '.$rom->room_quantity.' number of rooms');
					
					$in=request('date_in');
					$out=request('date_out');
					$rooms=Rooms::where('room_status','!=','0')->get();
					$pools=Pools::where('pool_status','!=','0')->get();
					$events=Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
					$roomk=Rooms::where('type','=',request('room_type'))->get();

					$temp_room_quantity=request('temp_room_quantity');
					 $settings=settings::all();
					return view('customer.add_reservation_check_room',compact('in','out','rooms','pools','roomk','temp_room_quantity','settings'))->withErrors($message_bag);
				}

			}
			if(request('temp_room_quantity') > request('room_quantity'))
			{
				$message_bag->add('token','Sorry we have only '.request('temp_room_quantity').' number of rooms');
					
					$in=request('date_in');
					$out=request('date_out');
					$rooms=Rooms::where('room_status','!=','0')->get();
					$pools=Pools::where('pool_status','!=','0')->get();
					$events=Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
					$roomk=Rooms::where('type','=',request('room_type'))->get();

					$temp_room_quantity=request('temp_room_quantity');
					 $settings=settings::all();
					return view('customer.add_reservation_check_room',compact('in','out','rooms','pools','roomk','temp_room_quantity','settings'))->withErrors($message_bag);
			}
			$in = new DateTime(request('time_in'));
			$out = new DateTime(request('time_out'));
			$ti = $in->format('h:i a');
			$to = $out->format('h:i a');


			$reservation_type = request('service-type');
			$room_type = request('room_type');
			$room_price = request('room_price');
			$room_description = request('room_description');
			$date_in = request('date_in');
			$date_out = request('date_out');
			$time_in = $ti;
			$time_out = $to;
			$fname = request('fname');
			$lname = request('lname');
			$email = request('email');
			$address = request('address');
			$contact_no = request('contact_no');
			$gender = request('gender');
			$room_quantity=request('room_quantity');

			$totalr=0;
			$room = Rooms::where('type','=',$room_type)->get();
			foreach ($room as  $value) {
				$totalr = $value->room_price ;
			}
			$totalr=($totalr*$room_quantity)*$days;

			$totalr=request('totalr');

			$service_type=request('service_type');
			 $settings=settings::all();
			return view('customer.view_room_summary',compact('room_reservation','totalr','service_type','reservation_type','room_type','room_price','room_description','date_in','date_out','time_in','time_out','fname','lname','email','address','contact_no','gender','room_quantity','settings'));

		}
		if (request('service_type')=='event_type')
		{       
			$in = new DateTime(request('time_in'));
			$out = new DateTime(request('time_out'));
			$ti = $in->format('h:i a');
			$to = $out->format('h:i a');
			
			$add_pax_price=0;

			$reservation_type= request('service_type');
			$pav_type = request('pav_type');
			$pav_price = request('pav_price');
			$pav_description = request('pav_description');
			$date_in = request('date_in');
			$date_out = request('date_out');
			$time_in = $ti;
			$time_out = $to;
			$fname = request('fname');
			$lname = request('lname');
			$email = request('email');
			$address = request('address');
			$contact_no = request('contact_no');
			$gender = request('gender');
			$event_name = request('event_name');
			$event_motif = request('event_motif');
			$add_pax = request('add_pax');

			$reservation_in = request('date_in');
			$reservation_out = request('date_out');

			

			$final_pool_price=0;

        if(request('pool_type') != "")
        {


            $pool_type = request('pool_type');

            $res = Reservation::whereDate('reservation_out','>=',$reservation_in)->whereDate('reservation_in','<=',$reservation_out)->where('reservation_type','=','pools');
           
            if($res->exists())
            {
               $res = Reservation::whereDate('reservation_out','>=',request('date_in'))->whereDate('reservation_in','<=',request('date_out'))->get();
               foreach ($res as  $res) 
               {
                
                    if($res->pool_type == $pool_type)
                    {

                        $pool=Pools::where('pool_type','=', $res->pool_type)->get();

                        foreach ($pool as  $pol) 
                        {
                            $temp_pool_quantity=($res->pool_quantity - $pol->pool_quantity);

                        }

                        if($temp_pool_quantity==0)
                        {
                            
                          
                           $in=request('date_in');
                           $out=request('date_out');
                           $s_type=request('service-type');
                           $pavilion_type=request('pav_type');


                           $pavk=Events::where('item_name','=',$pavilion_type)->get();
                           $events=Events::all();
                           $rooms=Rooms::where('room_status','!=','0')->get();
                           $pools=Pools::where('pool_status','!=','0')->where('with_event','=',$pavilion_type)->orwhere('with_event','=','')->get();
                            $settings=settings::all();
                        return view('customer.add_reservation_check_event',compact('in','out','settings','event_type','pavk','events','rooms','pools'))->withErrors(['token' => 'Sorry this type pool of is not available in this date!']);

                       }
                       
                    }
                     else
                        {
                            $pool_type = request('pool_type');
                            $pool_price = Pools::where('pool_type','=', $pool_type)->get();
                            foreach ($pool_price as  $price) {
                                $price_pool=$price->pool_price;
                            }
                            $final_pool_price = $price_pool;

                           
                        }
                }
            }
            else
            {
                $pool_type = request('pool_type');
                 $pool_price = Pools::where('pool_type','=', $pool_type)->get();
                foreach ($pool_price as  $price) {
                    $price_pool=$price->pool_price;
                }
                $final_pool_price = $price_pool;
           
           
            }
        }
        $final_room_price=0;
         if(request('room_type')!= '')
        {
             $res = Reservation::whereDate('reservation_out','>=',request('date_in'))->whereDate('reservation_in','<=',request('date_out'))->where('reservation_type','=','rooms');

            if($res->exists())
            {
               $res = Reservation::whereDate('reservation_out','>=',request('date_in'))->whereDate('reservation_in','<=',request('date_out'))->get();
               foreach ($res as  $res) 
               {
                        if($res->room_type==request('room_name'))
                        {
                            $room=Rooms::where('type','=', $res->room_type)->get();
                            foreach ($room as  $rom) 
                            {
                                if(request('no_rooms') > $rom->room_quantity)
                                {
                                    $message_bag->add('token','Sorry we have only '.$res->room_quantity.' number of rooms');
                                     $in=request('date_in');
                                   $out=request('date_out');
                                   $s_type=request('service-type');
                                   $pavilion_type=request('pav_type');


                                   $pavk=Events::where('item_name','=',$pavilion_type)->get();
                                   $events=Events::all();
                                   $rooms=Rooms::where('room_status','!=','0')->get();
                                   $pools=Pools::where('pool_status','!=','0')->where('with_event','=',$pavilion_type)->orwhere('with_event','=','')->get();

                                return view('admin.add_reservation_check_event',compact('in','out','event_type','pavk','events','rooms','pools'))->withErrors($message_bag);
                                }
                                else
                                {

                                    $temp_room_quantity=($rom->room_quantity-$res->room_quantity);
                                }
                            }
                            if($temp_room_quantity==0)
                            {
                                $message_bag->add('token','Sorry this type of room is not available for this date');
                                     $in=request('date_in');
                                   $out=request('date_out');
                                   $s_type=request('service-type');
                                   $pavilion_type=request('pav_type');


                                   $pavk=Events::where('item_name','=',$pavilion_type)->get();
                                   $events=Events::all();
                                   $rooms=Rooms::where('room_status','!=','0')->get();
                                   $pools=Pools::where('pool_status','!=','0')->where('with_event','=',$pavilion_type)->orwhere('with_event','=','')->get();

                                return view('admin.add_reservation_check_event',compact('in','out','event_type','pavk','events','rooms','pools'))->withErrors($message_bag);
                            }
                           if( request('no_rooms') > $temp_room_quantity)
                            {
                                $message_bag->add('token','Sorry we only have '.$temp_room_quantity.' for this date');
                                $in=request('date_in');
                                   $out=request('date_out');
                                   $s_type=request('service-type');
                                   $pavilion_type=request('pav_type');


                                   $pavk=Events::where('item_name','=',$pavilion_type)->get();
                                   $events=Events::all();
                                   $rooms=Rooms::where('room_status','!=','0')->get();
                                   $pools=Pools::where('pool_status','!=','0')->where('with_event','=',$pavilion_type)->orwhere('with_event','=','')->get();

                                return view('admin.add_reservation_check_event',compact('in','out','event_type','pavk','events','rooms','pools'))->withErrors($message_bag);
                            }
                            else
                            {
                                $no_rooms = request('no_rooms');
                                $room_type = request('room_type');
                                $room_price = Rooms::where('type','=', $room_type)->get();
                                foreach ($room_price as  $room_price) {
                                    $price_room=$room_price->room_price;
                                }

                                $final_room_price = $price_room * $no_rooms;
                            }
                        }
                }

            }
            else
            {
                $no_rooms = request('no_rooms');
                $room_type = request('room_type');

                 $room_price = Rooms::where('type','=', $room_type)->get();
                foreach ($room_price as  $room_price) {
                    $price_room=$room_price->room_price;
                }

                $final_room_price = $price_room * $no_rooms;
            }
        }







			$food_checked=request('f_item');
			$services_checked=request('s_item');
			$totalf=0;
			$totals=0;
			$f_item=array();
			$s_item=array();

			if($food_checked!=""){
				foreach (request('f_item') as  $value) {

					$f_price=Events::where('item_name','=', $value)->get();
				
					$f_item= Events::where('item_name','=', $value)->pluck('item_name');
				}

				foreach ($f_price as $value) {
					$totalf += $value->item_price;
				}
				$pax = Events::where('category','=','foods')->pluck('add_price');
                    foreach($pax as $pax)
                    {
                        $add_pax_price = request('add_pax')*$pax;
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
			$total = ($totalf+$totals+request('pav_price')+$final_room_price+$final_pool_price+$add_pax_price)*$days;


    		$pool_type = request('pool_type');
   			$room_type = request('room_type');
    		$no_room =  request('no_rooms');




    		 $settings=settings::all();
			$service_type=request('service_type');
			$total=request('total');



			return view('customer.view_event_summary',compact('total','datums','service_type','f_item','s_item','reservation_type','pav_type','pav_price','pav_description','date_in','date_out','time_in','time_out','fname','lname','email','address','contact_no','gender','event_name','event_motif','pool_type','room_type','no_room','settings'));

		}


	}
}
