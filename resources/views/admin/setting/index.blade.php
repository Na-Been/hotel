@extends('admin.menubar.sidebar')
@section('title','setting')
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
                        <div class="page-title">Change Setting</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i><a class="parent-item" href="{{route('admin.index')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Setting</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        @include('session.sessionMessage')
                        <div class="card-head">
                            <header>Change Setting</header>
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
                        <form method="POST" action="{{route('setting.store')}}" enctype="multipart/form-data">
                            @csrf

                        <div class="card-body row">
                            <div class="col-lg-6 p-t-20">
                                <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class = "mdl-textfield__input" type = "text" id = "txtRoomNo" name="dashboard_title" value="{{$data->dashboard_title ?? null}}">
                                    <label class = "mdl-textfield__label">Dashboard Title</label>
                                </div>
                                @error('dashboard_title')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class = "mdl-textfield__input" type = "text" id = "text8" name="phone" value="{{$data->phone ?? null}}">
                                    <label class = "mdl-textfield__label" for = "text8">Telephone Number</label>
                                </div>
                                @error('phone')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class = "mdl-textfield__input" type = "email" id = "txtRoomNo" name="email" value="{{$data->email??null}}">
                                    <label class = "mdl-textfield__label">Email Address</label>
                                </div>
                                @error('email')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class = "mdl-textfield__input" type = "text" id = "txtRoomNo" name="address" value="{{$data->address ??null}}">
                                    <label class = "mdl-textfield__label">Address</label>
                                </div>
                                @error('address')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class = "mdl-textfield__input" type = "text" id = "txtRoomNo" name="check_in" value="{{$data->check_in ??null}}">
                                    <label class = "mdl-textfield__label">Check In Time</label>
                                </div>
                                @error('check_in')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class = "mdl-textfield__input" type = "text" id = "txtRoomNo" name="check_out" value="{{$data->check_out ??null}}">
                                    <label class = "mdl-textfield__label">Check Out Time</label>
                                </div>
                                @error('check_out')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class = "mdl-textfield__input" type = "text" id = "txtRoomNo" name="facebook_link" value="{{$data->facebook_link ?? null}}">
                                    <label class = "mdl-textfield__label">Facebook Link</label>
                                </div>

                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class = "mdl-textfield__input" type = "text" id = "txtRoomNo" name="instagram_link" value="{{$data->instagram_link ?? null}}">
                                    <label class = "mdl-textfield__label">Instagram Link</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class = "mdl-textfield__input" type = "text" id = "txtRoomNo" name="twitter_link" value="{{$data->twitter_link ?? null}}">
                                    <label class = "mdl-textfield__label">Twitter Link</label>
                                </div>
                            </div>
                            <div class="col-lg-12 p-t-20">
                                <label class="control-label col-md-3">Upload Logo</label>
                                <br>
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new img-thumbnail"
                                         style="max-width: 200px; max-height: 150px;">
                                        @if($data != null)
                                        <img src="{{url('/').Storage::url($data->logo)}}" alt="...">
                                        @else
                                            <img src="{{asset('assets/img/image_placeholder.jpg')}}" alt="...">
                                            @endif
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"
                                         style="max-width: 200px; max-height: 150px;"></div>
                                    <div>
                                        <br>
                                        <span class="btn btn-outline-secondary btn-file"><span
                                                class="fileinput-new">Select Image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="logo"></span>
                                        <a href="#" class="btn btn-outline-secondary fileinput-exists"
                                           data-dismiss="fileinput">Remove</a>
                                    </div>

                                </div>
                                @error('logo')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 p-t-20 text-center">
                                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page content -->
    @stop
