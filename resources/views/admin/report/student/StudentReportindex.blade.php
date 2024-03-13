@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-classreport"></i> Student Report</h3>

        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashbaord</a></li>
            <li class="active"> Student Report</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <form id='category-add-form' method="POST" action="javascript:;">
                <div class="col-sm-12">
                    <div class="form-group col-sm-4" id="classesDiv">
                        <label>Report For<span class="text-red"> * </span></label>
                        <select name="class" id="class" class="form-control select2" tabindex="-1">
                            <option selected disabled>Choose One</option>
                            <option value=""></option>
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

    <div class="box" id="class_report_details"style="display:none">
        <div class="box-header bg-gray" id="header">
            <h3 class="box-title text-navy"><i class="fa fa-clipboard"></i> Report For Class - One ( Section A )</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
        <div class="row">

        <div id="printablediv">
            <!-- form start -->
        <div class="box-body">
            <div class="row">
            <div class="col-sm-12"style="text-align: center;padding: 20px;" id="academic_year">sdvdsvdvd</div>
                <!-- <div class="col-sm-12">
                </div> -->
                <!-- <div class="col-sm-12">
                    <h5 class="pull-left">dscfds</h5>
                    <h5 class="pull-right">dsfdsfdff</h5>
                </div> -->
                <div class="col-sm-12">
                    <div id="hide-table">
                        <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                            <thead>
                            <tr>
                            <th class="col-sm-1">#</th>
                            <th class="col-sm-2">Photo</th>
                            <th class="col-sm-2">Name</th>
                            <th class="col-sm-2">Phone</th>
                            <th class="col-sm-2">Email</th>
                            <th class="col-sm-1">Status</th>
                            </tr>
                            </thead>
                            <tbody id="all_student">

                            </tbody>
                        </table>
                    </div>
                        <!-- <div class="callout callout-danger">
                            <p><b class="text-info"></b></p>
                        </div> -->
                </div>
                <!-- <div class="col-sm-12 text-center footerAll"></div> -->
            </div><!-- row -->
        </div><!-- Body -->
    </div>

        </div><!-- row -->
    </div><!-- Body -->
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
                url: '{{route("studentReportView")}}',
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
                        $('#class_report_details').show();
                        $("#header").empty();
                        $("#all_student").empty();
                        $("#academic_year").empty();
                          if(data.division =="")
                          {
                            $("#header").empty();
                            $("#header").append('<h3 class="box-title text-navy"><i class="fa fa-clipboard"></i> Report For Class - ' + data.class_details[0]['classname']['name'] +'(Division :All Divisions)</h3>');
                          }

                          else{
                            $("#header").empty();
                            $("#header").append('<h3 class="box-title text-navy"><i class="fa fa-clipboard"></i> Report For Class - ' + data.class_details[0]['classname']['name'] +'(Division: ' + data.class_details[0]['divisions']['name'] +')</h3>');
                          }


                        $("#academic_year").append('Jeet<br>Academic Year:' + data.academic_year + '');

                        for (var i = 0; i < data.class_details.length; ++i) {
                            if(data.class_details[i]['active'] == 1)
                            {
                                active="Active";
                            }
                            else
                            {
                                active="Inactive";
                            }

                            $("#all_student").append(`<tr><td>${i+1}</td>
                            <td> <img onerror="this.onerror=null;this.src='{{asset('img/placeholder.png')}}';" src="{{ URL::asset('user-files/teacher/profile/') }}/${data.class_details[i]['code']}"/"${data.class_details[i]['profile_image']}" style="width: 65px;"></td>
                            <td>${data.class_details[i]['first_name']} ${data.class_details[i]['last_name']}</a></td>
                            <td>${data.class_details[i]['phone']}</td>
                            <td>${data.class_details[i]['email']}</td>
                            <td>${active}</td></tr> `);


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
