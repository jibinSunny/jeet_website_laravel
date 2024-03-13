@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-payment"></i> Payment History</h3>

        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Payment History</li>
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
                                <th>#</th>
                                <th>Student</th>
                                <th>Class</th>
                                <th>Fee Type</th>
                                <th>Method</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Payment By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td data-title="">1</td>
                                    <td data-title="Student">Virat Kholi</td>
                                    <td data-title="Class">Five</td>
                                    <td data-title="Fee Type">Hostel Fee</td>
                                    <td data-title="Method">Cash</td>
                                    <td data-title="Amount">1100</td>
                                    <td data-title="Date">20 Sep 2020</td>
                                    <td data-title="Payment By">Admin</td>
                                    <td data-title="Action">
                                     <a href="{{ route('editpaymentHistory') }}" class="btn btn-warning btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Edit">Edit</a>
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