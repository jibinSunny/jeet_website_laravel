@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-feetypes"></i> Add Fee Type</h3>
        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="{{ route('showFeeType') }}">Fee Type</a></li>
            <li class="active"> Add Fee Type</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
            <form class="form-horizontal"id="mainForm" method="post" action="{{ route('saveFeeType') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="feetypes" class="col-sm-2 control-label">
                            Fee Name <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" value=""placeholder="Enter Name" >
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="feetypes" class="col-sm-2 control-label">
                            Fee ID <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="fee_id" name="fee_id" value=""placeholder="Enter Fee ID" >
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" style="resize:none;" id="note" name="note"placeholder="Enter Description"></textarea>
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-sm-2 control-label">Generating duration</label>
                        <div class="col-sm-6">
                            <select name="duration" id="duration" class="form-control" >
                                <option value="">Select Duration</option>
                                <option value="0">Occasionaly</option>
                                <option value="12">Monthly</option>
                                <option value="4">Quarterly</option>
                                <option value="2">Half-Yearly</option>
                                <option value="1">Yearly</option>
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
<script>
  $('#settings-menu').addClass('active')
  $('#administrator-menu').addClass('active')
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
                    name: {
                        required: true
                    },
                    fee_id: {
                        required: true
                    },
                },
                messages: {
                    name: {
                        required: "Name is required"
                    },
                    fee_id: {
                        required: "Fee Id is required"
                    },
                },
            });

</script>
@endsection
