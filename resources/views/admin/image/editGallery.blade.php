@extends('admin.menubar.sidebar')
@section('title','Gallery Upload')
@section('sidebar')
@parent
@stop
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Edit Image In Gallery</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                           href="{{route('admin.index')}}">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('image.index')}}">Gallery</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Gallery</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Edit Gallery Image</header>
                    </div>
                    <form method="POST" action="{{route('image.update', $images->id)}}">
                        @csrf
                        @method('PATCH')
                        <div class="card-body row">
                            <div class="col-lg-12 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="sample2" readonly
                                           tabIndex="-1" name="image_title" value="{{$images->image_title}}" required>
                                    <label for="sample2" class="pull-right margin-0">
                                        <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                    </label>
                                    <label for="sample2" class="mdl-textfield__label">Choose Title
                                        <span class="text-danger">*</span></label>
                                    <ul data-mdl-for="sample2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        <li class="mdl-menu__item" data-val="1">Slider</li>
                                        <li class="mdl-menu__item" data-val="2">Rooms</li>
                                        <li class="mdl-menu__item" data-val="3">Gallery</li>
                                        <li class="mdl-menu__item" data-val="4">Food & Bar</li>
                                        <li class="mdl-menu__item" data-val="4">Moving Slider</li>
                                    </ul>
                                </div>
                                @error('image_title')
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
