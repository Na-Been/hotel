@extends('admin.menubar.sidebar')
@section('title','Contact')
@section('sidebar')
    @parent
@stop
@section('content')
    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Contact Us</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.index')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="">Contact</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Contact Details</li>
                    </ol>
                </div>
            </div>
            <ul class="nav nav-pills nav-pills-rose">
                <li class="nav-item tab-all"><a class="nav-link active show"
                                                href="#tab1" data-toggle="tab">List View</a></li>
                <li class="nav-item tab-all"><a class="nav-link" href="#tab2"
                                                data-toggle="tab">Grid View</a></li>
            </ul>
            <div class="tab-content tab-space">
                <div class="tab-pane active show" id="tab1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box">
                                <div class="card-head">
                                    <button id = "panel-button"
                                            class = "mdl-button mdl-js-button mdl-button--icon pull-right"
                                            data-upgraded = ",MaterialButton">
                                        <i class = "material-icons">more_vert</i>
                                    </button>
                                    <ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                        data-mdl-for = "panel-button">
                                        <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
                                        <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
                                        <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
                                    </ul>
                                </div>
                                <div class="card-body ">
                                    <div class="table-scrollable">
                                        <table class="table table-hover table-checkable order-column full-width" id="example4">
                                            <thead>
                                            <tr>
                                                <th class="center">S.N.</th>
                                                <th class="center">Image</th>
                                                <th class="center">Dashboard Title</th>
                                                <th class="center">Contact Number</th>
                                                <th class="center">Email</th>
                                                <th class="center">Address</th>
                                                <th class="center">Check In Time</th>
                                                <th class="center">Check Out Time</th>
                                                <th class="center">Facebook Link</th>
                                                <th class="center">Instagram Link</th>
                                                <th class="center">Twitter Link</th>
                                                <th class="center"> Action </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr class="odd gradeX">
                                                    <td class="center"></td>
                                                    <td class="user-circle-img sorting_1">
                                                        <img style="border: 1px solid #ddd; border-radius: 4px; padding: 5px;
                         width: 50px;" alt="" src="{{isset($setting->logo)?url('/').Storage::url($setting->logo): ''}}">
                                                        <td class="center">{{$setting->dashboard_title ?? ''}}</td>
                                                        <td class="center">{{$setting->number ?? ''}}</td>
                                                        <td class="center">{{$setting->email ?? ''}}</td>
                                                        <td class="center">{{$setting->address ?? ''}}</td>
                                                        <td class="center">{{$setting->check_in ?? ''}}</td>
                                                        <td class="center">{{$setting->check_out ?? ''}}</td>
                                                        <td class="center">{{$setting->facebook_link ?? ''}}</td>
                                                        <td class="center">{{$setting->instagram_link ?? ''}}</td>
                                                        <td class="center">{{$setting->twitter_link ?? ''}}</td>
                                                        <td class="center">
                                                            <a href="{{route('setting.index')}}" class="btn btn-tbl-edit btn-xs">
                                                                <i class="fa fa-pencil"></i>
                                                             </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page content -->
@stop

