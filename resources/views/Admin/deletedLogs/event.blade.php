



<section id="view-events" style="display: none;">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>Deleted Events</header>
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
                                                <th class="center"> Image </th>
                                                <th class="center"> Item Status </th>
                                                <th class="center"> Category </th>
                                                <th class="center"> Item Price </th>
                                                <th class="center"> Description </th>
                                                <th class="center"> Maximum Number of pax </th>
                                                <th class="center"> Price Added per Pax </th>
                                                <th class="center"> Date Deleted </th>
                                                <th class="center"> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach ($trashEvent as $Events)
                                         <tr class="odd gradeX">
                                            <td class="user-circle-img">
                                                @if($Events->category=='foods')
                                                <img src="{{asset('storage/upload/items/foods/'.$Events->image_name)}}" alt="" height="50" width="50">
                                                @elseif($Events->category=='services')
                                                <img src="{{asset('storage/upload/items/services/'.$Events->image_name)}}" alt="" height="50" width="50">
                                                @else
                                                <p>No Picture</p>
                                                @endif
                                            </td>
                                            <td class="center">{{ $Events->item_status }}</td>
                                            <td class="center">{{ $Events->category}}</td>
                                            <td class="center">{{ $Events->item_price }}</td>
                                            <td class="center">{{ $Events->item_description }}</td>
                                            <td class="center">{{ $Events->max_pax}}</td>
                                            <td class="center">{{ $Events->add_price}}</td>
                                            <td class="center">{{Carbon\Carbon::parse( $Events->deleted_at)->format('m-d-Y') }}</td>
                                            
                                            <td class="center">

                                                <form action="/admin/event/retrieve/{{$Events->id}}" >

                                                    {{csrf_field()}}
                                                    <button class="btn btn-tbl-success btn-xs"  >
                                                        Retrieve
                                                    </button></form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        
                    </section>