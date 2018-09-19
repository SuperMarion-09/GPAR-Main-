@extends ('admin.layout.master')

@section('content')

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Dashboard</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
        <!-- start widget -->
        <div class="state-overview">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-12">
                  <div class="info-box bg-blue">
                    <span class="info-box-icon push-bottom"><i class="material-icons">monetization_on</i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Net sales</span>
                      <span class="info-box-number">450</span>
                      <div class="progress">
                        <div class="progress-bar width-60"></div>
                    </div>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-orange">
            <span class="info-box-icon push-bottom"><i class="material-icons">card_travel</i></span>
            <div class="info-box-content">
              <span class="info-box-text">New Reservation</span>
              <span class="info-box-number">10</span>
              <div class="progress">
                <div class="progress-bar width-40"></div>
            </div>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-xl-3 col-md-6 col-12">
  <div class="info-box bg-purple">
    <span class="info-box-icon push-bottom"><i class="material-icons">favorite</i></span>
    <div class="info-box-content">
      <span class="info-box-text">Feedbacks</span>
      <span class="info-box-number">52</span>
      <div class="progress">
        <div class="progress-bar width-80"></div>
    </div>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-xl-3 col-md-6 col-12">
  <div class="info-box bg-success">
    <span class="info-box-icon push-bottom"><i class="material-icons">timelapse</i></span>
    <div class="info-box-content">
      <span class="info-box-text">Pending reservation</span>
      <span class="info-box-number">7</span><span></span>
      <div class="progress">
        <div class="progress-bar width-60"></div>
    </div>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
</div>
</div>
<!-- end widget -->
<!-- start pending reservation -->
<!-- start pending room reservation -->

<!-- accepted reservation -->
<div class="row">
    <div class="page-title">&nbsp;&nbsp;&nbsp;Accepted reservations</div>
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
                                                    <a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
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
    <!-- end accepted reservation -->
</div>
<!-- start pending reservation-->
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12 col-12">
        <div class="card card-box">
            <div class="card-head">
                <header>Customer Feedbacks</header>
                <div class="tools">
                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                </div>
            </div>
            <div class="card-body ">
                <div class="row p-b-20">
                </div>
                <div class="table-scrollable">
                    <table class="table table-hover table-checkable order-column full-width pools-all" id="example1">
                        <thead>
                            <tr>
                                <th class="center"> Name</th>
                                <th class="center">Email</th>
                                <th class="center"> Message </th>
                                <th class="center"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX">
                                <td class="center">Juan Dela Cruz</td>
                                <td class="center">Juan@gmail.com</td>
                                <td class="center">
                                    Wonderful services!
                                </td>
                                <td class="center">
                                 <a class="btn btn-tbl-delete btn-xs">
                                    <i class="fa fa-trash-o "></i>
                                </a>
                            </td>
                        </tr>

                        <tr class="odd gradeX">
                            <td class="center">Liza Monaway</td>
                            <td class="center">liza@gmail.com</td>
                            <td class="center">
                                Clean environment
                            </td>
                            <td class="center">
                             <a class="btn btn-tbl-delete btn-xs">
                                <i class="fa fa-trash-o "></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="odd gradeX">
                        <td class="center">Ivan Santiago</td>
                        <td class="center">Juan@gmail.com</td>
                        <td class="center">
                         Affordable rates offered
                     </td>
                     <td class="center">
                         <a class="btn btn-tbl-delete btn-xs">
                            <i class="fa fa-trash-o "></i>
                        </a>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-12 col-12">
   <div class="card-box">
       <div class="card-head">
           <header>Todo List</header>
       </div>
       <div class="card-body ">
        <ul class="to-do-list ui-sortable" id="sortable-todo">
            <li class="clearfix">
                <div class="todo-check pull-left">
                    <input type="checkbox" value="None" id="todo-check1">
                    <label for="todo-check1"></label>
                </div>
                <p class="todo-title">Add fees details in system
                </p>
                <div class="todo-actionlist pull-right clearfix">
                    <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                </div>
            </li>
            <li class="clearfix">
                <div class="todo-check pull-left">
                    <input type="checkbox" value="None" id="todo-check2">
                    <label for="todo-check2"></label>
                </div>
                <p class="todo-title">Announcement for holiday
                </p>
                <div class="todo-actionlist pull-right clearfix">
                    <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                </div>
            </li>
            <li class="clearfix">
                <div class="todo-check pull-left">
                    <input type="checkbox" value="None" id="todo-check3">
                    <label for="todo-check3"></label>
                </div>
                <p class="todo-title">Appointment</p>
                <div class="todo-actionlist pull-right clearfix">
                    <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                </div>
            </li>
            
        </ul>
    </div>
</div>
</div>
</div>
</div>
</div>





@endsection