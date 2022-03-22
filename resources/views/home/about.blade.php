@extends('layouts.app')
@section('title','About Us')
@section('navbar')
    @parent
@stop
@section('content')


    <!-- Primary Page Layout
	================================================== -->

    <div class="section big-55-height over-hide z-bigger">

        @if($aboutBannerImages != null)
            <div class="parallax parallax-top"
                 style="background-image: url({{asset(url('/').Storage::url($aboutBannerImages->image))}})"></div>
            <div class="dark-over-pages"></div>
        @endif
        <div class="dark-over-pages"></div>

        <div class="hero-center-section pages">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 parallax-fade-top">
                        <div class="hero-text">About Us</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section padding-top z-bigger">
        <div class="container">
            <div class="row justify-content-center padding-bottom-smaller">
                @if($aboutUsDatas != null)
                    @foreach($aboutUsDatas as $aboutUsData)
                        <div>{{$aboutUsData->title}}</div>
                        <div>{!! $aboutUsData->description !!}</div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
