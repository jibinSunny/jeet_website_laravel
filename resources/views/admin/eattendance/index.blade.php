@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-eattendance"></i> Exam Attendance</h3>
        
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Exam Attendance</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                        <h5 class="page-header">
                            <a href="{{ route('addexamAttendance') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Add Exam Attendance
                            </a>
                        </h5>

                <form method="POST">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="examID" class="control-label">
                                            Exam <span class="text-red">*</span>
                                        </label>
                                        <select name="exam" id="exam" class="form-control select2" tabindex="-1">
                                            <option value="0">Select Exam</option>
                                            <option value="0">Optional</option>
                                            <option value="0">Mandatory</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group" >
                                        <label for="classesID" class="control-label">
                                           Class <span class="text-red">*</span>
                                        </label>
                                        <select name="class" id="class" class="form-control select2" tabindex="-1">
                                            <option value="0">Select Class</option>
                                            <option value="0">Optional</option>
                                            <option value="0">Mandatory</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="subjectID" class="control-label">
                                            Subject <span class="text-red">*</span>
                                        </label>
                                        <select name="subject" id="subject" class="form-control select2" tabindex="-1">
                                            <option value="0">Select Subject</option>
                                            <option value="0">Optional</option>
                                            <option value="0">Mandatory</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" >
                                        <input type="submit" class="btn btn-success col-md-12" style="margin-top:20px" value="View Attendance" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#all" aria-expanded="true">All Students</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="all" class="tab-pane active">
                                <div id="hide-table">
                                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th class="col-sm-2">#</th>
                                                <th class="col-sm-2">Photo</th>
                                                <th class="col-sm-2">Name</th>
                                                <th class="col-sm-2">Roll</th>
                                                <th class="col-sm-2">Email</th>
                                                <th class="col-sm-2">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    <td data-title="">1</td>
                                                    <td data-title="">Photo</td>
                                                    <td data-title="">Jos</td>
                                                    <td data-title="">45</td>
                                                    <td data-title="">tamim1@jeet.net</td>
                                                    <td data-title="Status"><button class="btn btn-danger btn-xs">Absent</button></td>
                                               </tr>
                                               <tr>
                                                    <td data-title="">1</td>
                                                    <td data-title="">Photo</td>
                                                    <td data-title="">Tamim Iqbal</td>
                                                    <td data-title="">45</td>
                                                    <td data-title="">tamim1@jeet.net</td>
                                                    <td data-title="Status"><button class="btn btn-success btn-xs">Present</button></td>
                                               </tr>
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
<script type="text/javascript">
$('.select2').select2();
$('#classesID').change(function(event) {
    var classesID = $(this).val();
    if(classesID === '0') {
        $('#subjectID').val(0);
    } else {
        $.ajax({
            type: 'POST',
            url: "",
            data: "id=" + classesID,
            dataType: "html",
            success: function(data) {
               $('#subjectID').html(data);
            }
        });
    }
});
</script>
@endsection