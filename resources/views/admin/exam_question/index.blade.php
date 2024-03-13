@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-pencil"></i> Exam</h3>
        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Exam</li>
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
                                <th>Exam Name</th>
                                <th>Exam Category</th>
                                <th>Instruction</th>
                                <th>Class</th>
                                <th>Division</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Room</th>
                                <th class="col-lg-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($exam as $row)
                            <tr>
                                <td data-title="">{{ $loop->iteration}}</td>
                                <td data-title="">{{$row->name }}</td>
                                <td data-title="">{{ isset($row->exams_category->name)?$row->exams_category->name:''}}</td>
                                <td data-title="">{{ isset($row->instructions->title)?$row->instructions->title:''}}</td>
                                <td data-title="">{{ isset($row->classes->name)?$row->classes->name:''}}</td>
                                <td data-title="">{{ isset($row->divisions->name)?$row->divisions->name:''}}</td>
                                <td data-title="">{{ isset($row->subjects->name)?$row->subjects->name:''}}</td>
                                <td data-title="">{{date('d-M-y',strtotime($row->edate))}}</td>
                                <td data-title="">{{date('h:i A',strtotime($row->examfrom))}} - {{date('h:i A',strtotime($row->examto))}}</td>
                                <td data-title="">{{ isset($row->rooms->name)?$row->rooms->name:''}}</td>
                                <td data-title="Action">

                                    <a href="{{route('listExamQuestion',['categoryId'=> $row->id])}}" class="btn btn-primary btn-sm" data-placement="top" data-toggle="tooltip" data-original-title="Add Question">Add Question</i>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div> <!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

@endsection
@section('scripts')
<script>
    $('#exam-question-menu').addClass('active')
</script>


@endsection