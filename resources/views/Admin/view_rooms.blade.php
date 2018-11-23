@extends('admin.layout.master')

@section('content')

<div class="page-content-wrapper">
    <div class="page-content">
        @include('sweet::alert')
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">All Rooms</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">View rooms</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Room lists</header>
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
                                    <a href="/admin/room/add_reservation" id="addRow" class="btn btn-info">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
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
                                                    <th class="center"> img </th>
                                                    <th class="center"> # </th>
                                                    <th class="center"> Type </th>
                                                    <th class="center"> Descripton </th>
                                                    <th class="center"> Quantity </th>
                                                    <th class="center"> Price </th>
                                                    <th class="center"> Room Cancellation Type </th>
                                                    <th class="center"> Status </th>
                                                    <th class="center"> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($room as $rooms)
                                                <tr class="odd gradeX">
                                                    <td class="user-circle-img">
                                                        @if($rooms->image_name == "")
                                                        <p> No Picture</p>
                                                        @elseif($rooms->image_name == $rooms->image_name)
                                                        <img src="{{asset('storage/upload/room/'.$rooms->image_name)}}" height="50" width="50"/>
                                                        @endif

                                                    </td>
                                                    <td class="center">{{$rooms->id}}</td>
                                                    <td class="center">{{$rooms->type}}</td>
                                                    <td class="center"> {{$rooms->room_description}}</td>
                                                    <td class="center">{{$rooms->room_quantity}}</td>
                                                    <td class="center">{{$rooms->room_price}}</td>
                                                    <td class="center">{{$rooms->room_cancellation_type}}</td>
                                                    <td class="center">
                                                        @if($rooms->room_status=='0')
                                                        <button type="button" id="switch-1" 
                                                        class = "btn btn-danger Inactive_Switch" data-toggle="modal" data-target="#item_switch" data-id="{{$rooms->id}}">Inactive</button>

                                                        @else
                                                        <button type="button" id="switch-1" 
                                                        class = "btn btn-info Active_Switch" data-toggle="modal" data-target="#item_switch_2" data-id="{{$rooms->id}}">Active</button>
                                                        @endif
                                                    </td>
                                                    <td class="center">
                                                        <a href="/admin/room/edit/{{$rooms->id}}" class="btn btn-tbl-edit btn-xs">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <button type="button" id="switch-1" 
                                                        class = "btn btn-tbl-delete btn-xs delete" data-toggle="modal" data-target="#delete" data-id="{{$rooms->id}}"><i class="fa fa-trash-o"></i></button>
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


            <div class="modal fade" id="item_switch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="/admin/room/update/room_status">
                            {{csrf_field()}}
                            <div class="modal-body">

                                <input type="hidden" class="activate_Change" name="active_change" id="item_id">
                                <p>Are you sure that the room will be Actived?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary ">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="item_switch_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="/admin/room/update/room_status">
                            {{csrf_field()}}
                            <div class="modal-body">
                                <input type="hidden" class="deactivate_Change" name="deactive_change" id="item_id">
                                <p>Are you sure that the room will be Deactived?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary ">Save changes</button>
                            </div>
                        </form>
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
                        <form action="/admin/room/delete/room" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <div class="modal-body">
                                <input type="hidden" class="deleted_item" name="deleted_room" id="item_id">
                                <p>Are you sure that the room will be Deleted?<br>It will stored in the others/logs.</p>
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

                    $('.Inactive_Switch').click(function(){

                        var record_id = $(this).data('id');

                        $('.activate_Change').val(record_id);

                    });
                    $('.Active_Switch').click(function(){

                        var record_id = $(this).data('id');

                        $('.deactivate_Change').val(record_id);

                    });
                    $('.delete').click(function(){

                        var record_id = $(this).data('id');

                        $('.deleted_item').val(record_id);

                    });

                });
            </script>






            @endsection

