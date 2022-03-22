@extends('admin.menubar.sidebar')
@section('title', 'Dashboard')
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
                        <div class="page-title">Dashboard</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                href="{{ route('admin.index') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- start widget -->
            <div class="state-overview">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="info-box bg-blue">
                            <span class="info-box-icon push-bottom"><i class="material-icons">style</i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Rooms</span>
                                <span class="info-box-number">{{ $countRoom }}</span>
                                <div class="progress">
                                    <div class="progress-bar width-60"></div>
                                </div>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="info-box bg-orange">
                            <span class="info-box-icon push-bottom"><i class="material-icons">card_travel</i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">New Booking</span>
                                <span class="info-box-number">{{ $countBooking }}</span>
                                <div class="progress">
                                    <div class="progress-bar width-40"></div>
                                </div>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="info-box bg-purple">
                            <span class="info-box-icon push-bottom"><i class="material-icons">phone_in_talk</i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Feedback</span>
                                <span class="info-box-number">{{ $countFeedback }}</span>
                                <div class="progress">
                                    <div class="progress-bar width-80"></div>
                                </div>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="info-box bg-success">
                            <span class="info-box-icon push-bottom"><i class="material-icons">monetization_on</i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Staff</span>
                                <span class="info-box-number">{{ $countStaff }}</span>
                                <div class="progress">
                                    <div class="progress-bar width-60"></div>
                                </div>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- end widget -->
            <div class="row mb-4">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="card  card-box h-100">
                        <div class="card-head">
                            <header>Notifications</header>
                            <div class="tools">
                                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                            </div>
                        </div>
                        <div class="card-body no-padding height-9">
                            @if ($bookedInfos->isEmpty())
                                <div class="row">
                                    <div class="col-12 noti-information notification-menu">
                                        <div class="notification-list mail-list not-list small-slimscroll-style"
                                            style="display: flex;align-items:center;justify-content:center">
                                            <p style="">
                                                No Recent Notifications
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="noti-information notification-menu w-100">
                                        <div class="notification-list mail-list not-list small-slimscroll-style">

                                            @foreach ($bookedInfos as $bookedInfo)
                                                <a href="javascript:;" class="single-mail"> <span class="icon bg-danger"> <i
                                                            class="fa fa-times"></i>
                                                    </span> <strong>{{ $bookedInfo->name }} Booked
                                                        {{ $bookedInfo->number_of_booked_room }} Rooms</strong>
                                                    <span class="notificationtime">
                                                        <small>{{ $bookedInfo->created_at->diffForHumans() }}</small>
                                                    </span>
                                                </a>
                                        </div>
                                        <div class="full-width text-center p-t-10">
                                            <button type="button" class="btn purple btn-outline btn-circle margin-0">View
                                                All
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="card card-box h-100">
                        <div class="card-head">
                            <header>Guest Review</header>
                            <div class="tools">
                                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($feedbacks->isNotEmpty())
                                @foreach ($feedbacks as $feedback)
                                    <div class="row">
                                        <ul class="docListWindow small-slimscroll-style">
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-8 col-sm-8">
                                                        <div class="prog-avatar">
                                                            <img src="{{ Avatar::create($feedback->name)->toBase64() }}"
                                                                alt="" width="40" height="40">
                                                        </div>
                                                        <div class="details">
                                                            <div class="title">
                                                                <a href="#">{{ ucfirst($feedback->name) }}</a>
                                                                <p class="rating-text">
                                                                    {{ ucfirst(Str::limit($feedback->message, 20)) }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="full-width text-center p-t-10">
                                            <a href="{{ route('feedback.index') }}"
                                                class="btn purple btn-outline btn-circle margin-0">View All</a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="row" style="    height: 100%;
                                                                        display: flex;
                                                                        align-items: center;
                                                                        justify-content: center;">


                                    <p> No Review Yet</p>


                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- start Payment Details -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card  card-box">
                        <div class="card-head">
                            <header>Booking Details</header>
                            <div class="tools">
                                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table display product-overview mb-30" id="support_table5">
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
                                            @foreach ($bookings->take(5) as $booking)
                                                <tr class="odd gradeX">
                                                    <td class="center">{{ $loop->iteration }}</td>
                                                    <td class="center">{{ $booking->name }}</td>
                                                    <td class="center">{{ $booking->number }}</td>
                                                    <td class="center">{{ $booking->email }}</td>
                                                    <td class="center">{{ $booking->nationality }}</td>
                                                    <td class="center">{{ $booking->arrival_date }}</td>
                                                    <td class="center">{{ $booking->check_out }}</td>
                                                    <td class="center">{{ $booking->room_type }}</td>
                                                    <td class="center">{{ $booking->booked_room }}</td>
                                                    <td class="center">{{ $booking->adult_number }}</td>
                                                    <td class="center">
                                                        {!! Form::open(['route' => ['booking.destroy', $booking->id], 'method' => 'POST']) !!}
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-tbl-delete btn-xs">
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
    </div>
    <!-- end page content -->
@stop
