@extends('layouts.app')
@section('title','Rooms')
@section('navbar')
    @parent
@stop

@section('content')
    <!-- Primary Page Layout
	================================================== -->

    <div class="section big-55-height over-hide z-bigger">
        @if($roomBannerImages != null)
                    <div class="parallax parallax-top"
                         style="background-image: url({{asset(url('/').Storage::url($roomBannerImages->image))}})"></div>
                    <div class="dark-over-pages"></div>

                    <div class="hero-center-section pages">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 parallax-fade-top">
                                    <div class="hero-text">Our Rooms</div>
                                </div>
                            </div>
                        </div>
                    </div>
        @endif
    </div>

    <div class="section padding-top-bottom-smaller background-dark over-hide z-too-big">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-xl-4 px-sm-0">
                                <div class="booking-sep-wrap">
                                    <div class="input-daterange input-group" id="flight-datepicker-1">
                                        <div class="form-item">
                                            <span class="fontawesome-calendar"></span>
                                            <input class="input-sm" type="text" autocomplete="off" id="start-date"
                                                   name="start" placeholder="check-in" data-date-format="DD, MM d"/>
                                            <span class="date-text date-depart"></span>
                                        </div>
                                        <div class="form-item">
                                            <span class="fontawesome-calendar"></span>
                                            <input class="input-sm" type="text" autocomplete="off" id="end-date"
                                                   name="end" placeholder="check-out" data-date-format="DD, MM d"/>
                                            <span class="date-text date-return"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-xl-2 px-sm-0">
                                <div class="quantity">
                                    <input type="number" min="1" max="9999" step="1" value="1">
                                </div>
                            </div>
                            <div class="col-md-3 col-xl-2 px-sm-0">
                                <a class="booking-button-big" href="{{route('booking.index')}}">Book<br>Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section padding-top-bottom over-hide background-grey">
        <div class="container">
            <div class="row justify-content-center">
                @if($roomImages->isNotEmpty())
                    @foreach($roomImages as $roomImage)
                            <div class="col-md-6 mt-2 mb-2">
                                <div class="room-box background-white" style="height: 300px; width: 500px">
                                    <div class="room-name">suite tanya</div>
                                    <div class="room-per">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <img src="{{asset(url('/').Storage::url($roomImage->feature_image))}}"
                                         style="height: 300px; width: 500px;object-fit:cover" alt="" >
                                    <div class="room-box-in">
                                        <h5 class="">{{$roomImage->room_type}}</h5>
                                        <p class="mt-3">{{Str::limit($roomImage->room_details, 20)}}</p>
                                        <a class="mt-1 btn btn-global" href="{{route('booking.show',$roomImage->room_slug)}}">book now</a>
                                        <div class="room-icons mt-4 pt-4">
                                            <img src="{{asset('ui/img/5.svg')}}" alt="">
                                            <img src="{{asset('ui/img/2.svg')}}" alt="">
                                            <img src="{{asset('ui/img/3.svg')}}" alt="">
                                            <img src="{{asset('ui/img/1.svg')}}" alt="">
                                            <a href="{{route('booking.show',$roomImage->room_slug)}}">full info</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @break($loop->iteration > 6)
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    @include('layouts.footer')

@endsection
