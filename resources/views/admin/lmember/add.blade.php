@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-hostel"></i> Add Hostel Member</h3>


        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="{{ route('showLibrarymember') }}">Hostel</a></li>
            <li class="active">Add Hostel Member</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal"id="mainForm" method="post" action="{{ route('saveLibrarymember') }}" enctype="multipart/form-data">
                    @csrf

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
                        <span class="col-sm-4 control-label">

                        </span>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">
                             Balance <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="balance" name="balance" value="" placeholder="Enter  Balance">
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="teacherID" class="col-sm-2 control-label">
                            Join Date <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="join_date" name="join_date" value="" placeholder="Enter Join Date">
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
<script type="text/javascript">
    $('.select2').select2();
</script>
<script>
    $('#book-menu').addClass('active')
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
                    student: {
                        required: true
                    },
                    balance: {
                        required: true
                    },
                    join_date: {
                        required: true
                    },
                },
                messages: {

                    student: {
                        required: "Student is required"
                    },
                    balance: {
                        required: " Balance is required"
                    },
                    join_date: {
                        required: "Join Date is required"
                    },
                },
            });

</script>

@endsection