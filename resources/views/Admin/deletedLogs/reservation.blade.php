



<section id="view-reservation" style="display: none;">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>Past Reservation</header>
                    <div class="tools">
                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row p-b-20">
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="btn-group">
 
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="btn-group pull-right">
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
                                                <th class="center"> Reservation Type </th>
                                                <th class="center"> Reservation Date </th>
                                                <th class="center"> Reservation Name </th>
                                                <th class="center"> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($trashReserve as $reservation)
                                           <tr class="odd gradeX">
                                            <td class="center">{{ $reservation->reservation_type}}</td>
                                            <td class="center">{{\carbon\carbon::parse($reservation->reservation_in)->format('F j, Y')}}</td>
                                            <td class="center">{{ $reservation->fname }} {{$reservation->lname}}</td>
                                            <td class="center">
                                                
                                               <a href="/admin/reservation/accepted_view_reservation/{{$reservation->id}}" class="btn btn-tbl-edit btn-xs">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        
                    </section>