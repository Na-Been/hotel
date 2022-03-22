<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\BannerImage;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Room;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */


    public function index()
    {
        $roomImages = Room::all();
        $bannerImages = BannerImage::where('route_name','Home')->orderBy('section')->get();
        return view('home.welcome',compact('roomImages','bannerImages'));
    }

    public function room()
    {
        $roomImages = Room::all();
        $roomBannerImages = BannerImage::where('route_name','Rooms')->first();
        return view('home.room',compact('roomImages','roomBannerImages'));
    }

    public function gallery()
    {
        $galleries = Gallery::all();
        $galleryBannerImages = BannerImage::where('route_name','Gallery')->first();
        return view('home.gallery',compact('galleries','galleryBannerImages'));
    }

    public function food()
    {
        $foodAndBars = Gallery::where('image_title','food and bar')->get();
        $barBannerImages = BannerImage::where('route_name','Food & Bar')->first();
        return view('home.foodAndBar',compact('foodAndBars','barBannerImages'));
    }

    public function about()
    {
        $aboutBannerImages = BannerImage::where('route_name','About us')->first();
        $aboutUsDatas = AboutUs::all();
        return view('home.about',compact('aboutBannerImages','aboutUsDatas'));
    }

    public function blogs()
    {
        $blogs = Blog::where('status',1)->get();
        $blogBannerImages = BannerImage::where('route_name','Blog')->first();
        return view('home.blogs',compact('blogs','blogBannerImages'));
    }

    public function contacts()
    {
        $contactBannerImages = BannerImage::where('route_name','Contact')->first();
        return view('home.contact',compact('contactBannerImages'));
    }

    public function contact()
    {
        return view('admin.contact.index');
    }

}
