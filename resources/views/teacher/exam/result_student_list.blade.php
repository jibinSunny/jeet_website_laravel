@extends('layouts.teacher')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-puzzle-piece"></i> Exam Result</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Exam Result</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="box-body">
                <div class="row">
                   
                </div><!-- row -->
            </div><!-- Body -->
            <div class="col-sm-12">

                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div id="all" class="tab-pane active">
                            <div id="hide-table">
                                <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Mail</th>
                                            <th>Phone</th>
                                            <th>Class</th>
                                            <th>Total Mark</th>
                                            <th>Grade</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody id=shedulelist>
                                        @foreach($data as $row)
                                        <tr>
                                            <td data-title="">{{ $loop->iteration}}</td>
                                            <td data-title="">{{ $row->students->first_name}}</td>
                                            <td data-title="">{{ $row->students->email}}</td>
                                            <td data-title="">{{ $row->students->phone}}</td>
                                            <td data-title="">{{ $row->students->classname->name}}</td>
                                            <td data-title="">{{ $row->totalmark}}</td>
                                            <td data-title="">{{ $row->grade}}</td>
                                            <td data-title=""> <a href="{{route('teacherstudentresultView',['exam_id'=>$exam,'student_id'=> $row->students->id])}}" class="btn btn-primary btn-sm" data-placement="top" data-toggle="tooltip" data-original-title="Result">Result</i></td>


                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div> <!-- nav-tabs-custom -->
            </div> <!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

@endsection
@section('scripts')
<script>
    $('#teacher-exam-menu').addClass('active')
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
@endsection