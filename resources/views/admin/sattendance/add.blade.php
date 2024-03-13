@extends('layouts.admin')
@section('content')
{{-- <div class="callout callout-danger">
    <p><b>Note:</b> There are two types of attendance, day wise and class wise. you can select your institute attendance system in <a href="" class="text-blue">settings.</a></p>
</div> --}}
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-sattendance"></i>Student Attendance </h3>


        <ol class="breadcrumb">
            <li><a href="">Dashboard<i class="fa icon-dashboardIcon"></i></a></li>
            <li><a href=""></a>Student Attendance</li>
            <li class="active">Add Student Attendance</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                <div class="row">
                    <form class="form" id="mainForm" method="post" action="{{ route('studentAttendance') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-10">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Class <span class="text-red">*</span></label>
                                        <select name="class" id="class" class="form-control select2 select2-offscreen" tabindex="-1">
                                            <option selected disabled>Select Class</option>
                                            @if($clasename != "")
                                            @foreach($classes as $row)
                                            <option value="{{ $row->id}}" {{$claseid[0] ==$row->id ? 'selected' :''}}>{{ $row->name}} </option>
                                            @endforeach
                                            @else
                                            @foreach($classes as $row)
                                            <option value="{{ $row->id}}">{{ $row->name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Division <span class="text-red">*</span></label>
                                        <select name="division" id="division" class="form-control select2 select2-offscreen" tabindex="-1">
                                            <option selected disabled>Select Division</option>
                                            @if($clasename != "")
                                            @foreach($division as $row)
                                            <option value="{{ $row->id}}" {{$divisionid[0] ==$row->id ? 'selected' :''}}>{{ $row->name}} </option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Date <span class="text-red">*</span></label>
                                        @if($clasename != "")
                                        <input type="text" class="form-control wizard-required" name="date"value="{{$date}}" id="date" placeholder="Enter DOB"data-date-end-date="0d" >
                                        @else
                                        <input type="text" class="form-control wizard-required" name="date" id="date" placeholder="Enter Date"data-date-end-date="0d">
                                        @endif
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success col-md-12" style="margin-top: 20px;" onclick="checkDate()">Attendance</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @if($clasename != "")
                <tbody>
                    <div class="col-sm-4 col-sm-offset-4 box-layout-fame" style="text-align: center">Attendance Details</br>Class:{{$clasename[0]}}</br>Division:{{$divisionname[0]}}</br><h5>Day : {{date('D',strtotime($date))}} </h5></br>Date:{{$date}}</div>
                </tbody>
                @endif

            </div>
            @if($data1 != "")

            <form class="form" id="mainForm" method="post" action="{{ route('saveStudentAttendance') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-sm-12">
                    <div id="hide-table">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="col-sm-1">#</th>
                                    <th class="col-sm-1">Photo</th>
                                    <th class="col-sm-1">Name</th>
                                    <th class="col-sm-1">Email</th>
                                    <th class="col-sm-3">Attendance</th>
                                </tr>
                            </thead>

                            <tbody id="list">
                                @foreach($data1 as $key=>$row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img onerror="this.onerror=null;this.src='{{asset('img/placeholder.png')}}';" src="{{ asset('user-files/student/profile/'.$row->code."/".$row->profile_image) }}" style="width: 65px;"></td>
                                    <td>{{$row->first_name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>
                                        <input type="hidden" class="form-control" name="student[]" id="date" value="{{$row->id}}">
                                        @if($row->attendance =="[]")
                                        <div class="form-radio">
                                            <input type="radio" value="P" id="{{$key}}" name="attendance[{{$key}}]" class="custom-control-input">
                                            <label class="custom-control-label" for="{{$key}}">Present</label>

                                            <input type="radio" value="LE" id="{{$key}}" name="attendance[{{$key}}]" class="custom-control-input">
                                            <label class="custom-control-label" for="{{$key}}">Late Present With Excuse</label>

                                            <input type="radio" value="L" id="{{$key}}" name="attendance[{{$key}}]" class="custom-control-input">
                                            <label class="custom-control-label" for="{{$key}}">Late Present</label>

                                            <input type="radio" value="A" id="{{$key}}" name="attendance[{{$key}}]" class="custom-control-input">
                                            <label class="custom-control-label" for="{{$key}}">Absent</label>
                                        </div>
                                        @else
                                        <div class="form-radio">
                                            @if($row->attendance[0][$dayfeild] == "P")
                                            <input type="radio" value="P" id="{{$key}}" name="attendance[{{$key}}]" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="{{$key}}">Present</label>
                                            <input type="radio" value="LE" id="{{$key}}" name="attendance[{{$key}}]" class="custom-control-input">
                                            <label class="custom-control-label" for="{{$key}}">Late Present With Excuse</label>

                                            <input type="radio" value="L" id="{{$key}}" name="attendance[{{$key}}]" class="custom-control-input">
                                            <label class="custom-control-label" for="{{$key}}">Late Present</label>

                                            <input type="radio" value="A" id="{{$key}}" name="attendance[{{$key}}]" class="custom-control-input">
                                            <label class="custom-control-label" for="{{$key}}">Absent</label>
                                            @elseif($row->attendance[0][$dayfeild] == "LE")
                                            <input type="radio" value="P" id="{{$key}}" name="attendance[{{$key}}]" class="custom-control-input">
                                            <label class="custom-control-label" for="{{$key}}">Present</label>
                                            <input type="radio" value="LE" id="{{$key}}" name="attendance[{{$key}}]" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="{{$key}}">Late Present With Excuse</label>
                                            <input type="radio" value="L" id="{{$key}}" name="attendance[{{$key}}]" class="custom-control-input">
                                            <label class="custom-control-label" for="{{$key}}">Late Present</label>
                                            <input type="radio" value="A" id="{{$key}}" name="attendance[{{$key}}]" class="custom-control-input">
                                            <label class="custom-control-label" for="{{$key}}">Absent</label>
                                            @elseif($row->attendance[0][$dayfeild] == "L")
                                            <input type="radio" value="P" id="{{$key}}" name="attendance[{{$key}}]" class="custom-control-input">
                                            <label class="custom-control-label" for="{{$key}}">Present</label>
                                            <input type="radio" value="LE" id="{{$key}}" name="attendance[{{$key}}]" class="custom-control-input">
                                            <label class="custom-control-label" for="{{$key}}">Late Present With Excuse</label>
                                            <input type="radio" value="L" id="{{$key}}" name="attendance[{{$key}}]" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="{{$key}}">Late Present</label>
                                            <input type="radio" value="A" id="{{$key}}" name="attendance[{{$key}}]" class="custom-control-input">
                                            <label class="custom-control-label" for="{{$key}}">Absent</label>
                                            @elseif($row->attendance[0][$dayfeild] == "A")
                                            <input type="radio" value="P" id="{{$key}}" name="attendance[{{$key}}]" class="custom-control-input">
                                            <label class="custom-control-label" for="{{$key}}">Present</label>
                                            <input type="radio" value="LE" id="{{$key}}" name="attendance[{{$key}}]" class="custom-control-input">
                                            <label class="custom-control-label" for="{{$key}}">Late Present With Excuse</label>
                                            <input type="radio" value="L" id="{{$key}}" name="attendance[{{$key}}]" class="custom-control-input">
                                            <label class="custom-control-label" for="{{$key}}">Late Present</label>
                                            <input type="radio" value="A" id="{{$key}}" name="attendance[{{$key}}]" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="{{$key}}">Absent</label>
                                            @endif
                                        </div>

                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <input type="hidden" class="form-control" name="date" id="date" value="{{$date}}">
                    <input type="hidden" class="form-control" name="division" id="date" value="{{$divisionid[0]}}">
                    <input type="hidden" class="form-control" name="class" id="date" value="{{$claseid[0]}}">
                    <!-- <span  type="submit" style="margin-top: 20px;" class="btn btn-successss pull-right save_attendance">Submitt</span> -->
                    <button type="submit" class="btn btn-successss pull-right save_attendance" style="margin-top: 20px;color: #fff;background-color: #00acac;border-color: #00acac;">Submitt</button>

                </div> <!-- col-sm-12 -->

            </form>
            @endif
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

@endsection
@section('scripts')
<script>
    $('#attendance-menu').addClass('active')
</script>
<script>
    $(document).ready(function() {
        @if(Session::has('success'))
        toastr.success('{{ Session::get('
            success ') }}', 'Successful');
        @endif
        @if(Session::has('errors'))
        @foreach($errors -> all() as $error)
        toastr.error('{{ $error }}', 'Error');
        @endforeach
        @endif
    });
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

            date: {
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
            date: {
                required: "date is required"
            },

        },
    });
 $('#date').datepicker();


</script>
<script>
    $(".select2").select2();

    $("#deadlinedate").datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy',
        startDate: '',
        endDate: '',
    });

    $(document).on('click', '#close-preview', function() {
        $('.image-preview').popover('hide');
        // Hover befor close the preview
        $('.image-preview').hover(
            function() {
                $('.image-preview').popover('show');
                $('.content').css('padding-bottom', '100px');
            },
            function() {
                $('.image-preview').popover('hide');
                $('.content').css('padding-bottom', '20px');
            }
        );
    });

    $(function() {
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
        $('.image-preview-clear').click(function() {
            $('.image-preview').attr("data-content", "").popover('hide');
            $('.image-preview-filename').val("");
            $('.image-preview-clear').hide();
            $('.image-preview-input input:file').val("");
            $(".image-preview-input-title").text("");
        });
        // Create the preview image
        $(".image-preview-input input:file").change(function() {
            var img = $('<img/>', {
                id: 'dynamic',
                width: 250,
                height: 200,
                overflow: 'hidden'
            });
            var file = this.files[0];
            var reader = new FileReader();
            // Set preview image into the popover data-content
            reader.onload = function(e) {
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
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<!-- <script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });
        $(document).on('click', '.btn-successss', function(e) {
            var clase = $('#class').val();
            var division = $('#division').val();
            var department = $('#department').val();
            var date = $('#date').val();
            var attendance = $('#attendance').val();
            var datastr = "student=" + clase + clase = " + clase + " & division = " + division+ " & department = " + department+ " & date = " + date+ " & attendance = " + attendance;
            alert(datastr);
            $.ajax({
                type: "post",
                url: "{{route('saveStudentAttendance')}}",
                data: datastr,
                cache: false,
                success: function(data) {

                    alert(data);
                    if (data['data1'].length != "0") {


                    }

                },
                error: function(jqXHR, status, err) {
                    // alert("fals");
                },
                complete: function() {

                }
            });


        });

    });
</script> -->
@endsection
