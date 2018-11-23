@extends('customer.layouts.master')

@section('content')

<!--HEADER SECTION RESERVATION--> 
<section class="page-title" style="background-image:url(/css/images/background/gallery-head.jpg);">
    <div class="auto-container">
        <!--Title Box-->
        <div class="title-box">
            <h2>Our Events Items</h2>
        </div>
    </div>
</section>
<!-- HEADER SECTION RESERVATION E-->

<br>
<div class="container">
    <div class="bgcontainer">
        <div class="row">
            <div class="panel panel-foods"> 
                <div class="panel-heading"><h4>Foods</h4></div>
                <div class="panel-body">
                    
                    @foreach($a_fevent as $event)
                   
                   <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 end">
                    <div class="card" style="width: 22rem;">
                        <img class="card-img-top" src="{{asset('storage/upload/items/foods/'.$event->image_name)}}" alt="lechon">
                        <div class="card-body">
                            <br>
                            <h4>{{$event->item_name}}</h4>
                            <span style="font-size: 20px; color: #a6aba6; font-family: sans-seriff;">{{$event->item_price}}</span>
                            <hr>
                            <p class="card-text">{{$event->item_description}}</p>
                            <hr>
                        </div>
                    </div>
                </div>
                @endforeach
               

                

            </div>
        </div>  
    </div>
</div>
<div class="row">
            <div class="panel panel-services"> 
                <div class="panel-heading"><h4>Services</h4></div>
                <div class="panel-body">
                   
                    @foreach($a_sevent as $event)
                    
                   <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 end">
                    <div class="card" style="width: 22rem;">
                        <img class="card-img-top" src="{{asset('storage/upload/items/services/'.$event->image_name)}}" alt="lechon">
                        <div class="card-body">
                            <br>
                            <h4>{{$event->item_name}}</h4>
                            <span style="font-size: 20px; color: #a6aba6; font-family: sans-seriff;">{{$event->item_price}}</span>
                            <hr>
                            <p class="card-text">{{$event->item_description}}</p>
                            <hr>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>  
    </div>   
</div>
<!--End Services Section--> ;

@endsection