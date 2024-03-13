@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa iniicon-ini-emailsetting"></i> Email Setting</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Email Setting</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <style type="text/css">
        .setting-fieldset {
            border: 1px solid #DBDEE0 !important;
            padding: 15px !important;
            margin: 0 0 25px 0 !important;
            box-shadow: 0px 0px 0px 0px #000;
        }

        .setting-legend {
            font-size: 1.1em !important;
            font-weight: bold !important;
            text-align: left !important;
            width: auto;
            color: #428BCA;
            padding: 5px 15px;
            border: 1px solid #DBDEE0 !important;
            margin: 0px;
        }
    </style>
    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
        <div class="box-body">
            <fieldset class="setting-fieldset">
                <legend class="setting-legend">Email Configuration</legend>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label>&nbsp; <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Select Email Engine"></i>
                                </label>
                        
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mainsmtpDIV">
                        <div class="form-group" >
                            <div class="col-sm-12">
                                <label for="smtp_username">
                                    &nbsp;<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="set your smtp username"></i>
                                </label>
                                <input type="text" class="form-control" id="smtp_username" name="smtp_username" value="" />
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mainsmtpDIV">
                        <div class="form-group" >
                            <div class="col-sm-12">
                                <label for="smtp_password">
                                    &nbsp;<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="set your smtp password"></i>
                                </label>
                                <input type="text" class="form-control" id="smtp_password" name="smtp_password" value="" />
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <div class="row">                    
                    <div class="col-sm-4 mainsmtpDIV">
                        <div class="form-group" >
                            <div class="col-sm-12">
                                <label for="smtp_server">
                                    &nbsp;<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="set your smtp server"></i>
                                </label>
                                <input type="text" class="form-control" id="smtp_server" name="smtp_server" value="" />
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mainsmtpDIV">
                        <div class="form-group" >
                            <div class="col-sm-12">
                                <label for="smtp_port">
                                    &nbsp;<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="set your smtp port"></i>
                                </label>
                                <input type="text" class="form-control" id="smtp_port" name="smtp_port" value="" />
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mainsmtpDIV">
                        <div class="form-group" >
                            <div class="col-sm-12">
                                <label for="smtp_security">
                                    &nbsp;<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="set your smtp security"></i>
                                </label>
                                <input type="text" class="form-control" id="smtp_security" name="smtp_security" value="" />
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>

            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <div class="col-sm-8">
                            <input type="submit" class="btn btn-success btn-md" value="" >
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

@endsection
@section('scripts')
<script type="text/javascript">

    $('.select2').select2();

    $('.mainsmtpDIV').hide();


    var set_email_engine = "";
    if(set_email_engine == 'smtp') {
        $(".mainsmtpDIV").show('slow');
    } else if(set_email_engine == 'sendmail') {
        $(".mainsmtpDIV").hide('slow');
    } else if(set_email_engine == 'select') {
        $('.mainsmtpDIV').hide();
    } else {
            $('.mainsmtpDIV').show();
    }

    $(document).on('change', "#email_engine", function() {
        var get_email_engine = $(this).val();
        if(get_email_engine == 'smtp') {
            $(".mainsmtpDIV").show('slow');
        } else {
            $(".mainsmtpDIV").hide('slow');
        }
    });

</script>
@endsection