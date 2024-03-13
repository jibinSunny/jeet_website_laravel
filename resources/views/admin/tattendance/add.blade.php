@extends('layouts.admin')
@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-sattendance"></i>Teacher Attendance </h3>


        <ol class="breadcrumb">
            <li><a href="">Dashboard<i class="fa icon-dashboardIcon"></i></a></li>
            <li><a href=""></a>Teacher Attendance</li>
            <li class="active">Add Teacher Attendance</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
            <form class="form" id="mainForm" method="post" action="{{ route('tattendance') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                      <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    <div class="" >
                                        <label for="date" class="control-label">
                                            Date <span class="text-red">*</span>
                                        </label>
                                        @if($data1 != "")
                                        <input type="text" class="form-control wizard-required" name="date" value="{{$date}}" id="date" placeholder="Enter Date"data-date-end-date="0d">
                                        @else
                                        <input type="text" class="form-control wizard-required" name="date" id="date" placeholder="Enter Date"data-date-end-date="0d">
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <input type="submit" class="btn btn-success" style="margin-top:20px" value="Attendance" >
                                </div>
                            </div>
                        </div>
                </div>
                </form>

            </div>
            @if($data1 != "")
            <tbody>
                <div class="col-sm-4 col-sm-offset-4 box-layout-fame" style="text-align: center">Attendance Details</br>Date:{{$date}}</br>  <h5>Day : {{date('D',strtotime($date))}} </h5></div>
            </tbody>

            <form class="form" id="mainForm" method="post" action="{{ route('savetattendance') }}" enctype="multipart/form-data">
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
                                    <td><img onerror="this.onerror=null;this.src='{{asset('img/placeholder.png')}}';" src="{{ asset('user-files/teacher/profile/'.$row->code."/".$row->profile_image) }}" style="width: 65px;"></td>
                                    <td>{{$row->first_name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>
                                        <input type="hidden" class="form-control" name="teacher[]" id="date" value="{{$row->id}}">
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

            date: {
                required: true
            },


        },
        messages: {

            date: {
                required: "date is required"
            },

        },
    });
    $('#date').datepicker();
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
