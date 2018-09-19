



<section id="view-pools" style="display: none;">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>Deleted Pools</header>
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
                                                <th class="center"> Pool Number </th>
                                                <th class="center"> Pool Type </th>
                                                <th class="center"> Descripton </th>
                                                <th class="center"> Pool Price (Private Usage) </th>
                                                <th class="center"> Minimum Number of pax </th>
                                                <th class="center"> Pool Rate Daytime </th>
                                                <th class="center"> Pool Rate Night Time </th>
                                                <th class="center"> Deleted Date </th>
                                                <th class="center"> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($trashPool as $pools)
                                           <tr class="odd gradeX">
                                            <td class="user-circle-img">
                                                <img src="{{asset('storage/upload/pool/'.$pools->image_name)}}" height="50" width="50"/>
                                            </td>
                                            <td class="center">{{ $pools->id }}</td>
                                            <td class="center">{{ $pools->pool_type}}</td>
                                            <td class="center">{{ $pools->pool_description }}</td>
                                            <td class="center">{{ $pools->pool_price }}</td>
                                            <td class="center">{{ $pools->minimum_pax}}</td>
                                            <td class="center">{{ $pools->price_per_head_day}}</td>
                                            <td class="center">{{ $pools->price_per_head_night}}</td>
                                            <td class="center">{{Carbon\Carbon::parse( $pools->deleted_at)->format('m-d-Y') }}</td>
                                            
                                            <td class="center">
                                                
                                                <form action="/admin/pool/retrieve/{{$pools->id}}" >
                                                    
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