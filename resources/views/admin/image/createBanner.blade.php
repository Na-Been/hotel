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
                        <div class="page-title">Add Banner Image</div>
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
                            <header>Upload Banner Image</header>
                        </div>
                        <form method="POST" action="{{route('banner.store')}}" enctype="multipart/form-data" class="p-4">
                            @csrf
                            <div class="card-body row">
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="txtRoomNo"
                                               name="image_title"
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
                                               name="image_description"
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
                                               tabIndex="-1" name="route_name" required>
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
                                               tabIndex="-1" name="section" required>
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
                                <div class="col-lg-12 p-t-20" id="imageField">
                                    <div id="multipleImage">
                                        <fieldset class="form-group">
                                            <input type="file" id="image" name="images[]" class="form-control  more-image" multiple>
                                            <label for="image" class="more-image-label">Click here to choose file</label>
                                        </fieldset>
                                        <div class="preview-images-zone">
                                        <div class="emp-sec">
                            No File choosen</div>
                            </div></div>
                                    </div>
                                    @if($errors->has('images'))
                                        <div class="text-danger">{{$errors->first('images')}}</div>
                                    @elseif($errors->has('image'))
                                        <div class="text-danger">{{$errors->first('image')}}</div>
                                    @endif
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
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            var html = '<div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width hide" id="singleImage"> ' +
                '<label class="control-label col-md-3 pl-0">Image</label> <br>   <div class="fileinput fileinput-new text-center" data-provides="fileinput">' +
                ' <div class = "fileinput-new img-thumbnail" style = "max-width: 200px; max-height: 150px;">' +
                ' <img src = "{{asset('assets/img/image_placeholder.jpg')}}" alt = "..."></div>' +
                ' <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">' +
                '    </div>' +
                ' <div><br><span class="btn btn-outline-secondary btn-file w-100"><span class="fileinput-new">Select Image</span>' +
                '    <span class="fileinput-exists">Change</span>' +
                '    <input type="file" name="image"></span>' +
                '       <a href="#" class="btn btn-outline-secondary fileinput-exists w-100"' +
                '   data-dismiss="fileinput">Remove</a></div></div>';

            $('#sample2').change(function () {
                if ($(this).val() === 'Home') {
                    $('#section').show();
                    $('#sample3').change(function () {
                        if ($(this).val() === '1') {
                            $('#multipleImage').show();
                            $("#singleImage").addClass('hide');
                        } else {
                            $('#multipleImage').hide();
                            $(html).appendTo($('#imageField'));
                            $("#singleImage").removeClass('hide');
                            $("#singleImage").addClass('show');
                        }
                    });

                } else {
                    $("#singleImage").remove();
                    $('#section').hide();
                    $('#multipleImage').hide();
                    $(html).appendTo($("#imageField"));
                    $("#singleImage").removeClass('hide');
                    $("#singleImage").addClass('show');

                }
            });
/*
            $('form').submit(function () {
                if (!$('#sample2').val()) {
                    $('#errorMessage').append('Page name to display banner image is required!!!');
                    event.preventDefault();
                }
            });*/
        });

    </script>
@endsection
