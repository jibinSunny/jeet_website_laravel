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
                <section class="wizard-section">
                    <div class="row no-gutters">
                            <div class="form-wizard">
                                <form action="" method="post" role="form" id="reg_form">
                                    <div class="form-wizard-header">
                                        <h4>Parent Registration</h4>
                                        <ul class="list-unstyled form-wizard-steps clearfix">
                                            <li class="active"><span>1</span></li>
                                            <li><span>2</span></li>
                                            <li><span>3</span></li>
                                            <li><span>4</span></li>
                                        </ul>
                                    </div>
                                    <fieldset class="wizard-fieldset show">
                                        <h5>Basic Information</h5>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-wizard-label">First Name</div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control wizard-required" id="fname" name="fname" onchange="myChangeFunction(this,'fname_op')" placeholder="Enter First Name">
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-wizard-label">Last Name</div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control wizard-required" id="lname" name="lname" onchange="myChangeFunction(this,'lname_op')" placeholder="Enter Last Name">
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-12">
                                                <div class="form-wizard-label">Email</div>
                                                <input type="email" class="form-control wizard-required" name="email" id="email" onchange="myChangeFunction(this,'email_op')" placeholder="Enter Email">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-wizard-label">Phone number</div>
                                                    <select onchange="myChangeFunction(this,'std_code_op')" class="form-control wizard-required" name="std_code" id="std_code">
                                                        <option value="">Select Code</option>
                                                        <option>+91</option>
                                                        <option>+971</option>
                                                        <option>+1</option>
                                                    </select>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8">
                                                <div class="form-group">
                                                    <div class="form-wizard-label visually-hidden">Primary Phone number</div>
                                                    <input type="text" class="form-control wizard-required" id="phone" name="phone" onchange="myChangeFunction(this,'phone_op')" placeholder="Enter Phone Number">
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-wizard-label">Secondary Phone number</div>
                                                    <select onchange="myChangeFunction(this,'std_code_op2')" class="form-control" name="std_code2">
                                                        <option value="">Select Code</option>
                                                        <option>+91</option>
                                                        <option>+971</option>
                                                        <option>+1</option>
                                                    </select>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8">
                                                <div class="form-group">
                                                    <div class="form-wizard-label visually-hidden">Secondary Phone number</div>
                                                    <input type="text" class="form-control" id="secondary_phone" onchange="myChangeFunction(this,'secondary_phone_op')" placeholder="Enter Secondary number" name="secondary_phone">
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-xs-12">
                                                <div class="form-wizard-label">Landline number</div>
                                                <input type="text" class="form-control" id="landline" onchange="myChangeFunction(this,'landline_op')" placeholder="Enter Landline Number" name="landline">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>

                                        <div class="form-group clearfix">
                                            <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                                        </div>
                                    </fieldset>



                                    <fieldset class="wizard-fieldset">
                                        <h5>Additional Information</h5>
                                        <div class="form-group row">
                                            <div class="col-xs-12">
                                                <div class="form-wizard-label">House name / Flat No*</div>
                                                <input type="text" class="form-control wizard-required" id="house" name="house" onchange="myChangeFunction(this,'house_op')" placeholder="Enter House name / Flat No">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-xs-12">
                                                <div class="form-wizard-label">Place / Street*</div>
                                                <input type="text" class="form-control  wizard-required" id="place" name="place" onchange="myChangeFunction(this,'place_op')" placeholder="Enter Place / Street">
                                                <div class="wizard-form-error"></div>
                                                <span class="wizard-password-eye"><i class="far fa-eye"></i></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-xs-12">
                                                <div class="form-wizard-label">Post / Zip code*</div>
                                                <input type="text" class="form-control wizard-required" id="post"  name="post"  onchange="myChangeFunction(this,'post_op')" placeholder="Enter Post / Zip code">
                                                <div class="wizard-form-error"></div>
                                                <span class="wizard-password-eye"><i class="far fa-eye"></i></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-xs-12">
                                                <div class="form-wizard-label">District*</div>
                                                <input type="text" class="form-control wizard-required" id="district" name="district" onchange="myChangeFunction(this,'district_op')" placeholder="Enter District">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-wizard-label">Country and State*</div>
                                                    <select name="country" id="country" class="form-control wizard-required" tabindex="-1" onchange="myChangeFunction(this,'country_op')">
                                                        <option value="">Select Country</option>
                                                        @foreach ($countries as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-wizard-label visually-hidden">Select State</div>
                                                    <select name="state" id="state" class="form-control wizard-required" tabindex="-1" onchange="myChangeFunction(this,'state_op')">
                                                        <option value="">Select State</option>
                                                    </select>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group clearfix">
                                            <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                            <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                                        </div>
                                    </fieldset>


                                    <fieldset class="wizard-fieldset">
                                        <h5>Identification Information</h5>

                                        <div class="form-group row">
                                            <div class="col-xs-12">
                                                <div class="form-wizard-label">Nationality*</div>
                                                <select name="nationality" id="nationality" class="form-control wizard-required" tabindex="-1" onchange="myChangeFunction(this,'nationality_op')">
                                                    <option value="">Select Nationality</option>
                                                    @foreach ($countries as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-wizard-label">ID Card Details*</div>
                                                    <select name="id_type" id="id_type" class="form-control wizard-required"  onchange="myChangeFunction(this,'id_type_op')">
                                                        <option value="">Select ID Card</option>
                                                        <option>Adhaar</option>
                                                        <option>Driving liecense</option>
                                                        <option>Voter ID</option>
                                                        <option>Pan Card</option>
                                                    </select>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-wizard-label visually-hidden">Secondary Phone number</div>
                                                    <input type="text" class="form-control wizard-required" id="id_number" name="id_number" onchange="myChangeFunction(this,'id_number_op')" placeholder="Enter ID Card Number">
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-wizard-label visually-hidden">Secondary Phone number</div>
                                                    <input type="file" class="form-control wizard-required" id="id_file" name="id_file">
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-wizard-label">Annual Income*</div>
                                        <div class="form-group">
                                            <input type="text" class="form-control wizard-required" id="annual_income" name="annual_income" onchange="myChangeFunction(this,'annual_income_op')" placeholder="Enter Annual Income">
                                            <div class="wizard-form-error"></div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                            <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                                        </div>
                                    </fieldset>


                                    <fieldset class="wizard-fieldset">
                                        <h5>Preview</h5>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-wizard-label">First Name</div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="fname_op" name="fname" onchange="myChangeFunction(this,'fname')" placeholder="Enter First Name" disabled>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-wizard-label">Last Name</div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="lname_op" name="lname" onchange="myChangeFunction(this,'lname')" placeholder="Enter Last Name" disabled>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-wizard-label">Email</div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email_op" name="email" onchange="myChangeFunction(this,'email')" placeholder="Enter Email" disabled>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                        <div class="form-wizard-label">Phone number</div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <select onchange="myChangeFunction(this,'std_code')" class="form-control " id="std_code_op" name="std_code" disabled>
                                                        <option value="">Select Code</option>
                                                        <option>+91</option>
                                                        <option>+971</option>
                                                        <option>+1</option>
                                                    </select>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="phone_op" name="phone" onchange="myChangeFunction(this,'phone')" placeholder="Enter Phone Number" disabled>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-wizard-label">Secondary Phone number</div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <select onchange="myChangeFunction(this,'std_code')" id="std_code_op2" name="std_code2" class="form-control" disabled>
                                                        <option value="">Select Code</option>
                                                        <option>+91</option>
                                                        <option>+971</option>
                                                        <option>+1</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="secondary_phone_op" name="secondary_phone" onchange="myChangeFunction(this,'secondary_phone')" placeholder="Enter Secondary number" disabled>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-wizard-label">Landline number</div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="landline_op" name="landline" onchange="myChangeFunction(this,'landline')" placeholder="Enter Landline Number" disabled>
                                            <div class="wizard-form-error"></div>
                                        </div>

                                       <div class="form-wizard-label">House name / Flat No*</div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="house_op" name="house" onchange="myChangeFunction(this,'house')" placeholder="Enter House name / Flat No" disabled>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                        <div class="form-wizard-label">Place / Street*</div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="place_op" name="place" onchange="myChangeFunction(this,'place')" placeholder="Enter Place / Street" disabled>
                                            <div class="wizard-form-error"></div>
                                            <span class="wizard-password-eye"><i class="far fa-eye"></i></span>
                                        </div>
                                        <div class="form-wizard-label">Post / Zip code*</div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="post_op" name="post" onchange="myChangeFunction(this,'post')" placeholder="Enter Post / Zip code" disabled>
                                            <div class="wizard-form-error"></div>
                                            <span class="wizard-password-eye"><i class="far fa-eye"></i></span>
                                        </div>
                                        <div class="form-wizard-label">District*</div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="district_op" name="district" onchange="myChangeFunction(this,'district')" placeholder="Enter District" disabled>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                        <div class="form-wizard-label">Country and State*</div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <select name="country" id="country_op" class="form-control" onchange="myChangeFunction(this,'country')" disabled>
                                                        <option value="">Select Country</option>
                                                        @foreach ($countries as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <select name="state" id="state_op" class="form-control" onchange="myChangeFunction(this,'state')" disabled>
                                                        <option value="">Select State</option>
                                                    </select>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-wizard-label">Nationality*</div>
                                        <div class="form-group">
                                            <select name="nationality" id="nationality_op" class="form-control wizard-required" tabindex="-1" onchange="myChangeFunction(this,'nationality_op')" disabled>
                                                <option value="">Select Nationality</option>
                                                @foreach ($countries as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                        <div class="form-wizard-label">ID Card Details*</div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <select name="id_type" id="id_type_op" class="form-control "  onchange="myChangeFunction(this,'id_type')" disabled>
                                                        <option value="">Select ID Card</option>
                                                        <option>Adhaar</option>
                                                        <option>Driving liecense</option>
                                                        <option>Voter ID</option>
                                                        <option>Pan Card</option>
                                                    </select>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control " id="id_number_op" name="id_number" onchange="myChangeFunction(this,'id_number')" placeholder="Enter ID Card Number" disabled>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-4 col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <input type="file" class="form-control"  name="id_file_op" id="id_file_op" disabled>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="form-wizard-label">Annual Income*</div>
                                        <div class="form-group">
                                            <input type="text" class="form-control wizard-required" id="annual_income_op" name="annual_income" onchange="myChangeFunction(this,'annual_income')" placeholder="Enter Annual Income" disabled>
                                            <div class="wizard-form-error"></div>
                                        </div>

                                        <div class="form-group clearfix">
                                            <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                            <a href="javascript:;" class="form-wizard-submit float-right">Submit</a>
                                        </div>

                                    </fieldset>
                                </form>
                            </div>
                    </div>
                </section>

            </div> <!-- col-sm-10 -->
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
        $("#country, #country_op").change(function() {
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
                        var html = '<option value="">Select State</option>';
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
<script>
    jQuery(document).ready(function() {
	// click on next button
	jQuery('.form-wizard-next-btn').click(function() {
		var parentFieldset = jQuery(this).parents('.wizard-fieldset');
		var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
		var next = jQuery(this);
		var nextWizardStep = true;
		parentFieldset.find('.wizard-required').each(function(){
			var thisValue = jQuery(this).val();

			if( thisValue == "") {
				jQuery(this).siblings(".wizard-form-error").slideDown();
				nextWizardStep = false;
			}
			else {
				jQuery(this).siblings(".wizard-form-error").slideUp();
			}
		});
		if( nextWizardStep) {
			next.parents('.wizard-fieldset').removeClass("show","400");
			currentActiveStep.removeClass('active').addClass('activated').next().addClass('active',"400");
			next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show","400");
			jQuery(document).find('.wizard-fieldset').each(function(){
				if(jQuery(this).hasClass('show')){
					var formAtrr = jQuery(this).attr('data-tab-content');
					jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
						if(jQuery(this).attr('data-attr') == formAtrr){
							jQuery(this).addClass('active');
							var innerWidth = jQuery(this).innerWidth();
							var position = jQuery(this).position();
							jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
						}else{
							jQuery(this).removeClass('active');
						}
					});
				}
			});
		}
	});
	//click on previous button
	jQuery('.form-wizard-previous-btn').click(function() {
		var counter = parseInt(jQuery(".wizard-counter").text());;
		var prev =jQuery(this);
		var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
		prev.parents('.wizard-fieldset').removeClass("show","400");
		prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show","400");
		currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',"400");
		jQuery(document).find('.wizard-fieldset').each(function(){
			if(jQuery(this).hasClass('show')){
				var formAtrr = jQuery(this).attr('data-tab-content');
				jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
					if(jQuery(this).attr('data-attr') == formAtrr){
						jQuery(this).addClass('active');
						var innerWidth = jQuery(this).innerWidth();
						var position = jQuery(this).position();
						jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
					}else{
						jQuery(this).removeClass('active');
					}
				});
			}
		});
	});
	//click on form submit button
	jQuery(document).on("click",".form-wizard .form-wizard-submit" , function(){
		var parentFieldset = jQuery(this).parents('.wizard-fieldset');
		var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
		parentFieldset.find('.wizard-required').each(function() {
			var thisValue = jQuery(this).val();
			if( thisValue == "" ) {
				jQuery(this).siblings(".wizard-form-error").slideDown();
			}
			else {
                $('.form-wizard-submit').prop('disabled', true);
				jQuery(this).siblings(".wizard-form-error").slideUp();
                var form_data = new FormData(document.getElementById('reg_form'));
                $.ajax({
                    type: "POST",
                    url: "{{route('saveParent')}}",
                    data: form_data,
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false,
                    async: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status == 1) {
                            toastr.success('success', 'Successful');
                            window.location.href = "../parent";
                        } else {
                            toastr.error('errors', response.errors);
                            $('.form-wizard-submit').prop('disabled', false);
                        }
                    }
                });
			}
		});
	});
	// focus on input field check empty or not
	jQuery(".form-control").on('focus', function(){
		var tmpThis = jQuery(this).val();
		if(tmpThis == '' ) {
			jQuery(this).parent().addClass("focus-input");
		}
		else if(tmpThis !='' ){
			jQuery(this).parent().addClass("focus-input");
		}
	}).on('blur', function(){
		var tmpThis = jQuery(this).val();
		if(tmpThis == '' ) {
			jQuery(this).parent().removeClass("focus-input");
			jQuery(this).siblings('.wizard-form-error').slideDown("3000");
		}
		else if(tmpThis !='' ){
			jQuery(this).parent().addClass("focus-input");
			jQuery(this).siblings('.wizard-form-error').slideUp("3000");
		}
	});
});

</script>

@endsection
