@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> Edit Parent</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-laptop"></i> Dashboard</a></li>
            <li class="active">Edit Parent</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-wizard">
                    <form role="form" method="post" action="javascript:;" id="reg_form">
                        <fieldset class="wizard-fieldset show">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">First Name</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname" name="fname" placeholder="Enter First Name" value="{{ $teacher->first_name }}"  >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Last Name</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="lname" name="lname" placeholder="Enter Last Name" value="{{ $teacher->last_name }}"  >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-wizard-label">Email</div>
                            <div class="form-group">
                                <input type="email" class="form-control wizard-required" id="email" name="email" placeholder="Enter Email" value="{{ $teacher->email }}" >
                                <div class="wizard-form-error"></div>
                            </div>
                            <div class="form-wizard-label">Phone number </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                @php $phone = explode("-",$teacher->phone) @endphp
                                    <div class="form-group">
                                        <select class="form-control" id="std_code" name="std_code"  >
                                            <option value="">Select Code</option>
                                            @foreach ($countries as $item)
                                                <option @if($phone[0] == '+'.$item->phonecode) selected @endif>
                                                    +{{ $item->phonecode }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" value="{{ $phone[1] }}" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                           <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    @php $phone2 = explode("-",$teacher->phone2) @endphp
                                    <div class="form-group">
                                        <div class="form-wizard-label">Secondary Phone number</div>
                                        <select class="form-control" name="std_code2" id="std_code2">
                                            <option value="">Select Code</option>
                                            @foreach ($countries as $item)
                                            <option @if($phone2[0] == '+'.$item->phonecode) selected @endif>+{{ $item->phonecode }} </option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="form-group">
                                        <div class="form-wizard-label visually-hidden">Secondary Phone number</div>
                                        <input type="text" class="form-control" id="phone2" name="phone2" placeholder="Enter Secondary Phone Number" value="{{ $phone2[1] }}">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                            <div class="col-xs-12">
                                                <div class="form-wizard-label">Landline number</div>
                                                <input type="text" class="form-control" id="landline" onchange="myChangeFunction(this,'landline_op')" value="{{ $teacher->landline }}" placeholder="Enter Landline Number" name="landline">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-xs-12">
                                                <div class="form-wizard-label">House name / Flat No*</div>
                                                <input type="text" class="form-control wizard-required" id="house" name="house"value="{{ $teacher->house_name }}" onchange="myChangeFunction(this,'house_op')" placeholder="Enter House name / Flat No">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-xs-12">
                                                <div class="form-wizard-label">Place / Street*</div>
                                                <input type="text" class="form-control  wizard-required" id="place" name="place" value="{{ $teacher->place }}" onchange="myChangeFunction(this,'place_op')" placeholder="Enter Place / Street">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-xs-12">
                                                <div class="form-wizard-label">Post / Zip code*</div>
                                                <input type="text" class="form-control wizard-required" id="post"  name="post" value="{{ $teacher->zip }}"  onchange="myChangeFunction(this,'post_op')" placeholder="Enter Post / Zip code">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-xs-12">
                                                <div class="form-wizard-label">District*</div>
                                                <input type="text" class="form-control wizard-required" id="district"value="{{ $teacher->district }}"  name="district" onchange="myChangeFunction(this,'district_op')" placeholder="Enter District">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Country</div>
                                        <select name="country" id="country" class="form-control">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $item)
                                            <option @if($item->id == $teacher->country) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">State*</div>
                                        <select name="state" id="state" class="form-control" >
                                            <option value="">Select State</option>
                                            @foreach ($states as $item)
                                            <option @if($item->id == $teacher->state) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-wizard-label">Nationality*</div>
                                    <div class="form-group">
                                        <select name="nationality" id="nationality" class="form-control" onchange="prevFunc(this,'nationality  ')"  >
                                            <option value="">Select Nationality</option>
                                            @foreach ($countries as $item)
                                            <option value="{{ $item->id }}" @if($item->id == $teacher->nationality) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" value="{{ $default_country }}" id="default_country" name="default_country">
                                        <input type="hidden" value="{{ $teacher->nationality }}" id="current_country" name="current_country">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <select name="id_type" id="id_type" class="form-control">
                                            <option value="">Select ID Card</option>
                                            <option @if($teacher->id_type == 'Aadhar') selected @endif>Aadhar</option>
                                            <option @if($teacher->id_type == 'Driving liecense') selected @endif>Driving liecense</option>
                                            <option @if($teacher->id_type == 'Voter ID') selected @endif>Voter ID</option>
                                            <option @if($teacher->id_type == 'Pan Card') selected @endif>Pan Card</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="id_number" name="id_number" placeholder="Enter ID Card Number" value="{{ $teacher->id_number }}"  >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="file" class="form-control" id="id_file" name="id_file" onchange="prevFunc(this,'id_file  ')">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-wizard-label">Annual Income*</div>
                                        <div class="form-group">
                                            <input type="text" class="form-control wizard-required"value="{{ $teacher->annual_income }}" id="annual_income" name="annual_income" onchange="myChangeFunction(this,'annual_income_op')" placeholder="Enter Annual Income">
                                            <div class="wizard-form-error"></div>
                                        </div>

                            <div class="form-group clearfix">
                                <input type="hidden" name="code" value="{{ $teacher->code }}">
                                <a href="javascript:;" class="form-wizard-submit float-right">Submit</a>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

        @endsection
        @section('scripts')
        <script>

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
                    trigger: 'manual',
                    html: true,
                    title:"<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
                    content:"There's no image",
                    placement: 'top'
                });
                // Clear event
                $('.image-preview-clear').click(function() {
                    $('.image-preview').attr("data-content","").popover('hide');
                    $('.image-preview-filename').val("");
                    $('.image-preview-clear').hide();
                    $('.image-preview-input input:file').val("");
                    $(".image-preview-input-title").text("");
                });
                // Create the preview image
                $(".image-preview-input input:file").change(function() {
                    var img = $('<img/>', {
                        id: 'dynamic',
                        class:"object-cover",
                        width: 250,
                        height: 200,
                        overflow: 'hidden'
                    });
                    var file = this.files[0];
                    var reader = new FileReader();
                    // Set preview image into the popover data-content
                    reader.onload = function(e) {
                        $(".image-preview-input-title").text("");
                        $(".image-preview-clear").show();
                        $(".image-preview-filename").val(file.name);
                        img.attr('src', e.target.result);
                        $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
                        $('.content').css('padding-bottom', '100px');
                    }
                    reader.readAsDataURL(file);
                });
            });


            $(document).ready(function() {
                var cur_country = $('#current_country').val();
                var def_country = $('#default_country').val();
                if(cur_country == def_country){
                    $('.nation_div').hide();
                }
                $('#visa_issued').datepicker();
                $('#visa_expiry').datepicker();
                $('#doj').datepicker();
                $('#dob').datepicker();
                $('#dob  ').datepicker();
            });
        </script>
        <script type="text/javascript">
            function prevFunc(input1, output_id) {
                var input2 = document.getElementById(output_id);
                input2.value = input1.value;
            }
            $("#country, #country").change(function() {
                var country = $(this).val();
                $.ajax({
                    type:"POST",
                    url:"{{route('selectState')}}",
                    data: {
                        'country': country
                    },
                    dataType:"json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            var html = '<option value="">Select State</option>';
                            $.each(data.states, function(k, v) {
                                html = html +"<option value=" + v.id +">" + v.name +"</option>";
                            });
                            $('#state').html(html);
                            $('#state  ').html(html);
                        } else {

                        }
                    }
                });
            });
            $("#nationality").change(function() {
                var country = $(this).val();
                var def_country = $('#default_country').val();
                if (country == def_country) {
                    $('.nation_div').hide();
                } else {
                    $('.nation_div').show();
                }
            });
            $("#classes").change(function() {
                var classes = $(this).val();
                $.ajax({
                    type:"POST",
                    url:"{{route('selectSubjects')}}",
                    data: {
                        'classes': classes
                    },
                    dataType:"json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            var html = '<option value="">Select Subjects</option>';
                            $.each(data.subjects, function(k, v) {
                                html = html +"<option value=" + v.id +">" + v.name +"</option>";
                            });
                            $('#subject').html(html);
                            $('#subject  ').html(html);
                        } else {

                        }
                    }
                });
            });
        </script>
        <script>
            jQuery(document).ready(function() {
                //click on form submit button
                jQuery(document).on("click",".form-wizard .form-wizard-submit", function() {
                    var parentFieldset = jQuery(this).parents('.wizard-fieldset');
                    var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
                    parentFieldset.find('.wizard-required').each(function() {
                        var thisValue = jQuery(this).val();
                        if (thisValue =="") {
                            jQuery(this).siblings(".wizard-form-error").slideDown();
                        } else {
                            jQuery(this).siblings(".wizard-form-error").slideUp();
                        }
                    });

                    // $('.form-wizard-submit').prop('disabled', false);
                    var form_data = new FormData(document.getElementById('reg_form'));
                    $.ajax({
                        type:"POST",
                        url:"{{route('saveParent')}}",
                        data: form_data,
                        dataType:"json",
                        contentType: false,
                        cache: false,
                        processData: false,
                        async: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // alert(response.status);
                            if (response.status == 1) {
                                toastr.success('success', 'Successful');
                                // $('.form-wizard-submit').prop('disabled', false);
                                window.location.href ="{{ url('admin/parent/') }}";
                            } else {
                                for (var i=0; i<response.errors.length; i++) {
                                    toastr.error('errors', response.errors[i]);
                                }
                            }
                        }
                    });
                });
                // focus on input field check empty or not
                jQuery(".form-control").on('focus', function() {
                    var tmpThis = jQuery(this).val();
                    if (tmpThis == '') {
                        jQuery(this).parent().addClass("focus-input");
                    } else if (tmpThis != '') {
                        jQuery(this).parent().addClass("focus-input");
                    }
                }).on('blur', function() {
                    var tmpThis = jQuery(this).val();
                    if (tmpThis == '') {
                        jQuery(this).parent().removeClass("focus-input");
                        jQuery(this).siblings('.wizard-form-error').slideDown("3000");
                    } else if (tmpThis != '') {
                        jQuery(this).parent().addClass("focus-input");
                        jQuery(this).siblings('.wizard-form-error').slideUp("3000");
                    }
                });
            });
        </script>
        <script type="text/javascript">
            $("select.select2").select2();
        </script>
        <script>
            $('#addTeacher').disableAutoFill();
        </script>
        <script>
            $('#parent-menu').addClass('active');
        </script>
        @endsection
