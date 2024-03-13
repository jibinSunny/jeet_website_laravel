@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa iniicon-routinereport"></i> Time Table Report</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Time Table Report</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">

            <div class="col-sm-12">
                <div class="form-group col-sm-4" id="routineForDiv">
                    <label>Report For<span class="text-red"> * </span></label>
                    <select id="routine" name="routine" class="form-control select2">
                        <option value="0">Student</option>
                        <option value="0">Teacher</option>
                    </select>
                </div>



                <div class="col-sm-4">
                    <button id="get_routinereport" class="btn btn-success" style="margin-top:23px;">Get Report</button>
                </div>

            </div>

        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

<div id="load_routinereport"></div>

@endsection
@section('scripts')
<script type="text/javascript">
    
    function printDiv(divID) {
        var oldPage = document.body.innerHTML;
        $('#headerImage').remove();
        $('.footerAll').remove();
        var divElements = document.getElementById(divID).innerHTML;
        var footer = "<center><img src='' style='width:30px;' /></center>";
        var copyright = "  : ";
        document.body.innerHTML =
          "<html><head><title></title></head><body>" +
          "<center><img src='' style='width:50px;' /></center>"
          + divElements + footer + copyright + "</body>";

        window.print();
        document.body.innerHTML = oldPage;
        window.location.reload();
    }

    $('.section2').select2();

    $(function(){
        $("#routinefor").val(0);
        $("#teacherID").val(0);
        $("#classesID").val(0);
        $("#sectionID").val(0);
        $('#teacherDiv').hide('slow');
        $('#classesDiv').hide('slow');
        $('#sectionDiv').hide('slow');
    });

    $(document).on('change', "#routinefor", function() {
        $('#load_routinereport').html("");
        var routinefor = $(this).val();
        if(routinefor == '0'){
            $('#teacherDiv').hide('slow');
            $("#classesDiv").hide('slow');
            $("#sectionDiv").hide('slow');
        } else if(routinefor == 'student') {
            $("#classesID").val(0);
            $("#sectionID").val(0);
            $('#teacherDiv').hide('slow');
            $("#classesDiv").show('slow');
            $("#sectionDiv").show('slow');
        } else if(routinefor == 'teacher') {
            $("#teacherID").val(0);
            $("#teacherDiv").show('slow');
            $("#classesDiv").hide('slow');
            $("#sectionDiv").hide('slow');
        }
    });



    $(document).on('change',"#classesID", function() {
        $('#load_routinereport').html("");
        var id = $(this).val();
        if(id == '0') {
            $('#sectionID').html('<option value="">'+""+'</option>');
            $('#sectionID').val('');
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
        }
    });

    $(document).on('change',"#sectionID", function() {
        $('#load_routinereport').html('');
    });

    $(document).on('change',"#teacherID", function() {
        $('#load_routinereport').html('');
    });

    $(document).on('click','#get_routinereport', function() {
        $('#load_routinereport').html();
        var passData;
        var error = 0;
        var field = {
            'routinefor'    : $("#routinefor").val(),
            'teacherID'     : $('#teacherID').val(), 
            'classesID'     : $('#classesID').val(), 
            'sectionID'     : $('#sectionID').val(), 
        };

        if (field['routinefor'] == 0) {
            $('#routineForDiv').addClass('has-error');
            error++;
        } else {
            $('#routineForDiv').removeClass('has-error');
        }

        if (field['routinefor'] == 'student') {
            if (field['classesID'] == 0) {
                $('#classesDiv').addClass('has-error');
                error++;
            } else {
                $('#classesDiv').removeClass('has-error');
            }

            if (field['sectionID'] == 0) {
                $('#sectionDiv').addClass('has-error');
                error++;
            } else {
                $('#sectionDiv').removeClass('has-error');
            }
        } else if (field['routinefor'] == 'teacher') {
            if (field['teacherID'] == 0) {
                $('#teacherDiv').addClass('has-error');
                error++;
            } else {
                $('#teacherDiv').removeClass('has-error');
            }
        }

        if (error == 0) {
            makingPostDataPreviousofAjaxCall(field);
        }
    });

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
            $('#load_routinereport').html(response.render);
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