@extends('layouts.admin')
@section('content')
<div class="box">
<div class="box-header">
        <h3 class="box-title"> Edit Caste</h3>


        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="{{ route('showReligion') }}"></i>Caste</a></li>
            <li class="active">Edit Caste</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
            <form class="form-horizontal"id="mainForm" method="post" action="{{ route('saveCaste') }}" enctype="multipart/form-data">
             @csrf
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">
                            Name <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                        <input type="hidden" class="form-control" id="title" name="academicyear_id" value="{{$castelist->id}}">
                            <input type="text" class="form-control" id="title" name="name" value="{{$castelist->name}}"placeholder="Enter Name">
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="classesID" class="col-sm-2 control-label">
                        Religion <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="religion" id="religion" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Religions</option>
                                @foreach($religionlist as $religionlists)
                                <option value="{{ $religionlists->id}}" {{$castelist->religion ==$religionlists->id ? 'selected' :''}}>{{ $religionlists->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="Submit">
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
  $('#settings-menu').addClass('active')
  $('#content-menu').addClass('active')
</script>
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
                    religion: {
                        required: true
                    },
          
           
                },
                messages: {
                    name: {
                        required: "Name is required"
                    },
                    religion: {
                        required: "religion is required"
                    },
 
                },
            });

</script>

@endsection