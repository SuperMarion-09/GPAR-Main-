@extends ('admin.layout.master')

@section('content')

<div class="page-content-wrapper">
    <div class="page-content">
        @include('sweet::alert')
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Accepted reservations</div>
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
                        <!-- accepted reservation -->



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
<script type="text/javascript">
            $(document).ready(function() {
                $('.delete').click(function(){

                    var record_id = $(this).data('id');

                    $('.deleted_item').val(record_id);

                });

            });
        </script>

@endsection