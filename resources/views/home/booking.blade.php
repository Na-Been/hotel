@extends('layouts.app')
@section('title', 'Booking')
@section('navbar')
    @parent
@stop
@section('content')
    <!-- Primary Page Layout
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             ================================================== -->
    <div class="section big-55-height over-hide z-bigger">
        @if ($bookingBannerImages != null))

            <div class="parallax parallax-top"
                style="background-image: url({{ asset(url('/') . Storage::url($bookingBannerImages->image)) }})"></div>
            <div class="dark-over-pages"></div>

        @endif

        <div class="hero-center-section pages">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 parallax-fade-top">
                        <div class="hero-text">Book Now</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section padding-top-bottom-smaller background-dark-2 over-hide">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h5 class="color-grey">A new dimension of luxury.</h5>
                    <p class="color-white mt-3 mb-3"><em>our presentation, 0:48 min</em></p>
                    <a href="https://vimeo.com/54851233" class="video-button" data-fancybox><i class="fa fa-play"></i></a>
                </div>
            </div>
        </div>
    </div>


    <div class="section padding-top z-bigger">
        <div class="container">
            <form method="POST" action="{{ route('booking.store') }}">
                @csrf
                <div class="row justify-content-center padding-bottom-smaller">
                    <div class="col-md-8">
                        @include('session.sessionMessage')
                        <div class="subtitle with-line text-center mb-4">book room</div>
                        <h3 class="text-center padding-bottom-small">fill up this form to reserve</h3>
                    </div>
                    <div class="section clearfix"></div>
                    <div class="col-md-4 ajax-form">
                        <input name="name" type="text" placeholder="Your Name: *" autocomplete="off" />
                        @error('name')
                            <div class="text-danger text-center">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0 ajax-form">
                        <input name="email" type="email" placeholder="E-Mail: *" autocomplete="off" />
                        @error('email')
                            <div class="text-danger text-center">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="section clearfix"></div>
                    <br>
                    <div class="col-md-4 mt-4 mt-md-0 ajax-form">
                        <input name="number" type="number" placeholder="Contact Number: *" autocomplete="off" />
                        @error('number')
                            <div class="text-danger text-center">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0 ajax-form">
                        <input name="nationality" type="text" placeholder="Nationality: *" autocomplete="off" />
                        @error('nationality')
                            <div class="text-danger text-center">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="section clearfix text-center"></div>
                    <br>
                    <div class="col-md-4 mt-4 mt-md-0 ajax-form">

                        <select name="room_type" class="text-center" id="">
                            <option style="" selected disabled>Room Type(single/double/deluxe) : *</option>
                            <option value="single">Single</option>
                            <option value="double">Double</option>
                            <option value="deluxe">Deluxe</option>
                        </select>

                    </div>
                    @error('room_type')
                        <div class="text-danger text-center">{{ $message }}</div>
                    @enderror
                    <div class="col-md-4 mt-4 mt-md-0 ajax-form">
                        <select name="ac_or_non" class="text-center" id="">
                            <option style="" selected disabled>Ac/Non-Ac : *</option>
                            <option value="ac">AC</option>
                            <option value="non-ac">Non-Ac</option>
                        </select>

                        @error('room_type')
                            <div class="text-danger text-center">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="section clearfix"></div>
                    <br>
                    <div class="col-md-4 mt-4 mt-md-0 ajax-form">
                        <input name="arrival_date" type="text" placeholder="Arrival Date: *" onfocus="(this.type='date')"
                            autocomplete="off" />
                        @error('arrival_date')
                            <div class="text-danger text-center">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0 ajax-form">
                        <input name="check_out" type="text" placeholder=" Check out: *" onfocus="(this.type='date')"
                            autocomplete="off" />
                        @error('check_out')
                            <div class="text-danger text-center">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="section clearfix"></div>
                    <br>
                    <div class="col-md-4 mt-4 mt-md-0 ajax-form">
                        <input name="number_of_booked_room" type="number" placeholder="Number of Room: *"
                            autocomplete="off" />
                        @error('number_of_booked_room')
                            <div class="text-danger text-center">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0 ajax-form">
                        <input name="adult_number" type="number" placeholder="Number of Adults: *" autocomplete="off" />
                        @error('adult_number')
                            <div class="text-danger text-center">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="section clearfix"></div>
                    <div class="col-md-8 mt-4 ajax-form">
                        <input name="child_number" type="number" placeholder="Number of Child (Below 10): *"
                            autocomplete="off" />
                    </div>
                    <div class="section clearfix"></div>
                    <div class="col-md-8 mt-4 ajax-form">
                        <textarea name="message" placeholder="Remark"></textarea>
                    </div>
                    <div class="section clearfix"></div>
                    <div class="col-md-8 mt-3 ajax-checkbox">
                        <ul class="list">
                            <li class="list__item">
                                <label class="label--checkbox">
                                    <input type="checkbox" class="checkbox">
                                    collect my details through this form
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="section clearfix"></div>
                    <div class="col-md-8 mt-3 ajax-form text-center">
                        <button class="send_message btn-global" id="send" data-lang="en"><span>Reserve Now</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    @include('layouts.footer')
@endsection
