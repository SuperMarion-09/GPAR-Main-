@extends ('admin.layout.master')

@section('content')

<div class="page-content-wrapper">
                    <div class="page-content">
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
    										<div class="table-responsive">
    											<table class="table display product-overview mb-30" id="support_table5">
    												<thead>
    													<tr>
                                                            <th>id</th>
    														<th>Room type</th>
    														<th>Room No</th>
    														<th>Check In</th>
    														<th>Check Out</th>
    														<th>Contact</th>
                                                            <th>Pax</th>
    														<th>Email</th>
                                                            <th>Name</th>
    														<th>Action</th>
    													</tr>
    												</thead>
    												<tbody>
    													<tr>
    														<td>1</td>
    														<td>Standard</td>
    														<td>4</td>
    														<td>27/05/2016</td>
                                                            <td>27/05/2016</td>
    														<td>123456789</td>
                                                            <td>3</td>
    														<td>Sample@gmail.com</td>
    														<td>Michael Pasagi</td>
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
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Standard</td>
                                                            <td>4</td>
                                                            <td>27/05/2016</td>
                                                            <td>27/05/2016</td>
                                                            <td>123456789</td>
                                                            <td>3</td>
                                                            <td>Sample@gmail.com</td>
                                                            <td>Michael Pasagi</td>
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
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Standard</td>
                                                            <td>4</td>
                                                            <td>27/05/2016</td>
                                                            <td>27/05/2016</td>
                                                            <td>123456789</td>
                                                            <td>3</td>
                                                            <td>Sample@gmail.com</td>
                                                            <td>Michael Pasagi</td>
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
    													
    													
    												</tbody>
    											</table>
    										</div>
    									</div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end pending room reservation -->
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
                                            <div class="table-responsive">
                                                <table class="table display product-overview mb-30" id="support_table5">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Contact</th>
                                                            <th>Event</th>
                                                            <th>Check In</th>
                                                            <th>Check Out</th>
                                                            <th>Time out</th>
                                                            <th>Time in</th>
                                                            <th>Pax</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Michael Pasagi</td>
                                                            <td>Sample@gmail.com</td>
                                                            <td>123456789</td>
                                                            <td>Birthday</td>
                                                            <td>27/05/2016</td>
                                                            <td>27/05/2016</td>
                                                            <td>10:00am</td>
                                                            <td>5:00pm</td>
                                                            <td>150</td>
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

                                                         <tr>
                                                            <td>2</td>
                                                            <td>Michael Pasagi</td>
                                                            <td>Sample@gmail.com</td>
                                                            <td>123456789</td>
                                                            <td>Birthday</td>
                                                            <td>27/05/2016</td>
                                                            <td>27/05/2016</td>
                                                            <td>10:00am</td>
                                                            <td>5:00pm</td>
                                                            <td>150</td>
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
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- event reservation end -->
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
                                            <div class="table-responsive">
                                                <table class="table display product-overview mb-30" id="support_table5">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Contact</th>
                                                            <th>Check In</th>
                                                            <th>Check Out</th>
                                                            <th>Time out</th>
                                                            <th>Time in</th>
                                                            <th>Pax</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Jezreel Merza</td>
                                                            <td>Sample@gmail.com</td>
                                                            <td>123456789</td>
                                                            <td>27/05/2016</td>
                                                            <td>27/05/2016</td>
                                                            <td>10:00am</td>
                                                            <td>5:00pm</td>
                                                            <td>150</td>
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

                                                         <tr>
                                                            <td>2</td>
                                                            <td>Michael Pasagi</td>
                                                            <td>Sample@gmail.com</td>
                                                            <td>123456789</td>
                                                            <td>27/05/2016</td>
                                                            <td>27/05/2016</td>
                                                            <td>10:00am</td>
                                                            <td>5:00pm</td>
                                                            <td>150</td>
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
                                            <tr class="odd gradeX">
                                                
                                                <td class="center">Juan Dela Cruz</td>
                                                <td class="center"><a href="tel:4444565756">
                                                        4444565756 </a></td>
                                                <td class="center"><a href="mailto:rajesh@gmail.com ">
                                                        jdc@gmail.com </a></td>
                                                <td class="center">23/04/2017</td>
                                                <td class="center">25/04/2017</td>
                                                <td class="center">Event</td>
                                                <td class="center">
                                                    <a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <button class="btn btn-tbl-delete btn-xs">
                                                        <i class="fa fa-trash-o "></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                
                                                <td class="center">Juan Dela Cruz</td>
                                                <td class="center"><a href="tel:4444565756">
                                                        4444565756 </a></td>
                                                <td class="center"><a href="mailto:rajesh@gmail.com ">
                                                        jdc@gmail.com </a></td>
                                                <td class="center">23/04/2017</td>
                                                <td class="center">25/04/2017</td>
                                                <td class="center">Event</td>
                                                <td class="center">
                                                    <a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <button class="btn btn-tbl-delete btn-xs">
                                                        <i class="fa fa-trash-o "></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                
                                                <td class="center">Juan Dela Cruz</td>
                                                <td class="center"><a href="tel:4444565756">
                                                        4444565756 </a></td>
                                                <td class="center"><a href="mailto:rajesh@gmail.com ">
                                                        jdc@gmail.com </a></td>
                                                <td class="center">23/04/2017</td>
                                                <td class="center">25/04/2017</td>
                                                <td class="center">Event</td>
                                                <td class="center">
                                                    <a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <button class="btn btn-tbl-delete btn-xs">
                                                        <i class="fa fa-trash-o "></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end accepted reservation -->
                    </div>
                </div>
            </div>

@endsection