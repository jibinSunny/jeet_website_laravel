@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-sm-12" style="margin:10px 0px">
    </div>
</div>

    <div class="box">
        <div class="box-header bg-gray">
            <h3 class="box-title text-navy"><i class="fa fa-clipboard"></i> Report For Class - One ( Section A )</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div id="printablediv">
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12" style="margin-bottom: 25px;"></div>

                    <div class="col-sm-6">
                        <div class="box box-solid " style="border: 1px #ccc solid; border-left: 2px black solid">
                            <div class="box-header bg-gray with-border">
                                <h3 class="box-title text-navy">Class Informations</h3>
                                <ol class="breadcrumb">
                                    <li><i class="fa fa-info fa-2x"></i></li>
                                </ol>
                            </div>
                            <div class="box-body">
                                <span class='text-blue'>Number of Students : 3</span><br>
                                <span class='text-blue'>Total Subject Assigned : 5</span>
                            </div>
                        </div>

                        <br>

                        <div class="box box-solid " style="border: 1px #ccc solid; border-left: 2px green solid">
                            <div class="box-header bg-gray with-border">
                                <h3 class="box-title text-navy">Subjects And Teachers</h3>
                                <ol class="breadcrumb">
                                    <li><i class="fa fa-book fa-2x"></i></li>
                                </ol>
                            </div>
                            <div class="box-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Teacher</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr>
                                            <td>Bangla</td>
                                            <td>Dipok Kumar Haldar</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br>

                        <div class="box box-solid " style="border: 1px #ccc solid; border-left: 2px blue solid">
                            <div class="box-header bg-gray with-border">
                                <h3 class="box-title text-navy">Fee Details</h3>
                                <ol class="breadcrumb">
                                    <li><i class="fa fa-pie-chart fa-2x"></i></li>
                                </ol>
                            </div>
                            <div class="box-body">
                                <div id="feetype_chart"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="box box-solid " style="border: 1px #ccc solid; border-left: 2px red solid">
                            <div class="box-header bg-gray with-border">
                                <h3 class="box-title text-navy">Class Teacher</h3>
                                <ol class="breadcrumb">
                                    <li><i class="fa icon-teacher fa-2x"></i></li>
                                </ol>
                            </div>
                            <div class="box-body">
                                <section class="panel">
                                  <div class="profile-db-head bg-maroon-light">
                                      <a><img src="https://demo.inilabs.net/school/v4.6/uploads/images/default.png" alt=""></a>
                                    <h1>Md Rid Islam</h1>
                                  </div>
                                  <table class="table table-hover">
                                      <tbody>
                                          <tr>
                                            <td><i class="fa fa-phone text-maroon-light" ></i></td>
                                            <td>Phone</td>
                                            <td>0123456789</td>
                                          </tr>
                                          <tr>
                                              <td><i class="fa fa-envelope text-maroon-light"></i></td>
                                              <td>Email</td>
                                            <td>ridislam@inilabs.net</td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <i class=" fa fa-globe text-maroon-light"></i>
                                            </td>
                                            <td>Address</td>
                                            <td>mirpur,dhaka</td>
                                          </tr>
                                      </tbody>
                                  </table>
                                </section>
                            </div>
                        </div>

                        <br>

                        <div class="box box-solid " style="border: 1px #ccc solid; border-left: 2px orange solid">
                            <div class="box-header bg-gray with-border">
                                <h3 class="box-title text-navy">Fee types Collection</h3>
                                <ol class="breadcrumb">
                                    <li><i class="fa fa-dollar fa-2x"></i></li>
                                </ol>
                            </div>
                            <div class="box-body">
                                
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Fee type</th>
                                            <th>Collection</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Books Fine</td>
                                            <td>12000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 text-center footerAll">
                    </div>
                </div><!-- row -->
            </div><!-- Body -->
        </div>
    </div>

<!-- email modal starts here -->
<form class="form-horizontal" role="form" action="" method="post">
    <div class="modal fade" id="mail">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                    <label for="to" class="col-sm-2 control-label">
                        <span class="text-red">*</span>
                    </label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="to" name="to" value="" >
                    </div>
                    <span class="col-sm-4 control-label" id="to_error">
                    </span>
                </div>

                    <label for="subject" class="col-sm-2 control-label">
                        <span class="text-red">*</span>
                    </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="subject" name="subject" value="" >
                    </div>
                    <span class="col-sm-4 control-label" id="subject_error">
                    </span>

                </div>

                    <label for="message" class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                        <textarea class="form-control" id="message" style="resize: vertical;" name="message" value="" ></textarea>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" style="margin-bottom:0px;" data-dismiss="modal"></button>
                <input type="button" id="send_pdf" class="btn btn-success" value="" />
            </div>
        </div>
      </div>
    </div>
</form>
<!-- email end here -->
@endsection
@section('scripts')
<script type="text/javascript">

    $(function () {
        $('#feetype_chart').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y:f}</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y:f} ',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Amount',
                colorByPoint: true,
                data: [{
                    name: '',
                    y: 
                }, {
                    name: '',
                    y: ,
                    sliced: true,
                    selected: true
                }]
            }]
        });
    });

    function check_email(email) {
        var status = false;
        var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
        if (email.search(emailRegEx) == -1) {
            $("#to_error").html('');
            $("#to_error").html("").css("text-align", "left").css("color", 'red');
        } else {
            status = true;
        }
        return status;
    }


    $('#send_pdf').click(function() {
        var field = {
            'to'     : $('#to').val(), 
            'subject'     : $('#subject').val(), 
            'message'     : $('#message').val(), 
            'classesID'     : , 
            'sectionID'     : , 
        };

        var to = $('#to').val();
        var subject = $('#subject').val();
        var error = 0;

        $("#to_error").html("");
        $("#subject_error").html("");

        if(to == "" || to == null) {
            error++;
            $("#to_error").html("").css("text-align", "left").css("color", 'red');
        } else {
            if(check_email(to) == false) {
                error++
            }
        }

        if(subject == "" || subject == null) {
            error++;
            $("#subject_error").html(">").css("text-align", "left").css("color", 'red');
        } else {
            $("#subject_error").html("");
        }

        if(error == 0) {
            $('#send_pdf').attr('disabled','disabled');
            $.ajax({
                type: 'POST',
                url: "",
                data: field,
                dataType: "html",
                success: function(data) {
                    var response = JSON.parse(data);
                    if (response.status == false) {
                        $('#send_pdf').removeAttr('disabled');
                        if( response.to) {
                            $("#to_error").html("").css("text-align", "left").css("color", 'red');
                        } 

                        if( response.subject) {
                            $("#subject_error").html("").css("text-align", "left").css("color", 'red');
                        }

                        if(response.message) {
                            toastr["error"](response.message)
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
                    } else {
                        location.reload();
                    }
                }
            });
        }
    });

</script>
@endsection