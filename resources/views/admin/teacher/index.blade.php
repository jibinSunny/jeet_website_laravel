@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-teachers"></i> Teacher</h3>


        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Teacher</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="page-header"><a href="{{ route('newTeacher') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Add a teacher</a>
                </h5>

                <div id="hide-table">
                    <!-- <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer"> -->
                    <table class="table table-bordered table-hover dataTable no-footer">
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
                            @foreach($teachers as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img onerror="this.onerror=null;this.src='{{asset('uploads/images/default.png')}}';" src="{{ asset('user-files/teacher/profile/'.$item->code."/".$item->profile_image) }}" style="width: 65px;"></td>
                                    <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->email }}</td>
                                    {{-- <td>@if($item->active ==1) Active @else Inactive @endif</td> --}}
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
                                        <a href="{{route('viewTeacher',['code'=>$item->code])}}" class="btn btn-warning btn-xs mrg" >View</a>
                                        <a href="javascript:;" class="btn btn-success btn-xs mrg" onclick="inviteTeacher({{ $item->code }})" >Invite</a>
                                        <a href="{{route('editTeacher',['code'=> $item->code])}}" class="btn btn-danger  btn-xs mrg">Edit</a>
                                        <a href="" class="btn btn-primary btn-xs mrg mt-1"  >Generate ID Card</a>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

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
              url: "{{ route('activeTeacher') }}",
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
  function inviteTeacher(code){
    $.ajax({
              type: 'POST',
              url: "{{ route('inviteTeacher') }}",
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
    $('#teacher-menu').addClass('active');
</script>
@endsection
