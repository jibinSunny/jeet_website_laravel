@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-pencil"></i>Add Exam</h3>
        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i>Dashboard</a></li>
            <li><a href="{{ route('showExam') }}">Exam</a></li>
            <li class="active">Add Exam</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
            <form class="form-horizontal"id="mainForm" method="post" action="{{ route('saveExam') }}" enctype="multipart/form-data">
             @csrf
                <div class="form-group">
                        <label for="exam" class="col-sm-2 control-label">
                            Exam Name <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" value=""placeholder="Enter Name" >
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="examID" class="col-sm-2 control-label">
                         Category <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="category" id="category" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Category</option>
                                @foreach($examcategory as $row)
                               <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    
                    <div class="form-group">
                        <label for="note" class="col-sm-2 control-label">Description
                        </label>
                        <div class="col-sm-6">
                            <textarea style="resize:none;" class="form-control" id="description" name="description" placeholder="Enter Description"></textarea>
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="Submit" >
                        </div>
                    </div>

                </form>
            </div>    
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $('.select2').select2();

    $("#date").datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy',
        startDate:'',
        endDate:'',
    });
</script>
<script>
  $('#exam-menu').addClass('active')
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
                    date_time: {
                        required: true,
                    },
           
                },
                messages: {
                    name: {
                        required: "Name is required"
                    },
                    date_time: {
                        required: "Date is required"
                    },
 
                },
            });

</script>
@endsection