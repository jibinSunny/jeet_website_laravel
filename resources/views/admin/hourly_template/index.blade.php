@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clock-o"></i> Hourly Template</h3>


        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Hourly Template</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="page-header">
                    <a href="{{ route('addHourlyTemplate') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Add a Hourly template
                    </a>
                </h5>
                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-sm-1">#</th>
                                <th class="col-sm-2">Name</th>
                                <th class="col-sm-2">User Type</th>
                                <th class="col-sm-2">Hourly Grades</th>
                                <th class="col-sm-2">Hourly Rate</th>
                                <th class="col-sm-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hourly_templates as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>@if(isset($item->users->first_name)){{ $item->users->first_name }}  {{ $item->users->last_name }}@else {{ $item->teachers->first_name }} {{ $item->teachers->last_name }}@endif</td>
                                    <td>{{ $item->usertypes->name }}</td>
                                    <td>{{ $item->grade }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td data-title="Action">
                                        <a href="" class="btn btn-warning btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i>Edit</a>
                                        <a href="" onclick="return confirm('you are about to delete a record. This cannot be undone. are you sure?')" class="btn btn-danger btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i>Delete</a></td>
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
    $('#accounts-menu').addClass('active');
    $('#expense-menu').addClass('active');
    $('#payroll-menu').addClass('active');
    $('#hourly-template-menu').addClass('active');
</script>
@endsection
