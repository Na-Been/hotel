<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />



    @if ($setting != null)
        <title>{{ $setting->dashboard_title . ' | ' }} @yield('title')</title>
    @else
        <title> @yield('title')</title>
    @endif
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link href="{{ asset('assets/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!--bootstrap -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
        rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/material/material.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/material_style.css') }}">
    <!-- animation -->
    <link href="{{ asset('assets/css/pages/animate_page.css') }}" rel="stylesheet">
    <!-- Template Styles -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/theme-color.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/table.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style/own.css') }}" rel="stylesheet" type="text/css" />
    <!-- favicon -->
    @if ($setting != null)
        <link rel="shortcut icon" href="{{ asset(url('/') . Storage::url($setting->logo)) }}" />
    @else
        <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" />

    @endif

    <!--    jasny bootstrap-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/css/jasny-bootstrap.css"
        integrity="sha512-PAr9sDtblgu/PoWSscze61CnGJ9t5W6cO6C11I0BNIZvZEPUpN5XkPd4PfPB7I2KI0N2iDrsdWomgH6ktJ9Vfw=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style/style.css') }}">
</head>
<!-- END HEAD -->

@section('sidebar')

    <body
        class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
        <div class="page-wrapper">
            <!-- start header -->
            <div class="page-header navbar navbar-fixed-top">
                <div class="page-header-inner ">
                    <!-- logo start -->
                    <div class="page-logo">
                        <a href="{{ url('/') }}">
                            <img style="border: 1px solid #ddd; border-radius: 4px; padding: 5px;
                                                 width:30px;" alt=""
                                src="{{ isset($setting->logo) ? url('/') . Storage::url($setting->logo) : asset('assets/img/image_placeholder.jpg') }}">
                            <span class="logo-default">{{ $setting->dashboard_title ?? 'Hotel' }}</span>
                        </a>
                    </div>
                    <!-- logo end -->
                    <ul class="nav navbar-nav navbar-left in">
                        <li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
                    </ul>
                    <form class="search-form-opened" action="#" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." name="query">
                            <span class="input-group-btn search-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                        </div>
                    </form>

                    <!-- start mobile menu -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
                        data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- end mobile menu -->
                    <!-- start header menu -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- start notification dropdown -->
                            <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                    data-close-others="true">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="badge headerBadgeColor1" id="count">{{ count($bookedInfos) }}</span>
                                </a>
                                <ul class="dropdown-menu animated swing">
                                    <li class="external">
                                        <h3><span class="bold">New Bookings</span></h3>
                                        <span class="notification-label purple-bgcolor">
                                            <button id="markAsRead">Mark As Read</button></span>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list small-slimscroll-style" id="notify"
                                            data-handle-color="#637283">
                                            @foreach ($bookedInfos->take(4) as $bookedInfo)
                                                <li>
                                                    <a href="{{ route('admin.show', $bookedInfo->id) }}">
                                                        <span
                                                            class="time">{{ $bookedInfo->created_at->diffForHumans() }}</span>
                                                        <span class="details">
                                                            <span class="notification-icon circle deepPink-bgcolor"><i
                                                                    class="fa fa-check"></i></span>
                                                            {{ $bookedInfo->name }}
                                                            Booked {{ $bookedInfo->number_of_booked_room }} rooms
                                                        </span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="dropdown-menu-footer">
                                            <a href="{{ route('admin.create') }}"> All Booking </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- end notification dropdown -->
                            <!-- start manage user dropdown -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                    data-close-others="true">

                                    <img alt="" class="img-circle "
                                        src="{{ isset($userProfile->profile) ? asset(url('/') . Storage::url($userProfile->profile->image)) : asset('assets/img/image_placeholder.jpg') }}" />
                                    <span class="username username-hide-on-mobile"> {{ ucfirst(auth()->user()->name) }}
                                    </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default animated jello">
                                    <li>
                                        <a href="{{ route('profile.index') }}">
                                            <i class="icon-user"></i> Profile </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('setting.index') }}">
                                            <i class="icon-settings"></i> Settings
                                        </a>
                                    </li>
                                    <li>
                                        {!! Form::open(['route' => 'logout', 'method' => 'POST']) !!}
                                        <button class="logout-btn text-left"
                                            style="border: 0px; cursor: pointer;
                                                                                background: transparent !important; outline: none !important; box-shadow: none !important;
                                                                                 width: 100%; padding-left:15px; border:none !important;" type="submit"><i
                                                class="icon-logout mr-2"></i> Log Out
                                        </button>
                                        {!! Form::close() !!}
                                    </li>
                                </ul>
                            </li>
                            <!-- end manage user dropdown -->
                            <li class="dropdown dropdown-quick-sidebar-toggler">
                                <a id="headerSettingButton" class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                    data-upgraded=",MaterialButton">
                                    <i class="material-icons">settings</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end header -->
            <!-- start page container -->
            <div class="page-container">
                <!-- start sidebar menu -->
                <div class="sidebar-container">
                    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
                        <div id="remove-scroll">
                            <ul class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true"
                                data-slide-speed="200">
                                <li class="nav-item start">
                                    <a href="{{ route('admin.index') }}" class="nav-link nav-toggle">
                                        <i class="material-icons">dashboard</i>
                                        <span class="title">Dashboard</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.create') }}" class="nav-link">
                                        <i class="material-icons">business_center</i>
                                        <span class="title">Booking</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link nav-toggle">
                                        <i class="material-icons">book</i>
                                        <span class="title">Blog</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item">
                                            <a href="{{ route('blog.create') }}" class="nav-link ">
                                                <span class="title">Add Blog</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('blog.index') }}" class="nav-link ">
                                                <span class="title">View Blog</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link nav-toggle">
                                        <i class="material-icons">vpn_key</i>
                                        <span class="title">Rooms</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item">
                                            <a href="{{ route('room.create') }}" class="nav-link ">
                                                <span class="title">Add Room</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('room.index') }}" class="nav-link ">
                                                <span class="title">View Rooms</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link nav-toggle">
                                        <i class="material-icons">group</i>
                                        <span class="title">Staff</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item">
                                            <a href="{{ route('staff.create') }}" class="nav-link ">
                                                <span class="title">Add Staff</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('staff.index') }}" class="nav-link ">
                                                <span class="title">View All Staffs</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link nav-toggle">
                                        <i class="material-icons">local_taxi</i>
                                        <span class="title">Transportation</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item">
                                            <a href="{{ route('transport.create') }}" class="nav-link">
                                                <span class="title">Add Vehicle</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('transport.index') }}" class="nav-link">
                                                <span class="title">View All Vehicle</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link nav-toggle">
                                        <i class="material-icons">collections</i>
                                        <span class="title">Gallery</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item">
                                            <a href="{{ route('banner.index') }}" class="nav-link ">
                                                <span class="title">Banner Image</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('image.index') }}" class="nav-link ">
                                                <span class="title">Gallery Image</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link nav-toggle">
                                        <i class="material-icons">description</i>
                                        <span class="title">About Us</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item">
                                            <a href="{{ route('aboutus.index') }}" class="nav-link ">
                                                <span class="title">View About Us</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('aboutus.create') }}" class="nav-link ">
                                                <span class="title">Create About Us</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('feedback.index') }}" class="nav-link">
                                        <i class="material-icons">visibility</i>
                                        <span class="title">Feedback</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('contact') }}" class="nav-link">
                                        <i class="material-icons">settings</i>
                                        <span class="title">View Setting</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end sidebar menu -->

            @show
            @yield('content')

            <!-- start setting sidebar -->
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
                                        class="btn lightColor btn-outline btn-circle m-b-10 theme-button">Light
                                        Sidebar
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

                        <!-- Start Setting Panel -->
                        <div class="tab-pane chat-sidebar-settings animated slideInUp" id="quick_sidebar_tab_3">
                            <div class="chat-sidebar-settings-list slimscroll-style">
                                <div class="chat-header">
                                    <h5 class="list-heading">Layout Settings</h5>
                                </div>
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
                                    <div class="chat-header">
                                        <h5 class="list-heading">Account Settings</h5>
                                    </div>
                                    <div class="settings-list">
                                        <div class="setting-item">
                                            <div class="setting-text">Notifications</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                        for="switch-1">
                                                        <input type="checkbox" id="switch-1" class="mdl-switch__input"
                                                            checked>
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
                                                        <input type="checkbox" id="switch-7" class="mdl-switch__input"
                                                            checked>
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
                                                        <input type="checkbox" id="switch-2" class="mdl-switch__input"
                                                            checked>
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
                                                        <input type="checkbox" id="switch-3" class="mdl-switch__input"
                                                            checked>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-header">
                                        <h5 class="list-heading">General Settings</h5>
                                    </div>
                                    <div class="settings-list">
                                        <div class="setting-item">
                                            <div class="setting-text">Location</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                        for="switch-4">
                                                        <input type="checkbox" id="switch-4" class="mdl-switch__input"
                                                            checked>
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
                                                        <input type="checkbox" id="switch-5" class="mdl-switch__input"
                                                            checked>
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
                                                        <input type="checkbox" id="switch-6" class="mdl-switch__input"
                                                            checked>
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
        <!-- end page container -->

        <!-- start footer -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2018 &copy; Mission Hotel Resort
                <a href="mailto:redstartheme@gmail.com" target="_top" class="makerCss">RedStar Theme</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- end footer -->
    </div>
    <!-- start js include path -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="{{ asset('assets/js/image.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/popper/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-blockui/jquery.blockui.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- data tables -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/table/table_data.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Common js-->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <script src="{{ asset('assets/js/theme-color.js') }}"></script>
    <!-- Material -->
    <script src="{{ asset('assets/plugins/material/material.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/material_select/getmdl-select.js') }}"></script>
    <script src="{{ asset('assets/plugins/material-datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js') }}">
    </script>
    <script src="{{ asset('assets/plugins/material-datetimepicker/datetimepicker.js') }}"></script>
    <!-- dropzone -->
    <script src="{{ asset('assets/plugins/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropzone/dropzone-call.js') }}"></script>
    <!-- animation -->
    <script src="{{ asset('assets/js/pages/ui/animations.js') }}"></script>
    <!-- end js include path -->

    <!--    jasny bootstrap-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/js/jasny-bootstrap.js"
        integrity="sha512-jd7CTH5DaYUqjka6aYoD/ZxF0EoSJX63BaXIYHW9eQtNkeX9W2mRPVF93OSun+Acy6l6VbxMsjTAYyYCM+okZA=="
        crossorigin="anonymous"></script>
    <!-- end js include path -->
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>


<script type="text/javascript">
    $(document).ready(function() {
        $('#markAsRead').click(function() {
            $.ajax({
                url: '{{ route('booking.create') }}',
                method: 'GET',
                dataType: 'json'
            }).done(function(message) {
                $('#notify').html('<li></li>');
                $('#count').text(0);
                console.log(message);

            });
        });
    });

</script>
@yield('script')

</html>
