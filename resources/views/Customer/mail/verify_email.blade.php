<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        <div>
            Please put this code to the space provided in the reservation to confirm your reservation. Thank You!</br>
 			@foreach($confirmation_code as $confirmation_code)
 			<input type="text" name="" disabled="" value="{{$confirmation_code}}">          
            @endforeach
            
 
            
        </div>

    </body>
</html>