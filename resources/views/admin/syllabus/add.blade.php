@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Add Syllabus</h3>


        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href=""></i> </a>Syllabus</li>
            <li class="active">Add Syllabus</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
            <form class="form-horizontal"id="mainForm" method="post" action="{{ route('saveSyllabus') }}" enctype="multipart/form-data">
             @csrf
              <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">
                            Name <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter Name">
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>



                    <div class="form-group">
                        <label for="classesID" class="col-sm-2 control-label">
                            Class <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="class" id="class" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Class</option>
                                @foreach($classes as $classes)
                                <option value="{{$classes->id}}">{{$classes->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="classesID" class="col-sm-2 control-label">
                            Academic Year <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="academic_year" id="academic_year" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Academic Year</option>
                                @foreach($academic_year as $academic_year)
                                <option value="{{$academic_year->id}}">{{$academic_year->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label error-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">
                            Description <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <textarea class="form-control" style="resize:none;" id="description" name="description"></textarea>
                        </div>
                        <span class="col-sm-4 control-label error-label"></span>
                    </div>


                    <div class="form-group">
                        <label for="file" class="col-sm-2 control-label">
                            File <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="fa icon-trash-2"></span> Clear
                                    </button>
                                    <div class="btn btn-primary image-preview-input">
                                        <span class="fa icon-replay"></span>
                                        <span class="image-preview-input-title">Browse File</span>
                                        <input type="file" accept="image/png, image/jpeg, image/gif, application/pdf, application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf" name="file" />
                                    </div>
                                </span>
                            </div>
                        </div>

                        <span class="col-sm-4 control-label error-label"></span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-primary" value="Submit">
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
    $(".select2").select2();

    $(document).on('click', '#close-preview', function() {
        $('.image-preview').popover('hide');
        // Hover befor close the preview
        $('.image-preview').hover(
            function() {
                $('.image-preview').popover('show');
                $('.content').css('padding-bottom', '100px');
            },
            function() {
                $('.image-preview').popover('hide');
                $('.content').css('padding-bottom', '20px');
            }
        );
    });

    $(function() {
        // Create the close button
        var closebtn = $('<button/>', {
            type: "button",
            text: 'x',
            id: 'close-preview',
            style: 'font-size: initial;',
        });
        closebtn.attr("class", "close pull-right");
        // Set the popover default content
        $('.image-preview').popover({
            trigger: 'manual',
            html: true,
            title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
            content: "There's no image",
            placement: 'bottom'
        });
        // Clear event
        $('.image-preview-clear').click(function() {
            $('.image-preview').attr("data-content", "").popover('hide');
            $('.image-preview-filename').val("");
            $('.image-preview-clear').hide();
            $('.image-preview-input input:file').val("");
            $(".image-preview-input-title").text("Browse File");
        });
        // Create the preview image
        $(".image-preview-input input:file").change(function() {
            var img = $('<img/>', {
                id: 'dynamic',
                width: 250,
                height: 200,
                overflow: 'hidden'
            });
            var file = this.files[0];
            var reader = new FileReader();
            // Set preview image into the popover data-content
            reader.onload = function(e) {
                $(".image-preview-input-title").text("Browse File");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
            }
            reader.readAsDataURL(file);
        });
    });
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
                    class: {
                        required: true,
                    },
                    academic_year: {
                        required: true
                    },
                },
                onclick: function() {
                    $('#mainForm').addClass('checkbox-error');
                },
                messages: {
                    name: {
                        required: "Name is required",
                    },
                    class: {
                        required: "Class is required",
                    },
                    academic_year: {
                        required: "Academic Year is required"
                    },
                    
 
                },
            });

</script>
@endsection