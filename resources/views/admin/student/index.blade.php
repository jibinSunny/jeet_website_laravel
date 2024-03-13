@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> Student</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-laptop"></i> Dashboard</a></li>
            <li class="active">Student</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                    <h5 class="page-header">
                                <a href="{{ route('newStudent') }}"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Add Student
                                </a>
                    </h5>

                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#all" aria-expanded="true">All Students</a></li>
                        </ul>



                        <div class="tab-content">
                            <div id="all" class="tab-pane active">
                                <div id="hide-table">
                                    <table id="studentSort" class="table table-bordered table-hover dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th class="col-sm-1">#</th>
                                                <th class="col-sm-2">Photo</th>
                                                <th class="col-sm-2">Name</th>
                                                <th class="col-sm-2">Phone</th>
                                                <th class="col-sm-2">Email</th>
                                                <th class="col-sm-1">Status</th>
                                                <th class="col-sm-2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($students as $item)
                                                <tr>
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td><td><img onerror="this.onerror=null;this.src='{{asset('img/placeholder.png')}}';" src="{{ asset('user-files/student/profile/'.$item->code."/".$item->profile_image) }}" style="width: 65px;"></td>
                                                        <td >{{ $item->first_name }} {{ $item->last_name }}</td>
                                                        <td >{{ $item->phone }}</td>
                                                        <td >{{ $item->email }}</td>
                                                        <td ><div class="onoffswitch-small" id="{{ $item->id }}">
                                                            <input type="checkbox" id="myonoffswitch{{ $item->id }}" class="onoffswitch-small-checkbox" name="paypal_demo" @if($item->active ==1)  checked @endif>
                                                            <label for="myonoffswitch{{ $item->id }}" class="onoffswitch-small-label">
                                                                <span class="onoffswitch-small-inner"></span>
                                                                <span class="onoffswitch-small-switch"></span>
                                                            </label>
                                                        </div></td>
                                                        <td >
                                                            <a href="{{route('viewStudent',['code'=> $item->code])}}" class="btn btn-warning btn-xs mrg" >View</a>
                                                            <a href="javascript:;" class="btn btn-success btn-xs mrg" onclick="inviteStudent({{ $item->code }})" >Invite</a>
                                                            <a href="{{route('editStudent',['code'=> $item->id])}}" class="btn btn-danger  btn-xs mrg">Edit</a>
                                                            <a href="" class="btn btn-primary btn-xs mrg mt-1"  >Generate ID Card</a>
                                                        </td>
                                                        </tr>
                                            @endforeach
                        </tbody>
                                    </table>
                                </div>

                            </div>


                        </div>
                    </div> <!-- nav-tabs-custom -->
            </div> <!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->
@endsection
@section('scripts')
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
    function inviteStudent(code){
      $.ajax({
                type: 'POST',
                url: "{{ route('inviteStudent') }}",
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
<script>
    $('#student-menu').addClass('active');
</script>
@endsection




