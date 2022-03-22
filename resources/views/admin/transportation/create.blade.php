@extends('admin.menubar.sidebar')
@section('title','Add Vehicle')
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
                        <div class="page-title">Add Vehicle</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.index')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="">Transport</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Add Vehicle</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="card-head">
                            <header>Basic Information</header>
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
                        <form method="POST" action="{{route('transport.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body row">
                                <div class="col-lg-6 p-t-20">
                                    <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class = "mdl-textfield__input" type = "text" id = "txtModeltName" name="model_name" required>
                                        <label class = "mdl-textfield__label">Model Name<span class="text-danger">*</span></label>
                                    </div>
                                    @error('model_name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 p-t-20">
                                    <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class = "mdl-textfield__input" type = "text" id = "txtModelNumber" name="model_number" required>
                                        <label class = "mdl-textfield__label" >Model Number<span class="text-danger">*</span></label>
                                    </div>
                                    @error('model_number')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 p-t-20">
                                    <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class = "mdl-textfield__input" type = "date" id = "date" name="purchase_date" required>
                                        <label class = "mdl-textfield__label" >Purchase Date<span class="text-danger">*</span></label>
                                    </div>
                                    @error('purchase_date')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 p-t-20">
                                    <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class = "mdl-textfield__input" type = "date" id = "date2" name="expire_date" required>
                                        <label class = "mdl-textfield__label" >Expire Date<span class="text-danger">*</span></label>
                                    </div>
                                    @error('expire_date')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 p-t-20">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="sample2" readonly tabIndex="-1" name="vehicle_type" required>
                                        <label for="sample2" class="pull-right margin-0">
                                            <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                        </label>
                                        <label for="sample2" class="mdl-textfield__label">Vehicle Type<span class="text-danger">*</span></label>
                                        <ul data-mdl-for="sample2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                            <li class="mdl-menu__item" data-val="1">Sedan</li>
                                            <li class="mdl-menu__item" data-val="2">SUV</li>
                                            <li class="mdl-menu__item" data-val="3">Bus</li>
                                            <li class="mdl-menu__item" data-val="4">Carriage</li>
                                            <li class="mdl-menu__item" data-val="5">Bike</li>
                                        </ul>
                                    </div>
                                    @error('vehicle_type')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 p-t-20">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="sample3" readonly tabIndex="-1" name="fuel_type" required>
                                        <label for="sample2" class="pull-right margin-0">
                                            <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                        </label>
                                        <label for="sample3" class="mdl-textfield__label">Fuel Type<span class="text-danger">*</span></label>
                                        <ul data-mdl-for="sample3" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                            <li class="mdl-menu__item" data-val="1">Electric</li>
                                            <li class="mdl-menu__item" data-val="2">Diesel</li>
                                            <li class="mdl-menu__item" data-val="3">Petrol</li>
                                        </ul>
                                    </div>
                                    @error('fuel_type')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 p-t-20">
                                    <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class = "mdl-textfield__input" type = "text" id = "vehiclename" name="vehicle_number" required>
                                    <label class = "mdl-textfield__label" >Vehicle Number<span class="text-danger">*</span></label>
                                </div>
                                    @error('vehicle_number')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 p-t-20">
                                    <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class = "mdl-textfield__input" type = "text" id = "driverName" name="driver_name" required>
                                    <label class = "mdl-textfield__label" >Driver Name<span class="text-danger">*</span></label>
                                </div>
                                    @error('driver_name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 p-t-20">
                                    <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <label class="control-label col-md-3">Image</label>
                                    <br>
                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="fileinput-new img-thumbnail" style="max-width: 200px; max-height: 150px;">
                                            <img
                                                src="{{asset('assets/img/image_placeholder.jpg')}}"
                                                alt="..."
                                            ></div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                             style="max-width: 200px; max-height: 150px;"></div>
                                        <div>
                                            <br>
                                            <span class="btn btn-outline-secondary btn-file w-100 mb-3" ><span
                                                    class="fileinput-new">Select Image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="vehicle_image"></span>
                                            <a href="#" class="btn btn-outline-secondary fileinput-exists w-100"
                                               data-dismiss="fileinput">Remove</a>
                                        </div>

                                    </div>
                                    </div>
                                    @error('vehicle_image')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 p-t-20">
                                    <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class = "mdl-textfield__input" type = "number" id = "seat" name="seat_capacity" required>
                                        <label class = "mdl-textfield__label" >Seat Capacity<span class="text-danger">*</span></label>
                                    </div>
                                    @error('seat_capacity')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 p-t-20">
                                    <div class = "mdl-textfield mdl-js-textfield txt-full-width">
						                     <textarea class = "mdl-textfield__input" rows =  "4"
                                                       id = "details"  name="details" required></textarea>
                                        <label class = "mdl-textfield__label">Other Details<span class="text-danger">*</span></label>
                                    </div>
                                    @error('details')
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

