@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-pencil"></i>Edit Instruction</h3>
        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i>Dashboard</a></li>
            <li><a href="{{ route('showExam') }}">Instruction</a></li>
            <li class="active">Edit Instruction</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
            <form class="form-horizontal"id="mainForm" method="post" action="{{ route('saveInstruction') }}" enctype="multipart/form-data">
             @csrf
                <div class="form-group">
                        <label for="exam" class="col-sm-2 control-label">
                          Title<span class="text-red">*</span>
                        </label>
                        <div class="col-sm-7">
                        <input type="hidden" class="form-control" id="academicyear_id" name="academicyear_id" value="{{$instruction_list->id}}" >
                            <input type="text" class="form-control" id="title" name="title" value="{{$instruction_list->title}}"placeholder="Enter Title" >
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-sm-2 control-label">Content<span class="text-red">*</span>
                        </label>
                        <div class="col-sm-7">
                            <textarea style="resize:none;" class="form-control" id="summernote" name="content" placeholder="Enter Content">{{$instruction_list->content}}</textarea>
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
<script>
  $('#exam-menu').addClass('active')
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            //placeholder: 'Hello bootstrap 4',
            tabsize: 2,
            height: 100
        });
    });
</script>
<script type="text/javascript">
  $('#question').jqte();
    $('.select2').select2();

    $("#date").datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy',
        startDate:'',
        endDate:'',
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>
  $("form#mainForm").validate({
                normalizer: function(value) {
                    return $.trim(value);
                },
                rules: {
                    title: {
                        required: true
                    },
                    content: {
                        required: true,
                    },
           
                },
                messages: {
                    title: {
                        required: "Title is required"
                    },
                    content: {
                        required: "Content is required"
                    },
 
                },
            });

</script>
@endsection