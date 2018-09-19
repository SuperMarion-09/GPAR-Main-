



<section id="view-staffs" style="display: none;">
   
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Deleted Staff</header>
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
                                    </div>
                                    <div class="table-scrollable">
                                    <table class="table table-hover table-checkable order-column full-width staff-all" id="example4">
                                        <thead>
                                            <tr>
                                                <th class="center"> img </th>
                                                <th class="center"> Name </th>
                                                <th class="center"> Gender </th>
                                                <th class="center">Address</th>
                                                <th class="center">Contact</th>
                                                <th class="center"> Email </th>
                                                <th class="center"> Position </th>
                                                 <th class="center"> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX">
                                                @foreach($trashStaff as $users)
                                                <td class="img-rooms-table">
                                                        <img src="{{asset('storage/upload/staff/'.$users->image_name)}}" height="50" width="50" alt="">
                                                </td>
                                                <td class="center">{{$users->first_name}} &nbsp {{$users->last_name}}</td>
                                                <td class="center">{{$users->gender}}</td>
                                                <td class="center">{{$users->address}}</td>
                                                <td class="center">{{$users->contact_number}}</td>
                                                <td class="center">{{$users->email}}</td>
                                                <td class="center">{{$users->position}}</td>
                                                <td class="center">
                                                    <a href="edit-rooms.html" class="btn btn-tbl-edit btn-xs">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a class="btn btn-tbl-delete btn-xs">
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
           
                        
                        
                    </section>