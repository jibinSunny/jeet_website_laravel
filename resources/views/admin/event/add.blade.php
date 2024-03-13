@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-pencil"></i>Add Event</h3>
        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i>Dashboard</a></li>
            <li><a href="{{ route('showExam') }}">Event</a></li>
            <li class="active">Add Event</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
            <form class="form-horizontal"id="mainForm" method="post" action="{{ route('saveEvent') }}" enctype="multipart/form-data">
             @csrf
                 <div class="form-group">
                        <label for="exam" class="col-sm-2 control-label">
                            Title <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="title" name="title" value=""placeholder="Enter Title" >
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-sm-2 control-label">Description
                        </label>
                        <div class="col-sm-6">
                            <textarea style="resize:none;" class="form-control" id="description" name="description" placeholder="Enter Description"></textarea>
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-2 control-label">
                             Date <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="trext" class="form-control" id="date" name="date" value="" placeholder="Enter Date" >
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-2 control-label">
                             Time <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="time" class="form-control" id="time" name="time" value="" placeholder="Enter Time" >
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    
                    <div class="form-group">
                        <label for="classesID" class="col-sm-2 control-label">
                            Type
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                        <select name="type" id="type" class="form-control select2" tabindex="-1">
                                        <option selected disabled>Select Type</option>
                                        <option value="0">Common  For  All</option>
                                        <option value="1">Assigned</option>
                                   
                                        </select>
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    
                    <div class="form-group" id="classesDiv" style="display:none">
                        <label for="classesID" class="col-sm-2 control-label">
                            Class
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                        <select name="class" id="class" class="form-control select2" tabindex="-1">
                                        <option selected disabled>Select Class</option>
                                        @foreach($classes  as $classes)
                                        <option value="{{$classes->id}}">{{$classes->name}}</option>
                                        @endforeach
                                        </select>
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group" id="divisioDiv" style="display:none">
                        <label for="classesID" class="col-sm-2 control-label">
                        Division
                            <span class="text-red"></span>
                        </label>
                        <div class="col-sm-6">
                        <select name="division" id="division" class="form-control select2" tabindex="-1">
                                        <option selected disabled>Select Division</option>
                                        </select>
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="Submit" >
                        </div>
                    </div>

                </form>
            </div>    
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $('.select2').select2();
    $("#date").datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy',
        startDate: new Date(),
        endDate:'',
    });
</script>
<script type="text/javascript">
   $('#type').change(function() {
        var user_type = $(this).val();
        $('#classesDiv').hide();
        $('#divisioDiv').hide();

        if(user_type =="1")
        {
            $('#classesDiv').show();
            $('#divisioDiv').show();
        }
        if(user_type =="0")
        {
            $('#classesDiv').hide();
            $('#divisioDiv').hide();
        }
    
    });

    $('#class').change(function() {
        var courseID = $(this).val();
        $('#sectionDiv').show();
        if (courseID) {
            if (courseID == "0") {
                $('#division').hide();
            } else {
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
        } else {
            $("#division").empty();

        }
    });
</script>
<script>
  $('#exam-menu').addClass('active')
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>
  $("form#mainForm").validate({
                normalizer: function(value) {
                    return $.trim(value);
                },
                rules: {
                    title: {
                        required: true
                    },
                    date: {
                        required: true,
                    },
                    time: {
                        required: true,
                    },
                    type: {
                        required: true,
                    },
           
                },
                messages: {
                    title: {
                        required: "title is required"
                    },
                    date: {
                        required: "Date is required"
                    },
                    time: {
                        required: "time is required"
                    },
                    type: {
                        required: "type is required"
                    },
 
                },
            });

</script>
@endsection