@extends('layouts.admin')
@section('content')
    <div class="callout callout-danger">
        <p><b>Note:</b> There are two types of attendance, day wise and class wise. you can select your institute attendance system in <a href="" class="text-blue">settings.</a></p>
    </div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-sattendance"></i>Student Attendance </h3>


        <ol class="breadcrumb">
            <li><a href="">Dashboard<i class="fa icon-dashboardIcon"></i></a></li>
            <li><a href=""></a>Student Attendance</li>
            <li class="active">Edit Student Attendance</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
            <form class="form"id="mainForm" method="post" action="{{ route('saveStudentAttendance') }}" enctype="multipart/form-data">
             @csrf
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="control-label">Class <span class="text-red">*</span></label>
                                            <select name="class" id="class" class="form-control select2 select2-offscreen"tabindex="-1">
                                            <option selected disabled>Select Class</option>
                                            @foreach($classes as $row)
                                            <option value="{{ $row->id}}" {{$studentAttendance->class ==$row->id ? 'selected' :''}}>{{ $row->name}} </option>
                                            @endforeach
										</select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="control-label">Division <span class="text-red">*</span></label>
                                            <select name="division" id="division" class="form-control select2 select2-offscreen"tabindex="-1">
                                            <option selected disabled>Select Division</option>
                                            @foreach($division as $row)
                                            <option value="{{ $row->id}}" {{$studentAttendance->division ==$row->id ? 'selected' :''}}>{{ $row->name}} </option>
                                            @endforeach
										</select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="control-label">Academic Year <span class="text-red">*</span></label>
                                            <select name="academic_year" id="academic_year" class="form-control select2 select2-offscreen"tabindex="-1">
                                            <option selected disabled>Select Academic Year</option>
                                            @foreach($academic_year as $row)
                                            <option value="{{ $row->id}}" {{$studentAttendance->academic_year ==$row->id ? 'selected' :''}}>{{ $row->name}} </option>
                                            @endforeach
										</select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="control-label">Student <span class="text-red">*</span></label>
                                            <select name="student" id="student" class="form-control select2 select2-offscreen"tabindex="-1">
                                            <option selected disabled>Select Student</option>
                                            @foreach($student as $row)
                                            <option value="{{ $row->id}}" {{$studentAttendance->student ==$row->id ? 'selected' :''}}>{{ $row->first_name}} </option>
                    
                                            @endforeach
										</select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="control-label">Department <span class="text-red">*</span></label>
                                            <select name="department" id="department" class="form-control select2 select2-offscreen"tabindex="-1">
                                            <option selected disabled>Select Department</option>
                                            @foreach($department as $row)
                                            <option value="{{ $row->id}}" {{$studentAttendance->department ==$row->id ? 'selected' :''}}>{{ $row->name}} </option>
                                            @endforeach
										</select>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="control-label">Date <span class="text-red">*</span></label>
                                            <input type="date" class="form-control" name="date" id="date" value="" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="control-label">Attendance Status<span class="text-red">*</span></label>
                                            <select name="attendance" id="attendance" class="form-control select2 select2-offscreen"tabindex="-1">
                                            <option selected disabled>Select Attendance Status</option>
                                            <option value="P">Present</option>
                                            <option value="L">Late</option>
                                            <option value="LE">Late excuse</option>
                                        
										</select>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="row">
                                    <div class="col-md-12"style=" padding-top: 70px;">
                                        <div class="form-group" >
                                            <button type="submit" class="btn btn-success col-md-12" style="margin-top: 20px;">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                  
            </div>

        
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

@endsection
@section('scripts')
<script>
  $('#attendance-menu').addClass('active')
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>
  $("form#mainForm").validate({
                normalizer: function(value) {
                    return $.trim(value);
                },
                rules: {
    
                    class: {
                        required: true
                    },
                    division: {
                        required: true
                    },
                    academic_year: {
                        required: true
                    },
                    student: {
                        required: true
                    },
                    department: {
                        required: true
                    },
                    date: {
                        required: true
                    },
                    attendance: {
                        required: true
                    },
           
                },
                messages: {

                    class: {
                        required: "Class is required"
                    },
                    division: {
                        required: "Division is required"
                    },
                    academic_year: {
                        required: "Academic year is required"
                    },
                    student: {
                        required: "student is required"
                    },
                    department: {
                        required: "Department is required"
                    },
                    date: {
                        required: "date is required"
                    },
                    attendance: {
                        required: "attendance is required"
                    },
 
                },
            });

</script>
<script>
    $(".select2").select2();

    $("#deadlinedate").datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy',
        startDate: '',
        endDate: '',
    });

    $(document).on('click', '#close-preview', function () {
        $('.image-preview').popover('hide');
        // Hover befor close the preview
        $('.image-preview').hover(
            function () {
                $('.image-preview').popover('show');
                $('.content').css('padding-bottom', '100px');
            },
            function () {
                $('.image-preview').popover('hide');
                $('.content').css('padding-bottom', '20px');
            }
        );
    });

    $(function () {
        // Create the close button
        var closebtn = $('<button/>', {
            type: "button",
            text: 'x',
            id: 'close-preview',
            style: 'font-size: initial;',
        });
        closebtn.attr("class", "close pull-right");
        // Set the popover default content
        $('.image-preview').popover({
            trigger: 'manual',
            html: true,
            title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
            content: "There's no image",
            placement: 'bottom'
        });
        // Clear event
        $('.image-preview-clear').click(function () {
            $('.image-preview').attr("data-content", "").popover('hide');
            $('.image-preview-filename').val("");
            $('.image-preview-clear').hide();
            $('.image-preview-input input:file').val("");
            $(".image-preview-input-title").text("");
        });
        // Create the preview image
        $(".image-preview-input input:file").change(function () {
            var img = $('<img/>', {
                id: 'dynamic',
                width: 250,
                height: 200,
                overflow: 'hidden'
            });
            var file = this.files[0];
            var reader = new FileReader();
            // Set preview image into the popover data-content
            reader.onload = function (e) {
                $(".image-preview-input-title").text("");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
            }
            reader.readAsDataURL(file);
        });
    });
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

</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

@endsection