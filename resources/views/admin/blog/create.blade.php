@extends('admin.menubar.sidebar')
@section('title','Add Blog')
@section('sidebar')
    @parent
    @stop
@section('content')

    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Add Blog</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.index')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Blog</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="card-head">
                            <header>Add Blog</header>
                            <button id = "panel-button"
                                    class = "mdl-button mdl-js-button mdl-button--icon pull-right"
                                    data-upgraded = ",MaterialButton">
                                <i class = "material-icons">more_vert</i>
                            </button>
                        </div>
                        <form method="POST" action="{{route('blog.store')}}" enctype="multipart/form-data">
                            @csrf
                        <div class="card-body row">
                            <div class="col-lg-6 p-t-20">
                                <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class = "mdl-textfield__input" type = "text" id = "txtRoomNo" name="title" required>
                                    <label class = "mdl-textfield__label">Blog Title<span class="text-danger">*</span></label>
                                </div>
                                @error('title')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 p-t-20 blog-status">
                            <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                   for = "switch-1" >
                                <input type = "checkbox" id = "switch-1"
                                       class = "mdl-switch__input" name="status">
                                <span style="margin-inline: 30px">Status</span>
                            </label>
                            </div>
                            <div class="col-lg-12 p-t-20">
                                <div class = "mdl-textfield mdl-js-textfield txt-full-width">
                                    <textarea class="ckeditor form-control" name="description" required></textarea>
                                </div>
                                @error('description')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-12 p-t-20">
                                <label class="control-label col-md-3 p-0">Upload Logo :</label>
                                <br>
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new img-thumbnail"
                                         style="max-width: 200px; max-height: 150px;">
                                        <img
                                            src="{{asset('assets/img/image_placeholder.jpg')}}"
                                            alt="..."
                                        ></div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"
                                         style="max-width: 200px; max-height: 150px;"></div>
                                    <div>
                                        <br>
                                        <span class="btn btn-outline-secondary btn-file w-100 mb-3"><span
                                                class="fileinput-new">Select Image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image"></span>
                                        <a href="#" class="btn btn-outline-secondary fileinput-exists w-100"
                                           data-dismiss="fileinput">Remove</a>
                                    </div>

                                </div>
                                @error('image')
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
        @section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
    @stop



