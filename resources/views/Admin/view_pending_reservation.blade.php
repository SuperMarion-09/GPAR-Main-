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
    														<th>Reservation type</th>
    								
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
                                                            <td>{{$room->reservation_type}}</td>
    														<td>{{$room->reservation_in}}</td>
                                                            <td>{{$room->reservation_out}}</td>
    														<td>{{$room->contact_no}}</td>
                                
    														<td>{{$room->email}}</td>
    														<td>{{$room->fname}}&nbsp;{{$room->lname}}</td>
                                                            <td>
                                                                
                                                                 <a class="btn btn-tbl-accept btn-xs submit"  data-toggle="modal" data-target="#submit" data-id="{{$room->id}}" >
                                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                                </a>
                                                                <a class="btn btn-tbl-delete btn-xs delete" data-toggle="modal" data-target="#delete" data-id="{{$room->id}}">
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
                        <!-- end pending room reservation -->

                        <!-- pool reservation end -->
                        <!-- accepted reservation -->
                       

    </div>
</div>
<div class="modal fade" id="submit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/admin/pending/accept">
                {{csrf_field()}}

                <div class="modal-body">

                    <p><center>Payment</center></p>
                    <center><input type="text" name="payment"></center>
                    <input type="hidden" class="deleted_item" name="reservation" id="item_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Cash</button>
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
            <form method="POST" action="/admin/pending_reservation/delete/{id}">
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
        $('.submit').click(function(){

            var record_id = $(this).data('id');

            $('.deleted_item').val(record_id);

        });
         $('.delete').click(function(){

            var record_id = $(this).data('id');

            $('.deleted_item').val(record_id);

        });

    });
</script>
                                                          


@endsection