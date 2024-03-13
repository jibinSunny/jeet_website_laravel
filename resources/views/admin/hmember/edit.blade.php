@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-hostel"></i> Edit Hostel Member</h3>


        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="{{ route('showHostelMember') }}">Hostel</a></li>
            <li class="active">Edit Hostel Member</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal"id="mainForm" method="post" action="{{ route('saveHostelMember') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="htype" class="col-sm-2 control-label">
                            Hostel name <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="hostel" id="hostel" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Hostel</option>
                                @foreach($hostel as $hostels)
                                <option value="{{ $hostels->id}}" {{$hmember->hostel ==$hostels->id ? 'selected' :''}}>{{ $hostels->name}} </option>
                                @endforeach

                            </select>

                        </div>
                        @if ($errors->has('hostel'))
                        <strong>{{ $errors->first('hostel') }}</strong>
                        @endif
                        <span class="col-sm-4 control-label">

                        </span>
                    </div>
                    <div class="form-group">
                        <label for="htype" class="col-sm-2 control-label">
                            Class Type <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="hostel_category" id="week_id" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Class type</option>
                                @foreach($hostel_category as $hostels)
                                <option value="{{ $hostels->id}}" {{$hmember->hostel_category ==$hostels->id ? 'selected' :''}}>{{ $hostels->class_type}} </option>
                                @endforeach
                            </select>

                        </div>
                        @if ($errors->has('hostel_category'))
                        <strong>{{ $errors->first('hostel_category') }}</strong>
                        @endif
                        <span class="col-sm-4 control-label">

                        </span>
                    </div>
                    <div class="form-group">
                        <label for="htype" class="col-sm-2 control-label">
                            Student <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="student" id="student" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Student</option>
                                <option value="1">jibin</option>
                            </select>

                        </div>
                        @if ($errors->has('student'))
                        <strong>{{ $errors->first('student') }}</strong>
                        @endif
                        <span class="col-sm-4 control-label">

                        </span>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">
                            Hostel Balance <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="hostel_balance" name="hostel_balance" value="{{$hmember->hostel_balance}}" placeholder="Enter Hostel Balance">
                        </div>
                        @if ($errors->has('hostel_balance'))
                        <strong>{{ $errors->first('hostel_balance') }}</strong>
                        @endif
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="teacherID" class="col-sm-2 control-label">
                            Join Date <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="join_date" name="join_date" value="{{$hmember->join_date}}" placeholder="Enter Join Date">
                        </div>
                        @if ($errors->has('join_date'))
                        <strong>{{ $errors->first('join_date') }}</strong>
                        @endif
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
<script type="text/javascript">
    $('.select2').select2();
    $("#join_date").datepicker();
</script>
<script>
    $('#hostel-menu').addClass('active')
</script>
<script>
    $('#hostel').change(function() {
        var categoryId = $(this).val();
        if (categoryId) {
            $.ajax({
                type: "GET",
                url: "{{url('admin/hmember/hostel/category/list')}}?categoryId=" + categoryId,
                success: function(res) {
                    if (res) {
                        $("#week_id").empty();
                        $("#week_id").append('<option>Select Class Type</option>');

                        for (var i = 0; i < res.length; ++i) {

                            $("#week_id").append('<option value="' + res[i].id + '">' + res[i].class_type + '</option>');
                        }

                    } else {
                        $("#week_id").empty();
                    }
                }
            });
        }
    });
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
                    hostel: {
                        required: true
                    },
                    hostel_category: {
                        required: true
                    },
                    student: {
                        required: true
                    },
                    hostel_balance: {
                        required: true
                    },
                    join_date: {
                        required: true
                    },
                },
                messages: {
                    hostel: {
                        required: "Hostel is required"
                    },
                    hostel_category: {
                        required: "Class Type is required"
                    },
                    student: {
                        required: "Student is required"
                    },
                    hostel_balance: {
                        required: "Hostel Balance is required"
                    },
                    join_date: {
                        required: "Join Date is required"
                    },
                },
            });

</script>

@endsection