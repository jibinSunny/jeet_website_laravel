@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> Add Teacher</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-laptop"></i> Dashboard</a></li>
            <li class="active">Edit Teacher</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-wizard">
                    <form role="form" method="post" action="javascript:;" id="reg_form">
                        <div class="form-wizard-header">
                            <h4>Teacher Registration</h4>
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
                                <div class="col-lg-6 col-md-6 col-sm-4">
                                    <div class="form-wizard-label">First Name</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname" name="fname" placeholder="Enter First Name" onchange="prevFunc(this,'fname_op')">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Last Name</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="lname" name="lname" placeholder="Enter Last Name" onchange="prevFunc(this,'lname_op')">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Email</div>
                                        <input type="email" class="form-control wizard-required" name="email" id="email" placeholder="Enter Email" onchange="prevFunc(this,'email_op')">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <div class="form-wizard-label ">Phone number</div>
                                        <select class="form-control wizard-required" name="std_code" id="std_code" onchange="prevFunc(this,'std_code_op')">
                                            <option value="">Select Code</option>
                                            @foreach ($countries as $item)
                                            <option>+{{ $item->phonecode }} </option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="form-group">
                                        <div class="form-wizard-label visually-hidden">Phone number</div>
                                        <input type="text" class="form-control wizard-required" id="phone" name="phone" placeholder="Enter Phone Number" onchange="prevFunc(this,'phone_op')">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <div class="form-wizard-label ">Secondary Phone number</div>
                                        <select class="form-control " name="std_code2" id="std_code2" onchange="prevFunc(this,'std_code2_op')">
                                            <option value="">Select Code</option>
                                            @foreach ($countries as $item)
                                            <option>+{{ $item->phonecode }} </option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="form-group">
                                        <div class="form-wizard-label visually-hidden">Secondary Phone number</div>
                                        <input type="text" class="form-control" id="phone2" name="phone2" placeholder="Enter Secondary Phone Number" onchange="prevFunc(this,'phone2_op')">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <div class="form-wizard-label">DOB</div>
                                        <input type="text" class="form-control wizard-required" name="dob" id="dob" placeholder="Enter DOB" onchange="prevFunc(this,'dob_op')">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Gender</div>
                                        <select class="form-control wizard-required" name="gender" id="gender" onchange="prevFunc(this,'gender_op')">
                                            <option value="">Select Gender</option>
                                            <option value="female">Female</option>
                                            <option value="male">Male</option>
                                            <option value="N/A">Not Specified</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Blood Group</div>
                                        <select class="form-control wizard-required" name="bg" id="bg" onchange="prevFunc(this,'bg_op')">
                                            <option value="">Select BG</option>
                                            <option>A-</option>
                                            <option>A+</option>
                                            <option>B+</option>
                                            <option>B-</option>
                                            <option>O+</option>
                                            <option>O-</option>
                                            <option>AB+</option>
                                            <option>AB-</option>
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
                            <div class="form-group">
                                <div class="form-wizard-label">Address</div>
                                <textarea type="textarea" class="form-control" id="address" name="address" rows="3" onchange="prevFunc(this,'address_op')"></textarea>
                                <div class="wizard-form-error"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">House name / Flat No*</div>
                                        <input type="text" class="form-control wizard-required" id="house" name="house" placeholder="Enter House name / Flat No" onchange="prevFunc(this,'house_op')">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Place / Street*</div>
                                        <input type="text" class="form-control wizard-required" id="place" name="place" placeholder="Enter Place / Street" onchange="prevFunc(this,'place_op')">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Country</div>
                                        <select name="country" id="country" class="form-control wizard-required" onchange="prevFunc(this,'country_op')">
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
                                        <div class="form-wizard-label">State*</div>
                                        <select name="state" id="state" class="form-control wizard-required" onchange="prevFunc(this,'state_op')">
                                            <option value="">Select State</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">District*</div>
                                        <input type="text" class="form-control wizard-required" id="district" name="district" placeholder="Enter District" onchange="prevFunc(this,'district_op')">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Post / Zip code*</div>
                                        <input type="text" class="form-control wizard-required" id="post" name="post" placeholder="Enter Post / Zip code" onchange="prevFunc(this,'post_op')">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row taluk_div">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Taluk</div>
                                        <input type="text" class="form-control" id="taluk" name="taluk" placeholder="Enter Taluk" onchange="prevFunc(this,'taluk_op')">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Village</div>
                                        <input type="text" class="form-control" id="village" name="village" placeholder="Enter Village" onchange="prevFunc(this,'village_op')">
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
                                <div class="col-sm-12">
                                    <div class="form-wizard-label">Nationality*</div>
                                    <div class="form-group">
                                        <select name="nationality" id="nationality" class="form-control wizard-required" onchange="prevFunc(this,'nationality_op')">
                                            <option value="">Select Nationality</option>
                                            @foreach ($countries as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" value="{{ $default_country }}" id="default_country" name="default_country">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-wizard-label id_div">ID Card Details*</div>
                            <div class="row id_div">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <select name="id_type" id="id_type" class="form-control wizard-required id_type" onchange="prevFunc(this,'id_type_op')" >
                                            <option value="">Select ID Card</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="id_number" name="id_number" placeholder="Enter ID Card Number" onchange="prevFunc(this,'id_number_op')">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="file" class="form-control " id="id_file" name="id_file" onchange="prevFunc(this,'id_file_op')">
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
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Educational Qualifications*</div>
                                    <div class="form-group">
                                        <select name="education" id="education" class="form-control wizard-required" onchange="prevFunc(this,'education_op')">
                                            <option value="">Select Qualifications</option>
                                            <option>Graduated</option>
                                            <option>Post Graduated</option>
                                            <option>B.ed</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Date of Joining*</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" name="doj" id="doj" placeholder="Enter DOB" onchange="prevFunc(this,'doj_op')">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Department*</div>
                                    <div class="form-group">
                                        <select name="department" id="department" class="form-control wizard-required">
                                            @foreach ($departments as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Classes*</div>
                                    <div class="form-group">
                                        <select name="classes" id="classes" class="form-control ">
                                        <option value="">Select Class</option>
                                            @foreach ($classes as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Division*</div>
                                    <div class="form-group">
                                        <select name="division" id="division" class="form-control  wizard-required" >
                                            <option value="">Select Division</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Subjects*</div>
                                    <div class="form-group">
                                        <select name="subject" id="subject" class="form-control wizard-required" onchange="prevFunc(this,'subject_op')">
                                            <option value="">Select Subjects</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Certificate*</div>
                                    <div class="form-group">
                                        <input type="file" class="form-control " id="certificate_file" name="certificate_file" onchange="prevFunc(this,'certificate_file_op')">
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
                                        <input type="text" class="form-control wizard-required" id="fname_op" name="fname" placeholder="Enter First Name" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Last Name</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="lname_op" name="lname_op" placeholder="Enter Last Name" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-wizard-label">Email</div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email_op" name="email_op" placeholder="Enter Email" disabled>
                                <div class="wizard-form-error"></div>
                            </div>
                            <div class="form-wizard-label">Phone number</div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <select class="form-control " id="std_code_op" name="std_code_op" disabled>
                                            <option value="">Select Code</option>
                                            @foreach ($countries as $item)
                                            <option>+{{ $item->phonecode }} </option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="phone_op" name="phone_op" placeholder="Enter Phone Number" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                           <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <div class="form-wizard-label ">Secondary Phone number</div>
                                        <select class="form-control" name="std_code2_op" id="std_code2_op" onchange="prevFunc(this,'std_code2_op')" disabled>
                                            <option value="">Select Code</option>
                                            @foreach ($countries as $item)
                                            <option>+{{ $item->phonecode }} </option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="form-group">
                                        <div class="form-wizard-label visually-hidden">Secondary Phone number</div>
                                        <input type="text" class="form-control" id="phone2_op" name="phone2_op" placeholder="Enter Secondary Phone Number" onchange="prevFunc(this,'phone2_op')" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <div class="form-wizard-label">DOB</div>
                                        <input type="text" class="form-control" name="dob_op" id="dob_op" placeholder="Enter DOB" onchange="prevFunc(this,'dob_op')" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Gender</div>
                                        <select class="form-control" name="gender_op" id="gender_op" onchange="prevFunc(this,'gender_op')" disabled>
                                            <option value="">Select Gender</option>
                                            <option value="female">Female</option>
                                            <option value="male">Male</option>
                                            <option value="N/A">Not Specified</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Blood Group</div>
                                        <select class="form-control " name="bg_op" id="bg_op" onchange="prevFunc(this,'bg_op')" disabled>
                                            <option value="">Select BG</option>
                                            <option>A-</option>
                                            <option>A+</option>
                                            <option>B+</option>
                                            <option>B-</option>
                                            <option>O+</option>
                                            <option>O-</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-wizard-label">Address</div>
                                <textarea type="textarea" class="form-control" id="address_op" name="address_op" rows="3" onchange="prevFunc(this,'address_op')" disabled></textarea>
                                <div class="wizard-form-error"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">House name / Flat No*</div>
                                        <input type="text" class="form-control" id="house_op" name="house_op" placeholder="Enter House name / Flat No" onchange="prevFunc(this,'house_op')" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Place / Street*</div>
                                        <input type="text" class="form-control" id="place_op" name="place_op" placeholder="Enter Place / Street" onchange="prevFunc(this,'place_op')" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Country</div>
                                        <select name="country_op" id="country_op" class="form-control" onchange="prevFunc(this,'country_op')" disabled>
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
                                        <div class="form-wizard-label">State*</div>
                                        <select name="state_op" id="state_op" class="form-control" onchange="prevFunc(this,'state_op')" disabled>
                                            <option value="">Select State</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">District*</div>
                                        <input type="text" class="form-control" id="district_op" name="district_op" placeholder="Enter District" onchange="prevFunc(this,'district_op')" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Post / Zip code*</div>
                                        <input type="text" class="form-control" id="post_op" name="post_op" placeholder="Enter Post / Zip code" onchange="prevFunc(this,'post_op')" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row taluk_div">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Taluk*</div>
                                        <input type="text" class="form-control" id="taluk_op" name="taluk_op" placeholder="Enter Taluk" onchange="prevFunc(this,'taluk_op')" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Village*</div>
                                        <input type="text" class="form-control" id="village_op" name="village_op" placeholder="Enter Village" onchange="prevFunc(this,'village_op')" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-wizard-label">Nationality*</div>
                                    <div class="form-group">
                                        <select name="nationality_op" id="nationality_op" class="form-control " onchange="prevFunc(this,'nationality_op')" disabled>
                                            <option value="">Select Nationality</option>
                                            @foreach ($countries as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row id_div">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <select name="id_type_op" id="id_type_op" class="form-control id_type" onchange="prevFunc(this,'id_type_op')" disabled>
                                            <option value="">Select ID Card</option>
                                            <option>Aadhar</option>
                                            <option>Driving liecense</option>
                                            <option>Voter ID</option>
                                            <option>Pan Card</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="id_number_op" name="id_number_op" placeholder="Enter ID Card Number" onchange="prevFunc(this,'id_number_op')" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control " id="id_file_op" name="id_file_op" onchange="prevFunc(this,'id_file_op')" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-wizard-label nation_div">Visa Details*</div>
                            <div class="row nation_div">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control " id="visa_number_op" name="visa_number_op" onchange="prevFunc(this,'visa_number_op')" placeholder="Enter Visa Number" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control " id="visa_issued_op" name="visa_issued_op" onchange="prevFunc(this,'visa_issued_op')" placeholder="Choose visa issued date" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control " id="visa_expiry_op" name="visa_expiry_op" onchange="prevFunc(this,'visa_expiry_op')" placeholder="Choose visa expiry date" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control " id="visa_file_op" name="visa_file_op" onchange="prevFunc(this,'visa_file_op')" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-wizard-label nation_div">Passport Details*</div>
                            <div class="row nation_div">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control " id="passport_number_op" name="passport_number_op" onchange="prevFunc(this,'passport_number_op')" placeholder="Enter Passport Number" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control " id="passport_file_op" name="passport_file_op" onchange="prevFunc(this,'passport_file_op')" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Educational Qualifications*</div>
                                    <div class="form-group">
                                        <select name="education_op" id="education_op" class="form-control" onchange="prevFunc(this,'education_op')" disabled>
                                            <option value="">Select Qualifications</option>
                                            <option>Graduated</option>
                                            <option>Post Graduated</option>
                                            <option>B.ed</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Date of Joining*</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" name="doj_op" id="doj_op" placeholder="Enter DOB" disabled>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Department*</div>
                                    <div class="form-group">
                                        <select name="department_op" id="department_op" class="form-control" onchange="prevFunc(this,'department_op')" disabled>
                                            @foreach ($departments as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Classes*</div>
                                    <div class="form-group">
                                        <select name="classes_op" id="classes_op" class="form-control" onchange="prevFunc(this,'classes_op')" disabled>
                                            @foreach ($classes as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Division*</div>
                                    <div class="form-group">
                                        <select name="division_op" id="division_op" class="form-control"   disabled>
                                            <option value="">Select Division</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Subjects*</div>
                                    <div class="form-group">
                                        <select name="subject_op" id="subject_op" class="form-control"   disabled>
                                            <option value="">Select Subjects</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Certificate*</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control " id="certificate_file_op" name="certificate_file_op" onchange="prevFunc(this,'certificate_file_op')" disabled>
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





                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
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
                $('.taluk_div').hide();
                $('.id_div').hide();
                $('#visa_issued').datepicker();
                $('#visa_expiry').datepicker();
                $('#doj').datepicker();
                $('#dob').datepicker();
                $('#dob_op').datepicker();
                $('#doj').datepicker();
                $('#doj_op').datepicker();
            });
        </script>
        <script type="text/javascript">
            function prevFunc(input1, output_id) {
                var input2 = document.getElementById(output_id);
                input2.value = input1.value;
            }
            $('#department').change(function(){
                var sel_department = $('#department').val();
                // $.each(sel_department, function(k,v){
                    $('#department_op option[value=' + sel_department + ']').attr('selected', true);
                // });

            });
            $('#classes').change(function(){
                var sel_cla = $('#classes').val();
              
                    $('#classes_op option[value=' + sel_cla + ']').attr('selected', true);
                

            });
            $('#subject').change(function(){
                var sel_sub = $('#subject').val();
           
                    $('#subject_op option[value=' + sel_sub + ']').attr('selected', true);
            

            });
            $('#division').change(function(){
                var sel_sub = $('#division').val();
                
                    $('#division_op option[value=' + sel_sub + ']').attr('selected', true);
                

            });
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
                var def_country = $('#default_country').val();
                $('.id_div').show();
                if (country == def_country) {
                    $('.nation_div').hide();
                } else {
                    $('.nation_div').show();
                }
                if (country == 101) {
                    $('.id_type').html('option value="">Select ID Card</option><option>Aadhar</option><option>Driving liecense</option><option>Voter ID</option><option>Pan Card</option>');
                } else {
                    $('.id_type').html('option value="">Select ID Card</option><option>National Card</option><option>Driving liecense</option><option>Voter ID</option><option>Pan Card</option>');
                }
            });
            $("#country").change(function() {
                var country = $(this).val();
                if (country == 101) {
                    $('.taluk_div').show();
                } else {
                    $('.taluk_div').hide();
                }
            });
            $("#classes").change(function() {
                var classes = $(this).val();
                alert(classes);
                $.ajax({
                    type: "POST",
                    url: "{{route('selectSubjects')}}",
                    data: {
                        'classes': classes
                    },
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            var html = '<option value="">Select Subjects</option>';
                            $.each(data.subjects, function(k, v) {
                                html = html + "<option value=" + v.id + ">" + v.name + "</option>";
                            });
                            $('#subject').html(html);
                            $('#subject_op').html(html);
                        } else {

                        }
                    }
                });
            });
            $("#classes").change(function() {
                var classes = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{route('selectDivision')}}",
                    data: {
                        'classes': classes
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
                            $('.form-wizard-submit').prop('disabled', true);
                            jQuery(this).siblings(".wizard-form-error").slideUp();
                            var form_data = new FormData(document.getElementById('reg_form'));
                            $.ajax({
                                type: "POST",
                                url: "{{route('saveTeacher')}}",
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
                                        $('.form-wizard-submit').prop('disabled', false);
                                        window.location.href = "{{ url('admin/teacher/') }}";
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
            $('#teacher-menu').addClass('active');
        </script>
        @endsection
