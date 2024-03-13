@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-sattendance"></i> Student Attendance</h3>


        <ol class="breadcrumb">
            <li><a href="">Dashboard<i class="fa icon-dashboardIcon"></i> </a></li>
            <li class="active"> Student Attendance</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body"style="padding: 30px;">
        <div class="row">

            <div class="col-sm-12">

                <div class="studentDiv col-sm-2" style="float: right;">
                    <label for="studentID">
                        Class <span class="text-red">*</span>
                    </label>
                    <select name="classesID" id="classesID" class="form-control select2 select2-offscreen" tabindex="-1">
                        <option selected disabled>Select Class</option>
                        @foreach($classes as $row)
                        <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach

                    </select>
                    <span class="text-red">
                    </span>
                </div>
                <h5 class="page-header">
                    <a href="{{ route('addstudentAttendance') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg> Add Student Attendance
                    </a>
                </h5>


                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a  href="{{route('showstudentAttendance')}}">All Students</a></li>
                        <li class="" id="division"><a data-toggle="tab" href="#" aria-expanded="false"></a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="all" class="tab-pane active">
                            <div id="hide-table">
                                <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                    <thead>
                                        <tr>
                                            <th class="col-sm-2">#</th>
                                            <th class="col-sm-2">Student Name</th>
                                            <th class="col-sm-2">Class</th>
                                            <th class="col-sm-2">Email</th>
                                            <!-- <th class="col-sm-2">Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="sattandance">
                                        @foreach($student_attendance_list as $row)
                                        <tr>
                                            <td data-title="">{{ $loop->iteration }}</td>
                                            <td data-title="">{{ $row->first_name }}</td>
                                            <td data-title="">{{ isset($row->classname->name)?$row->classname->name:''}}</td>
                                            <td data-title="">{{ $row->email }}</td>
                                            <!-- <td data-title="Action">
                                                        <a href="{{route('viewStudentAttendance',['categoryId'=> $row->id])}}" class="btn btn-primary btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="View">View</a>
                                                      
                                                    </td> -->
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
    $('#attendance-menu').addClass('active')
</script>
<script type="text/javascript">
    $('.select2').select2();
    $('#classesID').change(function() {
        var classesID = $(this).val();
        if (classesID == 0) {
            $('#hide-table').hide();
        } else {
            $.ajax({
                type: 'POST',
                url: "",
                data: "id=" + classesID,
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }
    });
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script type="text/javascript">
    $('#classesID').change(function() {
        var classesID = $(this).val();
        //   alert(classesID);
            $.ajax({
                type: "GET",
                url: "{{url('admin/sattendance/class/filter')}}?categoryId=" + classesID,
                success: function(res) {
                       $('#sattandance').empty();
                       $('#division').empty();
                     let html = ''
                        html = '(Division '
                        for (var i = 0; i < res.division.length; ++i) {
                            html += `${res.division[i].name}, `

                        }
                        html += ')'
                        $("#division").append('<a data-toggle="tab" href="#" aria-expanded="false">'+ html +'</a>');
                    //    alert( res.sattandance.length);
                        for (var i = 0; i < res.sattandance.length; ++i) {

                            $("#sattandance").append(`<tr>
                            <td data-title="">${i+1}</td>
                            <td data-title="">${res.sattandance[i]['first_name']}</td>
                            <td data-title="">${res.sattandance[i]['classname']['name']} </td>
                            <td data-title="">${res.sattandance[i]['email']} </td>`);
                        }

                }
            });
 
    });

    $('.select2').select2();
    var mainWidth = $('html').width();
    if (mainWidth >= 980) {
        $('.tab-pane').mCustomScrollbar({
            axis: "x" // horizontal scrollbar
        });
    }
</script>
@endsection