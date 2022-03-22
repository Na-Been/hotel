@extends('admin.menubar.sidebar')
@section('title','Gallery Image')
@section('sidebar')
    @parent
@stop
@section('content')
    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                @include('session.sessionMessage')
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Gallery Image</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.index')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Banner Image</li>
                    </ol>
                </div>
            </div>
            <div>
                <div class="col-lg-12 pt-2 pb-4 pl-0 "><a href="{{route('image.create')}}">
                <button type="submit" style="border-radius:100% ; width:40px;height:40px ;cursor:pointer"
                                class=" btn-pink p-0">
                          <i class="fa fa-upload"></i>
                        </button>
                        Upload 
                    </a>
                </div>
                <div class="row">
                    @if($images->isNotEmpty())
                    @foreach($images as $image)
                        @php($gallerImage = json_decode($image->images)[0])
                        <div class="col-lg-4 col-md-6 col-12 col-sm-6 p-2">
                            <div class="blogThumb" >
                                <div class="thumb-center"  style="height:250px"><img style="width: 100%;
    object-fit: contain;
    height: 100%;" class="img-responsive" alt="user" src="{{url('/').Storage::url('public/gallery/'.$gallerImage)}}"></div>
                                <!-- <div class="vehicle-name cyan-bgcolor">
                                    <div class="user-name"></div>
                                </div> -->
                                <div class="vehicle-box">
                                    <p style="font-size:16px"><b> {{$image->image_title}}</b></p>
                  <div class="vehicle-button-group">
                  <a href="{{route('image.edit',$image->id)}}" >
                                        <button class="btn btn-secondary banner-edit p-0 mr-3"><i class="fa fa-pencil"></i></button>
                                    </a>
                                    <form method="POST" action="{{route('image.destroy',$image->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger banner-delete p-0" onclick="return confirm('Are you sure you want to delete it??')"><i class="fa fa-trash"></i></button>
                                    </form>
                  </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12 p-2 text-center" style="">
                       <div class="gallery-empty-field" style="height:200px;display:flex;align-items:center;justify-content:center">
                        <p style="font-size:16px">No image to display</p>
                       </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- end page content -->
@stop
