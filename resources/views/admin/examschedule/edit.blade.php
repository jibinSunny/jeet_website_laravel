@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-puzzle-piece"></i> Exam Schedule</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href=""></a></li>
            <li class="active">Edit Exam Schedule</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
            <form class="form-horizontal"id="mainForm" method="post" action="{{ route('saveexamSchedule') }}" enctype="multipart/form-data">
             @csrf
                    <div class="form-group">
                        <label for="examID" class="col-sm-2 control-label">
                          Exam Name <span class="text-red">*</span>
                          <input type="hidden" class="form-control" id="academicyear_id" name="academicyear_id" value="{{$examschedule->id}}" >
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" value="{{$examschedule->name}}"placeholder="Enter Name" >
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="examID" class="col-sm-2 control-label">
                         Category <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="category" id="category" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Category</option>
                                @foreach($examcategory as $row)
                                <option value="{{ $row->id}}" {{$examschedule->category ==$row->id ? 'selected' :''}}>{{ $row->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="classesID" class="col-sm-2 control-label">
                            Class <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="class" id="class" class="form-control select2" tabindex="-1">
                            <option selected disabled>Select Class</option>
                              @foreach($allclass as $row)
                              <option value="{{ $row->id}}" {{$examschedule->class ==$row->id ? 'selected' :''}}>{{ $row->name}} </option>
                              @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label">
        
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="classesID" class="col-sm-2 control-label">
                            Instruction <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="instruction_id" id="instruction_id" class="form-control select2" tabindex="-1">
                            <option selected disabled>Select Instruction</option>
                              @foreach($instruction as $row)
                              <option value="{{ $row->id}}" {{$examschedule->instruction_id ==$row->id ? 'selected' :''}}>{{ $row->title}} </option>
                              @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label">
        
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="sectionID" class="col-sm-2 control-label">
                            Division <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="division" id="division" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Division</option>
                             @foreach($alldivision as $row)
                              <option value="{{ $row->id}}" {{$examschedule->division ==$row->id ? 'selected' :''}}>{{ $row->name}} </option>
                              @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="subjectID" class="col-sm-2 control-label">
                            Subject <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="subject" id="subject" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Subject</option>
                              @foreach($allsubject as $row)
                              <option value="{{ $row->id}}" {{$examschedule->subject ==$row->id ? 'selected' :''}}>{{ $row->name}} </option>
                              @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-2 control-label">
                           Date <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="edate" name="edate" value="{{$examschedule->edate}}"placeholder="Enter Exam Date" >
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="examfrom" class="col-sm-2 control-label">
                          Time From <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="time" class="form-control" id="examfrom" name="examfrom" value="{{$examschedule->examfrom}}" >
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="examto" class="col-sm-2 control-label">
                            Time To <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="time" class="form-control" id="examto" name="examto" value="{{$examschedule->examto}}" >
                        </div>
                        <span class="col-sm-4 control-label">

                        </span>
                    </div>
                    <div class="form-group">
                        <label for="examID" class="col-sm-2 control-label">
                         Room <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="room" id="room" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Room</option>
                                @foreach($allroom as $row)
                                <option value="{{ $row->id}}" {{$examschedule->room ==$row->id ? 'selected' :''}}>{{ $row->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="Submit" >
                        </div>
                    </div>
                </form>
                    <div class="callout callout-danger">
                        <p><b>Note:</b> Create exam, class, section & subject before you create a new exam schedule</p>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
    <script type="text/javascript">
    $("#edate").datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
        startDate: new Date(),
        endDate: '',
    });
</script>
<script>
  $('#exam-menu').addClass('active')
</script>

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>
  $("form#mainForm").validate({
                normalizer: function(value) {
                    return $.trim(value);
                },
                rules: {
                    exam: {
                        required: true
                    },
                    class: {
                        required: true
                    },
                    division: {
                        required: true
                    },
                    subject: {
                        required: true
                    },
                    edate: {
                        required: true
                    },
                    examfrom: {
                        required: true
                    },
                    examto: {
                        required: true
                    },
                    room: {
                        required: true
                    },
           
                },
                messages: {
                    
                    exam: {
                        required: "exam is required"
                    },

                    class: {
                        required: "class is required"
                    },
                    division: {
                        required: "division is required"
                    },
                    subject: {
                        required: "subject is required"
                    },
                    edate: {
                        required: "Date is required"
                    },
                    examfrom: {
                        required: "from time is required"
                    },
                    examto: {
                        required: "to time is required"
                    },
                    room: {
                        required: "Room is required"
                    },
 
                },
            });

</script>
@endsection