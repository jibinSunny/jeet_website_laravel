@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-classreport"></i> User Report</h3>

        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashbaord</a></li>
            <li class="active"> User Report</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <form id='mainForm' method="POST" action="{{ route('userReport') }}">
              @csrf
                <div class="col-sm-12">
                    <div class="form-group col-sm-4" id="classesDiv">
                        <label>User Type<span class="text-red"> * </span></label>
                        <select name="user_type" id="user_type" class="form-control select2" tabindex="-1">
                            <option selected disabled>Select User Type</option>
                            @foreach($usertype as $row)
                            @if($row->id != 1 &&  $row->id != 2 &&  $row->id != 3 &&  $row->id != 4)
                            <option value="{{ $row->id}}"{{$usertype_id ==$row->id ? 'selected' :''}}>{{ $row->name}}</option>
                            @endif
                            @endforeach
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
                            <th class="col-sm-2">Phone</th>
                            <th class="col-sm-2">Email</th>
                            <th class="col-sm-2">Type</th>
                            <th class="col-sm-1">Status</th>
                            <th class="col-sm-1">Action</th>
                            </tr>
                            </thead>
                            <tbody id="all_student">    

                         @foreach($all_report_users as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img onerror="this.onerror=null;this.src='{{asset('uploads/images/default.png')}}';" src="{{ asset('user-files/teacher/profile/'.$item->code."/".$item->profile_image) }}" style="width: 65px;"></td>
                                    <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ isset($item->usertypename->name )?$item->usertypename->name:''}}</td>
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
                                        <a href="{{route('viewuserReport',['code'=> $item->code])}}" class="btn btn-warning btn-xs mrg" >View</a>
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
<script>
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
                url: "{{ route('activeUser') }}",
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
    function inviteUser(code){
      $.ajax({
                type: 'POST',
                url: "{{ route('inviteUser') }}",
                data: "code=" + code,
                dataType: "html",
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function(data) {
                    if(data == 'Success') {
                        toastr["success"]("Invited Successfully")
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
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>
  $("form#mainForm").validate({
                normalizer: function(value) {
                    return $.trim(value);
                },
                rules: {
                    user_type: {
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
@endsection