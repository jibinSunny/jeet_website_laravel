@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-puzzle-piece"></i> Exam Result</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active"> Exam Result</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="box-body">
                <div class="row">
                    <form id='category-add-form' action="{{ route('studentExamresult') }}" method="POST">
                        @csrf
                        <div class="col-sm-12">
                            <div class="form-group col-sm-4" id="classes1">
                                <label>Class<span class="text-red"> * </span></label>
                                <select name="class" id="class" class="form-control select2" tabindex="-1">
                                    <option selected disabled>Select Class</option>
                                    @foreach($classes as $row)
                                    <option value="{{ $row->id}}"{{$class_id ==$row->id ? 'selected' :''}}>{{ $row->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-4" id="division1">
                                <label>Division<span class="text-red"> * </span></label>
                                <select id="division" name="division" class="form-control select2">
                                    <option selected disabled>Select Division</option>
                                    @if($division_id !="")
                                    @foreach($all_division as  $row)
                                    <option value="{{ $row->id}}"{{$division_id ==$row->id ? 'selected' :''}}>{{ $row->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <!-- <div class="col-sm-4"> -->
                            <input type="submit" class="btn btn-success bg-lightsky mg-b-10 " style="margin-top: 20px;" value="Submit">

                            <!-- </div> -->
                        </div>
                    </form>
                </div><!-- row -->
                </div>

                <div class="col-sm-12">

                    <div class="nav-tabs-custom">
                        <div class="tab-content">
                            <div id="all" class="tab-pane active">
                                <div id="hide-table">
                                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Exam Name</th>
                                                <th>Exam Category</th>
                                                <th>Instruction</th>
                                                <th>Class</th>
                                                <th>Division</th>
                                                <th>Subject</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Room</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody id=shedulelist>
                                            @foreach($exam as $row)
                                            <tr>
                                                <td data-title="">{{ $loop->iteration}}</td>
                                                <td data-title="">{{ isset($row->name)?$row->name:''}}</td>
                                                <td data-title="">{{ isset($row->exams_category->name)?$row->exams_category->name:''}}</td>
                                                <td data-title="">{{ isset($row->instructions->title)?$row->instructions->title:''}}</td>
                                                <td data-title="">{{ isset($row->classes->name)?$row->classes->name:''}}</td>
                                                <td data-title="">{{ isset($row->divisions->name)?$row->divisions->name:''}}</td>
                                                <td data-title="">{{ isset($row->subjects->name)?$row->subjects->name:''}}</td>
                                                <td data-title="">{{date('d-M-y',strtotime($row->edate))}}</td>
                                                <td data-title="">{{date('h:i A',strtotime($row->examfrom))}} - {{date('h:i A',strtotime($row->examto))}}</td>
                                                <td data-title="">{{ isset($row->rooms->name)?$row->rooms->name:''}}</td>
                                                <td data-title="">
                                                    <a href="{{route('examResultlist',['exam_id'=> $row->id])}}" class="btn btn-primary btn-sm" data-placement="top" data-toggle="tooltip" data-original-title="View">View</i>
                                                </td>

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
        $('#exam-menu').addClass('active')
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script type="text/javascript">
    $('#class').change(function() {
        var courseID = $(this).val();
        
        if (courseID) {
            if (courseID == "0")
            {
             $('#division').hide();
            }
            else{
                $.ajax({
                type: "GET",
                url: "{{url('admin/timetable/division/list')}}?categoryId=" + courseID,
                success: function(res) {
                    if (res) {
                        $("#division").empty();
                        $("#division").append('<option selected disabled>Select Division</option>');

                        for (var i = 0; i < res.length; ++i) {

                            $("#division").append('<option value="' + res[i].id + '">' + res[i].name + '</option>');
                        }

                    } else {
                        $("#division").empty();
                    }
                }
            });
        }
        }else {
            $("#division").empty();

        }
    });
    $('#class').change(function() {
        var weekID = $(this).val();
        //  alert(weekID);
        if (weekID) {
            if (weekID == "0")
            {
             $('#subject').hide();
            }
            else{
                $.ajax({
                type: "GET",
                url: "{{url('admin/timetable/subject/list')}}?categoryId=" + weekID,
                success: function(res) {
                    if (res) {
                        $("#subject").empty();
                        $("#subject").append('<option selected disabled>Select Subject</option>');

                        for (var i = 0; i < res.length; ++i) {

                            $("#subject").append('<option value="' + res[i].id + '">' + res[i].name + '</option>');
                        }

                    } else {
                        $("#subject").empty();
                    }
                }
            });
        }
        }else {
            $("#subject").empty();

        }
    })
</script>
    @endsection