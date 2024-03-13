@extends('layouts.admin')
@section('content')
<style>
    input[type="checkbox"] {
        display: block;
    }
</style>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-classreport"></i>Promotion</h3>

        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashbaord</a></li>
            <li class="active">Promotion</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <form id='category-add-form' method="POST" action="javascript:;">
                <div class="col-sm-12">
                    <div class="form-group col-sm-6" id="classesDiv">
                        <label>Class<span class="text-red"> * </span></label>
                        <select name="class" id="class" class="form-control select2" tabindex="-1">
                            <option selected disabled>Select Class</option>
                            @foreach($classes as $row)
                            <option value="{{ $row->id}}">{{ $row->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-6" id="sectionDiv">
                        <label>Division<span class="text-red"> * </span></label>
                        <select id="division" name="division" class="form-control select2">
                            <option selected disabled>Select Division</option>
                        </select>
                    </div>



                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-success bg-lightsky mg-b-10 " style="margin-top: 20px;float: right;" value="Submit">

                    </div>
                </div>
            </form>
            <div class="box-body">
                <!-- <form  id="mainForm" method="POST" action="{{ route('savestudentPremotion') }}">
                @csrf -->
                <div class="row">
                    <div class="col-sm-12">


                        <div id="student_table" style="display:none">
                            <div class="box-header bg-gray" id="header">

                            </div>
                            <table id="" class="table table-striped table-bordered table-hover dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th class="col-sm-1">#</th>
                                        <th class="col-sm-2">Photo</th>
                                        <th class="col-sm-2">Name</th>
                                        <th class="col-sm-2">Phone</th>
                                        <th class="col-sm-2">Email</th>
                                        <th class="col-sm-1">Class</th>
                                        <th class="col-sm-1">Division</th>
                                        <th class="col-sm-1">Status</th>
                                        <th class="col-sm-2" id="all_ststus"></th>
                                    </tr>
                                </thead>
                                <tbody id="all_student">



                                </tbody>

                            </table>
                            <div class="col-sm-12" id="nodata">
                            </div>
                            <div class="col-sm-12" id="submit_model">
                                <input type="submit" class="btn btn-success bg-lightsky mg-b-10 " onClick="student()" style="margin-top: 20px;float: right;" value="Submit">
                            </div>
                        </div>
                        <!-- Modal-->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <form method="post" id="mainForm" class="form-horizontal" action="{{ route('savestudentPremotion') }}" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" style="margin-left: 160px;">Select Class & Division For Promotion</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group col-sm-6" style="padding:20px">
                                                        <label>Promotion Type<span class="text-red"> * </span></label>
                                                        <select name="promotion_type" id="promotion_type" class="form-control select2" tabindex="-1">
                                                            <option selected disabled>Select Promotion Type</option>
                                                            <option value="1">Terminate</option>
                                                            <option value="2">Next Class</option>


                                                        </select>
                                                    </div>

                                                    <div class="form-group col-sm-6"id="class2" style="padding:20px;display:none;">
                                                        <label>Class<span class="text-red"> * </span></label>
                                                        <select name="class1" id="class1" class="form-control select2" tabindex="-1">
                                                            <option selected disabled>Select Class</option>
                                                            @foreach($classes as $row)
                                                            <option value="{{ $row->id}}">{{ $row->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-6"id="division2" style="padding:20px;display:none;">
                                                        <label>Division<span class="text-red"> * </span></label>
                                                        <select id="division1" name="division1" class="form-control select2">
                                                            <option selected disabled>Select Division</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-6"id="academic_year1" style="padding:20px;display:none;">
                                                        <label>Academic Year<span class="text-red"> * </span></label>
                                                        <select name="academic_year" id="academic_year" class="form-control select2" tabindex="-1">
                                                            <option selected disabled>Select Academic Year</option>
                                                            @foreach($academic_year as $row)
                                                            <option value="{{ $row->id}}">{{ $row->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="" id="ascadame">
                                                    </div>
                                                    <div class="" id="stu">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <div class="col-sm-4 col-sm-offset-2 pull-right">

                                                <button class="btn btn-white" type="submit" id="btn" style="background-color: #1ab394; border-color: #1ab394; margin-top:-16px; color: #FFF">Save
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- Modal content-->
                    </div> <!-- col-sm-12 -->
                </div><!-- row -->
                <!-- </form>   -->
            </div><!-- Body -->

        </div><!-- row -->
    </div><!-- Body -->





    @endsection
    @section('scripts')
    <!--jQuery Validate -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <!--toastr Validate -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!--alert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script>
        $('#premotionlist').addClass('active')
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            @if(Session::has('success'))
            toastr.success('{{ Session::get('
                success ') }}', 'Successful');
            @endif
            @error('name')
            toastr.error('{{ $message }}');
            @enderror
        });
    </script>
    <script>
        $("form#mainForm").validate({
            normalizer: function(value) {
                return $.trim(value);
            },
            rules: {
                class1: {
                    required: true
                },
                division1: {
                    required: true
                },
                academic_year: {
                    required: true
                },

            },
            messages: {
                class1: {
                    required: "class is required"
                },
                division1: {
                    required: "division is required"
                },
                academic_year: {
                    required: "academic_year is required"
                },

            },
        });
    </script>
    <script>
        function student() {
            var array = new Array();
            $('input[name="std_id"]:checked').each(function() {
                array.push(this.value);
            });

            $("#myModal").modal();

            var std_id = $("input[name=std_id").val();
            $("#stu").empty();
            $("#stu").append(' <input type="hidden" class="form-control"  name="std_id" value="' + array + '">');


        }
    </script>

    <script type="text/javascript">
        $('#promotion_type').change(function() {
         var promotion_type = $(this).val();
        if(promotion_type=="1")
        {
            $('#class2').hide();
            $('#division2').hide();
            $('#academic_year1').hide();

        }
        else
        {
            $('#class2').show();
            $('#division2').show();
            $('#academic_year1').show();
        }

        });            
                    $('#class').change(function() {
                        var courseID = $(this).val();

                        if (courseID) {
                            if (courseID == "0") {
                                $('#division').hide();
                            } else {
                                $.ajax({
                                    type: "GET",
                                    url: "{{url('admin/timetable/division/list')}}?categoryId=" + courseID,
                                    success: function(res) {
                                        if (res) {
                                            $("#division").empty();
                                            $("#division").append('<option selected disabled>Select Division</option>');

                                            for (var i = 0; i < res.length; ++i) {

                                                $("#division").append('<option value="' + res[i].id + '">' + res[i].name + '</option>');
                                            }

                                        } else {
                                            $("#division").empty();
                                        }
                                    }
                                });
                            }
                        } else {
                            $("#division").empty();

                        }
                    });
    </script>
    <script type="text/javascript">
        $('#class1').change(function() {
            var courseID = $(this).val();
            // alert("dsacvfds");

            if (courseID) {
                if (courseID == "0") {
                    $('#division').hide();
                } else {
                    $.ajax({
                        type: "GET",
                        url: "{{url('admin/timetable/division/list')}}?categoryId=" + courseID,
                        success: function(res) {
                            if (res) {
                                $("#division1").empty();
                                $("#division1").append('<option selected disabled>Select Division</option>');

                                for (var i = 0; i < res.length; ++i) {

                                    $("#division1").append('<option value="' + res[i].id + '">' + res[i].name + '</option>');
                                }

                            } else {
                                $("#division1").empty();
                            }
                        }
                    });
                }
            } else {
                $("#division1").empty();

            }
        });
    </script>
    <script>
        $("#category-add-form").validate({
            normalizer: function(value) {
                return $.trim(value);
            },
            ignore: [],
            errorClass: "invalid",
            rules: {
                class: {
                    required: true,
                },
                division: {
                    required: true,
                },

            },
            messages: {
                class: {
                    required: 'name is required',
                },
                division: {
                    required: 'division is required',
                }

            },
            submitHandler: function(form) {
                var selectClass = $('#class').val();
                var division = $('#division').val();
                $.ajax({
                    type: "POST",
                    url: '{{route("studentPremotion")}}',
                    data: {
                        select_class: selectClass,
                        division: division,
                    },
                    dataType: "json",
                    async: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        //  alert(data.class_details['Classname']['name'][0]);
                        if (data) {
                            // alert(data.class_teacher_details.length);

                            $("#header").empty();
                            $("#student_table").show();
                            $("#all_student").empty();
                            $("#all_ststus").empty();
                            $("#nodata").empty();


                            $("#header").append('<h3 class="box-title text-navy"><i class="fa fa-clipboard"></i> Promotion For Class - ' + data.class_details['name'] + ' Division(' + data.division_details['name'] + ')</h3>');
                            $("#all_ststus").append('<label class="checkbox-inline i-checks"><input type="checkbox"value="' + data.student_details.length + '" id="checkAll"> Select All </label>');
                            if (data.student_details.length > 0) {
                                $("#nodata").empty();
                                $("#submit_model").show();
                                for (var i = 0; i < data.student_details.length; ++i) {

                                    if (data.student_details[i]['active'] == 1) {
                                        status = "<span class='btn btn-success btn-xs'>Active</span>";
                                    } else {
                                        status = "<span class='btn btn-danger btn-xs '>InActive</span>";
                                    }
                                    $("#all_student").append(`<tr>
                                    <td>${i+1}</td>
                                    <td><img onerror="this.onerror=null;this.src='{{asset('img/placeholder.png')}}';" src=""{{ URL::asset('user-files/student/profile/') }}//${data.student_details[i]['code']}/${data.student_details[i]['profile_image']}" style="width: 65px;"></td>
                                    <td>${data.student_details[i]['first_name']} ${data.student_details[i]['middle_name']} ${data.student_details[i]['last_name']}</td>
                                    <td>${data.student_details[i]['phone']}</td>
                                    <td>${data.student_details[i]['email']}</td>
                                    <td>${data.student_details[i]['classname']['name']}</td>
                                    <td>${data.student_details[i]['divisions']['name']}</td>
                                    <td>${status}</td>
                                    <td>
                                    <input name="std_id"id="new${i}" class="checkbox_clients" type="checkbox" value="${data.student_details[i]['id']}">

                                    </tr> `);

                                }
                            } else {
                                $("#submit_model").hide();
                                $("#nodata").append(`<div class="col-sm-12"style="font-size: 12px;text-align: center;"> No Data Available</th> `);

                            }

                        }


                    },
                    error: function() {}
                });
                return false;
            }
        });
    </script>
    <script type="text/javascript">
        $(document).on('change', '#checkAll', function(e) {
            var count = $(this).val();
            if ($(this).is(":checked")) {
                for (var k = 0; k < count; k++) {
                    $('#new' + k + '').attr('checked', true).prop('checked', true);
                }
            } else {
                for (var k = 0; k < count; k++) {
                    $('#new' + k + '').removeAttr('checked').prop('checked', false);
                }
            }
        });
    </script>
    @endsection