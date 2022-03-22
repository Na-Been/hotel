@extends('admin.menubar.sidebar')
@section('title','View Vehicles')
@section('sidebar')
    @parent
@stop
@section('content')
    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                @include('session.sessionMessage')
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">All Vehicles</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin.index')}}">Home</a>&nbsp;<i
                                class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="">Transportation</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">All Vehicles</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                @foreach($vehicles as $vehicle)
                    <div class="col-lg-4 col-md-6 col-12 col-sm-6">
                        <div class="blogThumb">
                            <div class="thumb-center" style="height:280px"><img class="img-responsive" alt="user" style="width:100% ;object-fit:cover"
                                                           src="{{url('/').Storage::url($vehicle->vehicle_image)}}">
                            </div>
                            <!-- <div class="vehicle-name cyan-bgcolor">
                                <div class="user-name">{{$vehicle->vehicle_model}}</div>
                            </div> -->
                            <div class="vehicle-box ">
                                <p class="vehicle-info"><strong>Fuel :</strong> <span>{{$vehicle->fuel_type}}</span></p>
                                <p class="vehicle-info"><strong>Purchase:</strong> <span></span></p>
                                <p class="vehicle-info"><strong>Seating Capacity:</strong><span>{{$vehicle->seat_capacity}}</span> </p>
                                <p class="vehicle-info"><strong>Type:</strong><span>{{$vehicle->vehicle_type}}</span></p>
                                <p class="vehicle-info"><strong>Driver Name:</strong><span>{{$vehicle->driver_name}}</span></p>


                                <div class="vehicle-button-group">
                                   
                                   <a href="{{route('transport.edit',$vehicle->id)}}">
                                            <button type="button" class="btn btn-secondary banner-edit p-0 mr-3"><i class="fa fa-pencil"></i></button>
                                        </a>
                                    <form method="POST" action="{{route('transport.destroy',$vehicle->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger banner-delete p-0 " onclick="return confirm('Are you sure you want to delete this??')"><i class="fa fa-trash"></i></button>
                                    </form>
                                   </div>
                            </div>




                            
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end page content -->
@stop
