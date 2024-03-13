@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-gears"></i> General Settings</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Settings</li>
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
    @csrf
        <div class="box-body">
            <fieldset class="setting-fieldset">
                <legend class="setting-legend">Site Configuration</legend>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="sname">Site Title
                                    &nbsp;<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="set your site title here" ></i>
                                </label>
                                <input type="text" class="form-control" id="sname" name="site_name" value="{{ $collection->site_name }}" placeholder="Enter site name"/>
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="phone">Phone No
                                    &nbsp;<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="Set organization phone number here"></i>
                                </label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $collection->phone }}" placeholder="Enter phone number">
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="email">System Email
                                    &nbsp;<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="Set organization email address here"></i>
                                </label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $collection->email }}" placeholder="Enter system email id" >
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="address">Address&nbsp;<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="Set organization address here"></i>
                                </label>
                                <textarea class="form-control" style="resize:none;" id="address" name="address">{{ $collection->address }}</textarea>
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="footer">Footer&nbsp;<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="Set site footer text here"></i>
                                </label>
                                <input type="text" class="form-control" id="footer" name="footer" value="{{ $collection->footer }}" placeholder="Enter footer text">
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="currency_code">Currency Code
                                   &nbsp;<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Set organization currency code like USD or GBP"></i>
                                </label>
                                <input type="text" class="form-control" id="currency_code" name="currency_code" value="{{ $collection->currency_code }}" placeholder="Enter currency code" >
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="currency_symbol">Currency Symbol&nbsp;<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Set organization currency system here like $ or £"></i>
                                </label>
                                <input type="text" class="form-control" id="currency_symbol" name="currency_symbol" value="{{ $collection->currency_symbol }}" placeholder="Enter currency symbol" >
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="school_year">Default Academic Year&nbsp;<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Select school running academic year"></i>
                                </label>
                                <select id="academic_year" name="academic_year" class="form-control select2">
                                    <option>2020-2021</option>
                                    <option>2021-2022</option>
                                </select>
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="google_analytics">Google Analytics&nbsp;<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="Set site google_analytics code"></i>
                                </label>
                                <input type="text" class="form-control" id="google_analytics" name="google_analytics" value="{{ $collection->google_analytics }}" placeholder="Enter google analytics" >
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="time_zone">Time Zone <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Select your region time zone. We define a time zone as a region where the same standard time is used"></i>
                                </label>
                                <select id="time_zone" name="time_zone" class="form-control select2">
                                    <option value="">Select Time Zone</option>
                                    <option>(GMT-11:00) Midway Island</option>
                                </select>
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="graduate_class">Graduate Class <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Select your region time zone. We define a time zone as a region where the same standard time is used"></i>
                                </label>
                                <select id="graduate_class" name="graduate_class" class="form-control select2">
                                    <option value="">Select Class</option>
                                    <option value="1">One</option>
                                </select>
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="photo">Logo <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="Set organization logo here"></i>
                                </label>
                                <div class="input-group image-preview">
                                    <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                            <span class="fa fa-remove"></span>
                                        </button>
                                        <div class="btn btn-success image-preview-input">
                                            <span class="fa fa-repeat"></span>
                                            <span class="image-preview-input-title">
                                            </span>
                                            <input type="file" accept="image/png, image/jpeg, image/gif" name="logo"/>
                                        </div>
                                    </span>
                                </div>
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="sname">Default Country
                                    &nbsp;<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="set your site title here" ></i>
                                </label>
                                <select name="country" id="country" class="form-control wizard-required" tabindex="-1" onchange="myChangeFunction(this,'country_op')">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $item)
                                    <option @if($collection->default_country == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </fieldset>

            {{-- <fieldset class="setting-fieldset">
                <legend class="setting-legend">Captcha</legend>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Captcha <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Check for disable captcha in login"></i>
                            </label>
                            <select id="academicYear" name="sectionID" class="form-control select2">
                                <option value="0">Enable</option>
                                <option value="0">Disable</option>
                            </select>
                            <span class="control-label"></span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group" id="recaptcha_site_key_id">
                        <div class="col-sm-12">
                            <label for="recaptcha_site_key">Recaptcha Site Key
                                &nbsp;<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Set recaptcha site key. Becareful If it's invalid then you cann't login."></i>
                            </label>
                            <input type="text" class="form-control" id="recaptcha_site_key" name="recaptcha_site_key" value="" >
                            <span class="control-label"></span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group" id="recaptcha_secret_key_id" >
                        <div class="col-sm-12">
                            <label for="recaptcha_secret_key">Recaptcha Secret Key <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Set recaptcha secret key. Becareful If it's invalid then you cann't login."></i>
                            </label>
                            <input type="text" class="form-control" id="recaptcha_secret_key" name="recaptcha_secret_key" value="" >
                            <span class="control-label"></span>
                        </div>
                    </div>
                </div>
            </fieldset> --}}

            {{-- <fieldset class="setting-fieldset">
                <legend class="setting-legend">Attendance Notification</legend>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Attendance Notification <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Select Attendance Notification"></i>
                            </label>
                            <select id="academicYear" name="sectionID" class="form-control select2">
                                <option value="0">None</option>
                                <option value="0">Email</option>
                                <option value="0">SMS</option>
                            </select>
                            <span class="control-label"></span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4" id="mainSmsDiv">
                    <div class="form-group" id="attendance_smsgateway_div">
                        <div class="col-sm-12">
                            <label>SMS Gateway <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Select Sms Gateway"></i>
                            </label>
                            <span class="control-label"></span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group" id="attendance_notification_template_div">
                        <div class="col-sm-12">
                            <label>Attendance Notification Template <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Select Attendance Notification Template"></i>
                            </label>
                            </span>
                        </div>
                    </div>
                </div>
            </fieldset> --}}

            <div class="form-group">
                <div class="col-sm-8">
                    <input type="submit" class="btn btn-success btn-md" value="Update Setting" >
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
@section('scripts')
<script type="text/javascript">
    $('#recaptcha_site_key_id').show();
    $('#recaptcha_secret_key_id').show();
</script>

<script type="text/javascript">
        $("#mainSmsDiv").show();
        $("#attendance_smsgateway_div").show();
        $("#attendance_notification_template_div").show();
        $("#mainSmsDiv").hide();
        $("#attendance_smsgateway_div").hide();
        $("#attendance_notification_template_div").show();
        $("#mainSmsDiv").hide();
        $("#attendance_smsgateway_div").hide();
        $("#attendance_notification_template_div").hide();
        $("#mainSmsDiv").show();
        $("#attendance_smsgateway_div").show();
        $("#attendance_notification_template_div").show();
        $("#mainSmsDiv").hide();
        $("#attendance_smsgateway_div").hide();
        $("#attendance_notification_template_div").show();
        $("#mainSmsDiv").hide('slow');
        $("#attendance_smsgateway_div").hide();
        $("#attendance_notification_template_div").hide();

    $(document).on('change', "#attendance_notification", function() {
        var value = $(this).val();
        if(value == 'sms') {
            $("#mainSmsDiv").show('slow');
            $("#attendance_smsgateway_div").show('slow');
            $("#attendance_notification_template_div").show('slow');
        } else if(value == 'email') {
            $("#mainSmsDiv").hide('slow');
            $("#attendance_smsgateway_div").hide('slow');
            $("#attendance_notification_template_div").show('slow');
        } else {
            $("#mainSmsDiv").hide('slow');
            $("#attendance_smsgateway_div").hide('slow');
            $("#attendance_notification_template_div").hide('slow');
        }

        if(value == 'sms' || value =='email') {
            $.ajax({
                type: 'POST',
                url: "",
                data: {"value" : value},
                dataType: "html",
                success: function(data) {
                   $('#attendance_notification_template').html(data);
                }
            });
        }
    });

    $(document).ready(function() {
        $('.backendThemeEvent').click(function() {
            var id = $(this).attr('id');
            if(id) {
                $.ajax({
                    type: 'POST',
                    url: "",
                    data: "id=" + id,
                    dataType: "html",
                    success: function(data) {
                        $('#headStyleCSSLink').attr('href', ""+data+"/style.css");
                        $('#headInilabsCSSLink').attr('href', ""+data+"/common.css");

                        $html = '<center class="backendThemeBodyMargin"><button type="button" class="btn btn-danger"><i  class="fa fa-check-circle"></i></button></center>';
                        $('.backendThemeBodyMargin').hide();
                        $('#themeBodyContent-'+data).html($html);
                        if(data) {
                            toastr["success"]("")
                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": false,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "500",
                                "hideDuration": "500",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                        }
                    }
                });
            }
        });
    });



    $('#captcha_status').change(function() {
        var captcha_status = $(this).val();
        if(captcha_status == 0) {
            $('#recaptcha_site_key_id').show(300);
            $('#recaptcha_secret_key_id').show(300);
        } else {
            $('#recaptcha_site_key_id').hide(300);
            $('#recaptcha_secret_key_id').hide(300);
        }
    });

            $('#recaptcha_site_key_id').show(300);
            $('#recaptcha_secret_key_id').show(300);
            $('#recaptcha_site_key_id').hide(300);
            $('#recaptcha_secret_key_id').hide(300);


        $('#automation').show();
        $('#autoinvoicediv').addClass('col-sm-6');
        $('#automation').hide();
        $('#autoinvoicediv').addClass('col-sm-12');

    $('#auto_invoice_generate').change(function() {
        var aig = $(this).val();

        if(aig == 1) {
            $('#s2id_automation').show(1000);
            $("#auto_invoice_generate").fadeIn("slow", function() {
                $('#autoinvoicediv').removeClass('col-sm-12');
                $('#autoinvoicediv').addClass('col-sm-6');
            });
        } else {
            $('#s2id_automation').hide(1000);
            $("#auto_invoice_generate").fadeIn("slow", function() {
                $('#autoinvoicediv').removeClass('col-sm-6');
                $('#autoinvoicediv').addClass('col-sm-12');
            });


        }
    });


    $(document).on('click', '#close-preview', function(){
        $('.image-preview').popover('hide');
        // Hover befor close the preview
        $('.image-preview').hover(
            function () {
               $('.image-preview').popover('show');
               $('.content').css('padding-bottom', '120px');
            },
             function () {
               $('.image-preview').popover('hide');
               $('.content').css('padding-bottom', '20px');
            }
        );
    });

    $(function() {
        // Create the close button
        var closebtn = $('<button/>', {
            type:"button",
            text: 'x',
            id: 'close-preview',
            style: 'font-size: initial;',
        });
        closebtn.attr("class","close pull-right");
        // Set the popover default content
        $('.image-preview').popover({
            trigger:'manual',
            html:true,
            title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
            content: "There's no image",
            placement:'bottom'
        });
        // Clear event
        $('.image-preview-clear').click(function(){
            $('.image-preview').attr("data-content","").popover('hide');
            $('.image-preview-filename').val("");
            $('.image-preview-clear').hide();
            $('.image-preview-input input:file').val("");
            $(".image-preview-input-title").text("");
        });
        // Create the preview image
        $(".image-preview-input input:file").change(function (){
            var img = $('<img/>', {
                id: 'dynamic',
                width:250,
                height:200,
                overflow:'hidden'
            });
            var file = this.files[0];
            var reader = new FileReader();
            // Set preview image into the popover data-content
            reader.onload = function (e) {
                $(".image-preview-input-title").text("");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
                img.attr('src', e.target.result);
                $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
                $('.content').css('padding-bottom', '120px');
            }
            reader.readAsDataURL(file);
        });
    });

    $( ".select2" ).select2( { placeholder: "", maximumSelectionSize: 6 } );

    $('#weekends').select2();

</script>
<script>
    $('#settings-menu').addClass('active');
    $('#general-settings-menu').addClass('active');
</script>
@endsection
