@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-eattendance"></i> Exam Attendance</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="">Exam Attendance</a></li>
            <li class="active">Add Exam Attendance</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                <form method="POST">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="">
                                        <label for="examID" class="control-label">
                                             Exam <span class="text-red">*</span>
                                        </label>
                                        <select name="exam" id="exam" class="form-control select2" tabindex="-1">
                                        <option value="0">Select Class</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="" >
                                        <label for="classesID" class="control-label">
                                             Class <span class="text-red">*</span>
                                        </label>
                                        <select name="class" id="class" class="form-control select2" tabindex="-1">
                                            <option value="0">Select Class</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="" >
                                        <label for="sectionID" class="control-label">
                                            Division <span class="text-red">*</span>
                                        </label>
                                        <select name="division" id="division" class="form-control select2" tabindex="-1">
                                            <option value="0">Select Division</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="">
                                        <label for="subjectID" class="control-label">
                                             Subject <span class="text-red">*</span>
                                        </label>
                                        <select name="subject" id="subject" class="form-control select2" tabindex="-1">
                                            <option value="0">Select Subject</option>
                                            </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" >
                                        <input type="submit" class="btn btn-success col-md-12" style="margin-top:20px" value="Attendance" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div> <!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

@endsection
@section('scripts')
<script type="text/javascript">
    window.addEventListener('load', function() {
        setTimeout(lazyLoad, 1000);
    });

    function lazyLoad() {
        var card_images = document.querySelectorAll('.card-image');
        card_images.forEach(function(card_image) {
            var image_url = card_image.getAttribute('data-image-full');
            var content_image = card_image.querySelector('img');
            content_image.src = image_url;
            content_image.addEventListener('load', function() {
                card_image.style.backgroundImage = 'url(' + image_url + ')';
                card_image.className = card_image.className + ' is-loaded';
            });
        });
    }

    $('.attendance').click(function() {
        var examID = "";
        var classesID = "";
        var sectionID = "";
        var subjectID = "";
        var studentID = $(this).attr('id');
        var status = "";

        if($(this).prop('checked')) {
            status = "checked";
        } else {
            status = "unchecked";
        }

        if(parseInt(examID) && parseInt(classesID) && parseInt(subjectID)) {
            $.ajax({
                type: 'POST',
                url: "",
                data: {"examID" : examID, "classesID" : classesID, 'sectionID' : sectionID, "subjectID" : subjectID, "studentID" : studentID , "status" : status },
                dataType: "html",
                success: function(data) {
                    toastr["success"](data)
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "500",
                        "hideDuration": "500",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
            });
        }
    });


    $('.all_attendance').click(function() {
        var examID = "";
        var classesID = "";
        var sectionID = "";
        var subjectID = "";
        var status = "";

        if($(".all_attendance").prop('checked')) {
            status = "checked";
            $('.attendance').prop("checked", true);
        } else {
            status = "unchecked";
            $('.attendance').prop("checked", false);
        }

        if(parseInt(examID) && parseInt(classesID) && parseInt(subjectID)) {
            $.ajax({
                type: 'POST',
                url: "",
                data: {"examID" : examID, "classesID" : classesID, 'sectionID' : sectionID, "subjectID" : subjectID , "status" : status },
                dataType: "html",
                success: function(data) {
                    toastr["success"](data)
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "500",
                        "hideDuration": "500",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
            });
        }
    });
</script>
<script type="text/javascript">
$('.select2').select2();
$('#classesID').change(function(event) {
    var classesID = $(this).val();
    if(classesID === '0') {
        $('#subjectID').val(0);
    } else {
        $.ajax({
            type: 'POST',
            url: "",
            data: "id=" + classesID,
            dataType: "html",
            success: function(data) {
               $('#subjectID').html(data);
            }
        });

        $.ajax({
            type: 'POST',
            url: "",
            data: "id=" + classesID,
            dataType: "html",
            success: function(data) {
               $('#sectionID').html(data);
            }
        });
    }
});
</script>
@endsection