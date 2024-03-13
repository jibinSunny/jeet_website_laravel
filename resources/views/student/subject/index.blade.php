@extends('layouts.student')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-subject"></i> Subject</h3>

        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Subject</li>
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
                                <th>Subject Name</th>
                                <th>Teacher</th>
                                <th>Subject Author</th>
                                <th>Subject Code</th>
                                <th>Class Name</th>
                                <th>Pass Mark</th>
                                <th>Final Mark</th>
                                <th>Note</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($subject_list as $row)
                            <tr>
                                <td data-title="">{{ $loop->iteration}}</td>
                                <td data-title="">{{ $row->name}}</td>
                                
                                <td data-title="">
                                @foreach($row->teacher_name as $item1)
                                 {{ isset($item1->first_name )?$item1->first_name:''}}  {{ isset($item1->last_name )?$item1->last_name:''}},
                                 @endforeach 
                                 </td>
                                <td data-title="">{{ $row->author}}</td>
                                <td data-title="">{{ $row->subject_code}}</td>
                                <td data-title="">{{ isset($row->classname->name)?$row->classname->name:''}}</td>
                                <td data-title="">{{ $row->pass_mark}}</td>
                                <td data-title="">{{ $row->total_mark}}</td>
                                <td data-title=""style="width:100px">{{ $row->note}}</td>
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
