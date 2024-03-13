@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa iniicon-leaveassign"></i>Edit Leave Assign</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="">Leave Assign</a></li>
            <li class="active">Edit Leave Assign</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
            <form class="form-horizontal"id="mainForm" method="post" action="{{ route('saveleaveAssign') }}" enctype="multipart/form-data">
             @csrf
                    <div class="form-group">
                    <input type="hidden" class="form-control" id="classes" name="academicyear_id" value="{{$leavesssign->id}}">
                        <label for="usertypeID" class="col-sm-2 control-label">
                            User Type <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="usertype" id="usertype" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select User Type</option>
                                @foreach($usertype as $row)
                                <option value="{{ $row->id}}" {{$leavesssign->usertype ==$row->id ? 'selected' :''}}>{{ $row->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="leavecategoryID" class="col-sm-2 control-label">
                            Category <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="leave_category" id="leave_category" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Category</option>
                                @foreach($leavecategory as $row)
                                <option value="{{ $row->id}}" {{$leavesssign->leave_category ==$row->id ? 'selected' :''}}>{{ $row->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="leaveassignday" class="col-sm-2 control-label">
                            No of Days <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="leave_days" name="leave_days" value="{{$leavesssign->leave_days}}"placeholder="Enter  No of Days">
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="rack" class="col-sm-2 control-label">
                            Leave Applicable</br>Throught Out Year <span class="text-red">*</span>
                        </label>
                        <div class="col-auto">
                            <div class="form-radio">
                               @if($leavesssign->applicable=="1")
                                <input name="applicable" value="1" id="radio1" checked type="radio">
                                <label for="radio1">Yes</label>
                                <input name="applicable"value="0" id="radio2" type="radio">
                                <label for="radio2">No</label>
                                @else
                                <input name="applicable" value="1" id="radio1"  type="radio">
                                <label for="radio1">Yes</label>
                                <input name="applicable"value="0" id="radio2" checked type="radio">
                                <label for="radio2">No</label>
                                @endif
                            </div>
                        </div>
                 
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
</script>
<script>
    $('#leave-menu').addClass('active')
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>
  $("form#mainForm").validate({
                normalizer: function(value) {
                    return $.trim(value);
                },
                rules: {
                    usertype: {
                        required: true
                    },
                    leave_category: {
                        required: true,
                    },
                    leave_days: {
                        required: true,
                    },
                    applicable: {
                        required: true,
                    },
           
                },
                messages: {
                    usertype: {
                        required: "user type is required"
                    },
                    leave_category: {
                        required: "leave category is required"
                    },
                    leave_days: {
                        required: "leave days is required"
                    },
                    applicable: {
                        required: "Applicable is required"
                    },
 
                },
            });

</script>
@endsection