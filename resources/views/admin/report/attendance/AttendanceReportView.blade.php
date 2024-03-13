@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-attendancereport"></i> Attendance Report</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Attendance Report</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">

            <div class="col-sm-12">
                <div class="form-group col-sm-4" id="attendancetypeDiv">
                    <label>Attendance Type<span class="text-red"> * </span></label>
                    <select id="sectionID" name="sectionID" class="form-control select2">
                        <option value="0">Present</option>
                        <option value="0">Late Present With Excuse</option>
                        <option value="0">Late Present</option>
                        <option value="0">Absent</option>
                        <option value="0">Leave</option>
                    </select>
                </div>

                <div class="form-group col-sm-4" id="classesDiv">
                    <label>Class<span class="text-red"> * </span></label>
                    <select id="sectionID" name="sectionID" class="form-control select2">
                        <option value="0">Select Class</option>
                        <option value="0">Late Present With Excuse</option>
                    </select>
                </div>

                <div class="form-group col-sm-4" id="sectionDiv">
                    <label>Division</label>
                    <select id="sectionID" name="sectionID" class="form-control select2">
                        <option value="">Select Division</option>
                    </select>
                </div>

                <div class="form-group col-sm-4" id="dateDiv">
                    <label><span class="text-red"> * </span></label>
                    <input class="form-control" name="date" id="date" value="" type="text">
                </div>

                <div class="col-sm-4">
                    <button id="get_attendancereport" class="btn btn-success" style="margin-top:23px;">Get Report</button>
                </div>
            </div>

        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

<div id="load_attendance_report"></div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $('#subjectDiv').show()
    </script>
    <script type="text/javascript">
        $('#subjectDiv').hide()
    </script>

<script type="text/javascript">
    $('.select2').select2();
    function printDiv(divID) {
        var oldPage = document.body.innerHTML;
        $('#headerImage').remove();
        $('.footerAll').remove();
        var divElements = document.getElementById(divID).innerHTML;
        var footer = "";
        var copyright = " |  : ";
        document.body.innerHTML =
          "<html><head><title></title></head><body>" +
          "<center><img src='"
          + divElements + footer + copyright + "</body>";

        window.print();
        document.body.innerHTML = oldPage;
        window.location.reload();
    }

    
    function divHide() {
        $("#classesDiv").hide("slow");
        $("#sectionDiv").hide("slow");
        $("#dateDiv").hide("slow");
        $("#subjectDiv").hide("slow");
    }

    function divShow() {
        $("#classesDiv").show("slow");
        $("#sectionDiv").show("slow");
        $("#dateDiv").show("slow");
            $('#subjectDiv').show();
            $("#subjectDiv").hide("slow");
    }

    $(document).ready(function() {
        $("#attendancetype").val('0');
        $("#classesID").val(0);
        $("#sectionID").val('');
            $("#subjectID").val('');
        divHide();
    });

    $(document).bind('click', function() {
        $('#date').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy',
            startDate:'',
            endDate:'',
            daysOfWeekDisabled: "",
            datesDisabled: [""], 
        }); 
    });

    $(document).on('change','#attendancetype', function() {
        $('#load_attendance_report').html('');
        var type = $(this).val();
        if(type != 0) {
            divShow();
        } else {
            $('#classesID').val(0);
            divHide();
        }
    });

    $(document).on('change', '#classesID', function() {
        $('#load_attendance_report').html('');
        var id = $(this).val();
        if(id == 0) {
            $('#sectionID').html('<option value="">'+""+'</option>');
            $('#sectionID').val('');

            $('#subjectID').html('<option value="">'+""+'</option>');
            $('#subjectID').val('');
            
            $('#date').val('');
        } else {
            $.ajax({
                type: 'POST',
                url: "",
                data: {"id" : id},
                dataType: "html",
                success: function(data) {
                   $('#sectionID').html(data);
                }
            });

            $.ajax({
                type: 'POST',
                url: "",
                data: {"classID" : id},
                dataType: "html",
                success: function(data) {
                   $('#subjectID').html(data);
                }
            });
        }
    });

    $(document).on('change', '#sectionID', function() {
        $('#load_attendance_report').html('');
    });

    $(document).on('change', '#subjectID', function() {
        $('#load_attendance_report').html('');
    });
    
    $(document).on('change', '#date', function() {
        $('#load_attendance_report').html('');
    });

    $(document).on('click', '#get_attendancereport', function() {
        $('#load_attendance_report').html('');
        var error = 0;
        var field = {
            'attendancetype' : $('#attendancetype').val(),
            'classesID' : $('#classesID').val(),
            'sectionID' : $('#sectionID').val(),
            'date' : $('#date').val(),
            'subjectID' : $('#subjectID').val(),
        };

        error = validation_checker(field, error);

        if(error === 0) {
            makingPostDataPreviousofAjaxCall(field);
        }

    });

    function validation_checker(field, error){
        if (field['attendancetype'] == 0) {
            $('#attendancetypeDiv').addClass('has-error');
            error++;
        } else {
            $('#attendancetypeDiv').removeClass('has-error');
        }

        if (field['classesID'] == 0) {
            $('#classesDiv').addClass('has-error');
            error++;
        } else {
            $('#classesDiv').removeClass('has-error');
        }

        if (field['date'] == '') {
            $('#dateDiv').addClass('has-error');
            error++;
        } else {
            $('#dateDiv').removeClass('has-error');
        }

        return error;
    }

    function makingPostDataPreviousofAjaxCall(field) {
        passData = field;
        ajaxCall(passData);
    }

    function ajaxCall(passData) {
        $.ajax({
            type: 'POST',
            url: "",
            data: passData,
            dataType: "html",
            success: function(data) {
                var response = JSON.parse(data);
                renderLoder(response, passData);
            }
        });
    }

    function renderLoder(response, passData) {
        if(response.status) {
            $('#load_attendance_report').html(response.render);
            for (var key in passData) {
                if (passData.hasOwnProperty(key)) {
                    $('#'+key).parent().removeClass('has-error');
                }
            }
        } else {
            for (var key in passData) {
                if (passData.hasOwnProperty(key)) {
                    $('#'+key).parent().removeClass('has-error');
                }
            }

            for (var key in response) {
                if (response.hasOwnProperty(key)) {
                    $('#'+key).parent().addClass('has-error');
                }
            }
        }
    }
    
</script>
@endsection