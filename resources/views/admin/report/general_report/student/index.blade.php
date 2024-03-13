@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-classreport"></i>Student Report</h3>

        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashbaord</a></li>
            <li class="active"> Student Report</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <form id='mainForm' method="POST" action="{{ route('studentReport') }}">
              @csrf
                <div class="col-sm-12">
                    <div class="form-group col-sm-4" id="classesDiv">
                        <label>Report for<span class="text-red"> * </span></label>
                        <select name="report_for" id="report_for"  class="form-control select2" tabindex="-1">
                            <option selected disabled>Choose  One</option>
                            <option {{"Arts" ==$report_for ? 'selected' :''}}>Arts</option>
                            <option {{"Sports" ==$report_for ? 'selected' :''}}>Sports</option>
                            <option {{"Extra Curricular Activity" ==$report_for ? 'selected' :''}}>Extra Curricular Activity</option>
                            <option {{"Music" ==$report_for ? 'selected' :''}}>Music</option>
                            <option {{"Goverment Subsidies" ==$report_for ? 'selected' :''}}>Goverment Subsidies</option>
                            <option {{"Blood Group" ==$report_for ? 'selected' :''}}>Blood Group</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4" id="artDiv"style="display:none">
                        <label>Art <span class="text-red"> * </span></label>
                        <select id="art" name="art" class="form-control select2">
                        <option selected disabled>Select Art</option>
                        @foreach($allart as  $row)
                        <option value="{{ $row->id}}"{{$art ==$row->id ? 'selected' :''}}>{{ $row->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-4" id="sportDiv"style="display:none">
                        <label>Sport <span class="text-red"> * </span></label>
                        <select id="sport" name="sport" class="form-control select2">
                        <option selected disabled>Select Sport</option>
                        @foreach($allsports as  $row)
                        <option value="{{ $row->id}}"{{$sport ==$row->id ? 'selected' :''}}>{{ $row->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-4" id="musicDiv"style="display:none">
                        <label>Music <span class="text-red"> * </span></label>
                        <select id="music" name="music" class="form-control select2">
                        <option selected disabled>Select Music</option>
                        @foreach($allmusic as  $row)
                        <option value="{{ $row->id}}"{{$music ==$row->id ? 'selected' :''}}>{{ $row->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-4" id="extraDiv"style="display:none">
                        <label>Extra Curricular Activity <span class="text-red"> * </span></label>
                        <select id="extra" name="extra" class="form-control select2">
                        <option selected disabled>Select Extra Curricular Activity</option>
                        @foreach($allextra as  $row)
                        <option value="{{ $row->id}}"{{$extra ==$row->id ? 'selected' :''}}>{{ $row->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-4" id="bloodDiv"style="display:none">
                        <label>Blood Group <span class="text-red"> * </span></label>
                        <select id="blood" name="blood" class="form-control select2">
                        <option selected disabled>Select Blood Group</option>
                        <option value="A+"{{"A+" ==$blood ? 'selected' :''}}>A+</option>
                        <option value="A-"{{"A-" ==$blood ? 'selected' :''}}>A-</option>
                        <option value="B+"{{"B+" ==$blood ? 'selected' :''}}>B+</option>
                        <option value="B-"{{"B-" ==$blood ? 'selected' :''}}>B-</option>
                        <option value="O+"{{"O+" ==$blood ? 'selected' :''}}>O+</option>
                        <option value="O-"{{"O-" ==$blood ? 'selected' :''}}>O-</option>
                        <option value="AB+"{{"AB+" ==$blood ? 'selected' :''}}>AB+</option>
                        <option value="AB-"{{"AB-" ==$blood ? 'selected' :''}}>AB-</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4" id="subsidiesDiv"style="display:none">
                        <label>Subsidies<span class="text-red"> * </span></label>
                        <select name="subsidies" id="subsidies" class="form-control select2" tabindex="-1">
                            <option selected disabled>Select Subsidies</option>
                            <option value="yes"{{"yes" ==$subsidies ? 'selected' :''}}>Yes</option>
                            <option value="no"{{"no" ==$subsidies ? 'selected' :''}}>No</option>
                        </select>
                    </div>

                    <div class="form-group col-sm-4">
                        <label>Class <span class="text-red"> * </span></label>
                        <select id="class" name="class" class="form-control select2">
                        <option selected disabled>Select Class</option>
                        @foreach($classes as  $row)
                        <option value="{{ $row->id}}"{{$class_id ==$row->id ? 'selected' :''}}>{{ $row->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-4" id="sectionDiv">
                        <label>Division</label>
                        <select id="division" name="division" class="form-control select2">
                        <option selected disabled>Select Division</option>
                        @if($division_id !="")
                        @foreach($all_division as  $row)
                        <option value="{{ $row->id}}"{{$division_id ==$row->id ? 'selected' :''}}>{{ $row->name}}</option>
                        @endforeach
                        @endif
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <input type="submit" class="btn btn-success bg-lightsky mg-b-10 " style="margin-top: 20px;" value="Submit">

                    </div>
                </div>
            </form>


        </div><!-- row -->
    </div><!-- Body -->

     <div class="box" id="class_report_details">
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
                                        <th class="col-sm-2">Parent</th>
                                        <th class="col-sm-2">Phone</th>
                                        <th class="col-sm-2">Email</th>
                                        <th class="col-sm-1">Status</th>
                                        <th class="col-sm-1">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="all_student">

                                    @foreach($all_report_student as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img onerror="this.onerror=null;this.src='{{asset('uploads/images/default.png')}}';" src="{{ asset('user-files/student/profile/'.$item->code."/".$item->profile_image) }}" style="width: 65px;"></td>
                                                <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                                <td>{{ isset($item->parentname->first_name )?$item->parentname->first_name:''}} {{ isset($item->parentname->last_name )?$item->parentname->last_name:''}} </td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>
                                                    <div class="onoffswitch-small" id="{{ $item->id }}">
                                                        <input type="checkbox" id="myonoffswitch{{ $item->id }}" class="onoffswitch-small-checkbox" name="paypal_demo" @if($item->active ==1)  checked @endif>
                                                        <label for="myonoffswitch{{ $item->id }}" class="onoffswitch-small-label">
                                                            <span class="onoffswitch-small-inner"></span>
                                                            <span class="onoffswitch-small-switch"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{route('studentReportView',['code'=> $item->code])}}" class="btn btn-warning btn-xs mrg" >View</a>
                                                </tr>
                                        @endforeach

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
$('#report_for').change(function() {
    var report = $(this).val();
if(report=="Arts")
{
    $('#artDiv').show();
    $('#sportDiv').hide();
    $('#extraDiv').hide();
    $('#musicDiv').hide();
    $('#bloodDiv').hide();
    $('#subsidiesDiv').hide();
}
else if(report=="Sports")
{
    $('#sportDiv').show();
    $('#extraDiv').hide();
    $('#musicDiv').hide();
    $('#bloodDiv').hide();
    $('#artDiv').hide();
    $('#subsidiesDiv').hide();
}
else if(report=="Extra Curricular Activity")
{
    $('#extraDiv').show();
    $('#sportDiv').hide();
    $('#musicDiv').hide();
    $('#bloodDiv').hide();
    $('#artDiv').hide();
    $('#subsidiesDiv').hide();
}
else if(report=="Music")
{
    $('#musicDiv').show();
    $('#extraDiv').hide();
    $('#sportDiv').hide();
    $('#bloodDiv').hide();
    $('#artDiv').hide();
    $('#subsidiesDiv').hide();
}

else if(report=="Blood Group")
{
    $('#musicDiv').hide();
    $('#extraDiv').hide();
    $('#sportDiv').hide();
    $('#bloodDiv').show();
    $('#artDiv').hide();
    $('#subsidiesDiv').hide();
}
else if(report=="Goverment Subsidies")
{
    $('#musicDiv').hide();
    $('#extraDiv').hide();
    $('#sportDiv').hide();
    $('#bloodDiv').hide();
    $('#artDiv').hide();
    $('#subsidiesDiv').show();
}
});
</script>
<!-- <script>
    var status = '';
    var id = 0;
    $('.onoffswitch-small-checkbox').click(function() {
        if($(this).prop('checked')) {
            status = 'chacked';
            id = $(this).parent().attr("id");
        } else {
            status = 'unchacked';
            id = $(this).parent().attr("id");
        }

        if((status != '' || status != null) && (id !='')) {
            $.ajax({
                type: 'POST',
                url: "{{ route('activeStudent') }}",
                data: "id=" + id + "&status=" + status,
                dataType: "html",
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function(data) {
                    if(data == 'Success') {
                        toastr["success"]("Success")
                        toastr.options = {
                          "closeButton": true,
                          "debug": false,
                          "newestOnTop": false,
                          "progressBar": false,
                          "positionClass": "toast-top-right",
                          "preventDuplicates": false,
                          "onclick": null,
                          "showDuration": "500",
                          "hideDuration": "500",
                          "timeOut": "5000",
                          "extendedTimeOut": "1000",
                          "showEasing": "swing",
                          "hideEasing": "linear",
                          "showMethod": "fadeIn",
                          "hideMethod": "fadeOut"
                        }
                    }else {
                        toastr["error"]("Error")
                        toastr.options = {
                          "closeButton": true,
                          "debug": false,
                          "newestOnTop": false,
                          "progressBar": false,
                          "positionClass": "toast-top-right",
                          "preventDuplicates": false,
                          "onclick": null,
                          "showDuration": "500",
                          "hideDuration": "500",
                          "timeOut": "5000",
                          "extendedTimeOut": "1000",
                          "showEasing": "swing",
                          "hideEasing": "linear",
                          "showMethod": "fadeIn",
                          "hideMethod": "fadeOut"
                        }
                    }
                }
            });
        }
    });
</script> -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>
  $("form#mainForm").validate({
                normalizer: function(value) {
                    return $.trim(value);
                },
                rules: {
                    class: {
                        required: true
                    },

                },
                messages: {
                    class: {
                        required: "class is required"
                    },

                },
            });

</script>
<script>
      var question = <?php print_r(json_encode($report_for)) ?>;
      if(question =="Arts")
       {
        $('#artDiv').show();
       }
       else if(question =="Sports")
       {
        $('#sportDiv').show();
       }
       else if(question =="Extra Curricular Activity")
       {
        $('#extraDiv').show();
       }
       else if(question =="Music")
       {
        $('#musicDiv').show();
       }
       else if(question =="Blood Group")
       {
        $('#bloodDiv').show();
       }
       else if(question =="Goverment Subsidies")
       {
        $('#subsidiesDiv').show();
       }
 </script>
@endsection
