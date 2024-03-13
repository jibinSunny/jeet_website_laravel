@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-star"></i>Edit Division</h3>


        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href=""></i> Division</a></li>
            <li class="active">Add Division</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
            <form class="form-horizontal"id="mainForm" method="post" action="{{ route('saveDivision') }}" enctype="multipart/form-data">
             @csrf
                <div class="form-group">
                        <label for="section" class="col-sm-2 control-label">
                        Division
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" value=""placeholder="Enter Division Name" >
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>

                    <div class="form-group">
                        <label for="category" class="col-sm-2 control-label">
                            Category
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="category" name="category" value=""placeholder="Enter Category" >
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>

                    <div class="form-group">
                        <label for="capacity" class="col-sm-2 control-label">
                            Capacity
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="capacity" name="capacity" value=""placeholder="Enter Capacity" >
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>

                    <div class="form-group">
                        <label for="classesID" class="col-sm-2 control-label">
                            Class
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                        <select name="class" id="class" class="form-control select2" tabindex="-1">
                                        <option selected disabled>Select Class</option>
                                        @foreach($classes  as $classes)
                                        <option value="{{$classes->id}}">{{$classes->name}}</option>
                                        @endforeach
                                        </select>
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>

                    <div class="form-group">
                        <label for="teacherID" class="col-sm-2 control-label">
                            Teacher Name
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                        <select name="teacher" id="teacher"class="form-control select2" tabindex="-1">
                                        <option selected disabled>Select Teacher</option>
                                        @foreach($teacher as $teachers)
                                         <option value="{{$teachers->id}}">{{$teachers->first_name}}</option>
                                         @endforeach
                                        </select>
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>

                     <div class="form-group">
                        <label for="note" class="col-sm-2 control-label">Note</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" style="resize:none;" id="note" name="note"></textarea>
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
                        <p><b>Note:</b> Create a class and teacher before create a new section</p>
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
                    class: {
                        required: true,
                    },
                    teacher: {
                        required: true
                    },
                    capacity: {
                        required: true
                    },
           
                },
                messages: {
                    name: {
                        required: "Name is required"
                    },
                    class: {
                        required: "Class is required",
                    },
                    teacher: {
                        required: "Teacher is required"
                    },
                    capacity: {
                        required: "Capacity is required"
                    },
 
                },
            });

</script>
@endsection
