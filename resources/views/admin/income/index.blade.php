@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa iniicon-income"></i> Income</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Income</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                        <h5 class="page-header">
                            <a href="{{ route('addIncome') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Add a Income
                            </a>
                        </h5>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-sm-1">#</th>
                                <th class="col-sm-1">Name</th>
                                <th class="col-sm-1">Date</th>
                                <th class="col-sm-1">User</th>
                                <th class="col-sm-1">Amount</th>
                                <th class="col-sm-1">Note</th>
                                <th class="col-sm-1">File</th>
                                <th class="col-sm-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td data-title="">1</td>
                                    <td data-title="">Office Rent</td>
                                    <td data-title="">20 Sep 2020</td>
                                    <td data-title="">Admin</td>
                                    <td data-title="">5,000,000.00</td>
                                    <td data-title=""></td>
                                    <td data-title=""></td>
                                    <td data-title="Action">
                                        <a href="" class="btn btn-warning btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Edit">Edit</a>
                                        <a href="" onclick="return confirm('you are about to delete a record. This cannot be undone. are you sure?')" class="btn btn-danger btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Delete">Delete</a></td>
                                </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection