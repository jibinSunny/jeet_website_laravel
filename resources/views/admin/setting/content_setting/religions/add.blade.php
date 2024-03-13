@extends('layouts.admin')
@section('content')
<div class="box">
<div class="box-header">
        <h3 class="box-title"> Add Religions</h3>


        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="{{ route('showReligion') }}"></i>Religions</a></li>
            <li class="active">Add Religions</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
            <form class="form-horizontal"id="mainForm" method="post" action="{{ route('saveReligion') }}" enctype="multipart/form-data">
             @csrf
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">
                            Name <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="title" name="name" value=""placeholder="Enter Name">
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
                   
          
           
                },
                messages: {
                    name: {
                        required: "Name is required"
                    },
                    
 
                },
            });

</script>

@endsection