@extends('admin.menubar.sidebar')
@section('title','View Booking')
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
                        <div class="page-title">All Bookings</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.index')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">All Bookings</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-box">
                        @include('session.sessionMessage')
                        <div class="card-head">
                            <header>All Bookings</header>
                            <div class="tools">
                                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="row p-b-20">
                                <div class="col-md-6 col-sm-6 col-6">
                                </div>
                                <div class="col-md-6 col-sm-6 col-6">
                                    <div class="btn-group pull-right">
                                        <!-- <a class="btn deepPink-bgcolor  btn-outline">View Cancelled Booking
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="table-scrollable">
                                <table class="table table-hover table-checkable order-column full-width" id="example4">
                                    <thead>
                                    <tr>
                                        <th class="center">S.N.</th>
                                        <th class="center"> Name </th>
                                        <th class="center"> Mobile </th>
                                        <th class="center"> Email </th>
                                        <th class="center"> Nationality </th>
                                        <th class="center"> Arrive </th>
                                        <th class="center"> Depart </th>
                                        <th class="center"> Room Type </th>
                                        <th class="center">Total Booked Room</th>
                                        <th class="center">Total People</th>
                                        <th class="center"> Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bookings as $booking)
                                    <tr class="odd gradeX">
                                        <td class="center">{{$loop->iteration}}</td>
                                        <td class="center">{{$booking->name}}</td>
                                        <td class="center">{{$booking->number}}</td>
                                        <td class="center">{{$booking->email}}</td>
                                        <td class="center">{{$booking->nationality}}</td>
                                        <td class="center">{{$booking->arrival_date}}</td>
                                        <td class="center">{{$booking->check_out}}</td>
                                        <td class="center">{{$booking->room_type}}</td>
                                        <td class="center">{{$booking->booked_room}}</td>
                                        <td class="center">{{$booking->adult_number}}</td>
                                        <td class="center d-flex justify-content-center">
                                            {!! Form::open(['route'=>['booking.destroy',$booking->id],'method'=>'POST']) !!}
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-tbl-delete btn-xs" onclick="return confirm('Are you sure to delete this item?')">
                                                <i class="fa fa-trash-o "></i>
                                            </button>
                                            {!! Form::close() !!}
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

