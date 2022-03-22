@extends('layouts.app')
@section('title','Contacts')
@section('navbar')
    @parent
@stop
@section('content')


    <!-- Primary Page Layout
	================================================== -->

    <div class="section big-55-height over-hide z-bigger">

        @if($contactBannerImages != null)
            <div class="parallax parallax-top"
                 style="background-image: url({{asset(url('/').Storage::url($contactBannerImages->image))}})"></div>
            <div class="dark-over-pages"></div>
        @endif
        <div class="dark-over-pages"></div>

        <div class="hero-center-section pages">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 parallax-fade-top">
                        <div class="hero-text">Contact</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section padding-top z-bigger">
        <form method="POST" action="{{route('feedback.store')}}">
            @csrf
            <div class="container">
                @include('session.sessionMessage')
                <div class="row justify-content-center padding-bottom-smaller">
                    <div class="col-md-8">
                        <div class="subtitle with-line text-center mb-4">get in touch</div>
                        <h3 class="text-center padding-bottom-small">drop us a line</h3>
                    </div>
                    <div class="section clearfix"></div>
                    <div class="col-md-4 ajax-form">
                        <input name="name" type="text" placeholder="Your Name: *" autocomplete="off"/>
                        @error('name')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0 ajax-form">
                        <input name="email" type="text" placeholder="E-Mail: *" autocomplete="off"/>
                        @error('email')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="section clearfix"></div>
                    <div class="col-md-8 mt-4 ajax-form">
                        <textarea name="message" placeholder="Tell Us Everything"></textarea>
                        @error('message')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
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
                        <button class="send_message" id="send" data-lang="en"><span>submit</span></button>
                    </div>
                    <div class="section clearfix"></div>
                    <div class="col-md-8 padding-top-bottom">
                        <div class="sep-line"></div>
                    </div>
                    <div class="section clearfix"></div>
                    <div class="col-md-6 col-lg-4">
                        <div class="address">
                            <div class="address-in text-left">
                                <p class="color-black">Address:</p>
                            </div>
                            <div class="address-in text-right">
                                <p>{{$setting->address ?? "Place name"}}</p>
                            </div>
                        </div>
                        <div class="address">
                            <div class="address-in text-left">
                                <p class="color-black">City:</p>
                            </div>
                            <div class="address-in text-right">
                                <p>Dhading</p>
                            </div>
                        </div>
                        <div class="address">
                            <div class="address-in text-left">
                                <p class="color-black">Check-In:</p>
                            </div>
                            <div class="address-in text-right">
                                <p>{{$setting->check_in ?? 'checkin time'}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="address">
                            <div class="address-in text-left">
                                <p class="color-black">Phone:</p>
                            </div>
                            <div class="address-in text-right">
                                <p>{{$setting->phone ?? "+(977)"}}</p>
                            </div>
                        </div>
                        <div class="address">
                            <div class="address-in text-left">
                                <p class="color-black">Email:</p>
                            </div>
                            <div class="address-in text-right">
                                <p>{{$setting->email ?? "info@hotel.com"}}</p>
                            </div>
                        </div>
                        <div class="address">
                            <div class="address-in text-left">
                                <p class="color-black">Check-Out:</p>
                            </div>
                            <div class="address-in text-right">
                                <p>{{$setting->check_out ?? 'checkout time'}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="section clearfix"></div>
                    <div class="col-md-8 text-center mt-5"
                         data-scroll-reveal="enter bottom move 50px over 0.7s after 0.2s">
                        <p class="mb-0"><em>available at: {{$setting->check_in?? ' '}} - {{$setting->check_out ?? ' '}}</em></p>
                        <h2 class="text-opacity">{{$setting->phone ?? "+(977)"}}</h2>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @include('layouts.footer')
@endsection
