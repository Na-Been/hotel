@extends('admin.menubar.sidebar')
@section('title','Available Rooms')
@section('sidebar')
    @parent
@stop
@section('content')
    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">All Rooms</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.index')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item">Rooms</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">View Rooms</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-box">
                        @include('session.sessionMessage')
                        <div class="card-head">
                            <header>All Rooms</header>
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
                                        <a href="{{route('room.create')}}" id="addRow" class="btn btn-info">
                                            Add New <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-6">
                                    <div class="btn-group pull-right">
                                        <!-- <a class="btn deepPink-bgcolor  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                            <i class="fa fa-angle-down"></i>
                                        </a> -->
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
                                        <th class="center"> S.N. </th>
                                        <th class="center"> Image</th>
                                        <th class="center"> Room No</th>
                                        <th class="center"> Room Type </th>
                                        <th class="center"> AC/Non AC </th>
                                        <th class="center"> Meal </th>
                                        <th class="center"> Rent/Night </th>
                                        <th class="center"> Cancellation Charge </th>
                                        <th class="center"> Room Details </th>
                                        <th class="center"> Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rooms as $room)
                                    <tr class="odd gradeX">
                                        <td class="center">{{$loop->iteration}}</td>
                                        <td class="center user-circle-img">
                                            <img style="width:50px" src="{{url('/').Storage::url($room->feature_image)}}" alt="">
                                        </td>
                                        <td class="center">{{$room->room_no}}</td>
                                        <td class="center">{{$room->room_type}}</td>
                                        <td class="center">{{$room->ac}}</td>
                                        <td class="center">{{$room->meal}}</td>
                                        <td class="center">{{$room->rent_per_night}}</td>
                                        <td class="center">{{$room->cancel_charge}}</td>
                                        <td class="center">{{Str::limit($room->room_details, 15)}}</td>
                                        <td class="">
                                         <div class="center  d-flex justify-content-center">
                                         <a href="{{route('room.edit',$room->id)}}" class="btn btn-tbl-edit btn-xs">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="{{route('room.destroy',$room->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" id="delete" class="btn btn-tbl-delete btn-xs fa fa-trash-o" onclick="return confirm('Are you sure you want to delete it??')"></button>
                                            </form>
                                         </div>
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
    <!-- end page content -->
    @stop
