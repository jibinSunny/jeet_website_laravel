@extends('layouts.student')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa iniicon-leaveapply"></i>Add Leave Apply</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Add Apply Leave</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
            <form class="form-horizontal"id="mainForm" method="post" action="{{ route('studentsaveleaveApply') }}" enctype="multipart/form-data">
             @csrf

                    <div class="form-group">
                        <label for="leavecategoryID" class="col-sm-2 control-label">
                           Category <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="leave_category" id="leave_category" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Category</option>
                                @foreach($category as $row1)
                                <option value="{{ isset($row1->leavecategoryname->id )?$row1->leavecategoryname->id :''}}">{{ isset($row1->leavecategoryname->name)?$row1->leavecategoryname->name:''}}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>

                    <div class="form-group">
                        <label for="leave_schedule" class="col-sm-2 control-label">
                            Schedule <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="leave_schedule" name="leave_schedule" value="" >
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="reason" class="col-sm-2 control-label">
                           Reason <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="reason" name="reason" ></textarea>
                        </div>
                        <span class="col-sm-3 control-label"></span>
                    </div>

                    <div class="form-group">
                        <label for="attachment" class="col-sm-2 control-label">Attachment</label>
                        <div class="col-sm-6">
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="fa fa-remove"></span> 
                                    </button>
                                    <div class="btn btn-success image-preview-input">
                                        <span class="fa fa-repeat"></span>
                                        <span class="image-preview-input-title">File Browse</span>
                                        <input type="file" name="attachment"/>
                                    </div>
                                </span>
                            </div>
                        </div>
                        <span class="col-sm-4"></span>
                    </div>
                    <!-- <div class="form-group">
                            <label for="od_status" class="col-sm-2 control-label">On Duty Leave?</label>
                            <div class="col-sm-6">
                                <input type="checkbox"style="display:block" name="od_status" value="1">
                            </div>
                            <span class="col-sm-3 control-label"></span>
                        </div> -->
   

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
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
  $('#student_leave-menu').addClass('active')
  $('#personal_reports').addClass('active')
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>
  $("form#mainForm").validate({
                normalizer: function(value) {
                    return $.trim(value);
                },
                rules: {
                    leave_category: {
                        required: true,
                    },
                    leave_schedule: {
                        required: true,
                    },
            
           
                },
                messages: {
                    leave_category: {
                        required: "leave category is required"
                    },
                    leave_schedule: {
                        required: "leave schedule is required"
                    },
 
                },
            });

</script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<!--<script src="{{ asset('js/jquery-1.12.4.js') }}"></script>!-->
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/jQuery-dataTables-Material.js') }}"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<script type="text/javascript">
    $('.select2').select2();


    $('#leave_schedule').daterangepicker({
        timePicker: true,
        timePickerIncrement: 5,
        maxDate: '',
        minDate: '',
        locale: {
            format: 'DD/MM/YYYY h:mm A'
        },
    });

    $(function() {
        // Create the close button
        var closebtn = $('<button/>', {
            type:"button",
            text: 'x',
            id: 'close-preview',
            style: 'font-size: initial;',
        });
        closebtn.attr("class","close pull-right");
        // Set the popover default content
        $('.image-preview').popover({
            trigger:'manual',
            html:true,
            title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
            content: "There's no image",
            placement:'bottom'
        });
        // Clear event
        $('.image-preview-clear').click(function(){
            $('.image-preview').attr("data-content","").popover('hide');
            $('.image-preview-filename').val("");
            $('.image-preview-clear').hide();
            $('.image-preview-input input:file').val("");
            $(".image-preview-input-title").text("");
        });
        // Create the preview image
        $(".image-preview-input input:file").change(function (){
            var file = this.files[0];
            var reader = new FileReader();
            // Set preview image into the popover data-content
            reader.onload = function (e) {
                $(".image-preview-input-title").text("");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
            }
            reader.readAsDataURL(file);
        });
    });
</script>
@endsection
