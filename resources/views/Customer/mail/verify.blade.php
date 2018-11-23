<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        <div>
            @include('sweet::alert')
            Please enter the cerification code that we send to your email. Thank You!
            <form action="/reservation/summary/verified" method="POST">
                {{csrf_field()}}
            <input type="text" name="verification">
            <input type="hidden" name="service_type" value="{{$service_type}}">

            @if($service_type == 'pool_type')
            
            <input type="hidden" name="date_in" value="{{$date_in}}">
            <input type="hidden" name="date_out" value="{{$date_out}}">
            <input type="hidden" name="time_in" value="{{$time_in}}">
            <input type="hidden" name="time_out" value="{{$time_out}}">
            <input type="hidden" name="fname" value="{{$fname}}">
            <input type="hidden" name="lname" value="{{$lname}}">
            <input type="hidden" name="email" value="{{$email}}">
            <input type="hidden" name="address" value="{{$address}}">
            <input type="hidden" name="contact_no" value="{{$contact_no}}">
            <input type="hidden" name="gender" value="{{$gender}}">
            <input type="hidden" name="pool_type" value="{{$pool_type}}">
            <input type="hidden" name="pool_price" value="{{$pool_price}}">
            <input type="hidden" name="pool_description" value="{{$pool_description}}">
            <input type="hidden" name="pool_pax" value="{{$pool_pax}}">
             <input type="hidden" name="settings" value="{{$settings}}">

          
            @endif
            @if($service_type == 'room_type')
            <input type="hidden" name="date_in" value="{{$date_in}}">
            <input type="hidden" name="date_out" value="{{$date_out}}">
            <input type="hidden" name="time_in" value="{{$time_in}}">
            <input type="hidden" name="time_out" value="{{$time_out}}">
            <input type="hidden" name="fname" value="{{$fname}}">
            <input type="hidden" name="lname" value="{{$lname}}">
            <input type="hidden" name="email" value="{{$email}}">
            <input type="hidden" name="address" value="{{$address}}">
            <input type="hidden" name="contact_no" value="{{$contact_no}}">
            <input type="hidden" name="gender" value="{{$gender}}">
            <input type="hidden" name="room_type" value="{{$room_type}}">
            <input type="hidden" name="totalr" value="{{$totalr}}">
            <input type="hidden" name="room_price" value="{{$room_price}}">
            <input type="hidden" name="room_description" value="{{$room_description}}">
            <input type="hidden" name="room_quantity" value="{{$room_quantity}}">
             <input type="hidden" name="settings" value="{{$settings}}">

           
            @endif
             @if($service_type == 'event_type')
             <input type="hidden" name="date_in" value="{{$date_in}}">
            <input type="hidden" name="date_out" value="{{$date_out}}">
            <input type="hidden" name="time_in" value="{{$time_in}}">
            <input type="hidden" name="time_out" value="{{$time_out}}">
            <input type="hidden" name="fname" value="{{$fname}}">
            <input type="hidden" name="lname" value="{{$lname}}">
            <input type="hidden" name="email" value="{{$email}}">
            <input type="hidden" name="address" value="{{$address}}">
            <input type="hidden" name="contact_no" value="{{$contact_no}}">
            <input type="hidden" name="gender" value="{{$gender}}">
            <input type="hidden" name="total" value="{{$total}}">
            @foreach($f_item as $f_item)
            <input type="hidden" name="f_item[]" value="{{$f_item}}">
            @endforeach
            @foreach($s_item as $s_item)
            <input type="hidden" name="s_item[]" value="{{$s_item}}">
            @endforeach
            <input type="hidden" name="reservation_type" value="{{$reservation_type}}">
            <input type="hidden" name="pav_price" value="{{$pav_price}}">
            <input type="hidden" name="pav_type" value="{{$pav_type}}">
            <input type="hidden" name="pav_description" value="{{$pav_description}}">
            <input type="hidden" name="event_name" value="{{$event_name}}">
            <input type="hidden" name="event_motif" value="{{$event_motif}}">
            <input type="hidden" name="pool_type" value="{{$pool_type}}">
            <input type="hidden" name="room_type" value="{{$room_type}}">
            <input type="hidden" name="no_room" value="{{$no_room}}">
             <input type="hidden" name="settings" value="{{$settings}}">

            
            @endif
            @foreach($confirmation_code as $confirmation_code)
            <input type="hidden" name="certified_verification" value="{{$confirmation_code}}">
            @endforeach
            <button type="submit" name="sumbit" value="submit">Submit</button><button type="submit" name="submit" value="back">Back</button>
            </form>


        </div>

    </body>
</html>