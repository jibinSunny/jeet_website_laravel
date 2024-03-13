@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> Add Student</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-laptop"></i> Dashboard</a></li>
            <li class="active">Add Student</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <section class="wizard-section">
                    <div class="row no-gutters">
                        <div class="form-wizard">
                            <form action="javascript:;" method="post" role="form" id="reg_form">
                                <div class="form-wizard-header">
                                    <p>Student Registration</p>
                                    <ul class="list-unstyled form-wizard-steps clearfix">
                                        <li class="active"><span>1</span></li>
                                        <li><span>2</span></li>
                                        <li><span>3</span></li>
                                        <li><span>4</span></li>
                                        <li><span>5</span></li>
                                    </ul>
                                </div>
                                <fieldset class="wizard-fieldset show">
                                    <h5>Basic Information</h5>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-4 col-sm-4">
                                            <div class="form-wizard-label">Guardian Name</div>
                                            <div class="form-group">
                                                <select onchange="prevFunc(this,'parent_op')" class="form-control wizard-required" name="parent" id="parent">
                                                    <option value="">Select Parent</option>
                                                    @foreach ($parents as $item)
                                                    <option value="{{ $item->id }}">{{ $item->first_name }} {{ $item->last_name }}-{{ $item->phone }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-wizard-label">First Name</div>
                                            <div class="form-group">
                                                <input type="text" class="form-control wizard-required" id="fname" name="fname" onchange="prevFunc(this,'fname_op')" placeholder="Enter First Name">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-wizard-label">Middle Name</div>
                                            <div class="form-group">
                                                <input type="text" class="form-control wizard-required" id="mname" name="mname" onchange="prevFunc(this,'mname_op')" placeholder="Enter Middle Name">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-wizard-label">Last Name</div>
                                            <div class="form-group">
                                                <input type="text" class="form-control wizard-required" id="lname" name="lname" onchange="prevFunc(this,'lname_op')" placeholder="Enter Last Name">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <div class="form-wizard-label">Email</div>
                                            <div class="form-group">
                                                <input type="text" class="form-control wizard-required" id="email" name="email" onchange="prevFunc(this,'email_op')" placeholder="Enter Email">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-wizard-label">Std Code</div>
                                            <div class="form-group">
                                                <select onchange="prevFunc(this,'std_code_op')" class="form-control wizard-required" name="std_code" id="std_code">
                                                    <option value="">Select Code</option>
                                                    @foreach ($countries as $item)
                                                    <option>+{{ $item->phonecode }} </option>
                                                    @endforeach
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <div class="form-wizard-label">Phone Number</div>
                                            <div class="form-group">
                                                <input type="text" class="form-control wizard-required" id="phone" name="phone" onchange="prevFunc(this,'phone_op')" placeholder="Enter Phone Number">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-wizard-label">Address</div>
                                    <div class="form-group">
                                        <textarea class="form-control wizard-required" name="address" id="address" onchange="prevFunc(this,'address_op')" placeholder="Enter Address"></textarea>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Date of Birth</div>
                                                <input type="text" class="form-control wizard-required" id="dob" name="dob" onchange="prevFunc(this,'dob_op')" placeholder="Choose date of birth">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-wizard-label">Blood Group</div>
                                            <div class="form-group">
                                                <select onchange="prevFunc(this,'blood_op')" class="form-control wizard-required" name="blood" id="blood">
                                                    <option value="">Select Blood Group</option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-wizard-label">Gender</div>
                                            <div class="form-group">
                                                <select class="form-control wizard-required" name="gender" id="gender" onchange="prevFunc(this,'gender_op')">
                                                    <option value="">Select Gender</option>
                                                    <option value="female">Female</option>
                                                    <option value="male">Male</option>
                                                    <option value="N/A">Not Specified</option>
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                                    </div>
                                </fieldset>



                                <fieldset class="wizard-fieldset">
                                    <h5>Additional Information</h5>
                                    <div class="form-wizard-label">House name / Flat No*</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="house" name="house" onchange="prevFunc(this,'house_op')" placeholder="Enter House name / Flat No">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                    <div class="form-wizard-label">Place / Street*</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="place" name="place" onchange="prevFunc(this,'place_op')" placeholder="Enter Place / Street">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                    <div class="form-wizard-label">Post / Zip code*</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="post" name="post" onchange="prevFunc(this,'post_op')" placeholder="Enter Post / Zip code">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                    <div class="form-wizard-label">District*</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="district" name="district" onchange="prevFunc(this,'district_op')" placeholder="Enter District">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-wizard-label">Country*</div>
                                            <div class="form-group">
                                                <select name="country" id="country" class="form-control wizard-required" tabindex="-1" onchange="prevFunc(this,'country_op')">
                                                    <option value="">Select Country</option>
                                                    @foreach ($countries as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-wizard-label">State*</div>
                                            <div class="form-group">
                                                <select name="state" id="state" class="form-control wizard-required" tabindex="-1" onchange="prevFunc(this,'state_op')">
                                                    <option value="">Select State</option>
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-wizard-label">Taluk</div>
                                            <div class="form-group">
                                                <input type="text" class="form-control " id="taluk" name="taluk" onchange="prevFunc(this,'taluk_op')" placeholder="Enter Taluk Name">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-wizard-label">Village</div>
                                            <div class="form-group">
                                                <input type="text" class="form-control " id="village" name="village" onchange="prevFunc(this,'village_op')" placeholder="Enter Village Name">
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
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Religion*</div>
                                                <select name="religion" id="religion" class="form-control wizard-required" onchange="prevFunc(this,'religion_op')">
                                                    <option value="">Select Religion</option>
                                                    @foreach ($religions as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Caste*</div>
                                                <select name="caste" id="caste" class="form-control " onchange="prevFunc(this,'caste_op')">
                                                    <option value="">Select Caste</option>
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Physical Disabled*</div>
                                                <select name="physical" id="physical" class="form-control wizard-required" onchange="prevFunc(this,'physical_op')">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-wizard-label">Nationality*</div>
                                    <div class="form-group">
                                        <select name="nationality" id="nationality" class="form-control wizard-required" tabindex="-1" onchange="prevFunc(this,'nationality_op')">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" value="{{ $default_country }}" id="default_country" name="default_country">
                                    </div>
                                    <div class="form-wizard-label id_div">ID Card Details*</div>
                                    <div class="row id_div">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <select name="id_type" id="id_type" class="form-control wizard-required" onchange="prevFunc(this,'id_type_op')">
                                                    <option value="">Select ID Card</option>
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control wizard-required" id="id_number" name="id_number" onchange="prevFunc(this,'id_number_op')" placeholder="Enter ID Card Number">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <input type="file" class="form-control wizard-required" id="id_file" name="id_file" onchange="prevFunc(this,'id_file_op')">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-wizard-label nation_div">Visa Details*</div>
                                    <div class="row nation_div">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control " id="visa_number" name="visa_number" onchange="prevFunc(this,'visa_number_op')" placeholder="Enter Visa Number">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control " id="visa_issued" name="visa_issued" onchange="prevFunc(this,'visa_issued_op')" placeholder="Choose visa issued date">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control " id="visa_expiry" name="visa_expiry" onchange="prevFunc(this,'visa_expiry_op')" placeholder="Choose visa expiry date">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="file" class="form-control " id="visa_file" name="visa_file" onchange="prevFunc(this,'visa_file_op')">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-wizard-label nation_div">Passport Details*</div>
                                    <div class="row nation_div">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control " id="passport_number" name="passport_number" onchange="prevFunc(this,'passport_number_op')" placeholder="Enter Passport Number">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="file" class="form-control " id="passport_file" name="passport_file" onchange="prevFunc(this,'passport_file_op')">
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
                                    <h5>Professional Information</h5>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Identification Certificate*</div>
                                                <input type="file" class="form-control " id="aadhar_file" name="aadhar_file" onchange="prevFunc(this,'aadhar_file_op')">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Birth Certificate*</div>
                                                <input type="file" class="form-control " id="birth_file" name="birth_file" onchange="prevFunc(this,'birth_file_op')">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Transfer Certificate*</div>
                                                <input type="file" class="form-control" id="transfer_file" name="transfer_file" onchange="prevFunc(this,'transfer_file_op')">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-wizard-label">Department*</div>
                                            <div class="form-group">
                                                <select name="department" id="department" class="form-control wizard-requireds" onchange="prevFunc(this,'department_op')">
                                                    <option value="">Select Deaprtment</option>
                                                    @foreach ($departments as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Class*</div>
                                                <select name="class" id="class" class="form-control " onchange="prevFunc(this,'class_op')">
                                                    <option value="">Select Class</option>
                                                    @foreach ($classes as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Division*</div>
                                                <select name="division" id="division" class="form-control " onchange="prevFunc(this,'division_op')">
                                                    <option value="">Select Division</option>
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Optional Subject(if any)</div>
                                                <input type="text" class="form-control wizard-required" id="opt_subject" name="opt_subject" onchange="prevFunc(this,'opt_subject_op')" placeholder="Enter Optional Subject Name(if any)">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Registel Number*</div>
                                                <input type="text" class="form-control" id="reg_number" name="reg_number" onchange="prevFunc(this,'reg_number_op')" placeholder="Enter Register Number">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Roll Number*</div>
                                                <input type="text" class="form-control" id="roll_number" name="roll_number" onchange="prevFunc(this,'roll_number_op')" placeholder="Enter Roll Number">
                                                <div class="wizard-form-error"></div>
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
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Extra Curricular Activities</div>
                                                <div class="row">
                                                    @foreach($extracurriclurs as $extra)
                                                    <div class="col-xs-12 col-md-6">
                                                        <label class="label-container">{{ $extra->name }}
                                                            <input type="checkbox" name="curricular" id="{{ $extra->name }}" value="{{ $extra->id }}" onchange='$("#{{ $extra->name }}_op").attr("checked", "checked");'>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="form-wizard-label">Sports</div>
                                                <div class="row">
                                                    @foreach($sports as $sport)
                                                    <div class="col-xs-12 col-md-6">
                                                        <label class="label-container">{{ $sport->name }}
                                                            <input type="checkbox" name="sports" id="{{ $sport->name }}" value="{{ $sport->id }}" onchange='$("#{{ $sport->name }}_op").attr("checked", "checked");'>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="form-wizard-label">Arts</div>
                                                <div class="row">
                                                    @foreach($arts as $art)
                                                    <div class="col-xs-12 col-md-6">
                                                        <label class="label-container">{{ $art->name }}
                                                            <input type="checkbox" name="arts" id="{{ $art->name }}" value="{{ $art->id }}" onchange='$("#{{ $art->name }}_op").attr("checked", "checked");'>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="form-wizard-label">Music</div>
                                                <div class="row">
                                                    @foreach($musics as $music)
                                                    <div class="col-xs-12 col-md-6">
                                                        <label class="label-container">{{ $music->name }}
                                                            <input type="checkbox" name="musics" id="{{ $music->name }}" value="{{ $music->id }}" onchange='$("#{{ $music->name }}_op").attr("checked", "checked");'>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-wizard-label">Eligible For Gov Subsidies</div>
                                            <div class="form-group">
                                                <div class="wizard-form-radio">
                                                    <div class="wizard-form-radio">
                                                        <input name="gov_sub" id="gov_yes" type="radio" onchange='$("#gov_yes_op").attr("checked", "checked");' value="yes">
                                                        <label for="male">Yes</label>
                                                    </div>
                                                    <div class="wizard-form-radio">
                                                        <input name="gov_sub" id="gov_no" type="radio" onchange='$("#gov_no_op").attr("checked", "checked");' value="no">
                                                        <label for="female1">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                        <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                                    </div>
                                </fieldset>












                                <!-- preview step  -->
                                <fieldset class="wizard-fieldset">
                                    <h5>Preview</h5>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-wizard-label">First Name</div>
                                            <div class="form-group">
                                                <input type="text" class="form-control wizard-required" id="fname_op" name="fname" onchange="prevFunc(this,'fname')" placeholder="Enter First Name" disabled>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-wizard-label">Middle Name</div>
                                            <div class="form-group">
                                                <input type="text" class="form-control " id="mname_op" name="mname_op" onchange="prevFunc(this,'mname')" placeholder="Enter Middle Name" disabled>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-wizard-label">Last Name</div>
                                            <div class="form-group">
                                                <input type="text" class="form-control " id="lname_op" name="lname_op" onchange="prevFunc(this,'lname')" placeholder="Enter Last Name" disabled>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-wizard-label">Guardian Name</div>
                                            <div class="form-group">
                                                <select onchange="prevFunc(this,'parent')" class="form-control " name="parent" id="parent_op" disabled>
                                                    <option value="">Select Parent</option>
                                                    @foreach ($parents as $item)
                                                    <option value="{{ $item->id }}">{{ $item->first_name }} {{ $item->last_name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <div class="form-wizard-label">Email</div>
                                            <div class="form-group">
                                                <input type="text" class="form-control " id="email_op" name="email" onchange="prevFunc(this,'email')" placeholder="Enter Phone Number" disabled>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-wizard-label">Std Code</div>
                                            <div class="form-group">
                                                <select onchange="prevFunc(this,'std_code')" class="form-control " name="std_code" id="std_code_op" disabled>
                                                    <option value="">Select Code</option>
                                                    @foreach ($countries as $item)
                                                    <option>+{{ $item->phonecode }} </option>
                                                    @endforeach
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <div class="form-wizard-label">Phone Number</div>
                                            <div class="form-group">
                                                <input type="text" class="form-control " id="phone_op" name="phone" onchange="prevFunc(this,'phone')" placeholder="Enter Phone Number" disabled>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-wizard-label">Address</div>
                                    <div class="form-group">
                                        <textarea class="form-control " name="address" id="address_op" onchange="prevFunc(this,'email_op')" placeholder="Enter Address" disabled></textarea>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Date of Birth</div>
                                                <input type="text" class="form-control " id="dob_op" name="dob" onchange="prevFunc(this,'dob')" placeholder="Choose date of birth" disabled>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-wizard-label">Blood Group</div>
                                            <div class="form-group">
                                                <select onchange="prevFunc(this,'blood')" class="form-control " name="blood" id="blood_op" disabled>
                                                    <option value="">Select Blood Group</option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-wizard-label">Gender</div>
                                            <div class="form-group">
                                                <select class="form-control" name="gender_op" id="gender_op" onchange="prevFunc(this,'gender_op')" disabled>
                                                    <option value="">Select Gender</option>
                                                    <option value="female">Female</option>
                                                    <option value="male">Male</option>
                                                    <option value="N/A">Not Specified</option>
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-wizard-label">House name / Flat No*</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="house_op" name="house" onchange="prevFunc(this,'house')" placeholder="Enter House name / Flat No" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                    <div class="form-wizard-label">Place / Street*</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="place_op" name="place" onchange="prevFunc(this,'place')" placeholder="Enter Place / Street" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                    <div class="form-wizard-label">Post / Zip code*</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="post_op" name="post" onchange="prevFunc(this,'post')" placeholder="Enter Post / Zip code" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                    <div class="form-wizard-label">District*</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="district_op" name="district" onchange="prevFunc(this,'district')" placeholder="Enter District" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                    <div class="form-wizard-label">Country and State*</div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <select name="country" id="country_op" class="form-control" onchange="prevFunc(this,'country')" disabled>
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
                                                <select name="state" id="state_op" class="form-control" onchange="prevFunc(this,'state')" disabled>
                                                    <option value="">Select State</option>
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-wizard-label">Taluk</div>
                                            <div class="form-group">
                                                <input type="text" class="form-control " id="taluk_op" name="taluk" onchange="prevFunc(this,'taluk')" placeholder="Enter Taluk Name" disabled>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-wizard-label">Village</div>
                                            <div class="form-group">
                                                <input type="text" class="form-control " id="village_op" name="village" onchange="prevFunc(this,'village')" placeholder="Enter Village Name" disabled>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-wizard-label">Nationality*</div>
                                    <div class="form-group">
                                        <select name="nationality" id="nationality_op" class="form-control " tabindex="-1" onchange="prevFunc(this,'nationality')" disabled>
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-wizard-label id_div">ID Card Details*</div>
                                    <div class="row id_div">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <select name="id_type" id="id_type_op" class="form-control " onchange="prevFunc(this,'id_type')" disabled>
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
                                                <input type="text" class="form-control " id="id_number_op" name="id_number" onchange="prevFunc(this,'id_number')" placeholder="Enter ID Card Number" disabled>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control " id="id_file_op" name="id_file" disabled>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-wizard-label nation_div">Visa Details*</div>
                                    <div class="row nation_div">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control " id="visa_number_op" name="visa_number_op" onchange="prevFunc(this,'visa_number')" placeholder="Enter Visa Number" disabled>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control " id="visa_issued_op" name="visa_issued_op" onchange="prevFunc(this,'visa_issued')" placeholder="Choose visa issued date" disabled>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control " id="visa_expiry_op" name="visa_expiry_op" onchange="prevFunc(this,'visa_expiry')" placeholder="Choose visa expiry date" disabled>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control " id="visa_file_op" name="visa_file_op" disabled>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-wizard-label nation_div">Passport Details*</div>
                                    <div class="row nation_div">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control " id="passport_number_op" name="passport_number_op" onchange="prevFunc(this,'passport_number')" placeholder="Enter Passport Number" disabled>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control " id="passport_file_op" name="passport_file" disabled>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Religion*</div>
                                                <select name="religion_op" id="religion_op" class="form-control " onchange="prevFunc(this,'religion')" disabled>
                                                    <option value="">Select Religion</option>
                                                    @foreach ($religions as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Caste*</div>
                                                <select name="caste_op" id="caste_op" class="form-control " onchange="prevFunc(this,'caste')" disabled>
                                                    <option value="">Select Caste</option>
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Physical Status*</div>
                                                <select name="physical_op" id="physical_op" class="form-control " onchange="prevFunc(this,'physical')" disabled>
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Identification Certificate*</div>
                                                <input type="text" class="form-control " id="aadhar_file_op" name="aadhar_file" disabled>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Birth Certificate*</div>
                                                <input type="text" class="form-control " id="birth_file_op" name="birth_file" disabled>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Transfer Certificate*</div>
                                                <input type="text" class="form-control " id="transfer_file_op" name="transfer_file" disabled>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-wizard-label">Department*</div>
                                            <div class="form-group">
                                                <select name="department_op" id="department_op" class="form-control wizard-required" onchange="prevFunc(this,'department')" disabled>
                                                    <option value="">Select Deaprtment</option>
                                                    @foreach ($departments as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Class*</div>
                                                <select name="class_op" id="class_op" class="form-control " onchange="prevFunc(this,'class')" disabled>
                                                    <option value="">Select Class</option>
                                                    @foreach ($classes as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Division*</div>
                                                <select name="division_op" id="division_op" class="form-control " onchange="prevFunc(this,'division')" disabled>
                                                    <option value="">Select Division</option>
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-6 col-md-6 col-sm-6" disabled>
                                            <div class="form-group">
                                                <div class="form-wizard-label">Optional Subject(if any)</div>
                                                <input type="text" class="form-control" id="opt_subject_op" name="opt_subject_op" onchange="prevFunc(this,'opt_subject')" placeholder="Enter Optional Subject Name(if any)">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Register Number*</div>
                                                <input type="text" class="form-control" id="reg_number_op" name="reg_number_op" onchange="prevFunc(this,'reg_number')" placeholder="Enter Register Number" disabled>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Roll Number*</div>
                                                <input type="text" class="form-control" id="roll_number_op" name="roll_number_op" onchange="prevFunc(this,'roll_number')" placeholder="Enter Roll Number" disabled>
                                                <div class="wizard-form-error"></div>
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
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Extra Curricular Activities</div>
                                                <div class="row">
                                                    @foreach($extracurriclurs as $extra)
                                                    <div class="col-xs-12 col-md-6">
                                                        <label class="label-container">{{ $extra->name }}
                                                            <input type="checkbox" name="curricular" id="{{ $extra->name }}_op" onchange="prevFunc(this,'{{ $extra->name }}')" value="{{ $extra->id }}">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="form-wizard-label">Sports</div>
                                                <div class="row">
                                                    @foreach($sports as $sport)
                                                    <div class="col-xs-12 col-md-6">
                                                        <label class="label-container">{{ $sport->name }}
                                                            <input type="checkbox" name="sports" id="{{ $sport->name }}_op" onchange="prevFunc(this,'{{ $sport->name }}')" value="{{ $sport->id }}">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="form-wizard-label">Arts</div>
                                                <div class="row">
                                                    @foreach($arts as $art)
                                                    <div class="col-xs-12 col-md-6">
                                                        <label class="label-container">{{ $art->name }}
                                                            <input type="checkbox" name="arts" id="{{ $art->name }}_op" onchange="prevFunc(this,'{{ $art->name }}')" value="{{ $art->id }}">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="form-wizard-label">Music</div>
                                                <div class="row">
                                                    @foreach($musics as $music)
                                                    <div class="col-xs-12 col-md-6">
                                                        <label class="label-container">{{ $music->name }}
                                                            <input type="checkbox" name="musics" id="{{ $music->name }}_op" onchange="prevFunc(this,'{{ $music->name }}')" value="{{ $music->id }}">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-wizard-label">Eligible For Gov Subsidies</div>
                                            <div class="form-group">
                                                <div class="wizard-form-radio">
                                                    <input name="gov_sub_op" id="gov_yes_op" type="radio" onchange="prevFunc(this,'gov_yes')" value="gov_yes">
                                                    <label for="male_op">Yes</label>
                                                </div>
                                                <div class="wizard-form-radio">
                                                    <input name="gov_sub_op" id="gov_no_op" type="radio" onchange="prevFunc(this,'gov_no')" value="gov_no">
                                                    <label for="female_op">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group clearfix">
                                        <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                        <a href="javascript:;" class="form-wizard-submit float-right">Submit</a>
                                    </div>

                                </fieldset>
                            </form>
                        </div> <!-- col-sm-8 -->

                    </div><!-- row -->
            </div>
        </div><!-- /.box -->
        @endsection
        @section('scripts')
        <script>
            $("#parent").change(function() {
                var parent_name = $(this).val();
              
                $.ajax({
                    type: "POST",
                    url: "{{route('selectparentDatails')}}",
                    data: {
                        'parent_id': parent_name
                    },
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        $("#lname").empty();
                        $("#address").empty();
                        $("#house_op").empty();
                        $("#place_op").empty();
                        $("#post_op").empty();
                        $("#district_op").empty();
                        $("#address").val(data.parent_details['address']);
                        $("#lname").val(data.parent_details['first_name']);
                        $("#house_op").val(data.parent_details['house_name']);
                        $("#place_op").val(data.parent_details['place']);
                        $("#post_op").val(data.parent_details['zip']);
                        $("#district_op").val(data.parent_details['district']);

   
                    }
                });
            });
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
                    $(".image-preview-input-title").text("File Browse");
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
                        $(".image-preview-input-title").text("File Browse");
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
                $('.id_div').hide();
                $('#visa_issued').datepicker();
                $('#visa_expiry').datepicker();
                $('#dob').datepicker();
                $('#doj').datepicker();
            });
        </script>
        <script type="text/javascript">
            $("select.select2").select2();
        </script>
        <script type="text/javascript">
            $('#name_id').change(function() {
                var name = this.value;
                var input2 = document.getElementById('student_name');
                input2.value = name;
            });
        </script>
        <script type="text/javascript">
            function prevFunc(input1, output_id) {
                var input2 = document.getElementById(output_id);
                input2.value = input1.value;
            }
            $("#nationality").change(function() {
                var country = $(this).val();
                var def_country = $('#default_country').val();
                if (country == def_country) {
                    $('.nation_div').hide();
                    $('.id_div').show();
                    $('#id_type').html('<option value="Aadhar">Aadhar Card</option>');
                    $('#id_type_op').html('<option value="Aadhar">Aadhar</option>');
                } else {
                    $('.nation_div').show();
                    $('.id_div').show();
                    $('#id_type').html('<option value="nation_card">Nationality Card</option>');
                    $('#id_type_op').html('<option value="nation_card">Nationality Card</option>');
                }
            });
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
                $("#class").change(function() {
                    var class_name = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "{{route('selectDivision')}}",
                        data: {
                            'class_name': class_name
                        },
                        dataType: "json",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            if (data.status == 1) {
                                var html = '<option value="">Select Division</option>';
                                $.each(data.divisions, function(k, v) {
                                    html = html + "<option value=" + v.id + ">" + v.name + "</option>";
                                });
                                $('#division').html(html);
                                $('#division_op').html(html);
                            } else {

                            }
                        }
                    });
                });
                $("#religion").change(function() {
                    var religion = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "{{route('selectCaste')}}",
                        data: {
                            'religion': religion
                        },
                        dataType: "json",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            if (data.status == 1) {
                                var html = '<option value="">Select Caste</option>';
                                $.each(data.castes, function(k, v) {
                                    html = html + "<option value=" + v.id + ">" + v.name + "</option>";
                                });
                                $('#caste').html(html);
                                $('#caste_op').html(html);
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
                    var parentFieldset = jQuery(this).parents('.wizard-fieldset');
                    var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
                    parentFieldset.find('.wizard-required').each(function() {
                        var thisValue = jQuery(this).val();
                        if (thisValue == "") {
                            jQuery(this).siblings(".wizard-form-error").slideDown();
                        } else {
                            jQuery(this).siblings(".wizard-form-error").slideUp();
                            var form_data = new FormData(document.getElementById('reg_form'));
                            $.ajax({
                                type: "POST",
                                url: "{{route('saveStudent')}}",
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
                                        window.location.href = "{{ url('admin/student/') }}";
                                    } else {
                                        toastr.error('errors', response.errors);
                                    }
                                }
                            });
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
        <script>
            $('#student-menu').addClass('active');
        </script>
        @endsection