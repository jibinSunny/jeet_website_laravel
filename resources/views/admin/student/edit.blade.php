@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> Edit Student</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-laptop"></i> Dashboard</a></li>
            <li class="active">Edit Student</li>
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
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-wizard-label">First Name</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname" name="fname" placeholder="Enter First Name" value="{{ $teacher->first_name }}"  >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm4">
                                            <div class="form-wizard-label">Middle Name</div>
                                            <div class="form-group">
                                                <input type="text" class="form-control wizard-required" id="mname" name="mname" onchange="prevFunc(this,'mname_op')" value="{{ $teacher->middle_name }}">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-wizard-label">Last Name</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="lname" name="lname" placeholder="Enter Last Name" value="{{ $teacher->last_name }}"  >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Guardian Name</div>
                                    <div class="form-group">
                                        <select onchange="prevFunc(this,'parent_op')" class="form-control wizard-required" name="parent" id="parent">
                                            <option value="">Select Parent</option>
                                            @foreach ($parents as $item)
                                            <option value="{{ $item->id }}" @if($teacher->parent == $item->id) selected @endif >{{ $item->first_name }} {{ $item->last_name }}</option>
                                            @endforeach

                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-wizard-label">Email</div>
                                    <div class="form-group">
                                        <input type="email" class="form-control wizard-required" id="email" name="email" placeholder="Enter Email" value="{{ $teacher->email }}" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
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
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <div class="form-wizard-label">DOB</div>
                                        <input type="text" class="form-control" name="dob" id="dob" placeholder="Enter DOB"  value="{{ $teacher->dob }}" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Gender</div>
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="female" @if($teacher->gender == 'female') selected @endif >Female</option>
                                            <option value="male" @if($teacher->gender == 'male') selected @endif >Male</option>
                                            <option value="N/A" @if($teacher->gender == 'N/A') selected @endif >Not Specified</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Blood Group</div>
                                        <select class="form-control" name="blood" id="bg">
                                            <option value="">Select BG</option>
                                            <option @if($teacher->blood == 'A+') selected @endif >A+</option>
                                            <option @if($teacher->blood == 'A-') selected @endif >A-</option>
                                            <option @if($teacher->blood == 'B+') selected @endif >B+</option>
                                            <option @if($teacher->blood == 'B-') selected @endif >B-</option>
                                            <option @if($teacher->blood == 'O+') selected @endif >O+</option>
                                            <option @if($teacher->blood == 'O-') selected @endif >O-</option>
                                            <option @if($teacher->blood == 'AB+') selected @endif >AB+</option>
                                            <option @if($teacher->blood == 'AB-') selected @endif >AB-</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-wizard-label">Address</div>
                                <textarea type="textarea" class="form-control" id="address" name="address" rows="3">{{ $teacher->address }}</textarea>
                                <div class="wizard-form-error"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">House name / Flat No*</div>
                                        <input type="text" class="form-control" id="house" name="house" placeholder="Enter House name / Flat No" value="{{ $teacher->house }}">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Place / Street*</div>
                                        <input type="text" class="form-control" id="place" name="place" placeholder="Enter Place / Street" value="{{ $teacher->place }}">
                                        <div class="wizard-form-error"></div>
                                    </div>
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
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">District*</div>
                                        <input type="text" class="form-control" id="district" name="district" placeholder="Enter District" value="{{ $teacher->district }}" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Post / Zip code*</div>
                                        <input type="text" class="form-control" id="post" name="post" placeholder="Enter Post / Zip code" value="{{ $teacher->post }}">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Taluk*</div>
                                        <input type="text" class="form-control" id="taluk" name="taluk" placeholder="Enter Taluk" value="{{ $teacher->taluk }}">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-wizard-label">Village*</div>
                                        <input type="text" class="form-control" id="village" name="village" placeholder="Enter Village" value="{{ $teacher->village }}">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <select name="id_type" id="id_type" class="form-control">
                                            <option value="">Select ID Card</option>
                                            <option @if($teacher->id_card == 'Aadhar') selected @endif>Aadhar</option>
                                            <option @if($teacher->id_card == 'Driving liecense') selected @endif>Driving liecense</option>
                                            <option @if($teacher->id_card == 'Voter ID') selected @endif>Voter ID</option>
                                            <option @if($teacher->id_card == 'Pan Card') selected @endif>Pan Card</option>
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
                                        <input type="file" class="form-control" id="id_file" name="id_file" onchange="prevFunc(this,'id_file  ')" value="{{ $teacher->id_file }}">
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
                            <div class="form-wizard-label nation_div">Visa Details*</div>
                            <div class="row nation_div">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="visa_number" name="visa_number" value="{{ $teacher->id_number }}" placeholder="Enter Visa Number"  >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="visa_issued" name="visa_issued"  placeholder="Choose visa issued date" value="{{ $teacher->visa_issued }}">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="visa_expiry" name="visa_expiry" placeholder="Choose visa expiry date" value="{{ $teacher->visa_expiry }}">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="file" class="form-control" id="visa_file" name="visa_file">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-wizard-label nation_div">Passport Details*</div>
                            <div class="row nation_div">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="passport_number" name="passport_number" value="{{ $teacher->passport_number }}" placeholder="Enter Passport Number"  >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="file" class="form-control" id="passport_file" name="passport_file" >
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="form-group">
                                    <div class="form-wizard-label">Religion*</div>
                                    <select name="religion" id="religion" class="form-control " onchange="prevFunc(this,'religion_op')">
                                        <option value="">Select Religion</option>
                                             @foreach ($religions as $item)
                                            <option value="{{ $item->id }}" @if($teacher->religion == $item->id) selected @endif>{{ $item->name }}</option>
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
                                            @foreach ($castes as $item)
                                            <option value="{{ $item->id }}" @if($teacher->caste == $item->id) selected @endif >{{ $item->name }}</option>
                                            @endforeach
                                    </select>
                                    <div class="wizard-form-error"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="form-group">
                                    <div class="form-wizard-label">Physical Disabled*</div>
                                    <select name="physical" id="physical" class="form-control " onchange="prevFunc(this,'physical_op')">
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
                                                <div class="form-wizard-label">Aadhar Certificate*</div>
                                                <input type="file" class="form-control " id="adhar_file" name="adhar_file" onchange="prevFunc(this,'aadhar_file_op')">
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
                                                    <option value="{{ $item->id }}" @if($teacher->department == $item->id) selected @endif >{{ $item->name }}</option>
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
                                                    <option value="{{ $item->id }}" @if($teacher->class == $item->id) selected @endif >{{ $item->name }}</option>
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
                                                    @foreach ($divisions as $item)
                                                    <option value="{{ $item->id }}" @if($teacher->division == $item->id) selected @endif >{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Optional Subject(if any)</div>
                                                <input type="text" class="form-control wizard-required" id="opt_subject" name="opt_subject"value="{{ $teacher->opt_subject }}"  onchange="prevFunc(this,'opt_subject_op')" placeholder="Enter Optional Subject Name(if any)">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Registel Number*</div>
                                                <input type="text" class="form-control" id="reg_number" name="reg_number"value="{{ $teacher->reg_number }}" onchange="prevFunc(this,'reg_number_op')" placeholder="Enter Register Number">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-wizard-label">Roll Number*</div>
                                                <input type="text" class="form-control" id="roll_number" name="roll_number"value="{{ $teacher->roll_number }}" onchange="prevFunc(this,'roll_number_op')" placeholder="Enter Roll Number">
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
                                                            <input type="checkbox" name="curricular[]" id="{{ $extra->name }}" value="{{ $extra->id }}"@if(!empty($stduentextra )) @if(in_array( $extra->id,$stduentextra)) checked @endif @endif>
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
                                                            <input type="checkbox" name="sports[]" id="{{ $sport->name }}"  value="{{ $sport->id }}"@if(!empty($stduentextra )) @if(in_array( $sport->id,$stduentsport)) checked @endif @endif>
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
                                                            <input type="checkbox" name="arts[]" id="{{ $art->name }}" value="{{ $art->id }}"@if(!empty($stduentart )) @if(in_array( $art->id,$stduentart)) checked @endif @endif>
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
                                                            <input type="checkbox" name="musics[]" id="{{ $music->name }}"  value="{{ $music->id }}"@if(!empty($stduentmusic )) @if(in_array( $music->id,$stduentmusic)) checked @endif @endif>
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
                                                @if($teacher->gov_sub =="yes")
                                                    <div class="wizard-form-radio">
                                                        <input name="gov_sub" id="gov_yes" type="radio" onchange='$("#gov_yes_op").attr("checked", "checked");' value="yes"checked>
                                                        <label for="male">Yes</label>
                                                    </div>
                                                    <div class="wizard-form-radio">
                                                        <input name="gov_sub" id="gov_no" type="radio" onchange='$("#gov_no_op").attr("checked", "checked");' value="no">
                                                        <label for="female1">No</label>
                                                    </div>
                                                    @else
                                                    <div class="wizard-form-radio">
                                                        <input name="gov_sub" id="gov_yes" type="radio" onchange='$("#gov_yes_op").attr("checked", "checked");' value="yes">
                                                        <label for="male">Yes</label>
                                                    </div>
                                                    <div class="wizard-form-radio">
                                                        <input name="gov_sub" id="gov_no" type="radio" onchange='$("#gov_no_op").attr("checked", "checked");' value="no"checked>
                                                        <label for="female1">No</label>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
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
                        url:"{{route('saveStudent')}}",
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
                            // alert(response);
                            if (response.status == 1) {
                                toastr.success('success', 'Successful');
                                // $('.form-wizard-submit').prop('disabled', false);
                                window.location.href ="{{ url('admin/student/') }}";
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
            $('#student-menu').addClass('active');
        </script>
        @endsection
