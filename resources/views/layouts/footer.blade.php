@if($sliderImages->isNotEmpty())
    <div class="section mb-2">
        <div id="owl-sep-2" class="owl-carousel owl-theme">
            @foreach($sliderImages as $sliderImage)
                @if($sliderImage->image_title == 'Moving Slider')
                    @php($images = json_decode($sliderImage->images))
                    @foreach($images as $image)
                        <div class="item" style=" height: 150px">
                            <a href="{{asset(url('/').Storage::url('public/gallery/'.$image))}}"
                               data-fancybox="gallery">
                                <div class="img-wrap gallery-small">
                                    <img style=" height: 150px"
                                         src="{{asset(url('/').Storage::url('public/gallery/'.$image))}}"
                                         alt="">
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>

    <div class="section background-dark over-hide">
        <div class="container-fluid py-4">
            <div class="row">
                @foreach($sliderImages as $sliderImage)
                    @if($sliderImage->image_title == 'Slider')
                        @php($images = json_decode($sliderImage->images))
                        @if(count($images) == 4)
                            @foreach($images as $image)
                                <div class="col-sm-6 col-lg-3">
                                    <a href="{{asset(url('/').Storage::url('public/gallery/'.$image))}}"
                                       data-fancybox="gallery">
                                        <div class="img-wrap services-wrap">
                                            <img src="{{asset(url('/').Storage::url('public/gallery/'.$image))}}"
                                                 alt="">
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endif

<div class="section padding-top-bottom-small background-black over-hide footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-center text-md-left">
                @if($setting != null)
                    <img
                        src="{{asset(url('/').Storage::url($setting->logo))}}"
                        alt="">
                @else
                    <img
                        src="{{asset('ui/img/missionhotellogo.png')}}"
                        alt="">
                @endif

                <p class="color-grey mt-4">{{ucfirst($setting->address ??"Location")}}<br>Dhading, Nepal</p>
            </div>
            <div class="col-md-4 text-center text-md-left">
                <h6 class="color-white mb-3">information</h6>
                <a href="#">terms &amp; conditions</a>
                <a href="{{route('hotel.blogs')}}">blog</a>
                <a href="{{route('hotel.food')}}">restaurant</a>
                <a href="{{route('hotel.contacts')}}">contact</a>
                <a href="{{route('hotel.gallery')}}">gallery &amp; images</a>
            </div>
            <div class="col-md-5 mt-4 mt-md-0 text-center text-md-left logos-footer">
                <h6 class="color-white mb-3">about us</h6>
                <p class="color-grey mb-4">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                    praesentium voluptatum deleniti atque corrupti quos dolores.</p>
                <ul class="footer-social-links">
                    <li><a href=""> <img src="{{asset('ui/img/icons/facebook.svg')}}" alt=""></a>
                    </li>
                    <li><a href=""> <img src="{{asset('ui/img/icons/instagram.svg')}}" alt=""></a>
                    </li>
                    <li><a href=""> <img src="{{asset('ui/img/icons/twitter.svg')}}" alt=""></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
