@extends ('admin.layout.master')

@section('content')

<div class="page-content-wrapper">
    <div class="page-content">
        @include('sweet::alert')
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Pending reservations</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">View reservation</li>
                            </ol>
                        </div>
                    </div>
                        
                     <div class="btn-group">
                                    <a href="/admin/reservation/add_reservation" id="addRow" class="btn btn-info">
                                            Add New <i class="fa fa-plus"></i>
                                    </a>
                            </div>
                        <br><br>
                        
                         <!-- start pending room reservation -->
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="card  card-box">
                                    <div class="card-head">
                                        <header>Pending room reservation</header>
                                        <div class="tools">
                                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
    	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
    	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                      <div class="table-wrap">
    										<div class="table-scrollable">
    											<table class="table table-hover table-checkable order-column full-width" id="example4">
    												<thead>
    													<tr>
                                                            <th>id</th>
    														<th>Room type</th>
    														<th>Room No</th>
    														<th>Check In</th>
    														<th>Check Out</th>
    														<th>Contact</th>
                                                            
    														<th>Email</th>
                                                            <th>Name</th>
    														<th>Action</th>
    													</tr>
    												</thead>
    												<tbody>
                                                        @foreach($pending_r as $room)
    													<tr>
    														<td>{{$room->id}}</td>
    														<td>{{$room->room_type}}</td>
    														<td>{{$room->room_quantity}}</td>
    														<td>{{$room->reservation_in}}</td>
                                                            <td>{{$room->reservation_out}}</td>
    														<td>{{$room->contact_no}}</td>
                                
    														<td>{{$room->email}}</td>
    														<td>{{$room->fname}}&nbsp;{{$room->lname}}</td>
                                                            <td>
                                                                <a href="" class="btn btn-tbl-edit btn-xs">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                 <button class="btn btn-tbl-accept btn-xs">
                                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                                </button>
                                                                <button class="btn btn-tbl-delete btn-xs">
                                                                    <i class="fa fa-trash-o "></i>
                                                                </button>

                                                            </td>
    													</tr>
                                                       @endforeach
    													
    													
    												</tbody>
    											</table>
    										</div>
    									</div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end pending room reservation -->
                         <div class="row">
                            <div class="page-title">&nbsp;&nbsp;pending reservations</div>
                        </div>
                        <!-- event reservationtart -->
                         <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="card  card-box">
                                    <div class="card-head">
                                        <header>Pending event reservation</header>
                                        <div class="tools">
                                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                      <div class="table-wrap">
                                            <div class="table-scrollable">
                                                <table class="table table-hover table-checkable order-column full-width" id="example4">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Contact</th>
                                                            <th>Event</th>
                                                            <th>Check In</th>
                                                            <th>Check Out</th>
                                                            <th>Time in</th>
                                                            <th>Time out</th>
                                                            <th>Pax</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         @foreach($pending_e as $event)
                                                        <tr>
                                                            <td>{{$event->id}}</td>
                                                            <td>{{$event->fname}}&nbsp;{{$event->lname}}</td>
                                                            <td>{{$event->email}}</td>
                                                            <td>{{$event->contact_no}}</td>
                                                            <td>{{$event->event_name}}</td>
                                                            <td>{{$event->reservation_in}}</td>
                                                            <td>{{$event->reservation_out}}</td>
                                                            <td>{{$event->time_in}}</td>
                                                            <td>{{$event->time_out}}</td>
                                                            <td>{{$event->services}}&nbsp;{{$event->foods}}</td>
                                                            <td>
                                                                <a href="" class="btn btn-tbl-edit btn-xs">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                 <button class="btn btn-tbl-accept btn-xs">
                                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                                </button>
                                                                <button class="btn btn-tbl-delete btn-xs">
                                                                    <i class="fa fa-trash-o "></i>
                                                                </button>

                                                            </td>
                                                        </tr>

                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- event reservation end -->
                         <div class="row">
                            <div class="page-title">&nbsp;&nbsp;Pending reservations</div>
                        </div>
                        <!-- pool reservation start -->
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="card  card-box">
                                    <div class="card-head">
                                        <header>Pending pool reservation</header>
                                        <div class="tools">
                                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                      <div class="table-wrap">
                                            <div class="table-scrollable">
                                                <table class="table table-hover table-checkable order-column full-width" id="example4">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Contact</th>
                                                            <th>Check In</th>
                                                            <th>Check Out</th>
                                                            <th>Time in</th>
                                                            <th>Time out</th>
                                                            
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($pending_p as $pool)
                                                        <tr>
                                                            <td>{{$pool->id}}</td>
                                                            <td>{{$pool->fname}}&nbsp;{{$pool->lname}}</td>
                                                            <td>{{$pool->email}}</td>
                                                            <td>{{$pool->contact_no}}</td>
                                                            <td>{{$pool->reservation_in}}</td>
                                                            <td>{{$pool->reservation_out}}</td>
                                                            <td>{{$pool->time_in}}</td>
                                                            <td>{{$pool->time_out}}</td>
                                                            
                                                            <td>
                                                                <a href="" class="btn btn-tbl-edit btn-xs">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                 <button class="btn btn-tbl-accept btn-xs">
                                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                                </button>
                                                                <button class="btn btn-tbl-delete btn-xs">
                                                                    <i class="fa fa-trash-o "></i>
                                                                </button>

                                                            </td>
                                                        </tr>

                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- pool reservation end -->
                        <!-- accepted reservation -->
                        <div class="row">
                            <div class="page-title">&nbsp;&nbsp;Accepted reservations</div>
                        </div>



                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-box">
                                    <div class="card-head">
                                        <header>Accepted reservations</header>
                                        <div class="tools">
                                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                        <div class="row p-b-20">
                                            <div class="col-md-6 col-sm-6 col-6">
                                                <div class="btn-group pull-left">
                                                    <a class="btn deepPink-bgcolor  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-print"></i> Print </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                            </li>
                                                            <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                            </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-scrollable">
                                                                                                        <table class="table table-hover table-checkable order-column full-width" id="example4">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center"> Name </th>
                                                                    <th class="center"> Mobile </th>
                                                                    <th class="center"> Email </th>
                                                                    <th class="center"> Check In</th>
                                                                    <th class="center"> Check Out </th>
                                                                    <th class="center"> Service </th>
                                                                    <th class="center"> Action </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($accepted as $accepted)
                                                                <tr class="odd gradeX">

                                                                    <td class="center">{{$accepted->fname}}&nbsp;{{$accepted->lname}}</td>
                                                                    <td class="center">{{$accepted->contact_no}}</td>
                                                                    <td class="center">{{$accepted->email}}</td>
                                                                    <td class="center">{{$accepted->reservation_in}}</td>
                                                                    <td class="center">{{$accepted->reservation_out}}</td>
                                                                    <td class="center">{{$accepted->reservation_type}}</td>
                                                                    <td class="center">
                                                                        <a href="/admin/reservation/accepted_edit_reservation/{{$accepted->id}}" class="btn btn-tbl-edit btn-xs">
                                                                            <i class="fa fa-pencil"></i>
                                                                        </a>
                                                                        <button class="btn btn-tbl-delete btn-xs">
                                                                            <i class="fa fa-trash-o "></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>

                                                                @endforeach

                                                            </tbody>
                                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

    </div>
</div>

@endsection