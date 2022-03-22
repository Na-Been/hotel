@extends('admin.menubar.sidebar')
@section('title','Add Room')
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
                        <div class="page-title">Add Room Details</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin.index')}}">Home</a>&nbsp;<i
                                class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="{{route('room.index')}}">Rooms</a>&nbsp;<i
                                class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Add Room Details</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="card-head">
                            <header>Add Room Details</header>
                            <button id="panel-button"
                                    class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                    data-upgraded=",MaterialButton">
                                <i class="material-icons">more_vert</i>
                            </button>
                            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                data-mdl-for="panel-button">
                                <li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>View Rooms</li>
                            </ul>
                        </div>
                        <form method="POST" action="{{route('room.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body row">
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="txtRoomNo" name="room_no"
                                               required>
                                        <label class="mdl-textfield__label">Room Number<span
                                                class="text-danger">*</span></label>
                                    </div>
                                    @error('room_no')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="txtRoomNo" name="room_slug"
                                               required>
                                        <label class="mdl-textfield__label">Room Slug<span
                                                class="text-danger">*</span></label>
                                    </div>
                                    @error('room_slug')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="list3" name="room_type"
                                               value="" readonly tabIndex="-1" required>
                                        <label for="list3" class="pull-right margin-0">
                                            <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                        </label>
                                        <label for="list3" class="mdl-textfield__label">Room Type<span
                                                class="text-danger">*</span></label>
                                        <ul data-mdl-for="list3" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                            <li class="mdl-menu__item" data-val="Single">Single</li>
                                            <li class="mdl-menu__item" data-val="Double">Double</li>
                                            <li class="mdl-menu__item" data-val="King">Deluxe</li>
                                        </ul>
                                    </div>
                                    @error('room_type')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="sample2" value="" name="ac"
                                               readonly tabIndex="-1" required>
                                        <label for="sample2" class="pull-right margin-0">
                                            <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                        </label>
                                        <label for="sample2" class="mdl-textfield__label">AC/Non AC<span
                                                class="text-danger">*</span></label>
                                        <ul data-mdl-for="sample2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                            <li class="mdl-menu__item" data-val="DE">AC</li>
                                            <li class="mdl-menu__item" data-val="BY">Non AC</li>
                                        </ul>
                                    </div>
                                    @error('ac')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="sample3" value=""
                                               name="meal" readonly tabIndex="-1" required>
                                        <label for="sample3" class="pull-right margin-0">
                                            <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                        </label>
                                        <label for="sample2" class="mdl-textfield__label">Meal<span class="text-danger">*</span></label>
                                        <ul data-mdl-for="sample3" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                            <li class="mdl-menu__item" data-val="1">Free Breakfast</li>
                                            <li class="mdl-menu__item" data-val="2">Free Dinner</li>
                                            <li class="mdl-menu__item" data-val="3">Free Breakfast &amp; Dinner</li>
                                            <li class="mdl-menu__item" data-val="4">Free Welcome Drink</li>
                                            <li class="mdl-menu__item" data-val="5">No Free Food</li>
                                        </ul>
                                    </div>
                                    @error('meal')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="sample4" value=""
                                               name="cancel_charge" readonly tabIndex="-1" required>
                                        <label class="pull-right margin-0">
                                            <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                        </label>
                                        <label class="mdl-textfield__label">Cancellation Charges<span
                                                class="text-danger">*</span></label>
                                        <ul data-mdl-for="sample4" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                            <li class="mdl-menu__item" data-val="1">Free Cancellation</li>
                                            <li class="mdl-menu__item" data-val="2">10% Before 24 Hours</li>
                                            <li class="mdl-menu__item" data-val="1">No Cancellation Allow</li>
                                        </ul>
                                    </div>
                                    @error('cancel_charge')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>


                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="number"
                                               id="text7" name="rent_per_night" required>
                                        <label class="mdl-textfield__label" for="text7">Rent Per Night<span
                                                class="text-danger">*</span></label>
                                    </div>
                                    @error('rent_per_night')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 p-t-20">
                                    <label class="control-label col-md-3 pl-0">Upload Feature Image :</label>
                                    <br>
                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="fileinput-new img-thumbnail"
                                             style="max-width: 200px; max-height: 150px;">
                                            <img
                                                src="{{asset('assets/img/image_placeholder.jpg')}}"
                                                alt="..."
                                            ></div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                             style="max-width: 200px; max-height: 150px;">
                                             
                                             </div>
                                        <div>
                                            <br>
                                            <span class="btn btn-outline-secondary btn-file w-100 mb-3"><span
                                                    class="fileinput-new">Select Image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="feature_image" multiple></span>
                                            <a href="#" class="btn btn-outline-secondary fileinput-exists w-100"
                                               data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                    @error('feature_image')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 p-t-20">
                                    <fieldset class="form-group">
                                        <input type="file" id="image" name="room_images[]" class="form-control more-image"
                                               multiple>
                                        <label for="image" class="more-image-label" >Click here to Choose More Image</label>
                                    </fieldset>
                                    <div class="preview-images-zone">
                                    <div class="emp-sec">
                                         No File choosen
                                    </div>
                                    </div>

                                    @error('room_images')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 p-t-20">
                                    <div class="mdl-textfield mdl-js-textfield txt-full-width">
					                     <textarea class="mdl-textfield__input" rows="4"
                                                   id="education" name="room_details" required></textarea>
                                        <label class="mdl-textfield__label" for="text7">Room Details<span
                                                class="text-danger">*</span></label>
                                    </div>
                                    @error('room_details')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="submit"
                                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">
                                        Submit
                                    </button>
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
