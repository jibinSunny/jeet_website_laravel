@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-subject"></i>Edit Subject</h3>

        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i>Dashboard </a></li>
            <li><a href="{{ route('showSubject') }}"></a>Subject</li>
            <li class="active">Edit Subject </li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
            <form class="form-horizontal"id="mainForm" method="post" action="{{ route('saveSubject') }}" enctype="multipart/form-data">
             @csrf
                <div class="form-group">
                        <label for="subject" class="col-sm-2 control-label">
                            Subject Name <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                        <input type="hidden" class="form-control" id="academicyear_id" name="academicyear_id" value="{{$subject_list->id}}" >
                            <input type="text" class="form-control" id="name" name="name" value="{{$subject_list->name}}" >
                        </div>
                        <span class="col-sm-4 control-label">
                            
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="subject_author" class="col-sm-2 control-label">
                           Subject Author
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="author" name="author" value="{{$subject_list->author}}" >
                        </div>
                        <span class="col-sm-4 control-label">
                            
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="subject_code" class="col-sm-2 control-label">
                            Subject Code <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="subject_code" name="subject_code" value="{{$subject_list->subject_code}}" >
                        </div>
                        <span class="col-sm-4 control-label">
                            
                        </span>
                    </div>
                <div class="form-group">
                        <label for="classesID" class="col-sm-2 control-label">
                        Class Name <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="class" id="class" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Class</option>
                                      @foreach($classes  as $expert)
                                      <option value="{{ $expert->id}}" {{$subject_list->class ==$expert->id ? 'selected' :''}}>{{ $expert->name}} </option>
                                        @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>

                    <div class="form-group">
                        <label for="passmark" class="col-sm-2 control-label">
                            Pass Mark <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="pass_mark" name="pass_mark" value="{{$subject_list->pass_mark}}" >
                        </div>
                        <span class="col-sm-4 control-label">
                            
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="finalmark" class="col-sm-2 control-label">
                            Total Mark <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="total_mark" name="total_mark" value="{{$subject_list->total_mark}}" >
                        </div>
                        <span class="col-sm-4 control-label">
                            
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="note" class="col-sm-2 control-label">Note</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" style="resize:none;" id="note" name="note">{{$subject_list->note}}</textarea>
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="Submit" >
                        </div>
                    </div>

                </form>
                    <div class="callout callout-danger">
                        <p><b>Note:</b> Create a teacher & class before create a new subject.</p>
            </div> <!-- col-sm-8 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

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
                        required: true,
                    },
                    subject_code: {
                        required: true,
                        unique: true,
                    },
                    class: {
                        required: true,
                    },
                    author: {
                        required: true
                    },
                    pass_mark: {
                        required: true
                    },
                    total_mark: {
                        required: true
                    },
           
                },
                messages: {
                    subject_code: {
                        required: "Subject Code is required",
                        unique : 'Subject Code is unique'
                    },
                    class: {
                        required: "class is required",
                    },
                    author: {
                        required: "Author is required",
                    },
                    name: {
                        required: "Name is required",
                    },
                    pass_mark: {
                        required: "Pass Mark is required"
                    },
                    total_mark: {
                        required: "Total Mark is required"
                    },
 
                },
            });

</script>
@endsection