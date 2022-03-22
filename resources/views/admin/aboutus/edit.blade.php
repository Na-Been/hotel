@extends('admin.menubar.sidebar')
@section('title','Add About Us')
@section('sidebar')
    @parent
@stop
@section('content')

    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Update About Us</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.index')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">About Us</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="card-head">
                            <header>Update About Us</header>
                            <button id = "panel-button"
                                    class = "mdl-button mdl-js-button mdl-button--icon pull-right"
                                    data-upgraded = ",MaterialButton">
                                <i class = "material-icons">more_vert</i>
                            </button>
                        </div>
                        <form method="POST" action="{{route('aboutus.update', $findData->id)}}">
                            @csrf
                            @method('PATCH')
                            <div class="card-body row">
                                <div class="col-lg-12 p-t-20">
                                    <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class = "mdl-textfield__input" type = "text" id = "txtRoomNo" name="title" value="{{$findData->title}}" required>
                                        <label class = "mdl-textfield__label">About Us Title<span class="text-danger">*</span></label>
                                    </div>
                                    @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 p-t-20">
                                    <div class = "mdl-textfield mdl-js-textfield txt-full-width">
                                        <textarea class="ckeditor form-control" name="description" required>{!! $findData->description !!}</textarea>
                                    </div>
                                    @error('description')
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



