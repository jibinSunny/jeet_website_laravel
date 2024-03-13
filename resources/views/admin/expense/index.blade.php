@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-expense"></i> Expense</h3>


        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Expense</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                        <h5 class="page-header">
                            <a href="{{ route('addExpense') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Add an Expense
                            </a>
                        </h5>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-sm-1">#</th>
                                <th class="col-sm-1">Name</th>
                                <th class="col-sm-1">Date</th>
                                <th class="col-sm-1">Created User</th>
                                <th class="col-sm-1">Amount</th>
                                <th class="col-sm-1">Note</th>
                                <th class="col-sm-1">File</th>
                                <th class="col-sm-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($expenses)
                            @foreach ($expenses as $item)
                            <tr>
                                <td data-title="#">{{ $loop->iteration }}</td>
                                <td data-title="Name">{{ $item->expense_categories->name }}</td>
                                <td data-title="Date">{{ $item->date }}</td>
                                <td data-title="User">@if($item->created_usertype == 1) {{ $item->admins->name }} @endif</td>
                                <td data-title="Amount">{{ $item->amount }}</td>
                                <td data-title="Note">{{ $item->description }}</td>
                                <td data-title="">{{ $item->file }}</td>
                                <td data-title="Action">
                                <a href="{{ route('editExpense',['expense_code' => $item->code]) }}" class="btn btn-warning btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Edit">Edit</a><a href="" onclick="return confirm('you are about to delete a record. This cannot be undone. are you sure?')" class="btn btn-danger btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Delete">Delete</a></td>
                            </tr>
                            @endforeach
                            @endif
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
    $(document).ready(function() {
        @if(Session::has('success'))
        toastr.success('{{ Session::get('
            success ') }}', 'Successful');
        @endif
        @if(Session::has('errors'))
        @foreach($errors -> all() as $error)
        toastr.error('{{ $error }}', 'Error');
        @endforeach
        @endif
    });
</script>
<script>
    $('#accounts-menu').addClass('active');
    $('#expense-menu').addClass('active');
    $('#running-expense-menu').addClass('active');
</script>
@endsection
