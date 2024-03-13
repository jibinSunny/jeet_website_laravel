@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-sitemap"></i>Edit Student Group</h3>


        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="{{ route('showStudentGroup') }}"></i>Student Group</a></li>
            <li class="active">Edit</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal"id="mainForm" method="post" action="{{ route('saveStudentGroup') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="classes" class="col-sm-2 control-label">
                            Name <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                        <input type="hidden" class="form-control" id="classes" name="academicyear_id" value="{{$studentgroup->id}}">
                            <input type="text" class="form-control" id="classes" name="name" value="{{$studentgroup->name}}">
                        </div>
                        @if ($errors->has('name'))
                        <strong>{{ $errors->first('name') }}</strong>
                        @endif
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>

                    <div class="form-layout-footer">
                        <input type="submit" class="btn btn-success bg-lightsky mg-b-10 " value="Submit">
                        <!-- <a class="btn btn-secondary mg-b-10 " href="">Cancel</a> -->
                    </div>
                 

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>
  $("form#mainForm").validate({
                normalizer: function(value) {
                    return $.trim(value);
                },
                rules: {
                    name: {
                        required: true
                    },
                },
                messages: {
                    name: {
                        required: "Name is required"
                    },
 
                },
            });

</script>
<script>
  $('#settings-menu').addClass('active')
  $('#administrator-menu').addClass('active')
</script>
<script>
    $(".select2").select2({ placeholder: "", maximumSelectionSize: 6 });
</script>
@endsection