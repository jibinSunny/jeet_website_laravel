@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-classreport"></i> Class Report</h3>

        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashbaord</a></li>
            <li class="active">Class Report</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <form id='category-add-form' method="POST" action="javascript:;">
                <div class="col-sm-12">
                    <div class="form-group col-sm-4" id="classesDiv">
                        <label>Class<span class="text-red"> * </span></label>
                        <select name="class" id="class" class="form-control select2" tabindex="-1">
                            <option selected disabled>Select Class</option>
                            @foreach($classes as $row)
                            <option value="{{ $row->id}}">{{ $row->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-4" id="sectionDiv">
                        <label>Division</label>
                        <select id="division" name="division" class="form-control select2">
                            <option selected disabled>Select Division</option>
                        </select>
                    </div>


                    <div class="col-sm-4">
                        <input type="submit" class="btn btn-success bg-lightsky mg-b-10 " style="margin-top: 20px;" value="Submit">

                    </div>
                </div>
            </form>


        </div><!-- row -->
    </div><!-- Body -->

    <div class="box" id="class_report_details" style="display:none">
        <div class="box-header bg-gray" id="header">
            <h3 class="box-title text-navy"><i class="fa fa-clipboard"></i> Report For Class - One ( Section A )</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div id="printablediv">
            <div class="box-body">
                <div class="row">
                    <!-- <div class="col-sm-12"style="text-align: center;padding: 20px;" id="academic_year"></div> -->
                    <div class="col-sm-12">
                    <div class="reportPage-header">
                        <span class="header" id="headerImage">
                            <p class="bannerLogo">
                                <img src="https://demo.inilabs.net/school/v4.6/uploads/images/site.png">
                            </p>
                        </span>
                        <p class="title">Jeet School Management System</p>
                        <p class="title-desc">Mtipur, Dhaka</p>
                        <p class="title-desc">Academic Year : 2020-2021</p>
                    </div>
                </div>
                    <div class="col-sm-6">
                        <div class="box box-solid " style="border: 1px #ccc solid; border-left: 2px black solid">
                            <div class="box-header bg-gray with-border">
                                <h3 class="box-title text-navy">Class Informations</h3>
                                <ol class="breadcrumb">
                                    <li><i class="fa fa-info fa-2x"></i></li>
                                </ol>
                            </div>
                            <div class="box-body" id="class_informations">


                            </div>
                        </div>

                        <br>

                        <div class="box box-solid " style="border: 1px #ccc solid; border-left: 2px green solid">
                            <div class="box-header bg-gray with-border">
                                <h3 class="box-title text-navy">Subjects And Teachers</h3>
                                <ol class="breadcrumb">
                                    <li><i class="fa fa-book fa-2x"></i></li>
                                </ol>
                            </div>
                            <div class="box-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Teacher</th>
                                        </tr>
                                    </thead>
                                    <tbody id="subjects_and_teachers">

                                        <tr>
                                            <td>Bangla</td>
                                            <td>Dipok Kumar Haldar</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br>

                        <div class="box box-solid " style="border: 1px #ccc solid; border-left: 2px blue solid">
                            <div class="box-header bg-gray with-border">
                                <h3 class="box-title text-navy">Fee Details</h3>
                                <ol class="breadcrumb">
                                    <li><i class="fa fa-pie-chart fa-2x"></i></li>
                                </ol>
                            </div>
                            <div class="box-body">
                                <div id="feetype_chart"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="box box-solid " style="border: 1px #ccc solid; border-left: 2px red solid">
                            <div class="box-header bg-gray with-border">
                                <h3 class="box-title text-navy">Class Teacher</h3>
                                <ol class="breadcrumb">
                                    <li><i class="fa icon-teacher fa-2x"></i></li>
                                </ol>
                            </div>
                            <div class="box-body" id="classteachers">

                            </div>

                        </div>

                        <br>

                        <div class="box box-solid " style="border: 1px #ccc solid; border-left: 2px orange solid">
                            <div class="box-header bg-gray with-border">
                                <h3 class="box-title text-navy">Fee types Collection</h3>
                                <ol class="breadcrumb">
                                    <li><i class="fa fa-dollar fa-2x"></i></li>
                                </ol>
                            </div>
                            <div class="box-body">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Fee type</th>
                                            <th>Collection</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Books Fine</td>
                                            <td>12000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 text-center footerAll">
                    </div>
                </div><!-- row -->
            </div><!-- Body -->
        </div>
    </div>

</div><!-- /.box -->


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
    $('#report-menu').addClass('active')
    $('#general_reports').addClass('active')
</script>

<script type="text/javascript">
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
        },
        messages: {
            class: {
                required: 'name is required',
            },

        },
        submitHandler: function(form) {
            var selectClass = $('#class').val();
            var division = $('#division').val();
            $.ajax({
                type: "POST",
                url: '{{route("classReportView")}}',
                data: {
                    select_class: selectClass,
                    division: division
                },
                dataType: "json",
                async: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    //   alert(data[0]);
                    if (data) {
                        // alert(data.class_teacher_details.length);
                        $('#class_report_details').show();
                        $("#classteachers").empty();
                        $("#header").empty();
                        $("#class_informations").empty();
                        $("#academic_year").empty();
                        let html = ''
                        html = '(Division '
                        for (var i = 0; i < data.class_details.length; ++i) {
                            html += `${data.class_details[i].name}, `

                        }
                        html += ')'


                        $("#header").append('<h3 class="box-title text-navy"><i class="fa fa-clipboard"></i> Report For Class - ' + data.class_details[0]['classname']['name'] + html + '</h3>');
                        $("#class_informations").append('<span class="text-blue">Number of Students : ' + data.class_students_count + '</span><br> <span class="text-blue">Total Subject Assigned : ' + data.class_subject_count + '</span>');
                        $("#academic_year").append('Jeet<br>Academic Year:' + data.academic_year + '');

                        for (var i = 0; i < data.class_teacher_details.length; ++i) {

                            $("#classteachers").append('<section class="panel"><div class="profile-db-head bg-maroon-light"><a><img src="https://demo.inilabs.net/school/v4.6/uploads/images/default.png" alt=""></a><h1>' + data.class_teacher_details[i].first_name + ' '+ data.class_teacher_details[i].last_name+ '</h1></div> <table class="table table-hover"><tbody> <tr><td><i class="fa fa-phone text-maroon-light"></i></td><td>Phone</td><td>'+data.class_teacher_details[i].phone +'</td></tr><tr><td><i class="fa fa-envelope text-maroon-light"></i></td><td>Email</td><td>'+data.class_teacher_details[i].email + '</td></tr><tr><td><i class=" fa fa-globe text-maroon-light"></i></td><td>Address</td><td>'+ data.class_teacher_details[i].address+ '</td></tr></tbody></table></section>');


                        }
                    }


                },
                error: function() {}
            });
            return false;
        }
    });
</script>
@endsection