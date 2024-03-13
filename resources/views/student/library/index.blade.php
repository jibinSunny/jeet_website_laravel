@extends('layouts.student')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-issue"></i> Issue</h3>


        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Issue</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
      
                <div class="col-sm-12">
                    <div class="row">
                        <div id="hide-table">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Serial No</th>
                                        <th>Uer Type</th>
                                        <th>Class</th>
                                        <th>Division</th>
                                        <th>Book</th>
                                        <th>Issue Date</th>
                                        <th>Due Date</th>
                                        <th>Return Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($bookissue as $row)
                                <tr>
                                    <td data-title="">{{ $loop->iteration }}</td>
                                    <td data-title="">{{ $row->seriel_no }}</td>
                                    <td data-title="">{{ isset($row->user_types->name )?$row->user_types->name :''}}</td>
                                    <td data-title="">{{ isset($row->bookname->name )?$row->bookname->name :''}}</td>
                                    <td data-title="">{{ isset($row->classname->name )?$row->classname->name :''}}</td>
                                    <td data-title="">{{ isset($row->divisionname->name )?$row->divisionname->name :''}}</td>     
                                    <td data-title="">{{date('d-M-y',strtotime($row->issued_date))}} </td>
                                    <td data-title="">{{date('d-M-y',strtotime($row->due_date))}} </td>
                                    <td data-title="">{{date('d-M-y',strtotime($row->return_date))}}</td>
                                   
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


@endsection
@section('scripts')

<script>
  $('#academic-menu').addClass('active')
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
@endsection
