@extends('admin.menubar.sidebar')
@section('title','Edit Staff')
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
                        <div class="page-title">Edit Staff Details</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.index')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="">Staff</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Edit Staff Details</li>
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
{{--                        @dd($errors)--}}
                        <div class="card-body row">
                            <form method="POST" action="{{route('staff.update',$staff->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="card-body row">
                                    <div class="col-lg-6 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class = "mdl-textfield__input" type = "text" value="{{$staff->name}}" id = "txtModeltName" name="name" required>
                                            <label class = "mdl-textfield__label">Full Name<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="col-lg-6 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class = "mdl-textfield__input" type = "email" value="{{$staff->email}}" id = "txtModeltName" name="email" required>
                                            <label class = "mdl-textfield__label" >Email<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    @error('email')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="col-lg-6 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class = "mdl-textfield__input" value="{{$staff->joining_date}}" type = "date" id = "date" name="joining_date" required>
                                            <label class = "mdl-textfield__label">Joining Date<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    @error('joining_date')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="col-lg-6 p-t-20">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                            <input class="mdl-textfield__input" type="text" id="sample3" value="{{$staff->role}}" readonly tabIndex="-1" name="role" required>
                                            <label for="sample2" class="pull-right margin-0">
                                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                            </label>
                                            <label for="sample3" class="mdl-textfield__label">Role<span class="text-danger">*</span></label>
                                            <ul data-mdl-for="sample3" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                <li class="mdl-menu__item" data-val="1">Manager</li>
                                                <li class="mdl-menu__item" data-val="2">Chef</li>
                                                <li class="mdl-menu__item" data-val="3">Reception</li>
                                            </ul>
                                        </div>
                                    </div>
                                    @error('role')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="col-lg-6 p-t-20">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                            <input class="mdl-textfield__input" type="text" id="sample2" value="{{$staff->gender}}" readonly tabIndex="-1" name="gender" required>
                                            <label for="sample2" class="pull-right margin-0">
                                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                            </label>
                                            <label for="sample2" class="mdl-textfield__label">Gender<span class="text-danger">*</span></label>
                                            <ul data-mdl-for="sample2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                <li class="mdl-menu__item" data-val="DE">Male</li>
                                                <li class="mdl-menu__item" data-val="BY">Female</li>
                                            </ul>
                                        </div>
                                    </div>
                                    @error('gender')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="col-lg-6 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class = "mdl-textfield__input" type = "text" id = "text5" name="number" value="{{$staff->number}}" required>
                                            <label class = "mdl-textfield__label" for = "text5">Mobile Number<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    @error('number')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="col-lg-6 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class = "mdl-textfield__input date" type = "date" id = "date" value="{{$staff->birth_date}}" name="birth_date" required>
                                            <label class = "mdl-textfield__label" >Birth Date<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    @error('birth_date')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="col-lg-6 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class = "mdl-textfield__input" type = "text" value="{{$staff->address}}" id = "txtModeltName" name="address" required>
                                            <label class = "mdl-textfield__label" >Address<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    @error('address')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="col-lg-12 p-t-20">
                                        <label class="control-label col-md-3">Chhange Image</label>
                                        <br>
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new img-thumbnail"
                                                 style="max-width: 200px; max-height: 150px;">
                                                <img
                                                    src="{{url('/').Storage::url($staff->image)}}"
                                                    alt="..."
                                                ></div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                 style="max-width: 200px; max-height: 150px;"></div>
                                            <div>
                                                <br>
                                                <span class="btn btn-outline-secondary btn-file w-100"><span
                                                        class="fileinput-new">Select Image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image">
                                                </span>
                                                <a href="#" class="btn btn-outline-secondary fileinput-exists"
                                                   data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-12 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield txt-full-width">
						                     <textarea class = "mdl-textfield__input" rows =  "4"
                                                       id = "education"  name="education" required>{{$staff->education}}</textarea>
                                            <label class = "mdl-textfield__label" >Education Qualification<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    @error('education')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
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
    </div>
    <!-- end page content -->
    @stop
