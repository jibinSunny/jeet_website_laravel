@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-classreport"></i> Class Report</h3>

        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashbaord</a></li>
            <li class="active">Class Report</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
                
            <div class="col-sm-12">
                <div class="form-group col-sm-4" id="classesDiv">
                    <label>Class<span class="text-red"> * </span></label>
                    <select name="class" id="class" class="form-control select2" tabindex="-1">
                        <option value="0">Select Class</option>
                    </select>
                </div>

                <div class="form-group col-sm-4" id="sectionDiv">
                    <label>Division</label>
                    <select id="sectionID" name="sectionID" class="form-control select2">
                        <option value="0">A</option>
                        <option value="0">B</option>
                    </select>
                </div>

                <div class="col-sm-4">
                    <button id="get_classreport" class="btn btn-success" style="margin-top:23px;">Get Report</button>
                </div>
            </div>

        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

<div id="load_classreport"></div>


@endsection
@section('scripts')
<script type="text/javascript">

    $('.select2').select2();
    
    function printDiv(divID) {
        var oldPage = document.body.innerHTML;
        

        $('.reportPage-header').remove();
        $('#headerImage').remove();
        $('.footerAll').remove();
        var divElements = document.getElementById(divID).innerHTML;
        var footer = "<center><img src='";
        var copyright = "";
        document.body.innerHTML =
          "<html><head><title></title></head><body>" +
          "<center><img src='' style='width:50px;' /></center><center class='title'></center>"
          + divElements + footer + copyright + "</body>";

        window.print();
        document.body.innerHTML = oldPage;
        window.location.reload();
    }
    

    $(document).on('change','#classesID', function() {
        $('#load_classreport').html('');
        var id = $(this).val();
        if(id == 0) {
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

    $(document).on('click','#get_classreport', function() {
        var error=0;;
        var field = {
            'classesID'     : $('#classesID').val(), 
            'sectionID'     : $('#sectionID').val(), 
        };

        if(!parseInt(field['classesID'])) {
            field['classesID'] = parseInt(field['classesID']);
        }

        if (field['classesID'] === 0) {
            $('#classesDiv').addClass('has-error');
            error++;
        } else {
            $('#classesDiv').removeClass('has-error');
        }

        if(error === 0) {
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
            $('#load_classreport').html(response.render);
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