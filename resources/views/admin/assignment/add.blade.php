@extends('layouts.admin')
@section('content')
<div class="box">
<div class="box-header">
        <h3 class="box-title"><i class="fa icon-assignment"></i> Add Assignment</h3>


        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="{{ route('showAssignment') }}"></i>Assignment</a></li>
            <li class="active">Add Assignment</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
            <form class="form-horizontal"id="mainForm" method="post" action="{{ route('saveAssignment') }}" enctype="multipart/form-data">
             @csrf
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">
                            Title <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="title" name="name" value=""placeholder="Enter Name">
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">
                      Category<span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                        <select id="category" name="category" class="form-control select2">
                        <option selected disabled>Select Category</option>
                        @foreach($caterory as $row)
                        <option value="{{$row['value']}}">{{$row['name']}}</option>
                        @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="deadlinedate" class="col-sm-2 control-label">
                            Deadline <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="deadline_date" name="deadline_date" value=""placeholder="Enter Deadline">
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="classesID" class="col-sm-2 control-label">
                            Class <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="class" id="class" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Class</option>
                                @foreach($class as $class)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="subjectID" class="col-sm-2 control-label">
                            Subject <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="subject" id="subject" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Subject</option>
                            </select>
                        </div>

                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="subjectID" class="col-sm-2 control-label">
                            Division <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="division" id="division" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Division</option>
                            </select>
                        </div>

                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="subjectID" class="col-sm-2 control-label">
                            Year <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="academic_year" id="academic_year" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Academic Year</option>
                                @foreach($academic_year as $academic_years)
                                <option value="{{$academic_years->id}}">{{$academic_years->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">
                            Description <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <textarea class="form-control" style="resize:none;" id="description"
                                name="description"placeholder="Enter Description"></textarea>
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="file" class="col-sm-2 control-label">File</label>
                        <div class="col-sm-6">
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default image-preview-clear"
                                        style="display:none;">
                                        <span class="fa fa-remove"></span>
                                    </button>
                                    <div class="btn btn-success image-preview-input">
                                        <span class="fa fa-repeat"></span>
                                        <span class="image-preview-input-title"></span>
                                        <input type="file" name="file" />Uplode File
                                    </div>
                                </span>
                            </div>
                        </div>

                        <span class="col-sm-4 control-label"></span>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="Submit">
                        </div>
                    </div>

                </form>


            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
  $('#assignmentlist').addClass('active')
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>
  $("form#mainForm").validate({
                normalizer: function(value) {
                    return $.trim(value);
                },
                rules: {
                    name: {
                        required: true
                    },
                    deadline_date: {
                        required: true
                    },
                    class: {
                        required: true
                    },
                    division: {
                        required: true
                    },
                    academic_year: {
                        required: true
                    },
                    subject: {
                        required: true
                    },
                    category: {
                        required: true
                    },
          
           
                },
                messages: {
                    name: {
                        required: "Name is required"
                    },
                    deadline_date: {
                        required: "Deadline Date is required"
                    },
                    class: {
                        required: "Class is required"
                    },
                    division: {
                        required: "Division is required"
                    },
                    academic_year: {
                        required: "Academic year is required"
                    },
                    subject: {
                        required: "Subject is required"
                    },
                    category: {
                        required: "Category is required"
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
@endsection