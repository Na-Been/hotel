<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    @if($setting != null)
    <title>{{ucfirst($setting->dashboard_title).' | ' ?? ''}} @yield('title')  </title>
    @endif
    <meta name="description" content="Professional Creative Template"/>
    <meta name="author" content="IG Design">
    <meta name="keywords"
          content="ig design, website, design, html5, css3, jquery, creative, clean, animated, portfolio, blog, one-page, multi-page, corporate, business,"/>
    <meta property="og:title" content="Professional Creative Template"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:image:width" content="470"/>
    <meta property="og:image:height" content="246"/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content="Professional Creative Template"/>
    <meta name="twitter:card" content=""/>
    <meta name="twitter:site" content="https://twitter.com/IvanGrozdic"/>
    <meta name="twitter:domain" content="http://ivang-design.com/"/>
    <meta name="twitter:title" content=""/>
    <meta name="twitter:description" content="Professional Creative Template"/>
    <meta name="twitter:image" content="http://ivang-design.com/"/>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#212121"/>
    <meta name="msapplication-navbutton-color" content="#212121"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="#212121"/>

    <!-- Web Fonts
    ================================================== -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"/>
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('ui/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('ui/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('ui/css/ionicons.min.css')}}" />
    <link rel="stylesheet" href="{{asset('ui/css/datepicker.css')}}" />
    <link rel="stylesheet" href="{{asset('ui/css/jquery.fancybox.min.css')}}" />
    <link rel="stylesheet" href="{{asset('ui/css/owl.carousel.css')}}" />
    <link rel="stylesheet" href="{{asset('ui/css/owl.transitions.css')}}" />
    <link rel="stylesheet" href="{{asset('ui/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('ui/css/colors/color.css')}}" />
    <link rel="stylesheet" href="{{asset('css/own.css')}}" />

    <!-- Favicons
    ================================================== -->
    @if($setting != null)
        <link rel="icon" type="image/png" href="{{asset(url('/').Storage::url($setting->logo))}}">
    @else
        <link rel="icon" type="image/png" href="{{asset('ui/favicon.png')}}">
    @endif

</head>

<body>

@section('navbar')
    <!-- Basic Page Needs
    ================================================== -->

    <div class="loader">
        <div class="loader__figure"></div>
    </div>

    <svg class="hidden">
        <svg id="icon-nav" viewBox="0 0 152 63">
            <title>navarrow</title>
            <path
                d="M115.737 29L92.77 6.283c-.932-.92-1.21-2.84-.617-4.281.594-1.443 1.837-1.862 2.765-.953l28.429 28.116c.574.57.925 1.557.925 2.619 0 1.06-.351 2.046-.925 2.616l-28.43 28.114c-.336.327-.707.486-1.074.486-.659 0-1.307-.509-1.69-1.437-.593-1.442-.315-3.362.617-4.284L115.299 35H3.442C2.032 35 .89 33.656.89 32c0-1.658 1.143-3 2.552-3H115.737z"/>
        </svg>
    </svg>


    <!-- Nav and Logo
    ================================================== -->

    <nav id="menu-wrap" class="menu-back cbp-af-header">
        <div class="menu-top background-black">
            <div class="container">
                <div class="row">
                    <div class="col-6 px-0 px-md-3 pl-1 py-3">
                        <span class="call-top">call us:</span>
                        <a href="#" class="call-top">{{$setting->phone ?? "+(977)"}} </a>
                    </div>
                    <div class="col-6 px-0 px-md-3 py-3  text-right">
                        <ul class="menu-top-email">
                            <span class="call-top">Email :</span>
                            <a href="#">{{$setting->email ?? 'email@email.com'}}</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="menu">
            <a href="{{url('/')}}">
                <div class="logo">
                    @if($setting != null)
                        <img src="{{asset(url('/').Storage::url($setting->logo))}}" loading="lazy" alt="">
                    @else
                        <img src="{{asset('ui/img/missionhotellogo.png')}}" loading="lazy" alt="">
                    @endif
                </div>
            </a>
            <ul>
                <li>
                    <a class="{{(request()->routeIs('home')? 'curent-page' : '')}}" href="{{url('/')}}">home</a>
                </li>
                <li>
                    <a class="{{(request()->routeIs('hotel.rooms')? 'curent-page':'')}}"
                       href="{{route('hotel.rooms')}}">rooms</a>
                </li>
                <li>
                    <a class="{{(request()->routeIs('hotel.gallery')? 'curent-page': '')}}"
                       href="{{route('hotel.gallery')}}">gallery</a>
                </li>
                <li>
                    <a class="{{(request()->routeIs('hotel.food')? 'curent-page':'')}}" href="{{route('hotel.food')}}">food
                        & bar</a>
                </li>
                <li>
                    <a class="{{(request()->routeIs('hotel.about')? 'curent-page':'')}}"
                       href="{{route('hotel.about')}}">about us</a>
                </li>
                <li>
                    <a class="{{(request()->routeIs('hotel.blogs')? 'curent-page':'')}}"
                       href="{{route('hotel.blogs')}}">blog</a>
                </li>
                <li>
                    <a class="{{(request()->routeIs('hotel.contacts')? 'curent-page':'')}}"
                       href="{{route('hotel.contacts')}}">contact</a>
                </li>
                <li>
                    <a class="{{(request()->routeIs('booking.index')? 'curent-page':'')}}"
                       href="{{route('booking.index')}}">Book Now</a>
                </li>
            </ul>
        </div>
    </nav>
@show
@yield('content')


<div class="section py-4 background-dark over-hide footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-2 mb-md-0">
                <p>{{now()->year}} © {{$setting->dashboard_title??"Company Name"}}. All rights reserved.</p>
            </div>
        </div>
    </div>
</div>


<div class="scroll-to-top"></div>
<!-- JAVASCRIPT
================================================== -->
<script src="{{asset('ui/js/jquery.min.js')}}"></script>
<script src="{{asset('ui/js/popper.min.js')}}"></script>
<script src="{{asset('ui/js/bootstrap.min.js')}}"></script>
<script src="{{asset("ui/js/plugins.js")}}"></script>
<script src="{{asset("ui/js/flip-slider.js")}}"></script>
<script src="{{asset('ui/js/reveal-home.js')}}"></script>
<script src="{{asset('ui/js/custom.js')}}"></script>
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.sitekey') }}"></script>
<!-- End Document
================================================== -->
</body>
@yield('script')
</html>
