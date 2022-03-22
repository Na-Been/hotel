@extends('layouts.app')
@section('title','Gallery')
@section('navbar')
    @parent
@stop

@section('content')
    <!-- Primary Page Layout
	================================================== -->

    <div class="section big-55-height over-hide z-bigger">
        @if($galleryBannerImages != null)
            <div class="parallax parallax-top"
                 style="background-image: url({{asset(url('/').Storage::url($galleryBannerImages->image))}})"></div>
            <div class="dark-over-pages"></div>
        @endif
        <div class="hero-center-section pages">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 parallax-fade-top">
                        <div class="hero-text">Gallery</div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="section padding-top-bottom over-hide background-grey">
        <div class="container">
            <div class="row justify-content-center">
                @if($galleries != null)
                    @foreach($galleries as $gallery)
                        @php($images = json_decode($gallery->images))
                        <div class="col-md-6 mt-4">
                            <a href="{{asset(url('/').Storage::url('public/gallery/'.$images[0]))}}" data-fancybox="gallery">
                                <div class="room-box background-white" style="height: 355px; width: 540px">
                                    <img src="{{asset(url('/').Storage::url('public/gallery/'.$images[0]))}}"
                                         style="height: 100%; width: 100%; object-fit: cover" alt="">
                                </div>
                            </a>
                            <div>{{$gallery->image_title}}</div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    @include('layouts.footer')

@endsection
