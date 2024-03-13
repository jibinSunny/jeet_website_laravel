@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-sitemap"></i> Add Academic Year</h3>


        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="{{ route('showAcademicYear') }}"></i>Academic Year</a></li>
            <li class="active">Add</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal"id="mainForm" method="post" action="{{ route('saveAcademicYear') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="classes" class="col-sm-2 control-label">
                            Year <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="classes" name="name" value="" placeholder="Enter Year">
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="classes_numeric" class="col-sm-2 control-label">
                            Year Title <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="classes_numeric" name="title" value=""placeholder="Enter Title">
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="teacherID" class="col-sm-2 control-label">
                            Starting Date <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="date1" name="start_date" value=""placeholder="Enter Start Date">
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="note" class="col-sm-2 control-label">
                            Ending Date
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="date2" name="end_date" value=""placeholder="Enter End Date">
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>

                    <div class="form-layout-footer">
                        <input type="submit" class="btn btn-success bg-lightsky mg-b-10 " value="Submit">
                        <!-- <a class="btn btn-secondary mg-b-10 " href="">Cancel</a> -->
                    </div>
                  

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $("#date1").datepicker({
    autoclose: true,
    format: 'dd-mm-yyyy',
    startDate:'',
    endDate:'',
    daysOfWeekDisabled: "",
    datesDisabled: [""],
    });
    $("#date2").datepicker({
    autoclose: true,
    format: 'dd-mm-yyyy',
    startDate:'',
    endDate:'',
    daysOfWeekDisabled: "",
    datesDisabled: [""],
    });
</script>
<script>
  $('#settings-menu').addClass('active')
  $('#administrator-menu').addClass('active')
</script>
<script>
    $(".select2").select2({ placeholder: "", maximumSelectionSize: 6 });
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
                    title: {
                        required: true,
                    },
                    start_date: {
                        required: true,
                    },
                    end_date: {
                        required: true,
                    },
           
                },
                messages: {
                    name: {
                        required: "Name is required"
                    },
                    title: {
                        required: "title is required"
                    },
                    start_date: {
                        required: "Start Date is required"
                    },
                    end_date: {
                        required: "End Eate is required"
                    },
 
                },
            });

</script>
@endsection