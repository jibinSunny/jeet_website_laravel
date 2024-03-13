@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-invoice"></i> </h3>

       
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i></a></li>
            <li><a href=""></a></li>
            <li class="active"></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                    <form class="form-horizontal" role="form" method="post">
                            <label for="amount" class="col-sm-2 control-label">
                                 <span class="text-red">*</span>
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="amount" name="amount" value="" >
                            </div>
                            <span class="col-sm-4 control-label">
                            </span>
                        </div>

                            <label for="payment_method" class="col-sm-2 control-label">
                                <span class="text-red">*</span>
                            </label>
                            <div class="col-sm-6">
                            </div>
                            <span class="col-sm-4 control-label">
                            </span>
                        </div>

                        <!-- Card Options fields -->
                        <div id="cardOption" style="display: none;">
                            <div class="form-group" >
                                <label for="amount" class="col-sm-2 control-label">
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="card_number" name="card_number" value="" >
                                </div>
                                <span class="col-sm-4 control-label">
                                </span>
                            </div>
                            <div class="form-group" >
                                <label for="amount" class="col-sm-2 control-label">
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="cvv" name="cvv" value="" >
                                </div>
                                <span class="col-sm-4 control-label">
                                </span>
                            </div>
                            <div class="form-group" >
                                <label for="amount" class="col-sm-2 control-label">
                                </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="expire_month" name="expire_month" value="" >
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="expire_year" name="expire_year" value="" >
                                </div>
                                <span class="col-sm-4 control-label">
                                </span>
                            </div>
                        </div>
                        <!-- Card options end-->
                        <!-- PayUOptions Options fields -->
                        <div id="payuInputs" style="display: none;">
                            <div class="form-group" >
                                <label for="first_name" class="col-sm-2 control-label">
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="" >
                                </div>
                                <span class="col-sm-4 control-label">
                                </span>
                            </div>
                            <div class="form-group" >
                                <label for="email" class="col-sm-2 control-label">
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="email" name="email" value="<?=set_value('email', null)?>" >
                                </div>
                                <span class="col-sm-4 control-label">
                                </span>
                            </div>
                            <div class="form-group" >
                                <label for="phone" class="col-sm-2 control-label">
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?=set_value('phone', null)?>" >
                                </div>
                                <span class="col-sm-4 control-label">
                                </span>
                            </div>
                        </div>
                        <!-- PayUOptions options end-->

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <input type="submit" class="btn btn-success" value="" >
                            </div>
                        </div>
                    </form>
                    <form class="form-horizontal" role="form" method="post">
                            <label for="amount" class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="amount" name="amount" value="" >
                            </div>
                            <span class="col-sm-4 control-label"></span>
                        </div>
                            <label for="payment_method" class="col-sm-2 control-label">
                            </label>
                            <div class="col-sm-6">
                            </div>

                            <span class="col-sm-4 control-label">
                            </span>
                        </div>

                        <!-- Card Options fields -->
                        <div id="cardOption" style="display: none;">
                            <div class="form-group" >
                                <label for="amount" class="col-sm-2 control-label">
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="card_number" name="card_number" value="" >
                                </div>
                                <span class="col-sm-4 control-label">
                                </span>
                            </div>
                            <div class="form-group" >
                                <label for="amount" class="col-sm-2 control-label">
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="cvv" name="cvv" value="" >
                                </div>
                                <span class="col-sm-4 control-label">
                                </span>
                            </div>
                            <div class="form-group>" >
                                <label for="amount" class="col-sm-2 control-label">
                                </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="expire_month" name="expire_month" value="" >
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="expire_year" name="expire_year" value="" >
                                </div>
                                <span class="col-sm-4 control-label">
                                </span>
                            </div>
                        </div>
                        <!-- Card options end-->
                        <!-- PayUOptions Options fields -->
                        <div id="payuInputs" style="display: none;">
                            <div class="form-group" >
                                <label for="first_name" class="col-sm-2 control-label">
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="" >
                                </div>
                                <span class="col-sm-4 control-label">
                                </span>
                            </div>
                            <div class="form-group" >
                                <label for="email" class="col-sm-2 control-label">
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="email" name="email" value="" >
                                </div>
                                <span class="col-sm-4 control-label">
                                </span>
                            </div>
                            <div class="form-group" >
                                <label for="phone" class="col-sm-2 control-label">
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="phone" name="phone" value="" >
                                </div>
                                <span class="col-sm-4 control-label">
                                </span>
                            </div>
                        </div>
                        <!-- PayUOptions options end-->

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <input type="submit" class="btn btn-success" value="" >
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#cardOption').show();
    $('#payuInputs').hide();
</script>
<script type="text/javascript">
    $('#payuInputs').show();
    $('#cardOption').hide();
</script>

<script type="text/javascript">
// $('.select2').select2();
$("#expire_month").datepicker( {
    format: "mm",
    viewMode: "months",
    minViewMode: "months"
});
$("#expire_year").datepicker( {
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years"
});
function CheckType() {
    var payment_method = $('#payment_method').val();

    if (payment_method=="Stripe") {
        $('#cardOption').show();
        $('#payuInputs').hide();
    } else if (payment_method=="Payumoney") {
        $('#payuInputs').show();
        $('#cardOption').hide();
    } else{
        $('#cardOption').hide();
        $('#payuInputs').hide();
    }
}
</script>
@endsection
@section('scripts')

@endsection