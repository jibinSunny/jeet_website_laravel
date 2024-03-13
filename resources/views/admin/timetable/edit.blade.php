@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-routine"></i>Edit Time Table</h3>

       
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="">Time Table</a></li>
            <li class="active">Edit Time Table</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
            <form class="form-horizontal"id="mainForm" method="post" action="{{ route('saveTimeTable') }}" enctype="multipart/form-data">
             @csrf
                    <div class="form-group">
                    <input type="hidden" class="form-control" id="academicyear_id" name="academicyear_id" value="{{$timetablelist->id}}" placeholder="Enter Name">
                        <label for="schoolyearID" class="col-sm-2 control-label">
                            School Year <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="year" id="year" class="form-control select2" tabindex="-1">

                                <option selected disabled>Select Year</option>
                                @foreach($academicyear as $academicyears)
                                <option value="{{ $academicyears->id}}" {{$timetablelist->year ==$academicyears->id ? 'selected' :''}}>{{ $academicyears->name}} </option>
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
                                @foreach($classes as $classess)
                                <option value="{{ $classess->id}}" {{$timetablelist->class ==$classess->id ? 'selected' :''}}>{{ $classess->name}} </option>
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
                                @foreach($division as $divisions)
                                <option value="{{ $divisions->id}}" {{$timetablelist->division ==$divisions->id ? 'selected' :''}}>{{ $divisions->name}} </option>
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
                                @foreach($subject as $subjects)
                                <option value="{{ $subjects->id}}" {{$timetablelist->subject ==$subjects->id ? 'selected' :''}}>{{ $subjects->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="day" class="col-sm-2 control-label">
                            Day <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="day" id="day" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Day</option>
                                @foreach($dayArray as $key => $value)
                                <option value="{{$value['id']}}"{{$timetablelist->day ==$value['id'] ? 'selected' :''}}>{{$value['name']}}</option>
                               @endforeach                          
                            </select>
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="teacherID" class="col-sm-2 control-label">
                        Department <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="department" id="department" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Department</option>
                                @foreach($department as $departments)
                                <option value="{{$departments->id}}"{{$timetablelist->department ==$departments->id ? 'selected' :''}}>{{$departments->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="teacherID" class="col-sm-2 control-label">
                            Teacher <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="teacher" id="teacher" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Teacher</option>
                                @foreach($teacher as $teachers)
                                <option value="{{$teachers->id}}"{{$timetablelist->teacher ==$teachers->id ? 'selected' :''}}>{{$teachers->first_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="start_time" class="col-sm-2 control-label">
                            Starting Time <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="time" class="form-control" id="starttime" name="start_time" value="{{$timetablelist->start_time}}" >
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="end_time" class="col-sm-2 control-label">
                            Ending Time <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="time" class="form-control" id="endtime" name="end_time" value="{{$timetablelist->end_time}}" >
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="teacherID" class="col-sm-2 control-label">
                        Room <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="room" id="room" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Room</option>
                                @foreach($room as $rooms)
                                <option value="{{$rooms->id}}"{{$timetablelist->room ==$rooms->id ? 'selected' :''}}>{{$rooms->name}}</option>
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
                    <p><b>Note:</b> Make teacher, class, subject & section before you add timetable</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
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
<!--time picker -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<!--time picker -->
<script>
function TimePickerCtrl($) {
  var startTime = $('#starttime').datetimepicker({
    format: 'HH:mm'
  });
  
  var endTime = $('#endtime').datetimepicker({
    format: 'HH:mm',
    minDate: startTime.data("DateTimePicker").date()
  });
  
  function setMinDate() {
    return endTime
      .data("DateTimePicker").minDate(
        startTime.data("DateTimePicker").date()
      )
    ;
  }
  
  var bound = false;
  function bindMinEndTimeToStartTime() {
  
    return bound || startTime.on('dp.change', setMinDate);
  }
  
  endTime.on('dp.change', () => {
    bindMinEndTimeToStartTime();
    bound = true;
    setMinDate();
  });
}

$(document).ready(TimePickerCtrl);
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
                    year: {
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
                    day: {
                        required: true
                    },
                    teacher: {
                        required: true
                    },
                    department: {
                        required: true
                    },
                    start_time: {
                        required: true
                    },
                    end_time: {
                        required: true
                    },
                    room: {
                        required: true
                    },
           
                },
                messages: {
                    year: {
                        required: "year is required"
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
                    day: {
                        required: "day is required"
                    },
                    department: {
                        required: "Department is required"
                    },
                    teacher: {
                        required: "teacher is required"
                    },
                    start_time: {
                        required: "Start time is required"
                    },
                    end_time: {
                        required: "End time is required"
                    },
                    room: {
                        required: "Room is required"
                    },
 
                },
            });

</script>

@endsection