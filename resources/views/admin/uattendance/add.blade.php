@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-parents-secret"></i> User Attendance</h3>


        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="">Attendance</a></li>
            <li class="active">User Attendance</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <form class="form" id="mainForm" method="post" action="{{ route('userAttendance') }}" enctype="multipart/form-data">
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
                @if($data1 != "")
                <div class="col-sm-4 col-sm-offset-4 box-layout-fame"style="margin-left: 400px;text-align: center">
                        <h5>Attendance Details</h5>
                        <h5>Day : {{date('D',strtotime($date))}} </h5>
                        <h5>Date : {{$date}}</h5>
                    </div>
            </div>
            <form class="form" id="mainForm" method="post" action="{{ route('saveuserAttendance') }}" enctype="multipart/form-data">
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
                                    <th class="col-lg-2">User Type</th>
                                    <th class="col-sm-3">Attendance</th>
                                </tr>
                            </thead>

                            <tbody id="list">
                                @foreach($data1 as $key=>$row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img onerror="this.onerror=null;this.src='{{asset('img/placeholder.png')}}';" src="{{ URL::asset('/') }}" style="width: 65px;"></td>
                                    <td>{{$row->first_name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{ isset($row->usertypename->name)?$row->usertypename->name:''}}</td>
                                    <td>
                                        <input type="hidden" class="form-control" name="user[]" id="date" value="{{$row->id}}">
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

            </form><!-- col-sm-12 -->
            @endif
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

@endsection
@section('scripts')
<script>
    $('#attendance-menu').addClass('active')
    $('#date').datepicker();
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

@endsection
