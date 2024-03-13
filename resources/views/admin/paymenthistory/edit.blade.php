@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-payment"></i> Edit Payment History</h3>

       
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="">Payment History</a></li>
            <li class="active">Edit Payment History</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                        <label for="amount" class="col-sm-2 control-label">
                           Amount <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="amount" name="amount" value="1100" >
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="payment_method" class="col-sm-2 control-label">
                        Payment Method <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                        <select name="class" id="class" class="form-control select2" tabindex="-1">
                                    <option value="0">Select Payment Method</option>
                                    </select>
                                </select>
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="Update Payment" >
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
@endsection