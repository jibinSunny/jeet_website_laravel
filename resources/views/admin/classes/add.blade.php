@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-sitemap"></i> Add Class</h3>


        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="{{ route('showClasses') }}"></i>Classes</a></li>
            <li class="active">Add Class</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
            <form class="form-horizontal"id="mainForm" method="post" action="{{ route('saveClasses') }}" enctype="multipart/form-data">
             @csrf
                    <div class="form-group">
                        <label for="classes" class="col-sm-2 control-label">
                            Class <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" value=""placeholder="Enter Class Name">
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="classes_numeric" class="col-sm-2 control-label">
                            Class Numeric <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name_numeric" name="name_numeric"value=""placeholder="Enter Numeric Name">
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="note" class="col-sm-2 control-label">
                            Note
                        </label>
                        <div class="col-sm-6">
                            <textarea class="form-control" style="resize:none;" id="note" name="note" placeholder="Enter note"></textarea>
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </div>

                </form>
                <div class="callout callout-danger">
                    <p><b>Note:</b> Create a teacher before create a new class.</p>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $(".select2").select2({ placeholder: "", maximumSelectionSize: 6 });
</script>
<script type="text/javascript">
    $('.select2').select2();
</script>
<script>
  $('#academic-menu').addClass('active')
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
                    name_numeric: {
                        digits: true
                    },
                    teacher: {
                        required: true
                    },

                },
                messages: {
                    name: {
                        required: "Name is required"
                    },
                    name_numeric: {
                        digits : 'Name Numeric is Numeric '
                    },
                    teacher: {
                        required: "Teacher is required"
                    },

                },
            });

</script>
@endsection
