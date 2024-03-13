@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-parents"></i> Parent</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-laptop"></i>Dashboard</a></li>
            <li class="active">Parent</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">

                <form class="form-horizontal" action="{{ route('saveParent') }}" role="form" method="post" enctype="multipart/form-data" id="step1_form">
                    <input type='hidden' name="issubmit" value="1">
                    @csrf
                    <div id="smartwizard">
                        <ul class="nav">
                            <li>
                                <a class="nav-link" href="#step-1">
                                    <h6>Step 1</h6>
                                    Basic Info
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="#step-2">
                                    <h6>Step 2</h6>
                                    Additional Info
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="#step-3">
                                    <h6>Step 3</h6>
                                    Identification Info
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="#step-4">
                                    <h6>Preview</h6>
                                    Summary
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="step-1" class="tab-pane" role="tabpanel">
                                <div class="form-group"> <label for="name_id" class="col-sm-2 control-label">
                                        Name <span class="text-red">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="name" name="name" value="" onchange="myChangeFunction(this,'name_op')" required>
                                    </div>
                                    <span id="msg_name"></span>
                                    <span class="col-sm-4 control-label"> </span>
                                </div>

                                <div class="form-group"> <label for="phone" class="col-sm-2 control-label">
                                        Phone </label>
                                    <div class="col-auto float-left pr-0">
                                        <select name="bloodgroup" onchange="myChangeFunction(this,'std_code_op')" class="form-control select2" tabindex="-1">
                                            <option>+91</option>
                                            <option>+971</option>
                                            <option>+1</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" onchange="myChangeFunction(this,'phone_op')" id="phone" name="phone" value="">
                                    </div>
                                    <span class="col-sm-4 control-label">
                                    </span>
                                </div>

                                <div class="form-group"> <label for="phone" class="col-sm-2 control-label">
                                        Secondary Phone </label>
                                    <div class="col-auto float-left pr-0">
                                        <select name="secondary_std_code" onchange="myChangeFunction(this,'std_code_op2')" class="form-control select2" tabindex="-1">
                                            <option>+91</option>
                                            <option>+971</option>
                                            <option>+1</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="secodary_phone" name="secodary_phone" onchange="myChangeFunction(this,'secodary_phone_op')">
                                    </div>
                                    <span class="col-sm-4 control-label"></span>
                                </div>

                                <div class="form-group"> <label for="phone" class="col-sm-2 control-label">
                                        Landline </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" onchange="myChangeFunction(this,'landline_op')">
                                    </div>
                                    <span class="col-sm-4 control-label"></span>
                                </div>

                                <div class="form-group"> <label for="phone" class="col-sm-2 control-label">
                                        Email </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="email" class="form-control" onchange="myChangeFunction(this,'email_op')">
                                    </div>
                                    <span class="col-sm-4 control-label"></span>
                                </div>
                            </div>
                            <div id="step-2" class="tab-pane" role="tabpanel">
                                <div class="form-group"> <label for="s2id_autogen3" class="col-sm-2 control-label">
                                        Country </label>
                                    <div class="col-sm-6">
                                        <select name="country" id="country" class="form-control select2 select2-offscreen" tabindex="-1" onchange="myChangeFunction(this,'country_op')">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="col-sm-4 control-label">
                                    </span>
                                </div>
                                <div class="form-group"> <label for="state" class="col-sm-2 control-label">
                                        State </label>
                                    <div class="col-sm-6">
                                        <select name="state" id="state" class="form-control select2" tabindex="-1" onchange="myChangeFunction(this,'state_op')">
                                            <option value="">Select State</option>
                                        </select>
                                    </div>
                                    <span class="col-sm-4 control-label">
                                    </span>
                                </div>
                                <div class="form-group"> <label for="state" class="col-sm-2 control-label">
                                        District </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="district" name="district" onchange="myChangeFunction(this,'district_op')">
                                    </div>
                                    <span class="col-sm-4 control-label">
                                    </span>
                                </div>
                                <div class="form-group"> <label for="sex" class="col-sm-2 control-label">
                                        House name / Flat No </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="house_name" onchange="myChangeFunction(this,'house_op')">
                                    </div>
                                    <span class="col-sm-4 control-label">
                                    </span>
                                </div>

                                <div class="form-group"> <label for="religion" class="col-sm-2 control-label">
                                        Place / Street </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="place" onchange="myChangeFunction(this,'place_op')">
                                    </div>
                                    <span class="col-sm-4 control-label">
                                    </span>
                                </div>

                                <div class="form-group"> <label for="address" class="col-sm-2 control-label">
                                        Post box / Zip code </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="post" name="zip" onchange="myChangeFunction(this,'post_op')">
                                    </div>
                                    <span class="col-sm-4 control-label">
                                    </span>
                                </div>

                                <div class="form-group"> <label for="state" class="col-sm-2 control-label">
                                        Nationality </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nationality" name="nationality" onchange="myChangeFunction(this,'nationality_op')">
                                    </div>
                                    <span class="col-sm-4 control-label">
                                    </span>
                                </div>
                            </div>



                            <div id="step-3" class="tab-pane" role="tabpanel">
                                <div class="form-group"> <label for="state" class="col-sm-2 control-label">
                                        Select Identification </label>
                                    <div class="col-sm-6">
                                        <select name="id_type" id="id_type" class="form-control select2" tabindex="-1" onchange="myChangeFunction(this,'id_type_op')">
                                            <option value="">Select ID</option>
                                            <option>Adhaar</option>
                                            <option>Driving liecense</option>
                                            <option>Voter ID</option>
                                            <option>Pan Card</option>
                                        </select>
                                    </div>
                                    <span class="col-sm-4 control-label">
                                    </span>
                                </div>

                                <div class="form-group"> <label for="state" class="col-sm-2 control-label">
                                        ID number </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="id_number" name="id_number" onchange="myChangeFunction(this,'id_number_op')">
                                    </div>
                                    <span class="col-sm-4 control-label">
                                    </span>
                                </div>

                                <div class="form-group"> <label for="photo" class="col-sm-2 control-label">
                                        Upload ID </label>
                                    <div class="col-sm-6">
                                        <div class="input-group image-preview" data-original-title="" title="">
                                            <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                    <span class="fa fa-remove"></span>
                                                    Clear </button>
                                                <div class="btn btn-success image-preview-input">
                                                    <span class="fa fa-repeat"></span>
                                                    <span class="image-preview-input-title">
                                                        File Browse</span>
                                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="id_file" onchange="myChangeFunction(this,'id_file_op')">
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"> </div>
                                <div class="form-group clear">
                                    <label for="state" class="col-sm-2 control-label">Annual Income </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="annual_income" name="annual_income" onchange="myChangeFunction(this,'annual_income_op')">
                                    </div>
                                </div>

                            </div>

                            <div id="step-4" class="tab-pane" role="tabpanel">
                                <div class="form-group"> <label for="name_id" class="col-sm-2 control-label">
                                        Name <span class="text-red">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="name_op" name="name" disabled>
                                    </div>
                                    <span class="col-sm-4 control-label">
                                    </span>
                                </div>

                                <div class="form-group"> <label for="phone" class="col-sm-2 control-label">
                                        Phone </label>
                                    <div class="col-auto float-left pr-0">
                                        <select name="std_code" id="std_code_op" class="form-control" tabindex="-1" disabled>
                                            <option>+91</option>
                                            <option>+971</option>
                                            <option>+1</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="phone_op" name="phone" disabled>
                                    </div>
                                    <span class="col-sm-4 control-label">
                                    </span>
                                </div>

                                <div class="form-group"> <label for="phone" class="col-sm-2 control-label">
                                        Secondary Phone </label>
                                    <div class="col-auto float-left pr-0">
                                        <select name="secondary_std_code" id="std_code_op2" class="form-control select2" tabindex="-1" disabled>
                                            <option>+91</option>
                                            <option>+971</option>
                                            <option>+1</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="secodary_phone_op" name="secodary_phone" disabled>
                                    </div>
                                    <span class="col-sm-4 control-label"></span>
                                </div>

                                <div class="form-group"> <label for="phone" class="col-sm-2 control-label">
                                        Landline </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="landline_op" name="landline" disabled>
                                    </div>
                                    <span class="col-sm-4 control-label"></span>
                                </div>

                                <div class="form-group"> <label for="phone" class="col-sm-2 control-label">
                                        Email </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="email_op" name="email" disabled>
                                    </div>
                                    <span class="col-sm-4 control-label"></span>
                                </div>
                                <div class="form-group"> <label for="s2id_autogen3" class="col-sm-2 control-label">
                                        Country </label>
                                    <div class="col-sm-6">
                                        <select name="country" id="country_op" class="form-control" tabindex="-1" disabled>
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="col-sm-4 control-label">
                                    </span>
                                </div>
                                <div class="form-group"> <label for="state" class="col-sm-2 control-label">
                                        State </label>
                                    <div class="col-sm-6">
                                        <select name="state" id="state_op" class="form-control " tabindex="-1" disabled>
                                            <option value="">Select State</option>
                                        </select>
                                    </div>
                                    <span class="col-sm-4 control-label">
                                    </span>
                                </div>
                                <div class="form-group"> <label for="state" class="col-sm-2 control-label">
                                        District </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="district" id="district_op" disabled>
                                    </div>
                                    <span class="col-sm-4 control-label">
                                    </span>
                                </div>
                                <div class="form-group"> <label for="sex" class="col-sm-2 control-label">
                                        House name / Flat No </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="house_op" name="house_name" disabled>
                                    </div>
                                    <span class="col-sm-4 control-label">
                                    </span>
                                </div>

                                <div class="form-group"> <label for="religion" class="col-sm-2 control-label">
                                        Place / Street </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="place_op" name="place" disabled>
                                    </div>
                                    <span class="col-sm-4 control-label">
                                    </span>
                                </div>

                                <div class="form-group"> <label for="address" class="col-sm-2 control-label">
                                        Post box / Zip code </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="post_op" name="zip" disabled>
                                    </div>
                                    <span class="col-sm-4 control-label">
                                    </span>
                                </div>
                                <div class="form-group"> <label for="state" class="col-sm-2 control-label">
                                        Nationality </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nationality_op" name="nationality" disabled>
                                    </div>
                                    <span class="col-sm-4 control-label">
                                    </span>
                                </div>
                                <div class="form-group"> <label for="state" class="col-sm-2 control-label">
                                        Select Identification </label>
                                    <div class="col-sm-6">
                                        <select name="id_type" id="id_type_op" class="form-control" tabindex="-1" disabled>
                                            <option value="">Select ID</option>
                                            <option>Adhaar</option>
                                            <option>Driving liecense</option>
                                            <option>Voter ID</option>
                                            <option>Pan Card</option>
                                        </select>
                                    </div>
                                    <span class="col-sm-4 control-label">
                                    </span>
                                </div>
                                <div class="form-group"> <label for="state" class="col-sm-2 control-label">
                                        ID number </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="id_number_op" name="id_number" disabled>
                                    </div>
                                    <span class="col-sm-4 control-label">
                                    </span>
                                </div>
                                <div class="form-group"> <label for="photo" class="col-sm-2 control-label">
                                        Upload ID </label>
                                    <div class="col-sm-6">
                                        <div class="input-group image-preview" data-original-title="" title="">
                                            <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                    <span class="fa fa-remove"></span>
                                                    Clear </button>
                                                <div class="btn btn-success image-preview-input">
                                                    <span class="fa fa-repeat"></span>
                                                    <span class="image-preview-input-title">
                                                        File Browse</span>
                                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="id_file_op" id="id_file_op">
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"> </div>
                                <div class="form-group clear">
                                    <label for="state" class="col-sm-2 control-label">Annual Income </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="annual_income_op" name="annual_income" disabled>
                                    </div>
                                </div>
                                <div class="form-group clear">
                                    <label for="state" class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-8">
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div> <!-- col-sm-8 -->

        </div><!-- row -->
    </div>
</div><!-- /.box -->
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('backend/smartwizard/jquery.smartWizard.js')}}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
    $(function() {
        // Create the close button
        var closebtn = $('<button/>', {
            type: "button",
            text: 'x',
            id: 'close-preview',
            style: 'font-size: initial;',
        });
        closebtn.attr("class", "close pull-right");
        // Set the popover default content
        $('.image-preview').popover({
            trigger: 'manual',
            html: true,
            title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
            content: "There's no image",
            placement: 'top'
        });
        // Clear event
        $('.image-preview-clear').click(function() {
            $('.image-preview').attr("data-content", "").popover('hide');
            $('.image-preview-filename').val("");
            $('.image-preview-clear').hide();
            $('.image-preview-input input:file').val("");
            $(".image-preview-input-title").text("");
        });
        // Create the preview image
        $(".image-preview-input input:file").change(function() {
            var img = $('<img/>', {
                id: 'dynamic',
                class: "object-cover",
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
        $('#visa_issued').datepicker();
        $('#visa_expiry').datepicker();
        $('#doj').datepicker();

        $('#smartwizard').smartWizard({
            selected: 0, // Initial selected step, 0 = first step
            theme: 'arrows', // theme for the wizard, related css need to include for other than default theme
            justified: true, // Nav menu justification. true/false
            darkMode: false, // Enable/disable Dark Mode if the theme supports. true/false
            autoAdjustHeight: true, // Automatically adjust content height
            // cycleSteps: false, // Allows to cycle the navigation of steps
            backButtonSupport: true, // Enable the back button support
            enableURLhash: true, // Enable selection of the step based on url hash
            transition: {
                animation: 'slide-swing', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
                speed: '400', // Transion animation speed
                easing: '' // Transition animation easing. Not supported without a jQuery easing plugin
            },
            toolbarSettings: {
                toolbarPosition: 'bottom', // none, top, bottom, both
                toolbarButtonPosition: 'center', // left, right, center
                showNextButton: true, // show/hide a Next button
                showPreviousButton: true, // show/hide a Previous button
                toolbarExtraButtons: [] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
            },
        });

        $('#step1_form').validate({
            rules: {
                name: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: 'Please Enter Your Name'
                }
            }
        });

        $('#smartwizard').on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
            var elmForm = $("#form-step-" + stepNumber);
            if (stepDirection === 'forward' && elmForm) {
                // elmForm.validator('validate');
                // var elmErr = elmForm.children('.has-error');
                // if (elmErr && elmErr.length > 0) {
                //     return false;
                // }
                if ($('#step1_form').valid()) {
                    return true
                } else {
                    return false
                }
            }
            return true;
        })

    });
</script>

<script type="text/javascript">
    $("select.select2").select2();
</script>
<script type="text/javascript">
    function myChangeFunction(input1, output_id) {
        var input2 = document.getElementById(output_id);
        input2.value = input1.value;
    }

    $(document).ready(function() {
        $("#country").change(function() {
            var country = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{route('selectState')}}",
                data: {
                    'country': country
                },
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status == 1) {
                        var html = '';
                        $.each(data.states, function(k, v) {
                            html = html + "<option value=" + v.id + ">" + v.name + "</option>";
                        });

                        $('#state').html(html);
                        $('#state_op').html(html);
                    } else {

                    }
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        // Smart Wizard
        $('#smartwizard').smartWizard({
            onLeaveStep: leaveAStepCallback,
            onFinish: onFinishCallback
        });

        function leaveAStepCallback(obj) {
            var step_num = obj.attr('rel'); // get the current step number
            alert(step_num);
            return validateSteps(step_num); // return false to stay on step and true to continue navigation
        }

        function onFinishCallback() {
            if (validateAllSteps()) {
                $('form').submit();
            }
        }

        // Your Step validation logic
        function validateSteps(stepnumber) {
            var isStepValid = true;
            // validate step 1
            if (stepnumber == 1) {
                // Your step validation logic
                // set isStepValid = false if has errors
            }
            // ...
        }

        function validateAllSteps() {
            var isStepValid = true;
            // all step validation logic
            return isStepValid;
        }

    });
</script>
{{-- <script>
$("#smartwizard").on("showStep", function(e, anchorObject, stepIndex, stepDirection) {
    return validateSteps(stepIndex);
});
function validateSteps(stepnumber){
    var isStepValid = true;
    // validate step 1
    if(stepnumber == 1){
        var un = $('#name').val();
        if (!un && un.length <= 0) {
            isValid = false;
            $('#msg_name').html('Please fill name').show();
        } else {
            $('#msg_name').html('').hide();
        }
        $('#smartwizard').smartWizard('setError',{stepnum:stepnumber,iserror:true});
        $('#smartwizard').smartWizard('showMessage','Hello! World');
        $('#smartwizard').smartWizard('setError', {
            stepnum: 1,
            iserror: true
        });
        isStepValid = false;
        console.log(isStepValid);
    }
}

</script> --}}
@endsection
