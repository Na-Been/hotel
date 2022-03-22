@extends('layouts.app')
@section('title','Home')
@section('navbar')
    @parent
@stop
@section('content')

    @if($bannerImages != null)
        <div class="section background-dark over-hide">
            <div class="hero-center-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-10 col-sm-8 parallax-fade-top">
                            <div class="hero-text">{{$bannerImages[0]->image_description ?? ' '}}</div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="slideshow">
                @if ($bannerImages != null)
                    @foreach ($bannerImages as $bannerImage)
                        @if ($bannerImage->section == 1)
                            @php($decodeImage = json_decode($bannerImage->images))
                            @for ($i = 0; $i < count($decodeImage); $i++)
                                <div class="slide parallax-top">
                                    <figure class="slide__figure">
                                        <div class="slide__figure-inner">
                                            <div class="slide__figure-img"
                                                 style="background-image: url('{{ asset(url('/') . Storage::url('public/bannerImage/' . $decodeImage[$i])) }}')">
                                            </div>
                                            <div class="slide__figure-reveal"></div>
                                        </div>
                                    </figure>
                                </div>
                            @endfor
                        @endif
                    @endforeach
                @else
                    <div class="slide parallax-top">
                        <figure class="slide__figure">
                            <div class="slide__figure-inner">
                                <div class="slide__figure-img"
                                     style="background-image: url({{ asset('ui/img/missionhotellogo.png') }})"></div>
                                <div class="slide__figure-reveal"></div>
                            </div>
                        </figure>
                    </div>
            @endif

            <!-- revealer -->
                <div class="revealer">
                    <div class="revealer__item revealer__item--left"></div>
                    <div class="revealer__item revealer__item--right"></div>
                </div>
                <nav class="arrow-nav fade-top">
                    <button class="arrow-nav__item arrow-nav__item--prev">
                        <svg class="icon icon--nav">
                            <use xlink:href="#icon-nav"></use>
                        </svg>
                    </button>
                    <button class="arrow-nav__item arrow-nav__item--next">
                        <svg class="icon icon--nav">
                            <use xlink:href="#icon-nav"></use>
                        </svg>
                    </button>
                </nav>
                <!-- navigation -->
                <nav class="nav fade-top">
                    <button class="nav__button">
                        <span class="nav__button-text"></span>
                    </button>
                    <h2 class="nav__chapter">Discover Your Paradise</h2>
                    <div class="toc">
                        <a class="toc__item" href="#entry-1">
                            <span class="toc__item-title">Discover Your Paradise</span>
                        </a>
                        <a class="toc__item" href="#entry-2">
                            <span class="toc__item-title">Feel Like Hotel</span>
                        </a>
                        <a class="toc__item" href="#entry-3">
                            <span class="toc__item-title">Ruby Valley</span>
                        </a>
                    </div>
                </nav>
                <!-- little sides -->
                <div class="slideshow__indicator"></div>
                <div class="slideshow__indicator"></div>
            </div>
        </div>

        @if ($bannerImages != null)
            @foreach ($bannerImages as $bannerImage)

                @if ($bannerImage->section == 2)
                    <div class="section padding-top-bottom over-hide">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <div class="row justify-content-center">
                                        <div class="col-10">
                                            <div class="subtitle text-center mb-4">
                                                {{ $setting->dashboard_title ?? 'Hotel Title' }}</div>
                                            <h2 class="text-center">{{ $bannerImage->image_title }}</h2>
                                            <p class="text-center mt-5">{{ $bannerImage->image_description }} </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4 mt-md-0">
                                    <div class="img-wrap" style="position: relative;">
                                        <div class="wrap wrap-1">
                                            <img src="{{ asset(url('/') . Storage::url($bannerImage->image)) }}" alt="">
                                        </div>
                                        <div class="wrap wrap-2">
                                            <img src="{{ asset(url('/') . Storage::url($bannerImage->image)) }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="section background-grey over-hide">
                    <div class="container-fluid px-0">
                        @if ($bannerImage->section == 3)
                            <div class="row mx-0">
                                <div class="col-xl-6 px-0">
                                    <div class="img-wrap" id="rev-1">
                                        <img
                                            src="{{ asset(url('/') . Storage::url($bannerImage->image)) ?? asset('ui/img/missionhotellogo.png') }}"
                                            alt="">
                                        <div class="text-element-over">{{ $bannerImage->image_title }}</div>
                                    </div>
                                </div>
                                <div class="col-xl-6 px-0 mt-4 mt-xl-0 align-self-center">
                                    <div class="row justify-content-center">
                                        <div class="col-10 col-xl-8 text-center">
                                            <h3 class="text-center">{{ $bannerImage->image_title }}</h3>
                                            <p class="text-center mt-4">{{ $bannerImage->image_description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($bannerImage->section == 5)
                            <div class="row mx-0">
                                <div class="col-xl-6 px-0 mt-4 mt-xl-0 pb-5 pb-xl-0 align-self-center">
                                    <div class="row justify-content-center">
                                        <div class="col-10 col-xl-8 text-center">
                                            <h3 class="text-center">{{ $bannerImage->image_title }}</h3>
                                            <p class="text-center mt-4">{{ $bannerImage->image_description }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 px-0 order-first order-xl-last mt-5 mt-xl-0">
                                    <div class="img-wrap" id="rev-2">
                                        <img src="{{ asset(url('/') . Storage::url($bannerImage->image)) }}" alt="">
                                        <div class="text-element-over">{{ $bannerImage->image_title }}</div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
        <div class="section background-dark over-hide mt-2">
            <div class="container-fluid py-4">
                <div class="row">
                    @if ($sliderImages != null)
                        @foreach ($sliderImages as $sliderImage)
                            @if ($sliderImage->image_title == 'Slider')
                                @php($images = json_decode($sliderImage->images))
                                @if (count($images) == 4)
                                    @foreach ($images as $image)
                                        <div class="col-sm-6 col-lg-3">
                                            <a href="{{ asset(url('/') . Storage::url('public/gallery/' . $image)) }}"
                                               data-fancybox="gallery">
                                                <div class="img-wrap services-wrap">
                                                    <img
                                                        src="{{ asset(url('/') . Storage::url('public/gallery/' . $image)) }}"
                                                        alt="">
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            @endif
                        @endforeach
                    @else
                        <div class="col-sm-6 col-lg-3">
                            <a href="#">
                                <div class="img-wrap services-wrap">
                                    <img src="{{ asset('ui/img/missionhotellogo.png') }}" alt="">
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="section padding-top-bottom over-hide">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 align-self-center">
                        <div class="subtitle with-line text-center mb-4">elegant suites</div>
                        <h3 class="text-center padding-bottom-small">Unpretentious luxury</h3>
                    </div>
                    <div class="section clearfix"></div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="services-box text-center">
                            <img src="{{ asset('ui/img/1.svg') }}" alt="">
                            <h5 class="mt-2">smoking free</h5>
                            <p class="mt-3">Sed ut perspiciatis unde omnis iste natus error sit, totam rem aperiam,
                                eaque
                                ipsa quae ab illo inventore veritatis et.</p>
                            <a class="mt-1 btn btn-global" href="#">read more</a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mt-5 mt-sm-0">
                        <div class="services-box text-center">
                            <img src="{{ asset('ui/img/2.svg') }}" alt="">
                            <h5 class="mt-2">king beds</h5>
                            <p class="mt-3">Sed ut perspiciatis unde omnis iste natus error sit, totam rem aperiam,
                                eaque
                                ipsa quae ab illo inventore veritatis et.</p>
                            <a class="mt-1 btn btn-global" href="#">read more</a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mt-5 mt-lg-0">
                        <div class="services-box text-center">
                            <img src="{{ asset('ui/img/3.svg') }}" alt="">
                            <h5 class="mt-2">Yacht rental</h5>
                            <p class="mt-3">Sed ut perspiciatis unde omnis iste natus error sit, totam rem aperiam,
                                eaque
                                ipsa quae ab illo inventore veritatis et.</p>
                            <a class="mt-1 btn btn-global" href="#">read more</a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mt-5">
                        <div class="services-box text-center">
                            <img src="{{ asset('ui/img/4.svg') }}" alt="">
                            <h5 class="mt-2">welcome drink</h5>
                            <p class="mt-3">Sed ut perspiciatis unde omnis iste natus error sit, totam rem aperiam,
                                eaque
                                ipsa quae ab illo inventore veritatis et.</p>
                            <a class="mt-1 btn btn-global" href="#">read more</a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mt-5">
                        <div class="services-box text-center">
                            <img src="{{ asset('ui/img/5.svg') }}" alt="">
                            <h5 class="mt-2">swimming pool</h5>
                            <p class="mt-3">Sed ut perspiciatis unde omnis iste natus error sit, totam rem aperiam,
                                eaque
                                ipsa quae ab illo inventore veritatis et.</p>
                            <a class="mt-1 btn btn-global" href="#">read more</a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mt-5">
                        <div class="services-box text-center">
                            <img src="{{ asset('ui/img/6.svg') }}" alt="">
                            <h5 class="mt-2">food included</h5>
                            <p class="mt-3">Sed ut perspiciatis unde omnis iste natus error sit, totam rem aperiam,
                                eaque
                                ipsa quae ab illo inventore veritatis et.</p>
                            <a class="mt-1 btn btn-global" href="#">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section padding-top-bottom-big over-hide">
            @if ($bannerImages != null)
                @foreach ($bannerImages as $bannerImage)
                    @php($set = $bannerImage->section == 4?true:false)
                    @if ($set)
                        <div class="parallax"
                             style="background-image: url({{ asset(url('/') . Storage::url($bannerImage->image)) }})">
                        </div>
                    @else
                        <div class="parallax"
                             style="background-image: url({{ asset('ui/img/5.svg') }}">
                        </div>
                    @endif
                @endforeach
            @endif
        </div>


        <div class="section padding-top-bottom over-hide background-grey">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 align-self-center">
                        <div class="subtitle with-line text-center mb-4">luxury</div>
                        <h3 class="text-center padding-bottom-small">Our rooms</h3>
                    </div>
                    <div class="section clearfix"></div>
                    @if ($rooms->isNotEmpty())
                        @foreach ($rooms as $room)
                            <div class="col-md-6 mt-2 mb-2">
                                <div class="room-box background-white" style="width: 500px">
                                    <div class="room-name">suite tanya</div>
                                    <div class="room-per">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <img src="{{ asset(url('/') . Storage::url($room->feature_image)) }}" style="    height: 300px;
                                        width: 500px;
                                        object-fit: cover;" alt="">
                                    <div class="room-box-in">
                                        <h5 class="">{{ $room->room_type }}</h5>
                                        <p class="mt-3">{{ $room->room_details }}</p>
                                        <a class="mt-1 btn btn-global"
                                           href="{{ route('booking.show', $room->room_slug) }}">book
                                            now</a>
                                        <div class="room-icons mt-4 pt-4">
                                            <img src="{{ asset('ui/img/5.svg') }}" alt="">
                                            <img src="{{ asset('ui/img/2.svg') }}" alt="">
                                            <img src="{{ asset('ui/img/3.svg') }}" alt="">
                                            <img src="{{ asset('ui/img/1.svg') }}" alt="">
                                            <a href="{{ route('booking.show', $room->room_slug) }}">full info</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @break($loop->iteration == 4)
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        @if ($bannerImages != null)
            @foreach ($bannerImages as $bannerImage)
                @if ($bannerImage->section == 6)
                    <div class="section padding-top-bottom-big over-hide">
                        <div class="parallax"
                             style="background-image: url({{ asset(url('/') . Storage::url($bannerImage->image)) }})"></div>
                        <div class="section z-bigger">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div id="owl-sep-1" class="owl-carousel owl-theme">
                                            <div class="item">
                                                <div class="quote-sep">
                                                    <h4>"Chilling out on the bed in your hotel room watching television,
                                                        while wearing
                                                        your own pajamas, is sometimes the best part of a
                                                        vacation."</h4>
                                                    <h6>Jason Salvatore</h6>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="quote-sep">
                                                    <h4>"Every good day starts off with a cappuccino, and there's no
                                                        place
                                                        better to
                                                        enjoy some frothy caffeine than at the Thalia Hotel."</h4>
                                                    <h6>Terry Mitchell</h6>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="quote-sep">
                                                    <h4>"I still enjoy traveling a lot. I mean, it amazes me that I
                                                        still
                                                        get excited in
                                                        hotel rooms just to see what kind of shampoo they've left
                                                        me."</h4>
                                                    <h6>Michael Brighton</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif

        <div class="section padding-top-bottom-small background-dark-2 over-hide">
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

        <div class="section padding-top z-bigger">
            <div class="container">
                <div class="row justify-content-center padding-bottom-smaller">
                    <div class="col-md-8">
                        <div class="subtitle with-line text-center mb-4">get in touch</div>
                        <h3 class="text-center padding-bottom-small">drop us a line</h3>
                    </div>
                    <div class="section clearfix"></div>
                    <div class="col-md-6 col-lg-4">
                        <div class="address">
                            <div class="address-in text-left">
                                <p class="color-black">Address:</p>
                            </div>
                            <div class="address-in text-right">
                                <p>{{ $setting->address ?? 'Place name' }}</p>
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
                                <p>{{ $setting->check_in ?? 'checkin time' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="address">
                            <div class="address-in text-left">
                                <p class="color-black">Phone:</p>
                            </div>
                            <div class="address-in text-right">
                                <p>{{ $setting->phone ?? '+(977)' }}</p>
                            </div>
                        </div>
                        <div class="address">
                            <div class="address-in text-left">
                                <p class="color-black">Email:</p>
                            </div>
                            <div class="address-in text-right">
                                <p>{{ $setting->email ?? 'info@hotel.com' }}</p>
                            </div>
                        </div>
                        <div class="address">
                            <div class="address-in text-left">
                                <p class="color-black">Check-Out:</p>
                            </div>
                            <div class="address-in text-right">
                                <p>{{ $setting->check_out ?? 'checkout time' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="section clearfix"></div>
                    <div class="col-md-8 text-center mt-5"
                         data-scroll-reveal="enter bottom move 50px over 0.7s after 0.2s">
                        <p class="mb-0"><em>available at: {{ $setting->check_in ?? ' ' }}
                                - {{ $setting->check_out ?? ' ' }}</em></p>
                        <h2 class="text-opacity">{{ $setting->phone ?? '+(977)' }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div id="owl-sep-2" class="owl-carousel owl-theme">
                @if ($sliderImages->isNotEmpty())
                    @foreach ($sliderImages as $sliderImage)
                        @if ($sliderImage->image_title == 'Moving Slider')
                            @php($images = json_decode($sliderImage->images))
                            @foreach ($images as $image)
                                <div class="item" style=" height: 150px">
                                    <a href="{{ asset(url('/') . Storage::url('public/gallery/' . $image)) }}"
                                       data-fancybox="gallery">
                                        <div class="img-wrap gallery-small">
                                            <img style=" height: 150px"
                                                 src="{{ asset(url('/') . Storage::url('public/gallery/' . $image)) }}"
                                                 alt="">
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                @else
                    <div class="item">
                        <a href="{{ asset('assets/img/image_placeholder.jpg') }}" data-fancybox="gallery">
                            <div class="img-wrap gallery-small">
                                <img src="{{ asset('assets/img/image_placeholder.jpg') }}" alt="">
                            </div>
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <div class="section padding-top-bottom-small  over-hide footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 text-center text-md-left">
                        @if ($setting != null)
                            <img src="{{ asset(url('/') . Storage::url($setting->logo)) }}" alt="">
                        @else
                            <img src="{{ asset('ui/img/logos/missiologo.jpg') }}" alt="">
                        @endif
                        <p class=" mt-4">{{ ucfirst($setting->address ?? 'location') }}<br>Dhading, Nepal</p>
                    </div>
                    <div class="col-md-4 text-center text-md-left">
                        <h6 class=" mb-3">Information</h6>
                        <a href="#">Terms &amp; Conditions</a>
                        <a href="{{ route('hotel.blogs') }}">Blog</a>
                        <a href="{{ route('hotel.food') }}">Restaurant</a>
                        <a href="{{ route('hotel.contacts') }}">Contact</a>
                        <a href="{{ route('hotel.gallery') }}">Gallery</a>
                    </div>
                    <div class="col-md-5 mt-4 mt-md-0 text-center text-md-left logos-footer">
                        <h6 class=" mb-3">About us</h6>
                        <p class=" mb-4">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                            praesentium voluptatum deleniti atque corrupti quos dolores.</p>
                        <ul class="footer-social-links">
                            <li><a href=""> <img src="{{ asset('ui/img/icons/facebook.svg') }}" alt=""></a>
                            </li>
                            <li><a href=""> <img src="{{ asset('ui/img/icons/instagram.svg') }}" alt=""></a>
                            </li>
                            <li><a href=""> <img src="{{ asset('ui/img/icons/twitter.svg') }}" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection
