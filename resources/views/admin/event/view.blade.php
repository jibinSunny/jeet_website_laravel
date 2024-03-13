@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> View Event</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-laptop"></i> Dashboard</a></li>
            <li class="active">View Event</li>
        </ol>
    </div><!-- /.box-header -->
    <div id="printablediv">
        <div class="row">
            <div class="col-sm-12">
                <div class="nav-tabs-custom nav-list">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#profile" data-toggle="tab">View</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="active tab-pane" id="profile">
                            <div class="panel-body profile-view-dis">
                                <div class="row">
                                    <div class="profile-view-tab">
                                        <p><span>Name </span>: {{ $event->title }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>Date</span>: {{ $event->date }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>Time </span>: {{ $event->time }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>Type </span>:@if($event->type=="0")Common @else Assign for All @endif</p>
                                    </div>
                                    @if($event->type=="1")
                                    <div class="profile-view-tab">
                                        <p><span>Calss </span>: {{ $event->classname->name }}</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span>Division </span>: {{ $event->Division->name }}</p>
                                    </div>
                                    @endif
                                    <div class="profile-view-tab">
                                        <p><span>Description </span>: {{ $event->description }}</p>
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
 $('#eventlist').addClass('active')
</script>
@endsection
