@extends('layouts.admin')
@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i>Edit User</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-laptop"></i> Dashboard</a></li>
            <li class="active">Edit User</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-wizard">
                <form class="form"id="mainForm" method="post" action="{{ route('saveUser') }}" enctype="multipart/form-data">
                  @csrf
                        <fieldset class="wizard">
                            <h5>Edit User</h5>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">First Name</div>
                                    <div class="form-group">
                                    <input type="hidden" class="form-control" id="academicyear_id" name="academicyear_id" value="{{$user_list->id}}" placeholder="Enter Name">
                                        <input type="text" class="form-control wizard-required" id="fname" name="fname"value="{{$user_list->first_name}}" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Last Name</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="lname" name="lname" value="{{$user_list->last_name}}">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="form-group pd-5">
                                    <label class="form-control-label">Privilege: <span class="tx-danger">*</span></label>
                                    <select name="privilege[]" id="privilege" class="form-control select2 " multiple>
                                     @php $routeid = json_decode($user_list->privilege);
                                     print_r($routeid);
                                      @endphp
                                     @foreach ($privilege as $privilege1)
                                    <option value="{{ $privilege1->id }}"@if(!empty($routeid )) @if(in_array($privilege1->id ,$routeid)) selected @endif @endif>{{ $privilege1->name}}</option>
                                     @endforeach
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="form-wizard-label">Email</div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" value="{{$user_list->email}}" >
                                <div class="wizard-form-error"></div>
                            </div>
                            <?php
                           $array = explode("-",$user_list->phone);
                           $array1 = explode("-",$user_list->phone2);
                            ?>
                            <div class="form-wizard-label">Phone number</div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <select class="form-control " id="std_code" name="std_code" >
                                            <option value="">Select Code</option>
                                            @foreach($countries as $countriess)
                                            <option value="{{$countriess->phonecode}}" {{$array[0] ==$countriess->phonecode ? 'selected' :''}}>{{$countriess->phonecode}} </option>
                                           @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="phone" name="phone"  value="{{$array[1]}}" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                           <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <div class="form-wizard-label ">Secondary Phone number</div>
                                        <select class="form-control" name="std_code2" id="std_code2" onchange="prevFunc(this,'std_code2_op')" >
                                            <option value="">Select Code</option>
                                            @foreach($countries as $countriess)
                                            <option value="{{$countriess->phonecode}}" {{$array1[0] ==$countriess->phonecode ? 'selected' :''}}>{{$countriess->phonecode}} </option>
                                           @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="form-group">
                                        <div class="form-wizard-label visually-hidden">Secondary Phone number</div>
                                        <input type="text" class="form-control" id="phone2" name="phone2"  value=" {{$array1[1]}}" onchange="prevFunc(this,'phone2_op')" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <div class="form-wizard-label">DOB</div>
                                        <input type="text" class="form-control" name="dob" id="dob" value="{{$user_list->dob}}" onchange="prevFunc(this,'dob_op')" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Gender</div>
                                        <select class="form-control" name="gender" id="gender" onchange="prevFunc(this,'gender_op')" >
                                            <option value="">Select Gender</option>
                                            @if($user_list->gender =="female")
                                            <option value="female">Female</option>
                                            <option value="male"selected>Male</option>
                                            <option value="N/A">Not Specified</option>
                                            @elseif($user_list->gender =="male")
                                            <option value="female">Female</option>
                                            <option value="male"selected>Male</option>
                                            <option value="N/A">Not Specified</option>
                                            @elseif($user_list->gender =="N/A")
                                            <option value="female">Female</option>
                                            <option value="male">Male</option>
                                            <option value="N/A"selected>Not Specified</option>
                                            @endif
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Blood Group</div>
                                        <select class="form-control " name="bg" id="bg" onchange="prevFunc(this,'bg_op')" >
                                            <option value="">Select BG</option>
                                            <option {{$user_list->blood =="A-" ? 'selected' :''}}>A-</option>
                                            <option {{$user_list->blood =="A+" ? 'selected' :''}}>A+</option>
                                            <option {{$user_list->blood =="B+" ? 'selected' :''}}>B+</option>
                                            <option {{$user_list->blood =="B-" ? 'selected' :''}}>B-</option>
                                            <option {{$user_list->blood =="O+" ? 'selected' :''}}>O+</option>
                                            <option {{$user_list->blood =="O-" ? 'selected' :''}}>O-</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-wizard-label">Address</div>
                                <textarea type="textarea" class="form-control" id="address" name="address" rows="3" onchange="prevFunc(this,'address_op')" >{{$user_list->address}}</textarea>
                                <div class="wizard-form-error"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">House name / Flat No*</div>
                                        <input type="text" class="form-control" id="house" name="house" value="{{$user_list->house}}" onchange="prevFunc(this,'house_op')" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Place / Street*</div>
                                        <input type="text" class="form-control" id="place" name="place" value="{{$user_list->place}}" onchange="prevFunc(this,'place_op')" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Country</div>
                                        <select name="country" id="country" class="form-control" onchange="prevFunc(this,'country_op')">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $item)
                                            <option value="{{$item->id}}" {{$user_list->country ==$item->id ? 'selected' :''}}>{{$item->name}} </option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">State*</div>
                                        <select name="state" id="state" class="form-control" onchange="prevFunc(this,'state_op')" >
                                            <option value="">Select State</option>
                                            @foreach ($state as $item)
                                            <option value="{{$item->id}}" {{$user_list->state ==$item->id ? 'selected' :''}}>{{$item->name}} </option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                        <span class="wizard-password-eye"><i class="far fa-eye"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">District*</div>
                                        <input type="text" class="form-control" id="district" name="district" value="{{$user_list->district}}" onchange="prevFunc(this,'district_op')" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Post / Zip code*</div>
                                        <input type="text" class="form-control" id="post" name="post" value="{{$user_list->post}}" onchange="prevFunc(this,'post_op')" >
                                        <div class="wizard-form-error"></div>
                                        <span class="wizard-password-eye"><i class="far fa-eye"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Taluk*</div>
                                        <input type="text" class="form-control" id="taluk" name="taluk"value="{{$user_list->taluk}}" onchange="prevFunc(this,'taluk_op')" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Village*</div>
                                        <input type="text" class="form-control" id="village" name="village" value="{{$user_list->village}}" onchange="prevFunc(this,'village_op')" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <select name="id_type" id="id_type" class="form-control" onchange="prevFunc(this,'id_type_op')" >
                                            <option value="">Select ID Card</option>
                                            <option {{$user_list->id_card =="Adhaar" ? 'selected' :''}}>Adhaar</option>
                                            <option {{$user_list->id_card =="Driving liecense" ? 'selected' :''}}>Driving liecense</option>
                                            <option {{$user_list->id_card =="Voter ID" ? 'selected' :''}}>Voter ID</option>
                                            <option {{$user_list->id_card =="Pan Card" ? 'selected' :''}}>Pan Card</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="id_number" name="id_number" value=" {{$user_list->id_number}}" onchange="prevFunc(this,'id_number_op')" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="file" class="form-control " id="id_file" name="id_file" onchange="prevFunc(this,'id_file_op')">
                                        <div class="wizard-form-error"></div><span>{{$user_list->id_file}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                <div class="form-group">
                                        <select name="nationality" id="nationality" class="form-control " onchange="prevFunc(this,'nationality_op')" >
                                            <option value="">Select Nationality</option>
                                            @foreach ($countries as $item)
                                            <option value="{{$item->id}}" {{$user_list->nationality ==$item->id ? 'selected' :''}}>{{$item->name}} </option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                           @if($user_list->nationality)
                            <div class="form-wizard-label"id="visa1">Visa Details*</div>
                            <div class="row"id="visa2">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control " id="visa_number_op"value=" {{$user_list->id_number}}" name="visa_number" onchange="prevFunc(this,'visa_number_op')" placeholder="Enter Visa Number" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control " id="visa_issued_op" name="visa_issued" onchange="prevFunc(this,'visa_issued_op')"value=" {{$user_list->visa_issued}}" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control " id="visa_expiry_op" name="visa_expiry" onchange="prevFunc(this,'visa_expiry_op')"value=" {{$user_list->visa_expiry}}">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="file" class="form-control " id="visa_file_op" name="visa_file" onchange="prevFunc(this,'visa_file_op')" >
                                        <div class="wizard-form-error"></div><span>{{$user_list->visa_file}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-wizard-label"id="visa3">Passport Details*</div>
                            <div class="row"id="visa4">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control " id="passport_number_op" name="passport_number" onchange="prevFunc(this,'passport_number_op')"value=" {{$user_list->passport_number}}" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="file" class="form-control " id="passport_file_op" name="passport_file" onchange="prevFunc(this,'passport_file_op')" >
                                        <div class="wizard-form-error"></div><span>{{$user_list->passport_file}}</span>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            @endif

                            <div class="form-wizard-label nation_div">Visa Details*</div>
                            <div class="row nation_div">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control " id="visa_number_op" name="visa_number_op" onchange="prevFunc(this,'visa_number_op')" placeholder="Enter Visa Number" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control " id="visa_issued_op" name="visa_issued_op" onchange="prevFunc(this,'visa_issued_op')" placeholder="Choose visa issued date" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control " id="visa_expiry_op" name="visa_expiry_op" onchange="prevFunc(this,'visa_expiry_op')" placeholder="Choose visa expiry date" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control " id="visa_file_op" name="visa_file_op" onchange="prevFunc(this,'visa_file_op')" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-wizard-label nation_div">Passport Details*</div>
                            <div class="row nation_div">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control " id="passport_number_op" name="passport_number_op" onchange="prevFunc(this,'passport_number_op')" placeholder="Enter Passport Number" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control " id="passport_file_op" name="passport_file_op" onchange="prevFunc(this,'passport_file_op')" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Educational Qualifications*</div>
                                    <div class="form-group">
                                        <select name="education" id="education" class="form-control wizard-required" onchange="prevFunc(this,'education_op')">
                                            <option value="">Select Qualifications</option>
                                            <option {{$user_list->education =="Graduated" ? 'selected' :''}}>Graduated</option>
                                            <option {{$user_list->education =="Post Graduated" ? 'selected' :''}}>Post Graduated</option>
                                            <option {{$user_list->education =="B.ed" ? 'selected' :''}}>B.ed</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">User Type*</div>
                                    <div class="form-group">
                                        <select name="user_type" id="user_type" class="form-control">
                                            <option value="">Select User Type</option>
                                            @foreach($designation as $item)
                                            <option value="{{$item->id}}" {{$user_list->usertype ==$item->id ? 'selected' :''}}>{{$item->name}} </option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
     
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Certificate*</div>
                                    <div class="form-group">
                                        <input type="file" class="form-control " id="certificate_file" name="certificate_file" onchange="prevFunc(this,'certificate_file_op')">
                                        <div class="wizard-form-error"></div><span>{{$user_list->certificate}}</span>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Profile Photo*</div>
                                    <div class="input-group image-preview" data-original-title="" title="">
                                        <input type="text" class="form-control form-control-sm image-preview-filename" disabled="disabled">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                <span class="fa fa-remove"></span>
                                                Clear </button>
                                            <div class="btn btn-primary btn-sm image-preview-input">
                                                <span class="fa fa-repeat"></span>
                                                <span class="image-preview-input-title">
                                                    Browse</span>
                                                <input type="file" accept="image/png, image/jpeg, image/gif" name="profile_file" onchange="prevFunc(this,'profile_file_op')">
                                            </div>
                                        </span>
                                    </div>
                                    <img src="{{ asset('user-files/user/profile/'.$item->profile_image) }}" width="40" alt="">
                                </div>
                            </div>
                            <div class="form-group clearfix"style="float:left">
                                <!-- <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a> -->
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

        @endsection
        @section('scripts')
        <script>
        $('#user-menu').addClass('active')
        </script>
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
                $('.nation_div').hide();
                $('#visa_issued').datepicker();
                $('#visa_expiry').datepicker();
                $('#doj').datepicker();
                $('#dob').datepicker();
                $('#dob_op').datepicker();
            });
        </script>
        <script type="text/javascript">
            function prevFunc(input1, output_id) {
                var input2 = document.getElementById(output_id);
                input2.value = input1.value;
            }
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
            $("#nationality").change(function() {
                var country = $(this).val();
                // alert("dvd");
                var def_country = $('#default_country').val();
                
                if (country == def_country) { 
                    $('.nation_div').hide();
                    $('#visa1').hide();
                    $('#visa2').hide();
                    $('#visa3').hide();
                    $('#visa4').hide();
                } else {
                    $('.nation_div').show();
                    $('#visa1').hide();
                    $('#visa2').hide();
                    $('#visa3').hide();
                    $('#visa4').hide();
                }
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
                    parentFieldset.find('.wizard-required').each(function() {
                        var thisValue = jQuery(this).val();

                        if (thisValue == "") {
                            jQuery(this).siblings(".wizard-form-error").slideDown();
                            nextWizardStep = false;
                        } else {
                            jQuery(this).siblings(".wizard-form-error").slideUp();
                        }
                    });
                    if (nextWizardStep) {
                        next.parents('.wizard-fieldset').removeClass("show", "400");
                        currentActiveStep.removeClass('active').addClass('activated').next().addClass('active', "400");
                        next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show", "400");
                        jQuery(document).find('.wizard-fieldset').each(function() {
                            if (jQuery(this).hasClass('show')) {
                                var formAtrr = jQuery(this).attr('data-tab-content');
                                jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function() {
                                    if (jQuery(this).attr('data-attr') == formAtrr) {
                                        jQuery(this).addClass('active');
                                        var innerWidth = jQuery(this).innerWidth();
                                        var position = jQuery(this).position();
                                        jQuery(document).find('.form-wizard-step-move').css({
                                            "left": position.left,
                                            "width": innerWidth
                                        });
                                    } else {
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
                    var prev = jQuery(this);
                    var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
                    prev.parents('.wizard-fieldset').removeClass("show", "400");
                    prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show", "400");
                    currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active', "400");
                    jQuery(document).find('.wizard-fieldset').each(function() {
                        if (jQuery(this).hasClass('show')) {
                            var formAtrr = jQuery(this).attr('data-tab-content');
                            jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function() {
                                if (jQuery(this).attr('data-attr') == formAtrr) {
                                    jQuery(this).addClass('active');
                                    var innerWidth = jQuery(this).innerWidth();
                                    var position = jQuery(this).position();
                                    jQuery(document).find('.form-wizard-step-move').css({
                                        "left": position.left,
                                        "width": innerWidth
                                    });
                                } else {
                                    jQuery(this).removeClass('active');
                                }
                            });
                        }
                    });
                });
                //click on form submit button
                jQuery(document).on("click", ".form-wizard .form-wizard-submit", function() {
                    alert("fvbdf");
                            $.ajax({
                                type: "POST",
                                url: "{{route('saveUser')}}",
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
                                    alert("cvdfv");
                                    if (response.status == 1) {
                                        toastr.success('success', 'Successful');
                                        $('.form-wizard-submit').prop('disabled', false);
                                        window.location.href = "../user/index";
                                    } else {
                                        toastr.error('errors', response.errors);
                                        $('.form-wizard-submit').prop('disabled', false);
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
        @endsection
