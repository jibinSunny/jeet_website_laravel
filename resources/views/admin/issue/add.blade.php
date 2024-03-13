@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-issue"></i> Issue</h3>


        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="">Issue</a></li>
            <li class="active">Add Issue</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" id="mainForm" method="post" action="{{ route('saveBookissue') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="lid" class="col-sm-2 control-label">
                            Seriel No <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="seriel_no" name="seriel_no" value="" placeholder="Enter Seriel No">
                        </div>
                        <span class="col-sm-4 control-label">

                        </span>
                    </div>
                    <div class="form-group">
                        <label for="book" class="col-sm-2 control-label">
                            User Type <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="user_type" id="user_type" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select User Type</option>
                                @foreach($usertype as $row)
                                @if($row->id != 1 && $row->id != 4)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label">

                        </span>
                    </div>

                    <div class="form-group" id="subject_id">
                        <label for="book" class="col-sm-2 control-label">
                            Library Member <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="library_member" id="user" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Library Member</option>

                            </select>
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div id="class_id" style="display:none">
                        <div class="form-group">
                            <label for="classesID" class="col-sm-2 control-label">
                                Class <span class="text-red"></span>
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
                                Division <span class="text-red"></span>
                            </label>
                            <div class="col-sm-6">
                                <select name="division" id="division" class="form-control select2" tabindex="-1">
                                    <option selected disabled>Select Division</option>
                                </select>
                            </div>

                            <span class="col-sm-4 control-label"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="book" class="col-sm-2 control-label">
                            Book <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="book" id="bloodgroup" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Book</option>
                                @foreach($book as $books)
                                <option value="{{$books->id}}">{{$books->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label">

                        </span>
                    </div>
                    <div class="form-group">
                        <label for="due_date" class="col-sm-2 control-label">
                            Due Date <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="due_date" name="due_date" value="" placeholder="Enter Due Date">
                        </div>
                        <span class="col-sm-4 control-label">

                        </span>
                    </div>
                    <div class="form-group">
                        <label for="due_date" class="col-sm-2 control-label">
                            Issued Date<span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="issued_date" name="issued_date" value="" placeholder="Enter issued Date">
                        </div>
                        <span class="col-sm-4 control-label">

                        </span>
                    </div>
                    <div class="form-group">
                        <label for="due_date" class="col-sm-2 control-label">
                            Return Date <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="return_date" name="return_date" value="" placeholder="Enter Return Date">
                        </div>
                        <span class="col-sm-4 control-label">

                        </span>
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
    $('#book-menu').addClass('active')
</script>
<script type="text/javascript">
    $('#user_type').change(function() {
        var weekID = $(this).val()
        if (weekID) {
            $.ajax({
                type: "GET",
                url: "{{url('admin/bookissu/user/list')}}?categoryId=" + weekID,
                success: function(res) {
                    if (res) {
                        // alert(res);
                        $("#user").empty();
                        $("#user").append('<option selected disabled>Select User</option>');

                        for (var i = 0; i < res.length; ++i) {

                            $("#user").append('<option value="' + res[i].id + '">' + res[i].first_name + '</option>');
                        }

                    } else {
                        $("#user").empty();
                    }
                }
            });

        }
        if (weekID == "3") {
            $('#class_id').show();
        } else {
            $('#class_id').hide();
        }
    })

    $('#class').change(function() {
        var courseID = $(this).val();

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
<script type="text/javascript">
    $('.select2').select2();
    $("#issued_date").datepicker();
    $("#due_date").datepicker();
    $("#return_date").datepicker();
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>
    $("form#mainForm").validate({
        normalizer: function(value) {
            return $.trim(value);
        },
        rules: {
            seriel_no: {
                required: true
            },
            book: {
                required: true
            },
            user_type: {
                required: true
            },
            library_member: {
                required: true
            },
            issued_date: {
                required: true
            },
            return_date: {
                required: true
            },
            due_date: {
                required: true
            },

        },
        messages: {
            seriel_no: {
                required: "Seriel o is required"
            },
            user_type: {
                required: "User_type is required"
            },
            book: {
                required: "Book is required"
            },
            library_member: {
                required: "Library Member is required"
            },
            issued_date: {
                required: "Issued Date is required"
            },
            return_date: {
                required: "Return Date is required"
            },
            due_date: {
                required: "Due Date is required"
            },

        },
    });
</script>
@endsection