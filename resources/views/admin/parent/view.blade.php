@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> View parent</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-laptop"></i> Dashboard</a></li>
            <li class="active">View parent</li>
        </ol>
    </div><!-- /.box-header -->
    <div id="printablediv">
        <div class="row">
            <div class="col-sm-3">
                <div class="box box-primary">
                    <div class="box-body box-profile">

                        <img src="{{ asset('user-files/parent/profile/'.$parent->code."/".$parent->profile_image) }}" onerror="this.onerror=null;this.src='{{asset('uploads/images/default.png')}}';" class="profile-user-img img-responsive img-circle" alt="">
                        <h3 class="profile-username text-center">{{ $parent->first_name }} {{ $parent->last_name }}</h3>
                        <p class="text-muted text-center">parent</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>Phone</b> <a class="pull-right">{{ $parent->phone }}</a>
                            </li>
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>Secondary Phone</b> <a class="pull-right">{{ $parent->phone2 }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                        <li><a href="#students" data-toggle="tab">Students</a></li>
                        {{-- <li><a href="#attendance" data-toggle="tab">Attendence</a></li>
                        <li><a href="#document" data-toggle="tab">Document</a></li> --}}
                    </ul>

                    <div class="tab-content">
                        <div class="active tab-pane" id="profile">
                            <div class="panel-body profile-view-dis">
                                <div class="row">
                                    <div class="profile-view-tab">
                                        <p><span>Email </span>: {{ $parent->email }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>place </span>: {{ $parent->place }}</p>
                                    </div>

                                    <div class="profile-view-tab">
                                        <p><span>Post Code </span>: {{ $parent->zip }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>State </span>: {{ $parent->states->name }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>Country </span>: {{ $parent->countries->name }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>Nationality </span>: {{ $parent->nationalities->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="students">
                            <div class="panel-body profile-view-dis">
                                <div class="row">
                                @if($parent->students)
                                    @foreach ($parent->students as $students)
                                    <div class="profile-view-tab">
                                        <p><span>Student Name </span>: {{ $students->first_name }} {{ $students->middle_name }} {{ $students->last_name }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>Class</span>: {{ $students->classname->name }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>Division </span>: {{ $students->divisions->name }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>Roll Number </span>: {{ $students->roll_number }}</p>
                                    </div>

                                    <div class="profile-view-tab">
                                        <p><span>Phone</span>: {{ $students->phone }}</p>
                                    </div>
                                       <a href="{{route('viewStudent',['code'=> $students->code])}}" style="color: #337ab7;padding-left:15px; text-decoration:underline;">Click here to more info</a>
                                    <hr>
                                    @endforeach
                                @endif
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
    $('#addparent').disableAutoFill();
</script>
<script>
    $('#parent-menu').addClass('active');
</script>
@endsection
