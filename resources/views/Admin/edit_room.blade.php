@extends ('admin.layout.master')

@section('content')
<form action="/admin/room/edit/{{$id->id}}" method="POST" enctype="multipart/form-data">
	{{csrf_field()}}
	{{method_field('PATCH')}}
   <!-- start page content -->
                                  <div class="page-content-wrapper">
                                    <div class="page-content">
                                        <div class="page-bar">
                                            <div class="page-title-breadcrumb">
                                                <div class=" pull-left">
                                                    <div class="page-title">Edit Room Details</div>
                                                </div>
                                                <ol class="breadcrumb page-breadcrumb pull-right">
                                                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                                    </li>
                                                    <li><a class="parent-item" href="#">Rooms</a>&nbsp;<i class="fa fa-angle-right"></i>
                                                    </li>
                                                    <li class="active">Edit Room Details</li>
                                                </ol>
                                            </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-sm-12">
                                             <div class="card-box">
                                                <div class="card-head">
                                                   <header>Edit Room Details</header>
                                       </div>
                                      
                                      <div class="col-lg-12 p-t-20"> 
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                           <input class = "mdl-textfield__input" type = "text" value='{{$id->type}}' name="new_type" id = "txtRoomNo">
                                           <label class = "mdl-textfield__label">Room Type</label>
                                       </div>
                                   </div>
                                   <div class="col-lg-12 p-t-20"> 
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" value="{{$id->room_price}}" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="sample2" name="new_price">
                                        <label class="mdl-textfield__label" for="sample2">Price</label>
                                        <span class="mdl-textfield__error">Input is not a number!</span>
                                    </div>
                                </div>
                                <div class="col-lg-12 p-t-20"> 
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="sample4" value="{{$id->room_cancellation_type}}" name="new_cancellation_type" tabIndex="-1">
                                        <label class="pull-right margin-0">
                                            <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                        </label>
                                        <label class="mdl-textfield__label">Cancellation Charges</label>
                                        <ul data-mdl-for="sample4" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                            <li class="mdl-menu__item" data-val="1">Free Cancellation</li>
                                            <li class="mdl-menu__item" data-val="2">10% Before 24 Hours</li>
                                            <li class="mdl-menu__item" data-val="3">No Cancellation Allow</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12 p-t-20"> 
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                        <input class="mdl-textfield__input" name="new_quantity" type="text" id="list2" value="{{$id->room_quantity}}" tabIndex="-1">
                                        <label for="list2" class="pull-right margin-0">
                                            <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                        </label>
                                        <label for="list2" class="mdl-textfield__label">Quantity</label>
                                        <ul data-mdl-for="list2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                            <li class="mdl-menu__item" data-val="1">1</li>
                                            <li class="mdl-menu__item" data-val="2">2</li>
                                            <li class="mdl-menu__item" data-val="3">3</li>
                                            <li class="mdl-menu__item" data-val="4">4</li>
                                            <li class="mdl-menu__item" data-val="5">5</li>
                                            <li class="mdl-menu__item" data-val="6">6</li>
                                            <li class="mdl-menu__item" data-val="7">7</li>
                                            <li class="mdl-menu__item" data-val="8">8</li>
                                        </ul>
                                    </div>
                                </div>
                             <div class="col-lg-12 p-t-20"> 
                        <div class = "mdl-textfield mdl-js-textfield txt-full-width">
                          <textarea class = "mdl-textfield__input" name="new_description" rows =  "4" 
                          id = "education" >{{$id->room_description}}</textarea>
                          <label class = "mdl-textfield__label" for = "text7">Room Details</label>
                      </div>
                  </div>
                  
                          <div class="col-lg-12 p-t-20 text-center">
                              <label class="control-label col-md-3">Upload Room Photos</label>
									<br><input type="file" name="upload">                              
                                   <h3>Drop files here or click to upload.</h3>
                                   <em>(400 x 300 recommended size in pixels)
                                   </em>
                               </div>
                           
                       </div>
                  <div class="col-lg-12 p-t-20 text-center"> 
                   <button type="Submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Update</button>
                   <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
               </div>
           </div>
       </div>
   </div>
</div> 

<br>
<div class="row">
    <button type="button" class="btn btn-default" onclick="goBack()">Go back</button>
</div>
</div>
</div>
</form>



@endsection