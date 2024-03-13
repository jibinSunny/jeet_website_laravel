@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-asterisk"></i> Frontend Setting</h3>


        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Frontend Setting</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->

    <style type="text/css">
        .setting-fieldset {
            border: 1px solid #DBDEE0 !important;
            padding: 15px !important;
            margin: 0 0 25px 0 !important;
            box-shadow: 0px 0px 0px 0px #000;
        }

        .setting-legend {
            font-size: 1.1em !important;
            font-weight: bold !important;
            text-align: left !important;
            width: auto;
            color: #428BCA;
            padding: 5px 15px;
            border: 1px solid #DBDEE0 !important;
            margin: 0px;
        }
    </style>


<form class="form-horizontal"id="mainForm" method="post" action="{{ route('updatefrontendSettings') }}" enctype="multipart/form-data">
     @csrf
        <div class="box-body">
            <fieldset class="setting-fieldset">
                <legend class="setting-legend">Frontend Configuration</legend>
                <div class="row">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="login_menu_status">Login Menu <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Enable/Disable login menu for frontend top menu"></i>
                                </label>
                                <select id="login_menu_status" name="login_menu_status" class="form-control select2">
                                    @if($frontsetting->login_menu_status=="0")
                                    <option value="0"selected>Disable</option>
                                    <option value="1">Enable</option>
                                    @else
                                    <option value="0">Disable</option>
                                    <option value="1"selected>Enable</option>
                                    @endif
                                </select>
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="teacher_email_status">Teacher Email <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Enable/Disable teacher email for frontend teahcer list"></i>
                                </label>
                                <select id="teacher_email_status" name="teacher_email_status" class="form-control select2">
                                  @if($frontsetting->teacher_email_status=="0")
                                    <option value="0"selected>Disable</option>
                                    <option value="1">Enable</option>
                                    @else
                                    <option value="0">Disable</option>
                                    <option value="1"selected>Enable</option>
                                    @endif
                                </select>
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="teacher_phone_status">Teacher Phone <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Enable/Disable teacher phone for frontend teahcer list"></i>
                                </label>
                                <select id="teacher_phone_status" name="teacher_phone_status" class="form-control select2">
                                  @if($frontsetting->teacher_phone_status=="0")
                                    <option value="0"selected>Disable</option>
                                    <option value="1">Enable</option>
                                    @else
                                    <option value="0">Disable</option>
                                    <option value="1"selected>Enable</option>
                                    @endif
                                </select>
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">Online Admission&nbsp;<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="Enable/Disable for Online Admission">
                                <label for="online_admission_status"></i>
                                </label>
                                <select id="online_admission_status" name="online_admission_status" class="form-control select2">
                                  @if($frontsetting->online_admission_status=="0")
                                    <option value="0"selected>Disable</option>
                                    <option value="1">Enable</option>
                                    @else
                                    <option value="0">Disable</option>
                                    <option value="1"selected>Enable</option>
                                    @endif
                                </select>
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="description">Description <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="Set frontend footer short description"></i>
                                </label>
                                <textarea class="form-control" style="resize:none;" id="description" name="description">{{$frontsetting->description}}</textarea>
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset class="setting-fieldset">
                <legend class="setting-legend">Social</legend>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="facebook">Facebook <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Facebook Link for frontend"></i>
                                </label>
                                <input type="hidden" class="form-control" id="academicyear_id" name="academicyear_id" value="{{$frontsetting->id}}" >
                                <input type="text" class="form-control" id="facebook" name="facebook" value="{{$frontsetting->facebook}}" >
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="twitter">Twitter <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Twitter Link for frontend"></i>
                                </label>
                                <input type="text" class="form-control" id="twitter" name="twitter" value="{{$frontsetting->twitter}}" >
                                <span class="control-label">
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="linkedin">
                                Google <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Linkedin Link for frontend"></i>
                                </label>
                                <input type="text" class="form-control" id="google" name="google" value="{{$frontsetting->google}}" >
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="youtube">
                                    Youtube <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Youtube Link for frontend"></i>
                                </label>
                                <input type="text" class="form-control" id="youtube" name="youtube" value="{{$frontsetting->youtube}}" >
                                <span class="control-label"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </fieldset>

            <div class="form-group">
                <div class="col-sm-8">
                    <input type="submit" class="btn btn-success btn-md" value="Update" >
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
@section('scripts')
<script type="text/javascript">
    $('.select2').select2();
</script>
<script>
    $(document).ready(function() {
        @if(Session::has('success'))
        toastr.success('{{ Session::get('
            success ') }}', 'Successful');
        @endif
        @if(Session::has('errors'))
        @foreach($errors -> all() as $error)
        toastr.error('{{ $error }}', 'Error');
        @endforeach
        @endif
    });
</script>
<script>
    $('#settings-menu').addClass('active')
</script>
@endsection