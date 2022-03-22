@extends('layouts.app')
@section('title','Details')
@section('navbar')
    @parent
@stop
@section('content')

    <!-- Primary Page Layout
    ================================================== -->

    <div class="section big-55-height over-hide">

        <div class="parallax parallax-top"
             style="background-image: url({{asset(url('/').Storage::url($roomDetails->feature_image))}})"></div>
        <div class="dark-over-pages"></div>

        <div class="hero-center-section pages">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 parallax-fade-top">
                        <div class="hero-text">Rooms Details</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section background-dark padding-top-bottom-smaller over-hide">
        <div class="section z-bigger">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 text-center">
                        <div class="amenities">
                            <img src="{{asset('ui/img/icons/1.svg')}}" alt="">
                            <p>no smoking</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 text-center">
                        <div class="amenities">
                            <img src="{{asset('ui/img/icons/2.svg')}}" alt="">
                            <p>big beds</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 text-center mt-4 mt-md-0">
                        <div class="amenities">
                            <img src="{{asset('ui/img/icons/3.svg')}}" alt="">
                            <p>yacht riding</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 text-center mt-4 mt-lg-0">
                        <div class="amenities">
                            <img src="{{asset('ui/img/icons/4.svg')}}" alt="">
                            <p>free drinks</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 text-center mt-4 mt-lg-0">
                        <div class="amenities">
                            <img src="{{asset('ui/img/icons/5.svg')}}" alt="">
                            <p>swimming pool</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 text-center mt-4 mt-lg-0">
                        <div class="amenities">
                            <img src="{{asset('ui/img/icons/6.svg')}}" alt="">
                            <p>room breakfast</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section padding-top-bottom z-bigger">
        <div class="section z-bigger">
            <div class="container">
                    @include('session.sessionMessage')
                <div class="row">
                    <div class="col-lg-8 mt-4 mt-lg-0">
                        <div class="section">
                            <div class="customNavigation rooms-sinc-1-2">
                                <a class="prev-rooms-sync-1"></a>
                                <a class="next-rooms-sync-1"></a>
                            </div>
                            <div id="rooms-sync1" class="owl-carousel">
                                @foreach($roomImages as $roomImage)
                                    <div class="item">
                                        <img src="{{asset(url('/').Storage::url('public/rooms/'.$roomImage))}}" alt=""
                                             style="width: 730px; height: 500px">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="section">
                            <div id="rooms-sync2" class="owl-carousel">
                                @foreach($roomImages as $roomImage)
                                    <div class="item">
                                        <img src="{{asset(url('/').Storage::url('public/rooms/'.$roomImage))}}" alt=""
                                             style="width: 146px; height: 99px">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="section pt-5">
                            <h5>description</h5>
                            <p class="mt-3">{{$roomDetails->room_details}}</p>
                        </div>
                        <div class="section pt-4">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="mb-3">Overview</h5>
                                </div>
                                <div class="col-lg-6">
                                    <p><strong class="color-black">Room type:</strong> {{$roomDetails->room_type}}</p>
                                    <p><strong class="color-black">Occupancy:</strong> Up to 4 adulds</p>
                                    <p><strong class="color-black">View:</strong> Sea view</p>
                                    <p><strong class="color-black">Smoking:</strong> No smoking</p>
                                </div>
                                <div class="col-lg-6">
                                    <p><strong class="color-black">Bed Capacity:</strong> {{$roomDetails->bed_capacity}}</p>
                                    <p><strong class="color-black">Location:</strong> Big room 2nd floor</p>
                                    <p><strong class="color-black">Room service:</strong> Yes</p>
                                    <p><strong class="color-black">Swimming pool:</strong> Yes</p>
                                </div>
                            </div>
                        </div>
                        <div class="section pt-4">
                            <h5>Features</h5>
                            <p class="mt-3">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore
                                et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum
                                exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi
                                consequatur.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 order-first order-lg-last">
                        <form method="POST" action="{{route('booking.update',$roomDetails->room_slug)}}">
                            @csrf
                            @method('PATCH')
                            <div class="section background-dark p-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-daterange input-group" id="flight-datepicker">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-item">
                                                        <span class="fontawesome-calendar"></span>
                                                        <input class="input-sm" type="text" autocomplete="off"
                                                               id="start-date-1" name="arrival_date"
                                                               placeholder="chech-in date"
                                                               data-date-format="DD, MM d"/>
                                                        <span class="date-text date-depart"></span>
                                                    </div>
                                                    @error('arrival_date')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-12 pt-4">
                                                    <div class="form-item">
                                                        <span class="fontawesome-calendar"></span>
                                                        <input class="input-sm" type="text" autocomplete="off"
                                                               id="end-date-1" name="check_out" placeholder="check-out date"
                                                               data-date-format="DD, MM d"/>
                                                        <span class="date-text date-return"></span>
                                                    </div>
                                                    @error('check_out')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12 pt-4">
                                                <div class="form-item">
                                                    <input class="input-sm" type="text" autocomplete="off"
                                                           name="name" placeholder="Full Name"
                                                           style="padding:7px 0px 7px 15px; width:100%"/>
                                                </div>
                                                @error('name')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12 pt-4">
                                                <div class="form-item">
                                                    <input class="input-sm" type="email" autocomplete="off"
                                                           name="email" placeholder="email@example.com"
                                                           style="padding:7px 0px 7px 15px;  width:100%"/>
                                                </div>
                                                @error('email')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12 pt-4">
                                                <div class="form-item">
                                                    <input class="input-sm" type="text" autocomplete="off"
                                                           name="number" placeholder="Contact Number"
                                                           style="padding:7px 0px 7px 15px; width:100%"/>
                                                </div>
                                                @error('number')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12 pt-4">
                                                <div class="form-item">
                                                    <input class="input-sm" type="text" autocomplete="off"
                                                           name="nationality" placeholder="Your Nationality"
                                                           style="padding:7px 0px 7px 15px;width:100%"/>
                                                </div>
                                                @error('nationality')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12 pt-4">
                                                <div class="form-item">
                                                    <input class="input-sm" type="text" autocomplete="off"
                                                           name="number_of_booked_room" placeholder="Number of Rooms"
                                                           style="padding:7px 0px 7px 15px;width:100%"/>
                                                </div>
                                                @error('number_of_booked_room')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12 pt-4">
                                                <select name="adult_number" class="wide">
                                                    <option data-display="adults">adults</option>
                                                    @for($i=1 ; $i<=10; $i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                                @error('adult_number')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            <div class="col-12 pt-4">
                                                <select name="child_number" class="wide">
                                                    <option data-display="children">children</option>
                                                    @for($i=1 ; $i<=10; $i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 pt-4">
                                        <button class="booking-button" type="submit">book now</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section padding-bottom over-hide">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($availableRooms as $availableRoom)
                        <div class="col-lg-4" data-scroll-reveal="enter bottom move 50px over 0.7s after 0.2s">
                            <div class="room-box background-grey">
                                <div class="room-name">suite tanya</div>
                                <div class="room-per">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <img src="{{asset(url('/').Storage::url($availableRoom->feature_image))}}" alt=""
                                     style="height: 275px; width: 355px">
                                <div class="room-box-in">
                                    <h5 class="">pool suite</h5>
                                    <p class="mt-3">Sed ut perspiciatis unde omnis, totam rem aperiam, eaque ipsa quae
                                        ab illo
                                        inventore veritatis et.</p>
                                    <a class="mt-1 btn btn-global" href="{{route('booking.show',$availableRoom->room_slug)}}">book
                                        now</a>
                                    <div class="room-icons mt-4 pt-4">
                                        <img src="{{asset('ui/img/5.svg')}}" alt="">
                                        <img src="{{asset('ui/img/2.svg')}}" alt="">
                                        <img src="{{asset('ui/img/3.svg')}}" alt="">
                                        <a href="{{route('booking.show',$availableRoom->room_slug)}}">full info</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @break($loop->iteration >= 4)
                @endforeach
            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
