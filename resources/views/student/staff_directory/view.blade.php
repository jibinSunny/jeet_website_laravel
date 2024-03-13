@extends('layouts.student')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> Class Teacher</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-laptop"></i> Dashboard</a></li>
            <li class="active"> Teacher</li>
        </ol>
    </div><!-- /.box-header -->
    <div id="printablediv">
        <div class="row">
        @foreach($class_teacher as $teacher)
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
                                <b>Phone</b> <a class="pull-right">{{ $teacher->phone }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
            <div class="col-sm-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#profile" data-toggle="tab">Subject Teacher</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="active tab-pane" id="profile">
                            <div class="panel-body profile-view-dis">
                                <div class="row">
                                <div id="hide-table">
                                    <table class="table table-striped table-bordered table-hover dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th class="">#</th>
                                                <th class="">Subject</th>
                                                <th class="">Teacher</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($subject_list as $row)
                                                <tr>
                                                    <td data-title="">{{ $loop->iteration }}</td>
                                                    <td data-title="">{{ isset($row->name)?$row->name:''}}</td>
                                                    <td data-title="">
                                                    @foreach($row->teacher_name as $item1)
                                                     {{ isset($item1->first_name )?$item1->first_name:''}}  {{ isset($item1->last_name )?$item1->last_name:''}},
                                                     @endforeach 
                                                    </td>
                                                </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
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
    $('#personal_reports').addClass('active');
</script>
@endsection
