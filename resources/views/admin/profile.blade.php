@extends('admin.menubar.sidebar')
@section('title','Profile')

@section('sidebar')
    @parent
@stop

@section('content')
    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                @include('session.sessionMessage')
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">User Profile</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin.index')}}">Home</a>&nbsp;<i
                                class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="">Extra</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">User Profile</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <div class="profile-sidebar">
                        <div class="card card-topline-aqua">
                            <div class="card-body no-padding height-9">
                                <div class="row">
                                    <div class="profile-userpic">
                                        <img alt="" class="img-circle "
                                             src="{{isset($userProfile->profile)?asset(url('/').Storage::url($userProfile->profile->image)):asset('assets/img/image_placeholder.jpg')}}"/></div>
                                </div>
                                <div class="profile-usertitle">
                                    <div class="profile-usertitle-name">{{$user->name ?? 'User Name'}}</div>
                                    <div class="profile-usertitle-job"> Jr. Professor</div>
                                </div>
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>Followers</b> <a class="pull-right">1,200</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Following</b> <a class="pull-right">750</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Friends</b> <a class="pull-right">11,172</a>
                                    </li>
                                </ul>
                                <!-- END SIDEBAR USER TITLE -->
                                <!-- SIDEBAR BUTTONS -->
                                <div class="profile-userbuttons">
                                    <button type="button"
                                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-primary">
                                        Follow
                                    </button>
                                    <button type="button"
                                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-pink">
                                        Message
                                    </button>
                                </div>
                                <!-- END SIDEBAR BUTTONS -->
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-head card-topline-aqua">
                                <header>About Me</header>
                            </div>
                            <div class="card-body no-padding height-9">
                                <div class="profile-desc">
                                    Hello I am John Deo a Professor in xyz College Surat. I love to work with all my
                                    college staff and seniour professors.
                                </div>
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>Gender </b>
                                        <div class="profile-desc-item pull-right">{{$user->profile->gender ?? 'Gender'}}</div>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Operation Done </b>
                                        <div class="profile-desc-item pull-right">30+</div>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Degree </b>
                                        <div class="profile-desc-item pull-right">{{$user->profile->education ?? 'Education'}}</div>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Designation</b>
                                        <div class="profile-desc-item pull-right">Jr. Professor</div>
                                    </li>
                                </ul>
                                <div class="row list-separated profile-stat">
                                    <div class="col-md-4 col-sm-4 col-6">
                                        <div class="uppercase profile-stat-title"> 37</div>
                                        <div class="uppercase profile-stat-text"> Projects</div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-6">
                                        <div class="uppercase profile-stat-title"> 51</div>
                                        <div class="uppercase profile-stat-text"> Tasks</div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-6">
                                        <div class="uppercase profile-stat-title"> 61</div>
                                        <div class="uppercase profile-stat-text"> Uploads</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-head card-topline-aqua">
                                <header>Address</header>
                            </div>
                            <div class="card-body no-padding height-9">
                                <div class="row text-center m-t-10">
                                    <div class="col-md-12">
                                        <p>{{$user->profile->address ?? 'Address'}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
           
                    </div>
                    <!-- END BEGIN PROFILE SIDEBAR -->
                    <!-- BEGIN PROFILE CONTENT -->
                    <div class="profile-content">
                        <div class="row">
                            <div class="profile-tab-box">
                                <div class="p-l-20">
                                    <ul class="nav ">
                                        <li class="nav-item tab-all"><a
                                                class="nav-link active show" href="#tab1" data-toggle="tab">About Me</a>
                                        </li>
                                        <li class="nav-item tab-all p-l-20"><a class="nav-link"
                                                                               href="#tab2"
                                                                               data-toggle="tab">Activity</a></li>
                                        <li class="nav-item tab-all p-l-20"><a class="nav-link"
                                                                               href="#tab3"
                                                                               data-toggle="tab">Settings</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="white-box">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active fontawesome-demo" id="tab1">
                                        <div id="biography">
                                            <div class="row">
                                                <div class="col-md-3 col-6 b-r"><strong>Full Name</strong>
                                                    <br>
                                                    <p class="text-muted">{{$user->name ?? 'Full Name'}}</p>
                                                </div>
                                                <div class="col-md-3 col-6 b-r"><strong>Mobile</strong>
                                                    <br>
                                                    <p class="text-muted">{{$user->profile->number ?? 'Number'}}</p>
                                                </div>
                                                <div class="col-md-3 col-6 b-r"><strong>Email</strong>
                                                    <br>
                                                    <p class="text-muted">{{$user->email ?? 'example@example.com'}}</p>
                                                </div>
                                                <div class="col-md-3 col-6"><strong>Location</strong>
                                                    <br>
                                                    <p class="text-muted">{{$user->profile->address ?? 'Address'}}</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <p class="m-t-30">Completed my graduation in Arts from the well known and
                                                renowned institution of India – SARDAR PATEL ARTS COLLEGE, BARODA in
                                                2000-01, which was affiliated to M.S. University. I ranker in University
                                                exams from the same university from 1996-01.</p>
                                            <p>Worked as Professor and Head of the department at Sarda Collage, Rajkot,
                                                Gujarat from 2003-2015 </p>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged.</p>
                                            <br>
                                            <h4 class="font-bold">Education</h4>
                                            <hr>
                                            <ul>
                                                <li>{{$user->profile->education ?? 'Education'}}</li>
                                            </ul>
                                            <br>
                                            <h4 class="font-bold">Experience</h4>
                                            <hr>
                                            <ul>
                                                <li>One year experience as Jr. Professor from April-2009 to march-2010
                                                    at B. J. Arts College, Ahmedabad.
                                                </li>
                                                <li>Three year experience as Jr. Professor at V.S. Arts & Commerse
                                                    Collage from April - 2008 to April - 2011.
                                                </li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.
                                                </li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.
                                                </li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.
                                                </li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.
                                                </li>
                                            </ul>
                                            <br>
                                            <h4 class="font-bold">Conferences, Cources & Workshop Attended</h4>
                                            <hr>
                                            <ul>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.
                                                </li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.
                                                </li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.
                                                </li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.
                                                </li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.
                                                </li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.
                                                </li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.
                                                </li>
                                            </ul>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="card-head">
                                                        <header>Edit Profile</header>
                                                    </div>
                                                </div>

                                                <div class="card-body " id="bar-parent1">
                                                    {!! Form::open(['route' => ['profile.update', $user->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
                                                    @method('PATCH')
                                                    <div class="form-group">
                                                        {!! Form::label('name','Full Name') !!}
                                                        {!! Form::text('name',$user->name,['class'=>'form-control']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        {!! Form::label('email','Email') !!}
                                                        {!! Form::email('email',$user->email,['class'=>'form-control']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        {!! Form::label('address','Address') !!}
                                                        {!! Form::text('address',$user->profile->address ?? null,['class'=>'form-control']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        {!! Form::label('gender','Gender') !!}
                                                        {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'],$user->profile->gender ?? null,['placeholder'=>'Please Select one','class'=>'form-control']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        {!! Form::label('number','Contact Number') !!}
                                                        {!! Form::number('number',$user->profile->number ?? null,['class'=>'form-control']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        {!! Form::label('birth_date','Date Of Birth') !!}
                                                        {!! Form::date('birth_date',$user->profile->birth_date ?? null,['class'=>'form-control']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        {!! Form::label('education','Education Details') !!}
                                                        {!! Form::text('education',$user->profile->education ?? null,['class'=>'form-control']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <!-- {!! Form::label('image','Image') !!} -->
                                                        <div class="fileinput fileinput-new text-center"
                                                             data-provides="fileinput">
                                                            <div class="fileinput-new img-thumbnail"
                                                                 style="max-width: 200px; max-height: 150px;">
                                                                <img
                                                                    src="{{isset($user->profile->image)? asset(url('/').Storage::url($user->profile->image)):asset('assets/img/image_placeholder.jpg')}}"
                                                                    alt="...">
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                                 style="max-width: 200px; max-height: 150px;"></div>
                                                            <div style="display:flex; flex-direction:column">
                                                                <br>
                                                                <span class="btn btn-outline-secondary btn-file w-100"><span
                                                                        class="fileinput-new">Select Image</span>
                                                             <span class="fileinput-exists w-100">Change</span>
                                                            {!! Form::file('image') !!}
                                                            <br>
                                                            <a href="#"
                                                               class="btn btn-outline-secondary fileinput-exists w-100"
                                                               data-dismiss="fileinput">Remove</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update Profile
                                                    </button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab3">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="card-head">
                                                    <header>Password Change</header>
                                                    <button id="panel-button2"
                                                            class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                                            data-upgraded=",MaterialButton">
                                                        <i class="material-icons">more_vert</i>
                                                    </button>
                                                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                                        data-mdl-for="panel-button2">
                                                        <li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
                                                        </li>
                                                        <li class="mdl-menu__item"><i class="material-icons">print</i>Another
                                                            action
                                                        </li>
                                                        <li class="mdl-menu__item"><i
                                                                class="material-icons">favorite</i>Something else here
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="card-body " id="bar-parent1">
                                                    {!! Form::open(['route'=>['profile.change.password',$user->id],'method'=>'POST']) !!}
                                                    @method('PATCH')
                                                    <div class="form-group">
                                                        {!! Form::label('current_password','Current Password') !!}
                                                        {!! Form::password('current_password',['class'=>'form-control']) !!}
                                                        @error('current_password')
                                                        <div class="alert-danger">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        {!! Form::label('new_password','New Password') !!}
                                                        {!! Form::password('new_password',['class'=>'form-control']) !!}
                                                        @error('new_password')
                                                        <div class="alert-danger">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        {!! Form::label('confirm_password','Confirm Password') !!}
                                                        {!! Form::password('confirm_password',['class'=>'form-control']) !!}
                                                        @error('confirm_password')
                                                        <div class="alert-danger">{{$message}} </div>
                                                        @enderror
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PROFILE CONTENT -->
                </div>
            </div>
        </div>
        <!-- end page content -->
        <!-- start chat sidebar -->
        <div class="chat-sidebar-container" data-close-on-body-click="false">
            <div class="chat-sidebar">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#quick_sidebar_tab_1" class="nav-link active tab-icon" data-toggle="tab">Theme
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#quick_sidebar_tab_3" class="nav-link tab-icon" data-toggle="tab"> Settings
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane chat-sidebar-settings in show active animated shake" role="tabpanel"
                         id="quick_sidebar_tab_1">
                        <div class="slimscroll-style">
                            <div class="theme-light-dark">
                                <h6>Sidebar Theme</h6>
                                <button type="button" data-theme="white"
                                        class="btn lightColor btn-outline btn-circle m-b-10 theme-button">Light Sidebar
                                </button>
                                <button type="button" data-theme="dark"
                                        class="btn dark btn-outline btn-circle m-b-10 theme-button">Dark Sidebar
                                </button>
                            </div>
                            <div class="theme-light-dark">
                                <h6>Sidebar Color</h6>
                                <ul class="list-unstyled">
                                    <li class="complete">
                                        <div class="theme-color sidebar-theme">
                                            <a href="#" data-theme="white"><span class="head"></span><span
                                                    class="cont"></span></a>
                                            <a href="#" data-theme="dark"><span class="head"></span><span
                                                    class="cont"></span></a>
                                            <a href="#" data-theme="blue"><span class="head"></span><span
                                                    class="cont"></span></a>
                                            <a href="#" data-theme="indigo"><span class="head"></span><span
                                                    class="cont"></span></a>
                                            <a href="#" data-theme="cyan"><span class="head"></span><span
                                                    class="cont"></span></a>
                                            <a href="#" data-theme="green"><span class="head"></span><span
                                                    class="cont"></span></a>
                                            <a href="#" data-theme="red"><span class="head"></span><span
                                                    class="cont"></span></a>
                                        </div>
                                    </li>
                                </ul>
                                <h6>Header Brand color</h6>
                                <ul class="list-unstyled">
                                    <li class="theme-option">
                                        <div class="theme-color logo-theme">
                                            <a href="#" data-theme="logo-white"><span class="head"></span><span
                                                    class="cont"></span></a>
                                            <a href="#" data-theme="logo-dark"><span class="head"></span><span
                                                    class="cont"></span></a>
                                            <a href="#" data-theme="logo-blue"><span class="head"></span><span
                                                    class="cont"></span></a>
                                            <a href="#" data-theme="logo-indigo"><span class="head"></span><span
                                                    class="cont"></span></a>
                                            <a href="#" data-theme="logo-cyan"><span class="head"></span><span
                                                    class="cont"></span></a>
                                            <a href="#" data-theme="logo-green"><span class="head"></span><span
                                                    class="cont"></span></a>
                                            <a href="#" data-theme="logo-red"><span class="head"></span><span
                                                    class="cont"></span></a>
                                        </div>
                                    </li>
                                </ul>
                                <h6>Header color</h6>
                                <ul class="list-unstyled">
                                    <li class="theme-option">
                                        <div class="theme-color header-theme">
                                            <a href="#" data-theme="header-white"><span class="head"></span><span
                                                    class="cont"></span></a>
                                            <a href="#" data-theme="header-dark"><span class="head"></span><span
                                                    class="cont"></span></a>
                                            <a href="#" data-theme="header-blue"><span class="head"></span><span
                                                    class="cont"></span></a>
                                            <a href="#" data-theme="header-indigo"><span class="head"></span><span
                                                    class="cont"></span></a>
                                            <a href="#" data-theme="header-cyan"><span class="head"></span><span
                                                    class="cont"></span></a>
                                            <a href="#" data-theme="header-green"><span class="head"></span><span
                                                    class="cont"></span></a>
                                            <a href="#" data-theme="header-red"><span class="head"></span><span
                                                    class="cont"></span></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Start Doctor Chat -->
                    <div class="tab-pane chat-sidebar-chat animated slideInRight" id="quick_sidebar_tab_2">
                        <div class="chat-sidebar-list">
                            <div class="chat-sidebar-chat-users slimscroll-style" data-rail-color="#ddd"
                                 data-wrapper-class="chat-sidebar-list">
                                <div class="chat-header"><h5 class="list-heading">Online</h5></div>
                                <ul class="media-list list-items">
                                    <li class="media"><img class="media-object" src="assets/img/user/user3.jpg"
                                                           width="35" height="35" alt="...">
                                        <i class="online dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">John Deo</h5>
                                            <div class="media-heading-sub">Spine Surgeon</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-success">5</span>
                                        </div>
                                        <img class="media-object" src="assets/img/user/user1.jpg" width="35" height="35"
                                             alt="...">
                                        <i class="busy dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Rajesh</h5>
                                            <div class="media-heading-sub">Director</div>
                                        </div>
                                    </li>
                                    <li class="media"><img class="media-object" src="assets/img/user/user5.jpg"
                                                           width="35" height="35" alt="...">
                                        <i class="away dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Jacob Ryan</h5>
                                            <div class="media-heading-sub">Ortho Surgeon</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-danger">8</span>
                                        </div>
                                        <img class="media-object" src="assets/img/user/user4.jpg" width="35" height="35"
                                             alt="...">
                                        <i class="online dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Kehn Anderson</h5>
                                            <div class="media-heading-sub">CEO</div>
                                        </div>
                                    </li>
                                    <li class="media"><img class="media-object" src="assets/img/user/user2.jpg"
                                                           width="35" height="35" alt="...">
                                        <i class="busy dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Sarah Smith</h5>
                                            <div class="media-heading-sub">Anaesthetics</div>
                                        </div>
                                    </li>
                                    <li class="media"><img class="media-object" src="assets/img/user/user7.jpg"
                                                           width="35" height="35" alt="...">
                                        <i class="online dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Vlad Cardella</h5>
                                            <div class="media-heading-sub">Cardiologist</div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="chat-header"><h5 class="list-heading">Offline</h5></div>
                                <ul class="media-list list-items">
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-warning">4</span>
                                        </div>
                                        <img class="media-object" src="assets/img/user/user6.jpg" width="35" height="35"
                                             alt="...">
                                        <i class="offline dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Jennifer Maklen</h5>
                                            <div class="media-heading-sub">Nurse</div>
                                            <div class="media-heading-small">Last seen 01:20 AM</div>
                                        </div>
                                    </li>
                                    <li class="media"><img class="media-object" src="assets/img/user/user8.jpg"
                                                           width="35" height="35" alt="...">
                                        <i class="offline dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Lina Smith</h5>
                                            <div class="media-heading-sub">Ortho Surgeon</div>
                                            <div class="media-heading-small">Last seen 11:14 PM</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-success">9</span>
                                        </div>
                                        <img class="media-object" src="assets/img/user/user9.jpg" width="35" height="35"
                                             alt="...">
                                        <i class="offline dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Jeff Adam</h5>
                                            <div class="media-heading-sub">Compounder</div>
                                            <div class="media-heading-small">Last seen 3:31 PM</div>
                                        </div>
                                    </li>
                                    <li class="media"><img class="media-object" src="assets/img/user/user10.jpg"
                                                           width="35" height="35" alt="...">
                                        <i class="offline dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Anjelina Cardella</h5>
                                            <div class="media-heading-sub">Physiotherapist</div>
                                            <div class="media-heading-small">Last seen 7:45 PM</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="chat-sidebar-item">
                            <div class="chat-sidebar-chat-user">
                                <div class="page-quick-sidemenu">
                                    <a href="javascript:;" class="chat-sidebar-back-to-list">
                                        <i class="fa fa-angle-double-left"></i>Back
                                    </a>
                                </div>
                                <div class="chat-sidebar-chat-user-messages">
                                    <div class="post out">
                                        <img class="avatar" alt="" src="assets/img/dp.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span> <a href="javascript:;" class="name">Kiran
                                                Patel</a> <span class="datetime">9:10</span>
                                            <span class="body-out"> could you send me menu icons ? </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="assets/img/user/user5.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span> <a href="javascript:;" class="name">Jacob
                                                Ryan</a> <span class="datetime">9:10</span>
                                            <span class="body"> please give me 10 minutes. </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="assets/img/dp.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span> <a href="javascript:;" class="name">Kiran
                                                Patel</a> <span class="datetime">9:11</span>
                                            <span class="body-out"> ok fine :) </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="assets/img/user/user5.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span> <a href="javascript:;" class="name">Jacob
                                                Ryan</a> <span class="datetime">9:22</span>
                                            <span class="body">Sorry for
													the delay. i sent mail to you. let me know if it is ok or not.</span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="assets/img/dp.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span> <a href="javascript:;" class="name">Kiran
                                                Patel</a> <span class="datetime">9:26</span>
                                            <span class="body-out"> it is perfect! :) </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="assets/img/dp.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span> <a href="javascript:;" class="name">Kiran
                                                Patel</a> <span class="datetime">9:26</span>
                                            <span class="body-out"> Great! Thanks. </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="assets/img/user/user5.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span> <a href="javascript:;" class="name">Jacob
                                                Ryan</a> <span class="datetime">9:27</span>
                                            <span class="body"> it is my pleasure :) </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-sidebar-chat-user-form">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Type a message here...">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn deepPink-bgcolor">
                                                <i class="fa fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Doctor Chat -->
                    <!-- Start Setting Panel -->
                    <div class="tab-pane chat-sidebar-settings animated slideInUp" id="quick_sidebar_tab_3">
                        <div class="chat-sidebar-settings-list slimscroll-style">
                            <div class="chat-header"><h5 class="list-heading">Layout Settings</h5></div>
                            <div class="chatpane inner-content ">
                                <div class="settings-list">
                                    <div class="setting-item">
                                        <div class="setting-text">Sidebar Position</div>
                                        <div class="setting-set">
                                            <select
                                                class="sidebar-pos-option form-control input-inline input-sm input-small ">
                                                <option value="left" selected="selected">Left</option>
                                                <option value="right">Right</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">Header</div>
                                        <div class="setting-set">
                                            <select
                                                class="page-header-option form-control input-inline input-sm input-small ">
                                                <option value="fixed" selected="selected">Fixed</option>
                                                <option value="default">Default</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">Sidebar Menu</div>
                                        <div class="setting-set">
                                            <select
                                                class="sidebar-menu-option form-control input-inline input-sm input-small ">
                                                <option value="accordion" selected="selected">Accordion</option>
                                                <option value="hover">Hover</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">Footer</div>
                                        <div class="setting-set">
                                            <select
                                                class="page-footer-option form-control input-inline input-sm input-small ">
                                                <option value="fixed">Fixed</option>
                                                <option value="default" selected="selected">Default</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-header"><h5 class="list-heading">Account Settings</h5></div>
                                <div class="settings-list">
                                    <div class="setting-item">
                                        <div class="setting-text">Notifications</div>
                                        <div class="setting-set">
                                            <div class="switch">
                                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                       for="switch-1">
                                                    <input type="checkbox" id="switch-1"
                                                           class="mdl-switch__input" checked>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">Show Online</div>
                                        <div class="setting-set">
                                            <div class="switch">
                                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                       for="switch-7">
                                                    <input type="checkbox" id="switch-7"
                                                           class="mdl-switch__input" checked>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">Status</div>
                                        <div class="setting-set">
                                            <div class="switch">
                                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                       for="switch-2">
                                                    <input type="checkbox" id="switch-2"
                                                           class="mdl-switch__input" checked>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">2 Steps Verification</div>
                                        <div class="setting-set">
                                            <div class="switch">
                                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                       for="switch-3">
                                                    <input type="checkbox" id="switch-3"
                                                           class="mdl-switch__input" checked>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-header"><h5 class="list-heading">General Settings</h5></div>
                                <div class="settings-list">
                                    <div class="setting-item">
                                        <div class="setting-text">Location</div>
                                        <div class="setting-set">
                                            <div class="switch">
                                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                       for="switch-4">
                                                    <input type="checkbox" id="switch-4"
                                                           class="mdl-switch__input" checked>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">Save Histry</div>
                                        <div class="setting-set">
                                            <div class="switch">
                                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                       for="switch-5">
                                                    <input type="checkbox" id="switch-5"
                                                           class="mdl-switch__input" checked>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">Auto Updates</div>
                                        <div class="setting-set">
                                            <div class="switch">
                                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                       for="switch-6">
                                                    <input type="checkbox" id="switch-6"
                                                           class="mdl-switch__input" checked>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end chat sidebar -->
    </div>

@stop
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $("form").on('click', function (e) {
                console.log('hello');
                $(e.target).attr('data-toggle') === 'tab';
                // e.preventDefault();
            });
        });
    </script>
@endsection
