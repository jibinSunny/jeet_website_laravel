@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> View user</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-laptop"></i> Dashboard</a></li>
            <li class="active">View user</li>
        </ol>
    </div><!-- /.box-header -->
    <div id="printablediv">
        <div class="row">
            <div class="col-sm-4">
                <div class="box box-primary">
                    <div class="box-body box-profile">

                        <img src="{{ asset('user-files/user/profile/'.$user->code."/".$user->profile_image) }}" onerror="this.onerror=null;this.src='{{asset('uploads/images/default.png')}}';" class="profile-user-img img-responsive img-circle" alt="">
                        <h3 class="profile-username text-center">{{ $user->first_name }} {{ $user->last_name }}</h3>
                        <p class="text-muted text-center">user</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>Phone</b> <a class="pull-right">{{ $user->phone }}</a>
                            </li>
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>Designation</b> <a class="pull-right">{{ $user->usertypename->name }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="active tab-pane" id="profile">
                            <div class="panel-body profile-view-dis">
                                <div class="row">
                                    <div class="profile-view-tab">
                                        <p><span>Email </span>: {{ $user->email }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>place </span>: {{ $user->place }}</p>
                                    </div>

                                    <div class="profile-view-tab">
                                        <p><span>Post Code </span>: {{ $user->post }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>State </span>: {{ $user->states->name }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>Country </span>: {{ $user->countries->name }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>Nationality </span>: {{ $user->nationalities->name }}</p>
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
    $('#adduser').disableAutoFill();
</script>
<script>
  $('#user-menu').addClass('active')
</script>
@endsection
