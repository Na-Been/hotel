@extends('admin.menubar.sidebar')
@section('title', 'Review')
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
                        <div class="page-title ">Available Feedback</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                href="{{ route('admin.index') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Review</li>
                    </ol>
                </div>
            </div>
            <div class="tab-content tab-space">
                <div class="tab-pane active show" id="tab1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box">
                                @include('session.sessionMessage')
                                <div class="card-head">
                                    <div class="card-title pl-4">Available Feedback</div>
                                </div>
                                <div class="card-body ">
                                    <div class="table-scrollable">
                                        <table class="table table-hover table-checkable order-column full-width"
                                            id="example4">
                                            <thead>
                                                <tr>
                                                    <th class="center"> S.N. </th>
                                                    <th class="center"> Name </th>
                                                    <th class="center"> Email </th>
                                                    <th class="center" colspan="4"> Message </th>
                                                    <th class="center"> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($feedbacks as $feedback)
                                                    <tr class="odd gradeX">
                                                        <td class="center">{{ $loop->iteration }}</td>
                                                        <td class="center">{{ ucfirst($feedback->name) }}</td>
                                                        <td class="center">{{ $feedback->email }}</td>
                                                        <td class="center" colspan="4">
                                                            {{ Str::limit($feedback->message, 20) }}</td>
                                                        <form method="POST"
                                                            action="{{ route('feedback.destroy', $feedback->id) }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <td class="center">
                                                                <button type="submit" class="btn btn-tbl-delete btn-xs"
                                                                    onclick="return confirm('Are you sure you want to delete this??')">
                                                                    <i class="fa fa-trash-o "></i>
                                                                </button>
                                                            </td>
                                                        </form>
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
        </div>
    </div>
    <!-- end page content -->
@stop
