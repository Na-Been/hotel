@extends('layouts.app')
@section('title','Food&Bar')
@section('navbar')
    @parent
@stop

@section('content')
    <!-- Primary Page Layout
	================================================== -->

    <div class="section big-55-height over-hide z-bigger">
        @if($barBannerImages != null)
            <div class="parallax parallax-top"
                 style="background-image: url({{asset(url('/').Storage::url($barBannerImages->image))}})"></div>
            <div class="dark-over-pages"></div>
        @endif

        <div class="hero-center-section pages">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 parallax-fade-top">
                        <div class="hero-text">Food &amp; Bar</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section padding-top-bottom over-hide background-grey">
        <div class="container">
            <div class="row justify-content-center">
                <div class="row justify-content-center">
                    @if($foodAndBars != null)
                        @foreach($foodAndBars as $foodAndBar)
                           @php($decodeFood = json_decode($foodAndBar->images))
                        @for($i=0; $i<count($decodeFood); $i++)
                            <div class="col-md-6 mt-4">
                                <div class="room-box background-white" style="height: 355px; width: 540px">
                                    <img src="{{asset(url('/').Storage::url('public/gallery/'.$decodeFood[$i]))}}" style="height: 355px; width: 540px"
                                         alt="">
                                </div>
                            </div>
                            @endfor
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
