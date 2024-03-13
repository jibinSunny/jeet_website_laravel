@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-sm-12" style="margin:10px 0px">
    </div>
</div>
<div class="box">
    <div class="box-header bg-gray">
        <h3 class="box-title text-navy"><i class="fa fa-clipboard"></i> Report For Time Table - Student</h3>
    </div><!-- /.box-header -->
    <div id="printablediv">
        <div class="box-body" style="margin-bottom: 50px;">
            <div class="row">
            <div class="col-sm-12">
                    <div class="reportPage-header">
                        <span class="header" id="headerImage">
                            <p class="bannerLogo">
                                <img src="https://demo.inilabs.net/school/v4.6/uploads/images/site.png">
                            </p>
                        </span>
                        <p class="title">Jeet School Management System</p>
                        <p class="title-desc">Mtipur, Dhaka</p>
                        <p class="title-desc">Academic Year : 2020-2021</p>
                    </div>
                </div>

                <div class="col-sm-12">
                            <h5 class="pull-left">Name : Dipok Kumar Haldar</h5>
                            <h5 class="pull-right">Designation : Chief Instructor</h5>
                </div>

                <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                    <th>Day</th>
                                    <th>1st Period</th>
                                    <th>2nd Period</th>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>SUNDAY</td>
                                            <td class="text-center">
                                            <p>10:30 AM-11:30 AM</p>
                                            <p><span class="left">Subject :</span><span class="right">Bangla</span></p>
                                            <p><span class="left">Teacher :</span><span class="right">Dipok Kumar Haldar</span></p>
                                            <p><span class="left">Room No :</span><span class="right">101</span></p>
                                            </td>
                                            <td>
                                            <p>1:45 PM-3:45 PM</p>
                                            <p><span class="left">Subject :</span><span class="right">Math Matrix</span></p>
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td>TUESDAY</td>
                                            <td class="text-center">
                                            <p>10:30 AM-11:30 AM</p>
                                            <p><span class="left">Subject :</span><span class="right">Bangla</span></p>
                                            <p><span class="left">Teacher :</span><span class="right">Dipok Kumar Haldar</span></p>
                                            <p><span class="left">Room No :</span><span class="right">101</span></p>
                                            </td>
                                            <td>
                                            <p>1:45 PM-3:45 PM</p>
                                            <p><span class="left">Subject :</span><span class="right">Math Matrix</span></p>
                                            </td>
                                        </tr> 
                                </tbody>
                            </table>
                        </div>
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

<script type="text/javascript">
    
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
            'to'         : $('#to').val(), 
            'subject'    : $('#subject').val(), 
            'message'    : $('#message').val(),
            'routinefor' : '',
            'teacherID'  : '',
            'classesID'  : '',
            'sectionID'  : '',
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
            $("#subject_error").html("").css("text-align", "left").css("color", 'red');
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
@section('scripts')

@endsection