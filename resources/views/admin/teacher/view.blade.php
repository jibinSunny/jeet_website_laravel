@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> View Teacher</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-laptop"></i> Dashboard</a></li>
            <li class="active">View Teacher</li>
        </ol>
    </div><!-- /.box-header -->
    <div id="printablediv">
        <div class="row">
            <div class="col-sm-3">
                <div class="box box-primary">
                    <div class="box-body box-profile">

                        <img src="{{ asset('user-files/teacher/profile/'.$teacher->code."/".$teacher->profile_image) }}" onerror="this.onerror=null;this.src='{{asset('uploads/images/default.png')}}';" class="profile-user-img img-responsive img-circle" alt="">
                        <h3 class="profile-username text-center">{{ $teacher->first_name }} {{ $teacher->last_name }}</h3>
                        <p class="text-muted text-center">Teacher</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>Gender</b> <a class="pull-right">{{ $teacher->gender }}</a>
                            </li>
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>DOB</b> <a class="pull-right">{{ $teacher->dob }}</a>
                            </li>
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>DOB</b> <a class="pull-right">{{ $teacher->dob }}</a>
                            </li>
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>Phone</b> <a class="pull-right">{{ $teacher->phone }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#profile" data-toggle="tab">Teacher Profile</a></li>
                        {{-- <li><a href="#routine" data-toggle="tab">Time Table</a></li>
                        <li><a href="#attendance" data-toggle="tab">Attendence</a></li>
                        <li><a href="#document" data-toggle="tab">Document</a></li> --}}
                    </ul>

                    <div class="tab-content">
                        <div class="active tab-pane" id="profile">
                            <div class="panel-body profile-view-dis">
                                <div class="row">
                                    <div class="profile-view-tab">
                                        <p><span>Email </span>: {{ $teacher->email }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>Secondary Phone No.</span>: {{ $teacher->phone2 }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>Address </span>: {{ $teacher->address }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>place </span>: {{ $teacher->place }}</p>
                                    </div>

                                    <div class="profile-view-tab">
                                        <p><span>Post Code </span>: {{ $teacher->post }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>State </span>: {{ $teacher->states->name }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>Country </span>: {{ $teacher->countries->name }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>Blood Group </span>: {{ $teacher->blood }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>Nationality </span>: {{ $teacher->nationalities->name }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>Date of Joined </span>: {{ $teacher->doj }}</p>
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
    $('#addTeacher').disableAutoFill();
</script>
<script>
    $('#teacher-menu').addClass('active');
</script>
@endsection
