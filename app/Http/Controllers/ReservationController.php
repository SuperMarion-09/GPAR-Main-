<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Input;
use Response;
use DB;
use App\Rooms;
use App\Pools;
use App\Events;
use App\Reservation;
use App\Comments;
use DateTime;
use Validator;
use carbon\carbon;
use App\prereservations;
use Redirect;
use App\settings;
use Alert;

class ReservationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function viewPendingReservation()
    {
        $pending_r=prereservations::all();
        
        $date=Carbon::now();
        $accepted=reservation::where('reservation_in','>',$date)->get();
        
            $exp=reservation::where('reservation_in','<',$date)->get();
                foreach ($exp as  $value) {
                     Reservation::find($value->id)->delete();
                }

        return view('admin.view_pending_reservation',compact('pending_r','accepted'));
    }
    public function viewAcceptedReservation()
    {
        $pending_r=prereservations::all();
        $pending_p=prereservations::where('pool_type','!=','')->get();
        $pending_e=prereservations::where('pavilion_name','!=','')->get();
        $date=Carbon::now();
        $accepted=reservation::where('reservation_in','>',$date)->get();
        
            
            $exp=reservation::where('reservation_in','<',$date)->get();
                foreach ($exp as  $value) {
                     Reservation::find($value->id)->delete();
                }

        return view('admin.view_accepted_reservation',compact('pending_r','pending_p','pending_e','accepted'));
    }

    public function addReservation()
    {
        $rooms=Rooms::where('room_status','!=','0')->get();
        $pools=Pools::all();
        $events=Events::where('category','=','pavilion')->where('item_status','!=','0')->get();

        return view('admin.add_reservation', compact('rooms','pools','events'));
    }
    public function acceptReservation()
    {
        
    	if(request('service_type')=='pools')
        {


            Reservation::create([

                'reservation_type' => request('service_type'),
                'reservation_id' => '123'.rand(1,100000),
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
                'balance' => request('payment'),

                
                

            ]);
            $rooms=Rooms::all();
            $pools=Pools::all();
            $events=Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
            $accepted=reservation::all();
             $comments=comments::all();
             Alert::success('The reservation is succesfully accepted','Reservation Accepted')->persistent('Close');
            return redirect::route('index');

        }
        if(request('service_type')=='rooms')
        {


            Reservation::create([

                'reservation_type' => request('service_type'),
                'reservation_id' => '456'.rand(1,100000),
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
                'balance' => request('payment'),
                
                

            ]);
            $rooms=Rooms::all();
            $pools=Pools::all();
            $accepted=reservation::all();
            $events=Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
             $comments=comments::all();
              Alert::success('The reservation is succesfully accepted','Reservation Accepted')->persistent('Close');
            return redirect::route('index');

        }
        if(request('service_type')=='events')
        {
            $food=array();
            if(request('foods')!="")
            {
                foreach (request('foods') as $val) {
                    $food[]=$val;
                }
            }
            else
            {
                $food[]="";
            }
            $service=array();
            if(request('services')!="")
            {
                foreach (request('services') as $value) {
                    $service[]=$value;
                }
            }
            else
            {
                $service[]="";
            }

            $balance=0;

            $balance=request('total_price')-request('payment');



            $events = new Reservation;
            
            $events = Reservation::create([
                'reservation_id'=> '789'.rand(1,10000),
                'reservation_type' => request('service_type'),
                'reservation_in' => request('date_in'),
                'reservation_out' => request('date_out'),
                'time_in' => request('time_in'),
                'time_out' => request('time_out'),
                'fname' => request('fname'),
                'lname' => request('lname'),
                'address' => request('address'),
                'contact_no' => request('contact_no'),
                'email' => request('email'),
                'event_foods' => implode(',',$food),
                'event_service' => implode(',',$service),
                'price' => request('total_price'),
                'balance' => request('payment'),
            ]);
            $events->event_type=request('pav_name');
            $events->event_quantity='1';
            if(request('pool_type')!="")
            {
                $events->pool_type = request('pool_type');
                $events->pool_quantity = '1';
            }
            if(request('room_type')!="")
            {
                $events->room_type=request('room_type');
                $events->room_quantity=request('no_room');
            }
            $events->save();
            $rooms=Rooms::all();
            $pools=Pools::all();
            $accepted=reservation::all();
            $events=Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
            $comments=comments::all();
             Alert::success('The reservation is succesfully accepted','Reservation Accepted')->persistent('Close');
            return redirect::route('index');
        }




    }
    public function checkdate()
    {
        $pd=settings::where('id','=','1')->get();
        foreach($pd as $pds)
        {
            $pde=$pds->events_prior;
            $pdo=$pds->others_prior;
        }
        if(request('date_in') > request('date_out'))
            {
                return redirect::route('add_reservation')->withErrors(['token' => 'Error, the date are not valid!']);
            }
        $this->validate(request(),[
            'date_in' => 'required|after:yesterday',
        ]);

        if(request('service-type')=='poolserv')
        {

           

            $in=request('date_in');
            $out=request('date_out');
            $this->validate(request(),[
            'service-type' => 'required',
            'date_in' => 'required',
            'date_out' => 'required',
            'pool_name' => 'required',
            ]);


            if(Reservation::where('reservation_type','=','pools')->orwhere('reservation_type','=','events'))
            {


                $res = Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out)->where('reservation_type','=','pools');
                $pool_res = Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out)->where('reservation_type','=','events');

                if($pool_res->exists()){
                    $pool_res = Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out)->where('reservation_type','=','events')->get();

                    foreach ($pool_res as $pool_res) {
                        $reserve = Pools::where('with_event','=',$pool_res->event_type);
                        if($reserve->exists())
                        {
                                

                                
                                session()->flash('notif','Sorry this type of Pool is not available for this date!');
                                $pools=Pools::all();
                                $rooms=Rooms::all();
                                $events=Events::where('category','=','pavilion')->get();
                                return view('admin.add_reservation',compact('rooms','pools','events','date'));

                            
                        }
                    }
                }
                if($res->exists())
                {
                 $res = Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out)->get();

                 foreach ($res as  $res) 
                 {

                    if($res->pool_type==request('pool_name'))
                    {


                        $pool=Pools::where('pool_type','=', $res->pool_type)->get();

                        foreach ($pool as  $pol) 
                        {
                            $temp_pool_quantity=($res->pool_quantity - $pol->pool_quantity);


                        }


                        if($temp_pool_quantity==0)
                        {
                            session()->flash('notif','Sorry this type of Pool is not available for this date!');
                            $pools=Pools::all();
                            $rooms=Rooms::all();
                            $events=Events::where('category','=','pavilion')->get();
                            return view('admin.add_reservation',compact('rooms','pools','events','date'));

                        }


                    }

                }


            }
            else
            {
                session()->flash('notif','You may proceed we have pools to this date!');
                $s_type=request('service-type');
                $pool_type=request('pool_name');

                $poolk=Pools::where('pool_type','=',$pool_type)->get();


                return view('admin.add_reservation_check_pool',compact('in','out','pool_type','poolk'));
                
            }
        }





    }
    if(request('service-type')=='roomserve')
    {
        $this->validate(request(),[
            'service-type' => 'required',
            'date_in' => 'required',
            'date_out' => 'required',
            'room_name' => 'required',
        ]);
        $in=request('date_in');
        $out=request('date_out');


        if(Reservation::where('reservation_type','=','rooms'))
        {


            $res = Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out)->where('reservation_type','=','rooms')->where('room_type','=',request('room_name'));

            if($res->exists())
            {
             $res = Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out)->where('reservation_type','=','rooms')->where('room_type','=',request('room_name'))->get();
             foreach ($res as  $res) 
             {

                if($res->room_type==request('room_name'))
                {

                    $room=Rooms::where('type','=', $res->room_type)->get();
                    foreach ($room as  $rom) 
                    {
                        $temp_room_quantity=($rom->room_quantity-$res->room_quantity);
                    }
                    if($temp_room_quantity==0)
                    {
                        session()->flash('notif','Sorry this type of Room is not available for this date!');
                        $pools=Pools::all();
                        $rooms=Rooms::all();
                        $events=Events::where('category','=','pavilion')->get();
                        return view('admin.add_reservation',compact('rooms','pools','events','date'));
                    }
                    else
                    {
                        session()->flash('notif','You may proceed we have '.$temp_room_quantity.' rooms to this date!');
                        $s_type=request('service-type');
                        $room_type=request('room_name');

                        $roomk=Rooms::where('type','=',$room_type)->get();
                        $temp_room_quantity=$temp_room_quantity;

                        return view('admin.add_reservation_check_room',compact('in','out','room_type','roomk','temp_room_quantity'));
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

            return view('admin.add_reservation_check_room',compact('in','out','room_type','roomk','temp_room_quantity'));
        }
    }
}

if(request('service-type')=='eventserv')
{
    $this->validate(request(),[
            'service-type' => 'required',
            'date_in' => 'required',
            'date_out' => 'required',
            'pavilion_name' => 'required',
            ]);
    $in=request('date_in');
    $out=request('date_out');
    



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
                if($temp_event_quantity==0)
                {
                    session()->flash('notif','Sorry this type of Pavilion is not available for this date!');
                    $pools=Pools::all();
                    $rooms=Rooms::all();
                    $events=Events::where('category','=','pavilion')->get();
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
        $rooms=Rooms::where('room_status','!=','0')->get();
        $pools=Pools::where('pool_status','!=','0')->where('with_event','=',$pavilion_type)->orwhere('with_event','=','')->get();

        return view('admin.add_reservation_check_event',compact('in','out','event_type','pavk','events','rooms','pools'));

    }
}

}


}
public function checked()
{
    return view('admin.add_reservation_check');
}
public function summary(MessageBag $message_bag)
{
   
    $new_dayIn= new DateTime(request('date_in'));
    $new_dayOut= new DateTime(request('date_out'));
    $interval =$new_dayIn->diff($new_dayOut);
    $days = $interval->format('%a');
    if($days==0)
            {
                $days=1;
            }

    if (request('service-type')=='pool_type')
    {      
       
        $in = new DateTime(request('time_in'));
        $out = new DateTime(request('time_out'));
        $ti = $in->format('h:i a');
        $to = $out->format('h:i a');


        $reservation_type = request('service-type');
        $pool_type = request('pool_type');
        $pool_price = request('pool_price')*$days;
        $pool_description = request('pool_description');
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

        return view('admin.view_summary_pool',compact('service_type','date_in','date_out','time_in','time_out','fname','lname','email','address','contact_no','gender','pool_type','pool_price','pool_description'));

    }
    if (request('service-type')=='room_type')
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
        $contact_no = request('contact_no');
        $gender = request('gender');
        $room_quantity=request('room_quantity');

           
        if(request('room_quantity') > request('available_rooms'))
        {
            $v=request("available_rooms");
            $s_type=request('service-type');
            $room_type=request('room_type');

            $roomk=Rooms::where('type','=',$room_type)->get();
            $temp_room_quantity=request('available_rooms');
            $in=$date_in;
            $out=$date_out;
            return view('admin.add_reservation_check_room',compact('in','out','room_type','roomk','temp_room_quantity'))->withErrors(['token'=>'Sorry we only have '.$v.' of rooms']);
        }

        $totalr=0;
        $room = Rooms::where('type','=',$room_type)->get();
        foreach ($room as  $value) {
            $totalr = $value->room_price ;
        }
        $totalr=($totalr*$room_quantity)*$days;



        $service_type=request('service_type');
        return view('admin.view_summary_room',compact('room_reservation','totalr','service_type','reservation_type','room_type','room_price','room_description','date_in','date_out','time_in','time_out','fname','lname','email','address','contact_no','gender','room_quantity'));

    }
    if (request('service-type')=='event_type')
    {    
       
        $in = new DateTime(request('time_in'));
        $out = new DateTime(request('time_out'));
        $ti = $in->format('h:i a');
        $to = $out->format('h:i a');

        
        $reservation_type= request('service-type');
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
        $final_pool_price=0;
        if(request('pool_type')!="")
        {

            $pool_type = request('pool_type');
            $res = Reservation::whereDate('reservation_out','>=',request('date_in'))->whereDate('reservation_in','<=',request('date_out'))->where('reservation_type','=','pools');
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

                     return view('admin.add_reservation_check_event',compact('in','out','event_type','pavk','events','rooms','pools'))->withErrors(['token' => 'Sorry this type pool of is not available in this date!']);

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

$foods=array();
if($food_checked!=""){
    foreach ($food_checked as  $value) {
        $f_price=Events::where('item_name','=', $value)->pluck('item_price');
        foreach ($f_price as $value) {
            $totalf += $value;
        }
    }

     foreach ($food_checked as $food) {
            $foods[]=$food;
        }
}
else{
   $foods[]="";
}
$items=array();
if($services_checked!=""){
    foreach ($services_checked as  $value) {
        $s_price=Events::where('item_name','=', $value)->pluck('item_price');
        foreach ($s_price as $value) {
        $totals += $value;
    }

       
    }
    
     foreach($services_checked as $services)
        {
            $items[]=$services;
        }
}
else
{
    $items[]="";
}



$total=0;

$total = ($totalf+$totals+request('pav_price')+$final_room_price+$final_pool_price)*$days;



$pool_type = request('pool_type');
$room_type = request('room_type');
$no_room =  request('no_rooms');

$service_type=request('service_type');
return view('admin.view_summary_event',compact('total','datums','service_type','foods','items','reservation_type','pav_type','pav_price','pav_description','date_in','date_out','time_in','time_out','fname','lname','email','address','contact_no','gender','event_name','event_motif','pool_type','room_type','no_room'));

}



}

public function editBlade(Reservation $id)
{
    $reservation_kind = Reservation::where('id', $id->id)->get();
    foreach ($reservation_kind as $reservation_kind) 
    {   
        if($reservation_kind->reservation_type == 'pools')
        {
            $pool_service = Reservation::where('id', $id->id)->get();
            $pool_reservation = Pools::where('pool_status','!=','0')->get();
            return view('admin.edit_reservation_pool',compact('pool_service','pool_reservation'));
        }
        if($reservation_kind->reservation_type == 'rooms')
        {
            $room_service = Reservation::where('id', $id->id)->get();
            $room_reservation = Rooms::where('room_status','!=','0')->get();
            return view('admin.edit_reservation_room',compact('room_service','room_reservation'));
        }
        if($reservation_kind->reservation_type == 'events')
        {
            $event_service = Reservation::where('id', $id->id)->get();
            $pavilion = Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
            $event_reservation = Events::where('item_status','!=','0')->get();
            $event_food = Events::where('item_status','!=','0')->where('category','=','foods')->get();
            $event_item = Events::where('item_status','!=','0')->where('category','=','services')->get();
            $room_reservation = Rooms::where('room_status','!=','0')->get();
            $pool_reservation = Pools::where('pool_status','!=','0')->get();
            return view('admin.edit_reservation_event',compact('event_service','event_reservation','room_reservation','pool_reservation','pavilion','event_food','event_item'));
        }
    }
}
public function viewReservationDetail(Reservation $id)
{
    $reservation_kind = Reservation::where('id',$id->id)->get();
    foreach ($reservation_kind as $reservation_kind) 
    {


        if($reservation_kind->reservation_type == 'pools')
        {
            $pool_service = Reservation::where('id', $id->id)->get();
            
            return view('admin.view_reservation_pooldetails', compact('pool_service'));
        }
        if($reservation_kind->reservation_type == 'rooms')
        {
            $room_service = Reservation::where('id', $id->id)->get();

            return view('admin.view_reservation_roomdetails', compact('room_service'));
        }
        if($reservation_kind->reservation_type == 'events')
        {
            $event_service = Reservation::where('id', $id->id)->get();

            return view('admin.view_reservation_eventdetails', compact('event_service'));
        }
    }
}
public function updateReservationDetail(Reservation $id)
{
    $reservation_kind = Reservation::where('id', $id->id)->get();
    foreach ($reservation_kind as $reservation_kind)
    {
        $reservation_in = $reservation_kind->reservation_in;
        $reservation_out = $reservation_kind->reservation_out;

        if($reservation_kind->reservation_type == 'pools')
        {
            $reservation_in = $reservation_kind->reservation_in;
            $reservation_out = $reservation_kind->reservation_out;
            $fdate = $reservation_in;
            $tdate = $reservation_out;
            $datetime1 = new DateTime($fdate);
            $datetime2 = new DateTime($tdate);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
            if($days==0)
            {
                $days=1;
            }
            if(request('pool_type') != $reservation_kind->pool_type)
            {
                $res = Reservation::whereDate('reservation_out','>=',$reservation_in)->whereDate('reservation_in','<=',$reservation_out)->where('reservation_type','=','pools');


                if($res->exists())
                {

                    $res = Reservation::whereDate('reservation_out','>=',$reservation_in)->whereDate('reservation_in','<=',$reservation_out)->get();
                    foreach ($res as  $res) 
                    {

                        if($res->pool_type = request('pool_type'))
                        {
                            $pool=Pools::where('pool_type','=', $res->pool_type)->get();

                            foreach ($pool as  $pol) 
                            {
                                $temp_pool_quantity=($res->pool_quantity - $pol->pool_quantity);
                            }

                            if($temp_pool_quantity==0)
                            {
                                session()->flash('notif','Sorry the type of pool you want to reserve is not available for this date. Please pick up another date or type of pool.');
                                $pool_service = Reservation::where('id', $id->id)->get();
                                $pool_reservation = Pools::where('pool_status','!=','0')->get();

                                return view('admin.edit_reservation_pool', compact('pool_service','pool_reservation'));
                            }
                        }
                    }

                }
                else
                {
                 $this->validate(request(),[
                    'fname' => 'required',
                    'lname' => 'required',
                    'email' => 'required|email',
                    'contact_no' => 'required|numeric',
                    'address' => 'required',
                    'pool_type' => 'required',
                    'pool_pax' => 'required',
                ]);
                  $poo_price=Pools::where('pool_type','=',request('pool_type'))->pluck('pool_price');
                                   foreach($poo_price as $po)
                                    {
                                     $pool_price = $po;
                                    }
                 Reservation::where('id', $id->id)->update([
                    'fname' => request('fname'),
                    'lname' => request('lname'),
                    'email' => request('email'),
                    'contact_no' => request('contact_no'),
                    'address' => request('address'),
                    'pool_type' => request('pool_type'),
                    'pool_pax' => request('pool_pax'),
                    'price' => $pool_price,
                ]);
             }
         }
         else
         {
             $this->validate(request(),[
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'required|email',
                'contact_no' => 'required|numeric',
                'address' => 'required',
                'pool_type' => 'required',
                'pool_pax' => 'required',
            ]);
             $poo_price=Pools::where('pool_type','=',request('pool_type'))->pluck('pool_price');
             foreach($poo_price as $po)
             {
               $pool_price = $po;
           }

             Reservation::where('id', $id->id)->update([
                'fname' => request('fname'),
                'lname' => request('lname'),
                'email' => request('email'),
                'contact_no' => request('contact_no'),
                'address' => request('address'),
                'pool_type' => request('pool_type'),
                'pool_pax' => request('pool_pax'),
                'price' => $pool_price,
            ]);
         }
        }


    if($reservation_kind->reservation_type == 'rooms')
    {
         $reservation_in = $reservation_kind->reservation_in;
                $reservation_out = $reservation_kind->reservation_out;
                $fdate = $reservation_in;
                $tdate = $reservation_out;
                $datetime1 = new DateTime($fdate);
                $datetime2 = new DateTime($tdate);
                $interval = $datetime1->diff($datetime2);
                $days = $interval->format('%a');
                if($days==0)
                {
                    $days=1;
                }

            $room_price=0;   

        if(request('room_type') != $reservation_kind->room_type)
        {
             
            
            $reservation_in = $reservation_kind->reservation_in;
            $reservation_out = $reservation_kind->reservation_out;

            $res = Reservation::whereDate('reservation_out','>=',$reservation_in)->whereDate('reservation_in','<=',$reservation_out)->where('reservation_type','=','rooms')->where('room_type','=',request('room_type'));
            
            if($res->exists())
            {
                $res = Reservation::whereDate('reservation_out','>=',$reservation_in)->whereDate('reservation_in','<=',$reservation_out)->get();

                foreach ($res as  $res) 
                {
                   
                    if($res->room_type == request('room_type'))
                    {
                       
                        $room_no = Reservation::where('room_type','=',$res->room_type)->get();

                        if($room_no->count())
                        {
                            $room=Rooms::where('type','=', $res->room_type)->get();

                            foreach ($room_no as $room_no)
                             {

                                                    foreach ($room as  $rom) 
                                                    {
                                                       if(request('no_rooms') > $rom->room_quantity)
                                                       {
                                                        session()->flash('notif','Sorry we have only '.$rom->room_quantity.' rooms!');

                                                        $room_service = Reservation::where('id', $id->id)->get();
                                                        $room_reservation = Rooms::where('room_status','!=','0')->get();
                                                        return view('admin.edit_reservation_room',compact('room_service','room_reservation','temp_room_quantity'));
                                                        }
                                                        else
                                                        {
                                                            $temp_room_quantity = $res->room_quantity - $rom->room_quantity;
                                                        }

                                                    }

                            }


                        if($temp_room_quantity=='0')
                        {
                            session()->flash('notif','No Available Rooms for this date, sorry.');

                            $room_service = Reservation::where('id', $id->id)->get();
                            $room_reservation = Rooms::where('room_status','!=','0')->get();
                            return view('admin.edit_reservation_room',compact('room_service','room_reservation'));
                        }

                        if(request('no_rooms') > $temp_room_quantity)
                        {
                           session()->flash('notif','Sorry we have only '.$temp_room_quantity.' rooms to this date!');

                           $room_service = Reservation::where('id', $id->id)->get();
                           $room_reservation = Rooms::where('room_status','!=','0')->get();
                           return view('admin.edit_reservation_room',compact('room_service','room_reservation','temp_room_quantity'));
                       }

                       $this->validate(request(),[
                        'fname' => 'required',
                        'lname' => 'required',
                        'email' => 'required|email',
                        'contact_no' => 'required|numeric',
                        'address' => 'required',
                        'room_type' => 'required',
                        'no_rooms' => 'required',
                    ]);
                       $roo_price=Rooms::where('room_type','=',request('room_type'))->pluck('room_price');
                       foreach($roo_price as $ro)
                       {
                         $ro_price = $ro;
                     }
                     $room_price=($ro_price*request('no_rooms'))*$days;
                       Reservation::where('id', $id->id)->update([
                        'fname' => request('fname'),
                        'lname' => request('lname'),
                        'email' => request('email'),
                        'contact_no' => request('contact_no'),
                        'address' => request('address'),
                        'room_type' => request('room_type'),
                        'room_quantity' => request('no_rooms'),
                        'price' => $room_price,
                    ]);
                        }
                        else
                        {

                            $this->validate(request(),[
                                'fname' => 'required',
                                'lname' => 'required',
                                'email' => 'required|email',
                                'contact_no' => 'required|numeric',
                                'address' => 'required',
                                'room_type' => 'required',
                                'no_rooms' => 'required',
                            ]);
                            $roo_price=Rooms::where('room_type','=',request('room_type'))->pluck('room_price');
                            foreach($roo_price as $ro)
                            {
                             $ro_price = $ro;
                         }
                         $room_price=($ro_price*request('no_rooms'))*$days;
                            Reservation::where('id', $id->id)->update([
                                'fname' => request('fname'),
                                'lname' => request('lname'),
                                'email' => request('email'),
                                'contact_no' => request('contact_no'),
                                'address' => request('address'),
                                'room_type' => request('room_type'),
                                'room_quantity' => request('no_rooms'),
                                'price' => $room_price,
                            ]);
                        }
                    }
                }
            }
            else
            {

                $this->validate(request(),[
                    'fname' => 'required',
                    'lname' => 'required',
                    'email' => 'required|email',
                    'contact_no' => 'required|numeric',
                    'address' => 'required',
                    'room_type' => 'required',
                    'no_rooms' => 'required',
                ]);
                $roo_price=Rooms::where('room_type','=',request('room_type'))->pluck('room_price');
                foreach($roo_price as $ro)
                {
                   $ro_price = $ro;
               }
               $room_price=($ro_price*request('no_rooms'))*$days;
                Reservation::where('id', $id->id)->update([
                    'fname' => request('fname'),
                    'lname' => request('lname'),
                    'email' => request('email'),
                    'contact_no' => request('contact_no'),
                    'address' => request('address'),
                    'room_type' => request('room_type'),
                    'room_quantity' => request('no_rooms'),
                    'price' => $room_price,
                ]);
            }
        }
        else
        {
            $res = Reservation::whereDate('reservation_out','>=',$reservation_in)->whereDate('reservation_in','<=',$reservation_out)->where('reservation_type','=','rooms');

            if($res->exists())
             {

                 $res = Reservation::whereDate('reservation_out','>=',$reservation_in)->whereDate('reservation_in','<=',$reservation_out)->get();
    foreach ($res as  $res) 
    {


        if($res->room_type == request('room_type'))
        {
          $room_no = Reservation::where('room_type','=',$res->room_type)->get();

                    $room=Rooms::where('type','=', $res->room_type)->get();
                    foreach ($room_no as $room_no) 
                    {
                        foreach ($room as  $rom) 
                        {
                            $temp_room_quantity=($rom->room_quantity-$room_no->room_quantity);
                        }
                    }
            if($temp_room_quantity=='0')
            {
                session()->flash('notif','No Available Rooms for this date, sorry.');

                $room_service = Reservation::where('id', $id->id)->get();
                $room_reservation = Rooms::where('room_status','!=','0')->get();
                return view('admin.edit_reservation_room',compact('room_service','room_reservation'));
            }

            if(request('no_rooms') > $temp_room_quantity)
            {
                session()->flash('notif','Sorry we have only '.$temp_room_quantity.' rooms to this date!');

                $room_service = Reservation::where('id', $id->id)->get();
                $room_reservation = Rooms::where('room_status','!=','0')->get();
                return view('admin.edit_reservation_room',compact('room_service','room_reservation','temp_room_quantity'));
            }
            else
            {

                $this->validate(request(),[
                    'fname' => 'required',
                    'lname' => 'required',
                    'email' => 'required|email',
                    'contact_no' => 'required|numeric',
                    'address' => 'required',
                    'room_type' => 'required',
                    'no_rooms' => 'required',
                ]);
                $roo_price=Rooms::where('room_type','=',request('room_type'))->pluck('room_price');
                foreach($roo_price as $ro)
                {
                   $ro_price = $ro;
               }
               $room_price=($ro_price*request('no_rooms'))*$days;
                Reservation::where('id', $id->id)->update([
                    'fname' => request('fname'),
                    'lname' => request('lname'),
                    'email' => request('email'),
                    'contact_no' => request('contact_no'),
                    'address' => request('address'),
                    'room_type' => request('room_type'),
                    'room_quantity' => request('no_rooms'),
                    'price' => $room_price,
                ]);
            }
        }
    }

             }

            else
            {
                $this->validate(request(),[
                    'fname' => 'required',
                    'lname' => 'required',
                    'email' => 'required|email',
                    'contact_no' => 'required|numeric',
                    'address' => 'required',
                    'room_type' => 'required',
                    'no_rooms' => 'required',
                ]);
                $roo_price=Rooms::where('room_type','=',request('room_type'))->pluck('room_price');
                foreach($roo_price as $ro)
                {
                   $ro_price = $ro;
               }
               $room_price=($ro_price*request('no_rooms'))*$days;
                Reservation::where('id', $id->id)->update([
                    'fname' => request('fname'),
                    'lname' => request('lname'),
                    'email' => request('email'),
                    'contact_no' => request('contact_no'),
                    'address' => request('address'),
                    'room_type' => request('room_type'),
                    'room_quantity' => request('no_rooms'),
                    'price' => $room_price,
                ]);
            }
        }   
    }
    if($reservation_kind->reservation_type == 'events')
        {

            $add_pax_price=0;
            $totalf=0;
            $totals=0;
            $pool_price=0;
            $room_price=0;
            $reservation_in = $reservation_kind->reservation_in;
            $reservation_out = $reservation_kind->reservation_out;
            $reservation_in = $reservation_kind->reservation_in;
            $reservation_out = $reservation_kind->reservation_out;
            $fdate = $reservation_in;
            $tdate = $reservation_out;
            $datetime1 = new DateTime($fdate);
            $datetime2 = new DateTime($tdate);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
             if($days==0)
                {
                    $days=1;
                }

               

            if(request('pav_type') != $reservation_kind->event_type)
            {
                $res = Reservation::whereDate('reservation_out','>=',$reservation_in)->whereDate('reservation_in','<=',$reservation_out)->where('reservation_type','=','events');

                if($res->exists())
                {

                    $res = Reservation::whereDate('reservation_out','>=',$reservation_in)->whereDate('reservation_in','<=',$reservation_out)->get();
                    foreach ($res as  $res) 
                    {

                        if($res->event_type = request('pav_type'))
                        {
                            $event=Events::where('item_name','=', $res->event_type)->get();

                            foreach ($event as  $event) 
                            {
                                $temp_event_quantity=($res->event_quantity - $event->pavilion_quantity);
                            }

                            if($temp_event_quantity==0)
                            {
                                session()->flash('notif','Sorry the type of pavilion you want to reserve is not available for this date. Please pick up another date or type of pavilion.');
                                $event_service = Reservation::where('id', $id->id)->get();
                                $pavilion = Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
                                $event_reservation = Events::where('item_status','!=','0')->get();
                                $event_food = Events::where('item_status','!=','0')->where('category','=','foods')->get();
                                $event_item = Events::where('item_status','!=','0')->where('category','=','services')->get();
                                $room_reservation = Rooms::where('room_status','!=','0')->get();
                                $pool_reservation = Pools::where('pool_status','!=','0')->get();
                                return view('admin.edit_reservation_event',compact('event_service','event_reservation','room_reservation','pool_reservation','pavilion','event_food','event_item'));
                            }
                        }
                    }

                }
                else
                {
                    $this->validate(request(),[
                        'fname' => 'required',
                        'lname' => 'required',
                        'email' => 'required|email',
                        'contact_no' => 'required|numeric',
                        'address' => 'required',
                        'pav_type' => 'required',
                       
                    ]);
                   
                    $res=Events::where('category','=','pavilion')->where('item_name','=',request('pav_type'))->pluck('item_price');
                    foreach($res as $res)
                    {
                        $pav_price = $res;
                    }
                    if(request('foods')!="")
                    {   foreach(request('foods') as $food)
                        {
                            $f_price = Events::where('item_name','=', $food)->pluck('item_price');
                            foreach($f_price as $value)
                            {
                                $totalf += $value; 
                            }
                        }
                        $food=array();
                        foreach(request('foods') as $fod)
                        {
                            $food[]=$fod;
                        }

                        $pax = Events::where('category','=','foods')->pluck('add_price');
                        foreach($pax as $pax)
                        {
                            $add_pax_price = request('add_pax')*$pax;
                        }
                    }
                    if(request('services')!="")
                    {
                        foreach(request('services') as $service)
                        {
                            $s_price = Events::where('item_name','=', $service)->pluck('item_price');
                            foreach($s_price as $value)
                            {
                                $totals += $value; 
                            }
                        }
                        $service=array();
                        foreach(request('services') as $servic)
                        {
                            $service[]=$servic;
                        }
                    }

                    

                     Reservation::where('id', $id->id)->update([
                        'fname' => request('fname'),
                        'lname' => request('lname'),
                        'email' => request('email'),
                        'contact_no' => request('contact_no'),
                        'address' => request('address'),
                        'event_type' => request('pav_type'),
                        'add_pax' => request('add_pax'),
                        'event_foods' => implode(',',$food),
                        'event_service' => implode(',',$service),
                        'event_pax' => request('add_pax'),
                    ]);
                }
            }
            else
            {


             $this->validate(request(),[
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'required|email',
                'contact_no' => 'required|numeric',
                'address' => 'required',
                
                
            ]);
           
                $res=Events::where('category','=','pavilion')->where('item_name','=',request('pav_type'))->pluck('item_price');
                foreach($res as $res)
                {
                    $pav_price = $res;
                }
                 
                if(request('foods')!="")
                {   foreach(request('foods') as $food)
                    {
                        $f_price = Events::where('item_name','=', $food)->pluck('item_price');
                        foreach($f_price as $value)
                        {
                            $totalf += $value; 
                        }
                    }

                    $food=array();
                    foreach(request('foods') as $fod)
                    {
                        $food[]=$fod;
                    }

                    $pax = Events::where('category','=','foods')->pluck('add_price');
                    foreach($pax as $pax)
                    {
                        $add_pax_price = request('add_pax')*$pax;
                    }
                }
                if(request('services')!="")
                {
                    foreach(request('services') as $service)
                    {
                        $s_price = Events::where('item_name','=', $service)->pluck('item_price');
                        foreach($s_price as $value)
                        {
                            $totals += $value; 
                        }
                    }
                    $service=array();
                    foreach(request('services') as $servic)
                    {
                        $service[]=$servic;
                    }
                }
             Reservation::where('id', $id->id)->update([
                'fname' => request('fname'),
                'lname' => request('lname'),
                'email' => request('email'),
                'contact_no' => request('contact_no'),
                'address' => request('address'),
                'event_type' => request('pav_type'),
                'event_foods' => implode(',',$food),
                'event_service' => implode(',',$service),
                'event_pax' => request('add_pax'),
            ]);

            }

            if(request('pool_type')!="")
            {
              

                $reservation_in = $reservation_kind->reservation_in;
                $reservation_out = $reservation_kind->reservation_out;
                $pool_res = Reservation::where('reservation_type','=','events')->where('id','=',$id->id)->get();
                foreach($pool_res as $resi)
                {
                    if(request('pool_type') != $resi->pool_type)
                    {
                        $res = Reservation::whereDate('reservation_out','>=',$reservation_in)->whereDate('reservation_in','<=',$reservation_out)->where('pool_type','=',request('pool_type'));


                        if($res->exists())
                        {

                            $res = Reservation::whereDate('reservation_out','>=',$reservation_in)->whereDate('reservation_in','<=',$reservation_out)->get();
                            foreach ($res as  $res) 
                            {

                                if($res->pool_type = request('pool_type'))
                                {
                                    $pool=Pools::where('pool_type','=', $res->pool_type)->get();

                                    foreach ($pool as  $pol) 
                                    {
                                        $temp_pool_quantity=($res->pool_quantity - $pol->pool_quantity);
                                    }

                                    if($temp_pool_quantity==0)
                                    {
                                        session()->flash('notif','Sorry the type of pool you want to reserve is not available for this date. Please pick up another date or type of pool.');
                                        $event_service = Reservation::where('id', $id->id)->get();
                                        $pavilion = Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
                                        $event_reservation = Events::where('item_status','!=','0')->get();
                                        $event_food = Events::where('item_status','!=','0')->where('category','=','foods')->get();
                                        $event_item = Events::where('item_status','!=','0')->where('category','=','services')->get();
                                        $room_reservation = Rooms::where('room_status','!=','0')->get();
                                        $pool_reservation = Pools::where('pool_status','!=','0')->get();
                                        return view('admin.edit_reservation_event',compact('event_service','event_reservation','room_reservation','pool_reservation','pavilion','event_food','event_item'));
                                    }
                                }
                            }

                        }
                        else
                        {
                           if(request('pool_type')=='no_pool')
                           {

                             $poo_price=Pools::where('pool_type','=',request('pool_type'))->pluck('pool_price');
                             foreach($poo_price as $po)
                             {
                                 $pool_price =-$po;
                             }
                             Reservation::where('id', $id->id)->update([

                                'pool_type' => "",                    
                            ]);
                         }
                         else{
                           $this->validate(request(),[
                           'pool_type' => 'required',
                           
                           ]);
                           $poo_price=Pools::where('pool_type','=',request('pool_type'))->pluck('pool_price');
                                   foreach($poo_price as $po)
                                    {
                                     $pool_price = $po;
                                    }

                           Reservation::where('id', $id->id)->update([
                           'pool_type' => request('pool_type'),
                           
                           ]);
                       }
                        }
                    }
                    else
                    {
                       if(request('pool_type')=='no_pool')
                       {
                          
                           $poo_price=Pools::where('pool_type','=',request('pool_type'))->pluck('pool_price');
                           foreach($poo_price as $po)
                           {
                               $pool_price =-$po;
                           }
                            Reservation::where('id', $id->id)->update([

                            'pool_type' => "",                    
                        ]);
                       }
                       else{
                            $this->validate(request(),[
                           'pool_type' => 'required',
                           
                           ]);
                           $poo_price=Pools::where('pool_type','=',request('pool_type'))->pluck('pool_price');
                                   foreach($poo_price as $po)
                                    {
                                     $pool_price = $po;
                                    }

                           Reservation::where('id', $id->id)->update([
                           'pool_type' => request('pool_type'),
                          
                           ]);
                       }
                    }
                }

            }

            if(request('room_type') != "")
            {
               
               

                $room_res = Reservation::where('reservation_type','=','events')->where('id','=',$id->id)->get();
             foreach($room_res as $resr)
            {
                if($request('room_type') != $resr->room_type)
                {
                    $res = Reservation::whereDate('reservation_out','>=',$reservation_in)->whereDate('reservation_in','<=',$reservation_out)->where('room_type','=',request('room_type'));
                    if($res->exists())
                    {
                        $res = Reservation::whereDate('reservation_out','>=',$reservation_in)->whereDate('reservation_in','<=',$reservation_out)->get();

                        foreach ($res as  $res) 
                        {
                   
                                if($res->room_type == request('room_type'))
                                {
                               
                                        $room_no = Reservation::where('room_type','=',$res->room_type)->get();

                                        if($room_no->count())
                                        {
                                            $room=Rooms::where('type','=', $res->room_type)->get();

                                            foreach ($room_no as $room_no)
                                             {

                                                                    foreach ($room as  $rom) 
                                                                    {
                                                                       if(request('no_rooms') > $rom->room_quantity)
                                                                       {
                                                                        session()->flash('notif','Sorry we have only '.$rom->room_quantity.' rooms.');
                                                                         $event_service = Reservation::where('id', $id->id)->get();
                                                                         $pavilion = Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
                                                                         $event_reservation = Events::where('item_status','!=','0')->get();
                                                                         $event_food = Events::where('item_status','!=','0')->where('category','=','foods')->get();
                                                                         $event_item = Events::where('item_status','!=','0')->where('category','=','services')->get();
                                                                         $room_reservation = Rooms::where('room_status','!=','0')->get();
                                                                         $pool_reservation = Pools::where('pool_status','!=','0')->get();
                                                                         return view('admin.edit_reservation_event',compact('event_service','event_reservation','room_reservation','pool_reservation','pavilion','event_food','event_item'));
                                                                        }
                                                                        else
                                                                        {
                                                                            $temp_room_quantity = $res->room_quantity - $rom->room_quantity;
                                                                        }

                                                                    }

                                            }


                                        if($temp_room_quantity=='0')
                                        {
                                            session()->flash('notif','Sorry the type of room you want to reserve is not available for this date. Please pick up another date or type of room.');
                                           $event_service = Reservation::where('id', $id->id)->get();
                                           $pavilion = Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
                                           $event_reservation = Events::where('item_status','!=','0')->get();
                                           $event_food = Events::where('item_status','!=','0')->where('category','=','foods')->get();
                                           $event_item = Events::where('item_status','!=','0')->where('category','=','services')->get();
                                           $room_reservation = Rooms::where('room_status','!=','0')->get();
                                           $pool_reservation = Pools::where('pool_status','!=','0')->get();
                                           return view('admin.edit_reservation_event',compact('event_service','event_reservation','room_reservation','pool_reservation','pavilion','event_food','event_item'));
                                        }

                                        if(request('no_rooms') > $temp_room_quantity)
                                        {
                                           session()->flash('notif','Sorry we have only '.$temp_room_quantity.' rooms to this date!');
                                           $event_service = Reservation::where('id', $id->id)->get();
                                           $pavilion = Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
                                           $event_reservation = Events::where('item_status','!=','0')->get();
                                           $event_food = Events::where('item_status','!=','0')->where('category','=','foods')->get();
                                           $event_item = Events::where('item_status','!=','0')->where('category','=','services')->get();
                                           $room_reservation = Rooms::where('room_status','!=','0')->get();
                                           $pool_reservation = Pools::where('pool_status','!=','0')->get();
                                           return view('admin.edit_reservation_event',compact('event_service','event_reservation','room_reservation','pool_reservation','pavilion','event_food','event_item'));
                                       }

                                       $this->validate(request(),[
                                        'fname' => 'required',
                                        'lname' => 'required',
                                        'email' => 'required|email',
                                        'contact_no' => 'required|numeric',
                                        'address' => 'required',
                                        'room_type' => 'required',
                                        'no_rooms' => 'required',
                                    ]);
                                    $roo_price=Rooms::where('room_type','=',request('room_type'))->pluck('room_price');
                                               foreach($roo_price as $ro)
                                                {
                                                 $ro_price = $ro;
                                                }
                                        $room_price=$ro_price*request('no_rooms');
                                       Reservation::where('id', $id->id)->update([
                                        'room_type' => request('room_type'),
                                        'room_quantity' => request('no_rooms'),
                                    ]);
                                        }
                                        else
                                        {

                                            $this->validate(request(),[
                                                'fname' => 'required',
                                                'lname' => 'required',
                                                'email' => 'required|email',
                                                'contact_no' => 'required|numeric',
                                                'address' => 'required',
                                                'room_type' => 'required',
                                                'no_rooms' => 'required',
                                            ]);
                                            $roo_price=Rooms::where('room_type','=',request('room_type'))->pluck('room_price');
                                                       foreach($roo_price as $ro)
                                                        {
                                                         $ro_price = $ro;
                                                        }
                                                $room_price=$ro_price*request('no_rooms');
                                            Reservation::where('id', $id->id)->update([
                                                'room_type' => request('room_type'),
                                                'room_quantity' => request('no_rooms'),
                                            ]);
                                        }
                                }
                        }
                    }
                    else
                    {
                         if(request('no_room')=='no_room')
                    {
                        
                           $roo_price=Rooms::where('room_type','=',request('room_type'))->pluck('room_price');
                           foreach($roo_price as $ro)
                           {
                               $room_price =$ro;
                           }
                            $num=Reservation::where('room_type','!=',"")->pluck('room_quantity');
                            foreach($num as $num)
                           {
                               $num_room =$num;
                           }
                            $room_price=-($ro_price*$num_room);
                            Reservation::where('id', $id->id)->update([

                            'room_type' => "",                    
                        ]);
                    }
                    else{
                        $this->validate(request(),[
                            'fname' => 'required',
                            'lname' => 'required',
                            'email' => 'required|email',
                            'contact_no' => 'required|numeric',
                            'address' => 'required',
                            'room_type' => 'required',
                            'no_rooms' => 'required',
                        ]);
                        $roo_price=Rooms::where('room_type','=',request('room_type'))->pluck('room_price');
                                               foreach($roo_price as $ro)
                                                {
                                                 $ro_price = $ro;
                                                }
                                        $room_price=$ro_price*request('no_rooms');
                        Reservation::where('id', $id->id)->update([
                            'room_type' => request('room_type'),
                            'room_quantity' => request('no_rooms'),
                        ]);
                    }
                    }
                }
                else
                {
                     if(request('no_room')=='no_room')
                    {
                        
                           $roo_price=Rooms::where('room_type','=',request('room_type'))->pluck('room_price');
                           foreach($roo_price as $ro)
                           {
                               $room_price =$ro;
                           }
                            $num=Reservation::where('room_type','!=',"")->pluck('room_quantity');
                            foreach($num as $num)
                           {
                               $num_room =$num;
                           }
                            $room_price=-($ro_price*$num_room);
                            Reservation::where('id', $id->id)->update([

                            'room_type' => "",                    
                        ]);
                    }
                    else{
                   $res = Reservation::whereDate('reservation_out','>=',$reservation_in)->whereDate('reservation_in','<=',$reservation_out)->where('reservation_type','=','rooms');

                    if($res->exists())
                    {

                        $res = Reservation::whereDate('reservation_out','>=',$reservation_in)->whereDate('reservation_in','<=',$reservation_out)->get();
                        foreach ($res as  $res) 
                        {
                            if($res->room_type == request('room_type'))
                            {
                                  $room_no = Reservation::where('room_type','=',$res->room_type)->get();

                                  $room=Rooms::where('type','=', $res->room_type)->get();
                                  foreach ($room_no as $room_no) 
                                    {
                                        foreach ($room as  $rom) 
                                        {
                                            $temp_room_quantity=($rom->room_quantity-$room_no->room_quantity);
                                        }
                                    }
                                  if($temp_room_quantity=='0')
                                    {
                                        session()->flash('notif','No Available Rooms for this date, sorry.');
                                        $event_service = Reservation::where('id', $id->id)->get();
                                        $pavilion = Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
                                        $event_reservation = Events::where('item_status','!=','0')->get();
                                        $event_food = Events::where('item_status','!=','0')->where('category','=','foods')->get();
                                        $event_item = Events::where('item_status','!=','0')->where('category','=','services')->get();
                                        $room_reservation = Rooms::where('room_status','!=','0')->get();
                                        $pool_reservation = Pools::where('pool_status','!=','0')->get();
                                        return view('admin.edit_reservation_event',compact('event_service','event_reservation','room_reservation','pool_reservation','pavilion','event_food','event_item'));
                                    }

                                  if(request('no_rooms') > $temp_room_quantity)
                                    {
                                        session()->flash('notif','Sorry we have only '.$temp_room_quantity.' rooms to this date!');

                                        $event_service = Reservation::where('id', $id->id)->get();
                                        $pavilion = Events::where('category','=','pavilion')->where('item_status','!=','0')->get();
                                        $event_reservation = Events::where('item_status','!=','0')->get();
                                        $event_food = Events::where('item_status','!=','0')->where('category','=','foods')->get();
                                        $event_item = Events::where('item_status','!=','0')->where('category','=','services')->get();
                                        $room_reservation = Rooms::where('room_status','!=','0')->get();
                                        $pool_reservation = Pools::where('pool_status','!=','0')->get();
                                        return view('admin.edit_reservation_event',compact('event_service','event_reservation','room_reservation','pool_reservation','pavilion','event_food','event_item'));
                                    }
                                    else
                                    {

                                        $this->validate(request(),[
                                            'fname' => 'required',
                                            'lname' => 'required',
                                            'email' => 'required|email',
                                            'contact_no' => 'required|numeric',
                                            'address' => 'required',
                                            'room_type' => 'required',
                                            'no_rooms' => 'required',
                                        ]);
                                        $roo_price=Rooms::where('room_type','=',request('room_type'))->pluck('room_price');
                                                           foreach($roo_price as $ro)
                                                            {
                                                             $ro_price = $ro;
                                                            }
                                                    $room_price=$ro_price*request('no_rooms');
                                        Reservation::where('id', $id->id)->update([
                                            'room_type' => request('room_type'),
                                            'room_quantity' => request('no_rooms'),
                                        ]);
                                    }
                        }
                    }

                }

                else{
                        $this->validate(request(),[
                            'fname' => 'required',
                            'lname' => 'required',
                            'email' => 'required|email',
                            'contact_no' => 'required|numeric',
                            'address' => 'required',
                            'room_type' => 'required',
                            'no_rooms' => 'required',
                        ]);
                        $roo_price=Rooms::where('room_type','=',request('room_type'))->pluck('room_price');
                                                   foreach($roo_price as $ro)
                                                    {
                                                     $ro_price = $ro;
                                                    }
                                            $room_price=$ro_price*request('no_rooms');
                        Reservation::where('id', $id->id)->update([
                            'room_type' => request('room_type'),
                            'room_quantity' => request('no_rooms'),
                        ]);
                    }
                }
                }   
            }
            }









        $total_price=0;
       
        $total_price=($pav_price+$add_pax_price+$totals+$totalf+$room_price+$pool_price)*$days;

        
        
         Reservation::where('id', $id->id)->update([
        'price' => $total_price,
    ]);
     }




    $accepted=reservation::all();
    $comments=comments::all();
     Alert::success('The reservation is succesfully updated','Reservation Updated')->persistent('Close');
    return redirect::route('home');

    }

}
public function destroy()
{

    Reservation::find(request('deleted_reservation'))->forceDelete();

    $accepted=Reservation::all();
    $comments=comments::all();
     Alert::success('The reservation is succesfully deleted','Reservation Deleted')->persistent('Close');
    return redirect::route('home');

}
public function destroy_pending()
{
    
    prereservations::find(request('deleted_reservation'))->forceDelete();

    $accepted=Reservation::all();
    $comments=comments::all();
     Alert::success('The pending reservation is succesfully deleted','Reservation Deleted')->persistent('Close');
    return redirect::route('home');

}
public function acceptpending()
{

    $res=prereservations::where('id','=',request('reservation'))->get();
    foreach ($res as $reservation)
     {

        $in=$reservation->reservation_in;
        $out=$reservation->reservation_out;
        if($reservation->reservation_type=="pools")
        {
            $check=Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out)->where('pool_type','=',$reservation->pool_type);
            if($check->exists())
            {
                return redirect::route('home')->withErrors(['token'=>'Not Available']);
            }
            else
            {
              
                Reservation::create([

                    'reservation_type' => $reservation->reservation_type,
                    'reservation_id' => '123'.rand(1,100000),
                    'reservation_in' => $in,
                    'reservation_out' => $out,
                    'time_in' => $reservation->time_in,
                    'time_out' => $reservation->time_out,
                    'fname' => $reservation->fname,
                    'lname' => $reservation->lname,
                    'address' => $reservation->address,
                    'contact_no' => $reservation->contact_no,
                    'email' => $reservation->email,
                    'pool_type' => $reservation->pool_type,
                    'price' => $reservation->price,
                    'balance' => request('payment'),

                ]);
                prereservations::find(request('reservation'))->forceDelete();
                 Alert::success('The reservation is succesfully accepted','Reservation Accepted')->persistent('Close');
                return redirect::route('home');


                
            }
        }
          if($reservation->reservation_type=="rooms")
        {
            $check=Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out)->where('pool_type','=',$reservation->room_type);
            if($check->exists())
            {
                $room=Rooms::where('room_quantity','<=',$reservation->room_quantity);
                if($room->count())
                {
                     Reservation::create([

                    'reservation_type' => $reservation->reservation_type,
                    'reservation_id' => '123'.rand(1,100000),
                    'reservation_in' => $in,
                    'reservation_out' => $out,
                    'time_in' => $reservation->time_in,
                    'time_out' => $reservation->time_out,
                    'fname' => $reservation->fname,
                    'lname' => $reservation->lname,
                    'address' => $reservation->address,
                    'contact_no' => $reservation->contact_no,
                    'email' => $reservation->email,
                    'room_type' => $reservation->room_type,
                    'room_quantity' => $reservation->room_quantity,
                    'price' => $reservation->price,
                    'balance' => request('payment'),

                ]);
                      prereservations::find(request('reservation'))->forceDelete();
                }
                else
                {
                    return redirect::route('home')->withErrors(['token'=>'Not Available']);

                }
            }
            else
            {
              
               Reservation::create([

                    'reservation_type' => $reservation->reservation_type,
                    'reservation_id' => '123'.rand(1,100000),
                    'reservation_in' => $in,
                    'reservation_out' => $out,
                    'time_in' => $reservation->time_in,
                    'time_out' => $reservation->time_out,
                    'fname' => $reservation->fname,
                    'lname' => $reservation->lname,
                    'address' => $reservation->address,
                    'contact_no' => $reservation->contact_no,
                    'email' => $reservation->email,
                    'room_type' => $reservation->room_type,
                    'room_quantity' => $reservation->room_quantity,
                    'price' => $reservation->price,
                    'balance' => request('payment'),

                ]);
                prereservations::find(request('reservation'))->forceDelete();
            }

        } 
        if($reservation->reservation_type=="events")
        {
            $check=Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out)->where('event_type','=',$reservation->pavilion_name);

            if($check->exists())
            {
               
                return redirect::route('home')->withErrors(['token'=>'Not Available']);

            }
            else
            {

                $check=Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out)->where('pool_type','=',$reservation->pool_type);

                if($check->exists())
                {

                    return redirect::route('home')->withErrors(['token'=>'Not Available']);
                }
                $checkr=Reservation::whereDate('reservation_out','>=',$in)->whereDate('reservation_in','<=',$out)->where('pool_type','=',$reservation->room_type);
                    if($checkr->exists())
                    {
                        $room=Rooms::where('room_quantity','<=',$reservation->room_quantity);
                        if($room->count())
                        {
                        

                        
                         }
                         else
                         {
                            return redirect::route('home')->withErrors(['token'=>'Not Available']);
                         }
                    }
            
               $user=Reservation::create([

                    'reservation_type' => $reservation->reservation_type,
                    'reservation_id' => '123'.rand(1,100000),
                    'reservation_in' => $in,
                    'reservation_out' => $out,
                    'time_in' => $reservation->time_in,
                    'time_out' => $reservation->time_out,
                    'fname' => $reservation->fname,
                    'lname' => $reservation->lname,
                    'address' => $reservation->address,
                    'contact_no' => $reservation->contact_no,
                    'email' => $reservation->email,
                    'pool_type' => $reservation->pool_type,
                    'event_type' => $reservation->pavilion_name,
                    'event_details' => $reservation->event_name.",".$reservation->event_motif,
                    'event_foods' => $reservation->foods,
                    'event_service' => $reservation->services,
                    'room_type' => $reservation->room_type,
                    'room_quantity' => $reservation->room_quantity,
                    'price' => $reservation->price,
                    'balance' => request('payment'),

                ]);


                prereservations::find(request('reservation'))->forceDelete();
            }
            
        } 
    }
     Alert::success('The reservation is succesfully accepted','Reservation Accepted')->persistent('Close');
    return redirect::route('home');
    
}
}







