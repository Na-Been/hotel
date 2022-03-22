<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//for homepage
Route::get('/', 'HomeController@index')->name('home');
//for room
Route::get('rooms', 'HomeController@room')->name('hotel.rooms');
//for gallery
Route::get('gallery','HomeController@gallery')->name('hotel.gallery');
//for food and bar
Route::get('food','HomeController@food')->name('hotel.food');
//for about us
Route::get('about','HomeController@about')->name('hotel.about');
//for blog
Route::get('blogs','HomeController@blogs')->name('hotel.blogs');
//for contact us
Route::get('contacts','HomeController@contacts')->name('hotel.contacts');
//booking
Route::resource('booking','BookingController');
//for feedback
Route::resource('feedback','FeedbackController');

//auth routes
Route::group(['prefix'=>'hotel'], function (){
    Auth::routes();
});

//for admin
Route::group(['middleware'=>'auth'], function (){

    //for dashboard
    Route::resource('admin','AdminController');
    //for changing password
    Route::patch('/profile/change/{id}','ProfileController@changePassword')->name('profile.change.password');
    //for profile
    Route::resource('profile','ProfileController');
    //for blog
    Route::resource('blog','BlogController');
    //for setting
    Route::resource('setting','SettingController');
    //for rooms
    Route::resource('room','RoomController');
    //for staff
    Route::resource('staff','StaffController');
    //for transportation
    Route::resource('transport','TransportController');
    //for Banner image
    Route::resource('banner','BannerImageController');
    //for Gallery
    Route::resource('image','GalleryController');
    //for View contacts
    Route::get('contact','HomeController@contact')->name('contact');
    //for about us
    Route::resource('aboutus','AboutUsController');
});


