@extends('admin.layout.master')

@section('content')

<div class="page-content-wrapper">
                <div class="page-content">
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
                                                <th class="center"> Status </th>
                                                <th class="center"> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX">
                                                <td class="user-circle-img">
                                                        <img src="" alt="">
                                                </td>
                                                <td class="center">1</td>
                                                <td class="center">Family</td>
                                                <td class="center">*good for 8 persons*</td>
                                                <td class="center">8</td>
                                                <td class="center">2500</td>
                                                <td class="center">
                                                    <span class="label label-sm label-info">inactive</span>
                                                </td>
                                                <td class="center">
                                                    <a href="edit-rooms.html" class="btn btn-tbl-edit btn-xs">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a class="btn btn-tbl-delete btn-xs">
                                                        <i class="fa fa-trash-o "></i>
                                                    </a>
                                                </td>

                                            </tr>
                                             <tr class="odd gradeX">
                                                <td class="user-circle-img">
                                                        <img src="" alt="">
                                                </td>
                                                <td class="center">2</td>
                                                <td class="center">Family</td>
                                                <td class="center">*good for 8 persons*</td>
                                                <td class="center">8</td>
                                                <td class="center">2500</td>
                                                <td class="center">
                                                    <span class="label label-sm label-info">inactive</span>
                                                </td>
                                                <td class="center">
                                                    <a href="edit-rooms.html" class="btn btn-tbl-edit btn-xs">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a class="btn btn-tbl-delete btn-xs">
                                                        <i class="fa fa-trash-o "></i>
                                                    </a>
                                                </td>
                                            </tr>
                                             <tr class="odd gradeX">
                                                <td class="user-circle-img">
                                                        <img src="" alt="">
                                                </td>
                                                <td class="center">3</td>
                                                <td class="center">family</td>
                                                <td class="center">*good for 8 persons*</td>
                                                <td class="center">8</td>
                                                <td class="center">2500</td>
                                                <td class="center">
                                                    <span class="label label-sm label-success">active</span>
                                                </td>
                                                <td class="center">
                                                    <a href="edit-rooms.html" class="btn btn-tbl-edit btn-xs">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a class="btn btn-tbl-delete btn-xs">
                                                        <i class="fa fa-trash-o "></i>
                                                    </a>
                                                </td>
                                            </tr>
                                             <tr class="odd gradeX">
                                                <td class="user-circle-img">
                                                        <img src="" alt="">
                                                </td>
                                                <td class="center">4</td>
                                                <td class="center">Family</td>
                                                <td class="center">*good for 8 persons*</td>
                                                <td class="center">8</td>
                                                <td class="center">2500</td>
                                                <td class="center">
                                                    <span class="label label-sm label-info">inactive</span>
                                                </td>
                                                <td class="center">
                                                    <a href="edit-rooms.html" class="btn btn-tbl-edit btn-xs">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a class="btn btn-tbl-delete btn-xs">
                                                        <i class="fa fa-trash-o "></i>
                                                    </a>
                                                </td>
                                            </tr>
                                             <tr class="odd gradeX">
                                                <td class="user-circle-img">
                                                        <img src="" alt="">
                                                </td>
                                                <td class="center">1</td>
                                                <td class="center">Standard</td>
                                                <td class="center">*good for 8 persons*</td>
                                                <td class="center">8</td>
                                                <td class="center">2800</td>
                                                <td class="center">
                                                    <span class="label label-sm label-info">inactive</span>
                                                </td>
                                                <td class="center">
                                                    <a href="edit-rooms.html" class="btn btn-tbl-edit btn-xs">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a class="btn btn-tbl-delete btn-xs">
                                                        <i class="fa fa-trash-o "></i>
                                                    </a>
                                                </td>
                                            </tr>
                                             <tr class="odd gradeX">
                                                <td class="user-circle-img">
                                                        <img src="" alt="">
                                                </td>
                                                <td class="center">2</td>
                                                <td class="center">Standard</td>
                                                <td class="center">*good for 8 persons*</td>
                                                <td class="center">8</td>
                                                <td class="center">2800</td>
                                                <td class="center">
                                                    <span class="label label-sm label-info">inactive</span>
                                                </td>
                                                <td class="center">
                                                    <a href="edit-rooms.html" class="btn btn-tbl-edit btn-xs">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a class="btn btn-tbl-delete btn-xs">
                                                        <i class="fa fa-trash-o "></i>
                                                    </a>
                                                </td>
                                            </tr>
                                             <tr class="odd gradeX">
                                                <td class="user-circle-img">
                                                        <img src="" alt="">
                                                </td>
                                                <td class="center">3</td>
                                                <td class="center">Standard</td>
                                                <td class="center">*good for 8 persons*</td>
                                                <td class="center">8</td>
                                                <td class="center">2800</td>
                                                <td class="center">
                                                    <span class="label label-sm label-info">inactive</span>
                                                </td>
                                                <td class="center">
                                                    <a href="edit-rooms.html" class="btn btn-tbl-edit btn-xs">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a class="btn btn-tbl-delete btn-xs">
                                                        <i class="fa fa-trash-o "></i>
                                                    </a>
                                                </td>
                                            </tr>
                                             <tr class="odd gradeX">
                                                <td class="user-circle-img">
                                                        <img src="" alt="">
                                                </td>
                                                <td class="center">4</td>
                                                <td class="center">Standard</td>
                                                <td class="center">*good for 8 persons*</td>
                                                <td class="center">8</td>
                                                <td class="center">2800</td>
                                                <td class="center">
                                                    <span class="label label-sm label-success">active</span>
                                                </td>
                                                <td class="center">
                                                    <a href="edit-rooms.html" class="btn btn-tbl-edit btn-xs">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a class="btn btn-tbl-delete btn-xs">
                                                        <i class="fa fa-trash-o "></i>
                                                    </a>
                                                </td>
                                            </tr>
                                             <tr class="odd gradeX">
                                                <td class="user-circle-img">
                                                        <img src="" alt="">
                                                </td>
                                                <td class="center">9</td>
                                                <td class="center">Jester's room</td>
                                                <td class="center">*good for 2 persons*</td>
                                                <td class="center">2</td>
                                                <td class="center">1000</td>
                                                <td class="center">
                                                    <span class="label label-sm label-info">inactive</span>
                                                </td>
                                                <td class="center">
                                                    <a href="edit-rooms.html" class="btn btn-tbl-edit btn-xs">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a class="btn btn-tbl-delete btn-xs">
                                                        <i class="fa fa-trash-o "></i>
                                                    </a>
                                                </td>
                                            </tr>
                                             <tr class="odd gradeX">
                                                <td class="user-circle-img">
                                                        <img src="" alt="">
                                                </td>
                                                <td class="center">10</td>
                                                <td class="center">Justine's room</td>
                                                <td class="center">*good for 2 persons*</td>
                                                <td class="center">2</td>
                                                <td class="center">1000</td>
                                                <td class="center">
                                                    <span class="label label-sm label-info">inactive</span>
                                                </td>
                                                <td class="center">
                                                    <a href="edit-rooms.html" class="btn btn-tbl-edit btn-xs">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
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
                    </div>
                </div>
            </div>

@endsection

