@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> View Student</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-laptop"></i> Dashboard</a></li>
            <li class="active">View Student</li>
        </ol>
    </div><!-- /.box-header -->
    <div id="printablediv">
        <div class="row">
            <div class="col-sm-4">
                <div class="box box-primary">
                    <div class="box-body box-profile">

                        <img src="{{ asset('user-files/student/profile/'.$student->code."/".$student->profile_image) }}" onerror="this.onerror=null;this.src='{{asset('uploads/images/default.png')}}';" class="profile-user-img img-responsive img-circle" alt="">
                        <h3 class="profile-username text-center">{{ $student->first_name }} {{ $student->last_name }}</h3>
                        <p class="text-muted text-center">Reg.No : {{ $student->reg_number }}</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>Gender</b> <a class="pull-right">{{ $student->gender }}</a>
                            </li>
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>Class</b> <a class="pull-right">{{ $student->classname->name }}</a>
                            </li>
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>Division</b> <a class="pull-right">{{ $student->divisions->name }}</a>
                            </li>
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>Roll No.</b> <a class="pull-right">{{ $student->roll_number }}</a>
                            </li>
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>DOB</b> <a class="pull-right">{{ $student->dob }}</a>
                            </li>
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>Phone</b> <a class="pull-right">{{ $student->phone }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#profile" data-toggle="tab">Student Profile</a></li>
                        {{-- <li><a href="#routine" data-toggle="tab">Time Table</a></li>
                        <li><a href="#attendance" data-toggle="tab">Attendence</a></li>
                        <li><a href="#document" data-toggle="tab">Document</a></li> --}}
                    </ul>

                    <div class="tab-content">
                        <div class="active tab-pane" id="profile">
                            <div class="panel-body profile-view-dis">
                                <div class="row">
                                    <div class="profile-view-tab">
                                        <p><span>Email </span>: {{ $student->email }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>Secondary Phone No.</span>: {{ $student->phone2 }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>Address </span>: {{ $student->address }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>place </span>: {{ $student->place }}</p>
                                    </div>

                                    <div class="profile-view-tab">
                                        <p><span>Post Code </span>: {{ $student->post }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>State </span>: {{ $student->states->name }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>Country </span>: {{ $student->countries->name }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>Blood Group </span>: {{ $student->blood }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>Nationality </span>: {{ $student->nationalities->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script>
    $('#addstudent').disableAutoFill();
</script>
<script>
    $('#student-menu').addClass('active');
</script>
@endsection
