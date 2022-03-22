@extends('admin.menubar.sidebar')
@section('title','About Us')
@section('sidebar')
    @parent
@stop
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">About Us</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.index')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">About Us</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-box">
                        @include('session.sessionMessage')
                        <div class="card-head">
                            <header>About Us</header>
                            <div class="tools">
                                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="row p-b-20">
                                <div class="col-md-6 col-sm-6 col-6">
                                    <div class="btn-group">
                                        <a href="{{route('aboutus.create')}}" id="addRow" class="btn btn-info">
                                            Change About Us <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-scrollable">
                                <table class="table table-hover table-checkable order-column full-width" id="example4">
                                    <thead>
                                    <tr>
                                        <th class="center"> S.N.</th>
                                        <th class="center"> Title </th>
                                        <th class="center"> Description </th>
                                        <th class="center"> Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datas as $data)
                                        <tr class="odd gradeX">
                                            <td class="center">{{$loop->iteration}}</td>
                                            <td class="center">{{$data->title}}</td>
                                            <td class="center">{!!Str::limit($data->description, 30) !!}</td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{route('aboutus.edit',$data->id)}}" class="btn btn-tbl-edit btn-xs">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form action="{{route('aboutus.destroy',$data->id)}}" method="POST" onclick="return confirm('Are you sure you want to delete it??')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" id="delete" class="btn btn-tbl-delete btn-xs fa fa-trash-o"></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
