@extends('layouts.admin')
@section('content')
    <div class="well">
        <div class="row">

            <div class="col-sm-6">
                <button class="btn-cs btn-sm-cs" onclick="javascript:printDiv('printablediv')"><span class="fa fa-print"></span> Print </button>
                <a href="" class="btn-cs btn-sm-cs" style="text-decoration: none;" role="button" target="_blank"><i class="fa fa-file"></i> PDF Preview</a>                                    <a href="" class="btn-cs btn-sm-cs" style="text-decoration: none;" role="button">Edit</a>                                <a href="" class="btn-cs btn-sm-cs" style="text-decoration: none;" role="button"><i class="fa fa-credit-card"></i> Payment</a>                <button class="btn-cs btn-sm-cs" data-toggle="modal" data-target="#mail"><span class="fa fa-envelope-o"></span> Send Pdf to Mail</button>                
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li><a href=""><i class="fa icon-dashboardIcon"></i> </a></li>
                    <li><a href=""></a></li>
                    <li class="active"></li>
                </ol>
            </div>
        </div>
    </div>

    <div id="printablediv">
    	<section class="content invoice">
    		<div class="row">
    		    <div class="col-xs-12">
    		        <h2 class="page-header">
    		            <img src="https://demo.inilabs.net/school/v4.6/uploads/images/site.png" width="25px" height="25px" class="img-circle" style="margin-top:-10px" alt="">Jeet School Management System    		            <small class="pull-right">Create Date : 09 Nov 2020</small>
    		        </h2>
    		    </div><!-- /.col -->
    		</div>
    		<div class="row invoice-info">
    		    <div class="col-sm-4 invoice-col" style="font-size: 16px;">
    				From    				<address>
    					<strong>Jeet School Management System</strong><br>
    					Mtipur, Dhaka<br>
    					Phone : +8801728660964<br>
    					Email : info@jeet.net<br>
    				</address>
    	            

    		    </div><!-- /.col -->
    		    <div class="col-sm-4 invoice-col" style="font-size: 16px;">
    	        	To    	        	<address>
    	        		<strong>Ankit Kumar</strong><br>
    	        		Roll : 9<br>
    	        		Class : Five<br>
    	        		Register NO : INI509<br>
    	        		Email : ankit@jeet.net<br>
    	        	</address>
    		    </div><!-- /.col -->
    		    <div class="col-sm-4 invoice-col" style="font-size: 16px;">
    		        <b>Invoice #45</b><br>
                    Payment Status : <span class="text-red">Not Paid</span>
    		    </div>
    		</div>
            <br>

            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-bordered product-style">
                            <thead>
                                <tr>
                                    <th class="col-lg-2">#</th>
                                    <th class="col-lg-4">Fee Type</th>
                                    <th class="col-lg-2">Amount</th>
                                    <th class="col-lg-2">Discount</th>
                                    <th class="col-lg-2">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                                                    <tr>
                                        <td data-title="#">
                                            1                                        </td>
                                        
                                        <td data-title="Fee Type">
                                            Books Fine                                        </td>
                                        
                                        <td data-title="Amount">
                                            2,500.00                                        </td>

                                        <td data-title="Discount">
                                            250.00                                        </td>

                                        <td data-title="Subtotal">
                                            2,250.00                                        </td>
                                    </tr>
                                                                    <tr>
                                        <td data-title="#">
                                            2                                        </td>
                                        
                                        <td data-title="Fee Type">
                                            Library Fee                                        </td>
                                        
                                        <td data-title="Amount">
                                            2,500.00                                        </td>

                                        <td data-title="Discount">
                                            375.00                                        </td>

                                        <td data-title="Subtotal">
                                            2,125.00                                        </td>
                                    </tr>
                                                                    <tr>
                                        <td data-title="#">
                                            3                                        </td>
                                        
                                        <td data-title="Fee Type">
                                            Hostel Fee                                        </td>
                                        
                                        <td data-title="Amount">
                                            2,500.00                                        </td>

                                        <td data-title="Discount">
                                            0.00                                        </td>

                                        <td data-title="Subtotal">
                                            2,500.00                                        </td>
                                    </tr>
                                                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4"><span class="pull-right"><b>Total Amount (USD)</b></span></td>
                                    <td><b>6,875.00</b></td>
                                </tr>
                                <tr>
                                    <td colspan="4"><span class="pull-right"><b>Paid (USD)</b></span></td>
                                    <td><b>0.00</b></td>
                                </tr> 
                                <tr>
                                    <td colspan="4"><span class="pull-right"><b>Weaver (USD)</b></span></td>
                                    <td><b>0.00</b></td>
                                </tr>
                                <tr>
                                    <td colspan="4"><span class="pull-right"><b>Balance (USD)</b></span></td>
                                    <td><b>6,875.00</b></td>
                                </tr>
                                <tr>
                                    <td colspan="4"><span class="pull-right"><b>Fine (USD)</b></span></td>
                                    <td><b>0.00</b></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="col-sm-3 col-xs-12 pull-right">
                    <div class="well well-sm">
                        <p>
                            Create By : Admin                            <br>
                            Date : 20 Sep 2020                        </p>
                    </div>
                </div>
            </div>


    		<!-- this row will not appear when printing -->
    	</section>
    </div>
    <!-- email modal starts here -->
    <form class="form-horizontal" role="form" action="" method="post">
        <div class="modal fade" id="mail">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                        <label for="to" class="col-sm-2 control-label">
                            <span class="text-red">Hekukjk*</span>
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
                            <textarea class="form-control" id="message" name="message" style="resize: vertical;" value="" ></textarea>
                        </div>
                    </div>

                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" style="margin-bottom:0px;" data-dismiss="modal"></button>
                    <input type="button" id="send_pdf" class="btn btn-primary" value="Print Invoice" />
                </div>
            </div>
          </div>
        </div>
    </form>
    <!-- email end here -->
    
    @endsection
@section('scripts')
<script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;
            window.location.reload();
        }
        function closeWindow() {
            location.reload(); 
        }

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


        $("#send_pdf").click(function(){
            var field = {
                'to'                : $('#to').val(), 
                'subject'           : $('#subject').val(), 
                'message'           : $('#message').val(),
                'id'                : "",
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
                            if(response.to) {
                                $("#to_error").html("").css("text-align", "left").css("color", 'red');
                            } 
                            
                            if(response.subject) {
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