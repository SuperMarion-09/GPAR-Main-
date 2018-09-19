<section id="view-rooms" style="display: none;">



   <div class="row">
    <div class="col-md-12">
        <div class="card card-box">
            <div class="card-head">
                <header>Deleted Room </header>
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
                                        @foreach($trashRoom as $rooms)
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
                                                @if($rooms->room_status==0)
                                                <span class="label label-sm label-info">inactive</span>

                                                @else
                                                <span class="label label-sm label-success">active</span>
                                                @endif
                                            </td>
                                            <td class="center">
                                                <form action="/admin/room/retrieve/{{$rooms->id}}">
                                                    <button class="btn btn-tbl-delete btn-xs">
                                                        <i class="fa fa-trash-o ">Retrive</i>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>



            </section>