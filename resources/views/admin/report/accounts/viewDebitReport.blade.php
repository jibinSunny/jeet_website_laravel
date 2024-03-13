@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-star"></i> Debit Report View</h3>

        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Debit Report View</li>
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
                                <th class="col-lg-2">Name</th>
                                <th class="col-lg-2">Type</th>
                                <th class="col-lg-2">Date</th>
                                <th class="col-lg-2">amount</th>
                                <th class="col-lg-2">Class</th>
                                <th class="col-lg-2">Division</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fee as $row)
                            <tr>
                                <td data-title="">{{ $loop->iteration}}</td>
                                <td data-title="">{{ isset($row->students->first_name)?$row->students->first_name:''}} {{ isset($row->students->last_name)?$row->students->last_name:''}}</td>
                                <td data-title="">{{ isset($row->feetypes->name)?$row->feetypes->name:''}}</td>
                                <td data-title="">{{ $row->date}}</td>
                                <td data-title="">{{ $row->amount}}</td>
                                <td data-title="">{{ isset($row->classes->name)?$row->classes->name:''}}</td>
                                <td data-title="">{{ isset($row->divisions->name)?$row->divisions->name:''}}</td>

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
    $('#account-report-menu').addClass('active');
    $('#debit-report-menu').addClass('active');
    
</script>
<script type="text/javascript">
    if (window.performance && window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD) {
        location.reload();
    }
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
@endsection
