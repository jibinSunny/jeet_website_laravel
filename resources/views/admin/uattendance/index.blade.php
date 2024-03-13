@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-parents-secret"></i> User Attendance</h3>
       
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">User Attendance</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
            <h5 class="page-header">
                <a href="{{ route('adduserAttendance') }}"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Add User Attendance</a>
                            <!-- <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 pull-right drop-marg"> -->
                            </div>
                  </h5>
                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-sm-2">#</th>
                                <th class="col-sm-2">Photo</th>
                                <th class="col-sm-2">Name</th>
                                <th class="col-sm-2">Email</th>
                                <th class="col-lg-2">User Type</th>
                                <!-- <th class="col-sm-2">Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($user_list as $row)
                                <tr>
                                    <td data-title="">{{ $loop->iteration }}</td>
                                    <td data-title=""> <img src="{{ asset('user-files/teacher/profile/'.$row->profile_image) }}"onerror="this.onerror=null;this.src='{{asset('asset/profile.jpg')}}';"style="width: 65px;"></td>
                                    <td data-title="">{{ $row->first_name }}</td>
                                    <td data-title="">{{ $row->email }}</td>
                                    <td data-title="">{{ isset($row->usertypename->name)?$row->usertypename->name:''}}</td>
                                    <!-- <td data-title=""><a href="{{route('viewStudentAttendance',['categoryId'=> $row->id])}}" class="btn btn-primary btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="View">View</a></td> -->
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
<script type="text/javascript">
    $('#attendance-menu').addClass('active')
</script>
@endsection