@extends('layouts.student')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-star"></i> Event</h3>

        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Event</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-lg-1">#</th>
                                <th class="col-lg-2">Title</th>
                                <th class="col-lg-2">Type</th>
                                <th class="col-lg-2">Date</th>
                                <th class="col-lg-2">Ex Date</th>
                                <th class="col-lg-2">Time</th>
                                <th class="col-lg-2">Class</th>
                                <th class="col-lg-2">Division</th>
                                <th class="col-lg-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($event_list as $row)
                            <tr>
                                <td data-title="">{{ $loop->iteration}}</td>
                                <td data-title="">{{ $row->title}}</td>
                                <td data-title="">@if($row->type =="0")Common For All @else Assigned @endif</td>
                                <td data-title="">{{ $row->date}}</td>
                                <td data-title="">{{ $row->ex_date}}</td>
                                <td data-title="">{{ $row->time}}</td>
                                <td data-title="">{{ isset($row->classname->name)?$row->classname->name:''}}</td>
                                <td data-title="">{{ isset($row->Division->name)?$row->Division->name:''}}</td>
                                <td data-title="">
                                <a href="{{route('viewRevenueReport',['code'=> $row->id])}}" class="btn btn-success btn-xs mrg" >View</a>
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


@endsection
@section('scripts')
<script>
    $('#academic-menu').addClass('active')
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
@endsection
