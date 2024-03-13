@extends('layouts.admin')
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