@extends('layouts.app')
@section('title','Blog')
@section('navbar')
    @parent
@stop
@section('content')
    <!-- Primary Page Layout
	================================================== -->
    <div class="section big-55-height over-hide z-bigger">

        @if($blogBannerImages != null)
            <div class="parallax parallax-top"
                 style="background-image: url({{asset(url('/').Storage::url($blogBannerImages->image))}})"></div>
            <div class="dark-over-pages"></div>
        @endif
        <div class="dark-over-pages"></div>

        <div class="hero-center-section pages">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 parallax-fade-top">
                        <div class="hero-text">Blog</div>
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
                    <a href="https://vimeo.com/54851233" class="video-button" data-fancybox><i
                            class="fa fa-play"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="section padding-top-bottom over-hide">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 align-self-center">
                    <div class="subtitle with-line text-center mb-4">a bit about us</div>
                    <h3 class="text-center padding-bottom-small">finest hotel</h3>
                </div>
                <div class="section clearfix"></div>
                <div class="col-md-4">
                    <div class="services-box text-center">
                        <img src="{{asset('ui/img/4.svg')}}" alt="">
                        <h5 class="mt-2">welcome drink</h5>
                        <p class="mt-3">Sed ut perspiciatis unde omnis iste natus error sit, totam rem aperiam, eaque
                            ipsa quae ab illo inventore veritatis et.</p>
                        <a class="mt-1 btn btn-global" href="#">read more</a>
                    </div>
                </div>
                <div class="col-md-4 mt-5 mt-md-0">
                    <div class="services-box text-center">
                        <img src="{{asset('ui/img/5.svg')}}" alt="">
                        <h5 class="mt-2">swimming pool</h5>
                        <p class="mt-3">Sed ut perspiciatis unde omnis iste natus error sit, totam rem aperiam, eaque
                            ipsa quae ab illo inventore veritatis et.</p>
                        <a class="mt-1 btn btn-global" href="#">read more</a>
                    </div>
                </div>
                <div class="col-md-4 mt-5 mt-md-0">
                    <div class="services-box text-center">
                        <img src="{{asset('ui/img/6.svg')}}" alt="">
                        <h5 class="mt-2">food included</h5>
                        <p class="mt-3">Sed ut perspiciatis unde omnis iste natus error sit, totam rem aperiam, eaque
                            ipsa quae ab illo inventore veritatis et.</p>
                        <a class="mt-1 btn btn-global" href="#">read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section padding-top-bottom over-hide background-grey">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($blogs as $blog)
                    <div class="col-md-6 mt-4" data-scroll-reveal="enter bottom move 50px over 0.7s after 0.4s">
                        <div class="room-box background-white" style="height: 300px; width: 500px">
                            <!-- <div class="room-name">{{$blog->title}}</div> -->
                           <div class="rblog-image"  style="height: 200px; width: 500px">
                           <img src="{{asset(url('/').Storage::url($blog->image))}}"
                                 style="width:100%;object-fit:cover" alt=""></div>
                            <div class="room-box-in" style="    backdrop-filter: brightness(0.5);
    color: #fff;">
                                <h5 class="text-white">{{$blog->title}}</h5>
                                <p class="mt-3">{!!Str::limit($blog->description, 20)!!}</p>
                                <a class="mt-1 btn btn-global" href="#">read more</a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

    <div class="section padding-top-bottom-big over-hide mt-3 mb-5">
        @if($blogBannerImages != null)
            <div class="parallax"
                 style="background-image: url({{asset(url('/').Storage::url($blogBannerImages->image))}})"></div>
            <div class="section z-bigger">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div id="owl-sep-1" class="owl-carousel owl-theme">
                                <div class="item">
                                    <div class="quote-sep">
                                        <h4>"Every good day starts off with a cappuccino, and there's no place
                                            better to enjoy some frothy caffeine than at the Thalia Hotel."</h4>
                                        <h6>Jason Salvatore</h6>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="quote-sep">
                                        <h4>"Every good day starts off with a cappuccino, and there's no place
                                            better to enjoy some frothy caffeine than at the Thalia Hotel."</h4>
                                        <h6>Terry Mitchell</h6>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="quote-sep">
                                        <h4>"I still enjoy traveling a lot. I mean, it amazes me that I still get
                                            excited in hotel rooms just to see what kind of shampoo they've left
                                            me."</h4>
                                        <h6>Michael Brighton</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    </div>

    @include('layouts.footer')

@endsection
