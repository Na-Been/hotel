@extends('admin.menubar.sidebar')
@section('title','Upload Banner Image')
@section('sidebar')
    @parent
@stop
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Edit Banner Image</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin.index')}}">Home</a>&nbsp;<i
                                class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="{{route('banner.index')}}">Gallery</a>&nbsp;<i
                                class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Banner Image</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="card-head">
                            <header>Edit Banner Image</header>
                        </div>
                        <form method="POST" action="{{route('banner.update',$images->id)}}">
                            @csrf
                            @method('PATCH')
                            <div class="card-body row">
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="txtRoomNo"
                                               name="image_title" value="{{$images->image_title}}"
                                               required>
                                        <label class="mdl-textfield__label">Image Title<span
                                                class="text-danger">*</span></label>
                                    </div>
                                    @error('image_title')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="txtRoomNo"
                                               name="image_description" value="{{$images->image_description}}"
                                               required>
                                        <label class="mdl-textfield__label">Image Description<span
                                                class="text-danger">*</span></label>
                                    </div>
                                    @error('image_description')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="sample2" readonly
                                               tabIndex="-1" name="route_name" value="{{$images->route_name}}" required>
                                        <label for="sample2" class="pull-right margin-0">
                                            <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                        </label>
                                        <label for="sample2" class="mdl-textfield__label">Choose In Which Page You Want
                                            To Display Banner Image?<span class="text-danger">*</span></label>
                                        <ul data-mdl-for="sample2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                            <li class="mdl-menu__item" data-val="1">Home</li>
                                            <li class="mdl-menu__item" data-val="2">Rooms</li>
                                            <li class="mdl-menu__item" data-val="3">Gallery</li>
                                            <li class="mdl-menu__item" data-val="4">Food & Bar</li>
                                            <li class="mdl-menu__item" data-val="5">About Us</li>
                                            <li class="mdl-menu__item" data-val="5">Blog</li>
                                            <li class="mdl-menu__item" data-val="5">Contact</li>
                                            <li class="mdl-menu__item" data-val="5">Book Now</li>
                                        </ul>
                                    </div>
                                    <div id="errorMessage" class="text-danger"></div>
                                    @error('route_name')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 p-t-20" id="section">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                        <input class="mdl-textfield__input" type="number" id="sample3" readonly
                                               tabIndex="-1" name="section" value="{{$images->section}}" required>
                                        <label for="sample2" class="pull-right margin-0">
                                            <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                        </label>
                                        <label for="sample2" class="mdl-textfield__label">
                                            Section<span class="text-danger">*</span></label>
                                        <ul data-mdl-for="sample3" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                            @for($i=1; $i<=6; $i++)
                                                <li class="mdl-menu__item" data-val="{{$i}}">{{$i}}</li>
                                            @endfor
                                        </ul>
                                    </div>
                                    @error('section')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="submit"
                                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">
                                        Upload
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

