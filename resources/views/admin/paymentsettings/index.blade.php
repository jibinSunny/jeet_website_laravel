@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-paymentsettings"></i> Payment Setting</h3>

       
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Payment Setting</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                <div class="col-sm-12">

                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class=""><a data-toggle="tab" href="#paypal" aria-expanded="true"></a></li>
                            <li class=""><a data-toggle="tab" href="#stripe" aria-expanded="true"></a></li>
                            <li class=""><a data-toggle="tab" href="#payumoney" aria-expanded="true"></a></li>
                            <li class=""><a data-toggle="tab" href="#voguepay" aria-expanded="true"></a></li>
                        </ul>

                        <div class="tab-content">

                            <div id="voguepay" class="tab-pane">
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                                            <div class="form-group" >
                                                <label for="voguepay_merchant_id" class="col-sm-2 control-label">
                                                    <span class="text-red">*</span>
                                                </label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="voguepay_merchant_id" name="voguepay_merchant_id" value="" >
                                                </div>
                                                <span class="col-sm-4 control-label"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="voguepay_merchant_ref" class="col-sm-2 control-label">
                                                    <span class="text-red">*</span>
                                                </label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="voguepay_merchant_ref" name="voguepay_merchant_ref" value="" >
                                                </div>
                                                <span class="col-sm-4 control-label"></span>
                                            </div>
                                            <div class="form-group" >
                                                <label for="voguepay_developer_code" class="col-sm-2 control-label">
                                                    <span class="text-red">*</span>
                                                </label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="voguepay_developer_code" name="voguepay_developer_code" value="" >
                                                </div>
                                                <span class="col-sm-4 control-label"></span>
                                            </div>
                                            <div class="form-group" >
                                                <label for="voguepay_demo" class="col-sm-2 control-label"></label>
                                                <div class="col-sm-5">
                                                    <div class="onoffswitch">
                                                        <input type="checkbox" name="voguepay_demo" class="onoffswitch-checkbox" id="myonoffswitchvoguepay">
                                                        <label class="onoffswitch-label" for="myonoffswitchvoguepay">
                                                            <span class="onoffswitch-inner"></span>
                                                            <span class="onoffswitch-switch"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <span class="col-sm-4 control-label"></span>
                                            </div>
                                                <label for="voguepay_status" class="col-sm-2 control-label"></label>
                                                <div class="col-sm-5">
                                                    <input type="radio" name="voguepay_status" value="1">
                                                    <input type="radio" name="voguepay_status" value="0">
                                                </div>


                                                <span class="col-sm-4 control-label"></span>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="submit" class="btn btn-success" value="" >
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="payumoney" class="tab-pane">
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                                            <div class="form-group" >
                                                <label for="payumoney_key" class="col-sm-2 control-label">
                                                    <span class="text-red">*</span>
                                                </label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="payumoney_key" name="payumoney_key" value="" >
                                                </div>
                                                <span class="col-sm-4 control-label">
                                                    
                                                </span>
                                            </div>
                                            <div class="form-group" >
                                                <label for="payumoney_salt" class="col-sm-2 control-label">
                                                    <span class="text-red">*</span>
                                                </label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="payumoney_salt" name="payumoney_salt" value="" >
                                                </div>
                                                <span class="col-sm-4 control-label">
                                                    
                                                </span>
                                            </div>
                                            <div class="form-group" >
                                                <label for="payumoney_secret" class="col-sm-2 control-label">
                                                  
                                                </label>
                                                <div class="col-sm-5">
                                                    <div class="onoffswitch">
                                                        <input type="checkbox" name="payumoney_demo" class="onoffswitch-checkbox" id="myonoffswitch">
                                                        <label class="onoffswitch-label" for="myonoffswitch">
                                                            <span class="onoffswitch-inner"></span>
                                                            <span class="onoffswitch-switch"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <span class="col-sm-4 control-label">
                                                   
                                                </span>
                                            </div>
                                           
                                                <label for="payumoney_status" class="col-sm-2 control-label">
                                                   
                                                </label>
                                                <div class="col-sm-5">
                                                    <input type="radio" name="payumoney_status" value="1" >
                                                    <input type="radio" name="payumoney_status" value="0">
                                                </div>


                                                <span class="col-sm-4 control-label"></span>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="submit" class="btn btn-success" value="" >
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="stripe" class="tab-pane">
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                                            <div class="form-group" >
                                                <label for="stripe_secret" class="col-sm-2 control-label">
                                                    <span class="text-red">*</span>
                                                </label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="stripe_secret" name="stripe_secret" value="" >
                                                </div>
                                                <span class="col-sm-4 control-label"></span>
                                            </div>
                                            <div class="form-group" >
                                                <label for="stripe_secret" class="col-sm-2 control-label"></label>
                                                <div class="col-sm-5">
                                                    <div class="onoffswitch">
                                                        <input type="checkbox" name="stripe_demo" class="onoffswitch-checkbox" id="myonoffswitchstripe">
                                                        <label class="onoffswitch-label" for="myonoffswitchstripe">
                                                            <span class="onoffswitch-inner"></span>
                                                            <span class="onoffswitch-switch"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <span class="col-sm-4 control-label"></span>
                                            </div>

                                                <label for="stripe_status" class="col-sm-2 control-label"></label>
                                                <div class="col-sm-5">
                                                    <input type="radio" name="stripe_status" value="1">
                                                    <input type="radio" name="stripe_status" value="0">
                                                </div>
                                                <span class="col-sm-4 control-label"></span>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="submit" class="btn btn-success" value="" >
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="paypal" class="tab-pane">
                            <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                                                <label for="paypal_api_username" class="col-sm-2 control-label">
                                                    <span class="text-red">*</span>
                                                </label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="paypal_api_username" name="paypal_api_username" value="" >
                                                </div>
                                                <span class="col-sm-4 control-label"></span>
                                            </div>

                                                <label for="paypal_api_password" class="col-sm-2 control-label">
                                                    <span class="text-red">*</span>
                                                </label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="paypal_api_password" name="paypal_api_password" value="" >
                                                </div>
                                                <span class="col-sm-4 control-label"></span>
                                            </div>

                            
                                                <label for="paypal_api_signature" class="col-sm-2 control-label">
                                                    <span class="text-red">*</span>
                                                </label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="paypal_api_signature" name="paypal_api_signature" value="" >
                                                </div>
                                                <span class="col-sm-4 control-label"></span>
                                            </div>

            
                                                <label for="paypal_email" class="col-sm-2 control-label">
                                                    <span class="text-red">*</span>
                                                </label>
                                                <div class="col-sm-5">
                                                    <input type="email" class="form-control" id="paypal_email" name="paypal_email" value="" >
                                                </div>
                                                <span class="col-sm-4 control-label"></span>
                                            </div>

        
                                                <label for="paypal_demo" class="col-sm-2 control-label">
                                                </label>
                                                <div class="col-sm-5">
                                                    <div class="onoffswitch">
                                                        <input type="checkbox" name="paypal_demo" class="onoffswitch-checkbox" id="myonoffswitchpaypal">
                                                        <label class="onoffswitch-label" for="myonoffswitchpaypal">
                                                            <span class="onoffswitch-inner"></span>
                                                            <span class="onoffswitch-switch"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <span class="col-sm-4 control-label">

                                                </span>
                                            </div>

                                        
                                                <label for="paypal_status" class="col-sm-2 control-label"></label>
                                                <div class="col-sm-5">
                                                    <input type="radio" name="paypal_status" value="1">
                                                    <input type="radio" name="paypal_status" value="0">
                                                </div>
                                                <span class="col-sm-4 control-label"></span>
                                            </div>


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
                    </div> <!-- nav-tabs-custom -->
                </div>
   

            </div> <!-- col-sm-12 -->
            
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

@endsection
@section('scripts')
<script>
    $(document).ready(function(){
      $('.now-check-type').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
        increaseArea: '20%'
      });
    });

    $(document).ready(function(){
      $('.now-check-type').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-red',
      });
    });

</script>
@endsection