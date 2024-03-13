@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clock-o"></i> Add Hourly Template</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="">Hourly Template</a></li>
            <li class="active">Add Hourly Template</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="post" action="{{ route('saveHourlyTemplate') }}">
                @csrf
                <div class="form-group">
                    <label for="salary_grades" class="col-sm-2 control-label">
                        Usertype <span class="text-red">*</span>
                    </label>
                    <div class="col-sm-6">
                        <select class="form-control" id="usertype" name="usertype">
                            <option value="">Select Usertype</option>
                            @foreach ($usertypes as $item)
                            @if($item->id != 1 && $item->id != 3 && $item->id != 4)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <span class="col-sm-4 control-label" id="salary_grades_error">
                    </span>
                </div>

                <div class="form-group">
                    <label for="user" class="col-sm-2 control-label">
                       Name <span class="text-red">*</span>
                    </label>
                    <div class="col-sm-6">
                        <select class="form-control" id="user" name="user">
                            <option value="">Select User</option>
                        </select>
                    </div>
                    <span class="col-sm-4 control-label" id="user_error">
                    </span>
                </div>
                <div class="form-group">
                        <label for="hourly_grades" class="col-sm-2 control-label">
                           Hourly Grades <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="hourly_grades" name="hourly_grades" value="" >
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="hourly_rate" class="col-sm-2 control-label">
                            Hourly Rate <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="hourly_rate" name="hourly_rate" value="" >
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="Add Hourly Template" >
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $("#usertype").change(function() {
       var usertype = $(this).val();
       $.ajax({
           type: "POST",
           url: "{{route('selectUsers')}}",
           data: {
               'usertype': usertype
           },
           dataType: "json",
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           success: function(data) {
               if (data.status == 1) {
                   if(usertype == 2){
                   var html = '<option value="">Select Teacher</option>';
                   }else{
                   var html = '<option value="">Select User</option>';
                   }
                   $.each(data.users, function(k, v) {
                       html = html + "<option value=" + v.id + ">"+v.first_name+" "+v.last_name+"</option>";
                   });
                   $('#user').html(html);
               } else {
                   var html = '<option value="">Select Teacher</option>';
                   $('#user').html(html);
               }
           }
       });
   });
   </script>
   <script>
       $('#accounts-menu').addClass('active');
       $('#expense-menu').addClass('active');
       $('#payroll-menu').addClass('active');
       $('#hourly-template-menu').addClass('active');
   </script>
@endsection
