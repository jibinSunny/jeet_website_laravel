@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-classreport"></i> Attandance Report</h3>

        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashbaord</a></li>
            <li class="active">Attandance Report</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
        <form id='category-add-form' method="POST" action="javascript:;">
              @csrf
                <div class="col-sm-12">
                   <div class="form-group col-sm-4" id="user_typees">
                        <label>User Type<span class="text-red"> * </span></label>
                        <select name="user_type" id="user_type" class="form-control select2" tabindex="-1">
                            <option selected disabled>Select User Type</option>
                            @foreach($usertype as $row)
                            @if($row->id != 1 && $row->id != 4)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
 


                    <div class="form-group col-sm-4" id="classesDiv"style="display:none">
                        <label>Class<span class="text-red"> * </span></label>
                        <select name="class" id="class" class="form-control select2" tabindex="-1">
                            <option selected disabled>Select Class</option>
                            @foreach($classes as $row)
                            <option value="{{ $row->id}}">{{ $row->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-4" id="sectionDiv"style="display:none">
                        <label>Division</label>
                        <select id="division" name="division" class="form-control select2">
                        <option selected disabled>Select Division</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label>Attandance Type</label>
                        <select id="a_type" name="a_type" class="form-control select2">
                        <option selected disabled>Select Attandance Type</option>
                        <option value="P">Present</option>
                        <option value="LE">Late Present With Excuse</option>
                        <option value="L">Late Present</option>
                        <option value="A">Absent</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                    <label>Date</label></br>
                        <div class="col">
                            <input type="date" class="form-control" id="date" name="date" value=""placeholder="Enter Deadline">
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>

                    <div class="col-sm-4">
                        <input type="submit" class="btn btn-success bg-lightsky mg-b-10 " style="margin-top: 20px;" value="Submit">

                    </div>
                </div>
            </form>


        </div><!-- row -->
    </div><!-- Body -->
    <div class="box" id="attandance_report_details"style="display:none">
        <!-- form start -->
        <div class="box-body">
        <div class="row">

        <div id="printablediv">
            <!-- form start -->
        <div class="box-body">
            <div class="row">
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
                            <th class="col-sm-1">User Type</th>
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
    $('#general_reports').addClass('active')
</script>
 <script>

    $("#category-add-form").validate({
        normalizer: function(value) {
            return $.trim(value);
        },
        ignore: [],
        errorClass: "invalid",
        rules: {
            user_type: {
                required: true,
            },
        },
        rules: {
            a_type: {
                required: true,
            },
        },
        rules: {
            date: {
                required: true,
            },
        },
        messages: {
            user_type: {
                required: 'user_type is required',
            },
            a_type: {
                required: 'a_type is required',
            },
            date: {
                required: 'date is required',
            },

        },
        submitHandler: function(form) {
            var selectClass = $('#class').val();
            var division = $('#division').val();
            var user_type = $('#user_type').val();
            var a_type = $('#a_type').val();
            var date = $('#date').val();
            $.ajax({
                type: "POST",
                url: '{{route("attandanceReportView")}}',
                data: {
                    select_class: selectClass,
                    division: division,
                    user_type: user_type,
                    a_type: a_type,
                    date: date,
                },
                dataType: "json",
                async: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    // alert( data[0]['usertypename']);attandance_report_details
                    if (data) {
                        $('#attandance_report_details').hide();
                        $('#attandance_report_details').show();
                        $('#all_student').empty();
                        for (var i = 0; i < data.length; ++i) {
                            if(data[i]['active']=="1")
                            {
                                status='<span class="btn btn-success btn-xs">Active</span>';
                            }
                            else
                            {
                                status='<span class="btn btn-danger btn-xs">InActive</span>';
                            }

                            $("#all_student").append(`<tr>
                            <td data-title="">${i+1}</td>
                            <td  data-title=""><img onerror="this.onerror=null;this.src='{{asset('img/placeholder.png')}}';" src=""{{ URL::asset('user-files/student/profile/') }}//${data[i]['code']}/${data[i]['profile_image']}" style="width: 65px;"></td>
                            <td data-title="">${data[i]['first_name']} ${data[i]['first_name']}</td>
                            <td data-title="">${data[i]['email']} </td>
                            <td data-title="">${data[i]['phone']} </td>
                            <td data-title="">${status} </td> 
                            <td data-title="">${data[i]['usertypename']['name']} </td></tr>`);
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
   $('#user_type').change(function() {
        var user_type = $(this).val();
        $('#classesDiv').hide();
        $('#sectionDiv').hide();

        if(user_type =="3")
        {
            $('#classesDiv').show();
        }
    
    });

    $('#class').change(function() {
        var courseID = $(this).val();
        $('#sectionDiv').show();
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
@endsection