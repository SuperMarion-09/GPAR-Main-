@extends ('admin.layout.master')

@section('content')

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            @include('sweet::alert')
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
            @if(session()->has('notif'))

            <center><div class="col col-md-12 ">
                <div class="alert alert-info ">
                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Notification</strong><p><center>{{session()->get('notif')}}</center></p>
                </div>
            </div></center>

            @endif
            @if(count($errors))
            <div class="col col-md-12">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-xl-3 col-md-6 col-12">
                  <div class="info-box bg-blue">
                    <span class="info-box-icon push-bottom"><i class="material-icons">monetization_on</i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Net sales</span>
                      <span class="info-box-number">{{$sale}}</span>
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
              <span class="info-box-number">{{$yo}}</span>
              <div class="progress">
                <div class="progress-bar width-{{$yo}}"></div>
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
      <span class="info-box-number">{{$fee}}</span>
      <div class="progress">
        <div class="progress-bar width-{{$fee}}"></div>
    </div>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->

<!-- /.col -->
</div>
</div>
<!-- end widget -->
<!-- start pending reservation -->
<!-- start pending room reservation --><!-- accepted reservation -->
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
                                <td class="center">{{\carbon\carbon::parse($accepted->reservation_in)->format('F j, Y')}}</td>
                                <td class="center">{{\Carbon\carbon::parse($accepted->reservation_out)->format('F j, Y')}}</td>
                                <td class="center">{{$accepted->reservation_type}}</td>
                                <td class="center">
                                      <a href="/admin/reservation/accepted_view_reservation/{{$accepted->id}}" class="btn btn-tbl-edit btn-xs">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="/admin/reservation/accepted_edit_reservation/{{$accepted->id}}" class="btn btn-tbl-edit btn-xs">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <button type="button" id="switch-1" 
                                                    class = "btn btn-tbl-delete btn-xs delete" data-toggle="modal" data-target="#delete" data-id="{{$accepted->id}}"><i class="fa fa-trash-o"></i>
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
                            @foreach($comments as $comment)
                            <tr class="odd gradeX">
                                <td class="center">{{$comment->name}}</td>
                                <td class="center">{{$comment->email}}</td>
                                <td class="center">
                                    {{$comment->comment}}
                                </td>
                                <td class="center">
                                   <a class="btn btn-tbl-delete btn-xs delete_comment" data-toggle="modal" data-target="#comment" data-id="{{$comment->id}}">
                                    <i class="fa fa-trash-o "></i>
                                </a>
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
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/admin/reservation/delete/reservation" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <div class="modal-body">
                            <input type="hidden" class="deleted_item" name="deleted_reservation" id="item_id">
                            <p>Are you sure that the reservation will be Deleted?<br>Once it is deleted you can't retrieve it.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger ">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
</div>
<div class="modal fade" id="comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/admin/comment/delete" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <div class="modal-body">
                            <input type="hidden" class="deleted_comment" name="deleted_comment" id="item_id">
                            <p>Are you sure that the comment will be Deleted?<br>Once it is deleted you can't retrieve it.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger ">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
</div>
<script type="text/javascript">
            $(document).ready(function() {
                $('.delete').click(function(){

                    var record_id = $(this).data('id');

                    $('.deleted_item').val(record_id);

                });
                $('.delete_comment').click(function(){

                    var record_id = $(this).data('id');

                    $('.deleted_comment').val(record_id);

                });

            });
        </script>





@endsection