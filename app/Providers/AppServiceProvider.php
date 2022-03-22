<?php

namespace App\Providers;

use App\Models\Booking;
use App\Models\Gallery;
use App\Models\Room;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);


        View::composer('*', function ($view) {
            $setting = Setting::first();
            if ($setting != null) {
                $view->with('setting', $setting);
            } else {
                $view->with('setting', []);
            }

            $userProfile = User::find(Auth::id());
            $view->with('userProfile', $userProfile);

            $sliderImage = Gallery::all();
            $view->with('sliderImages', $sliderImage);

            $room = Room::all();
            $view->with('rooms', $room);

            $bookedInfo = Booking::where('status', 0)->get();
            $view->with('bookedInfos', $bookedInfo);

        });
    }
}
