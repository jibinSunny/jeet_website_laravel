@extends('layouts.admin')
@section('content')
	<div class="well">
		<div class="row">
			<div class="col-sm-6">
	          	<button class="btn-cs btn-sm-cs" onclick="javascript:printDiv('printablediv')"><span class="fa fa-print"></span> </button>
	          	
	          <button class="btn-cs btn-sm-cs" data-toggle="modal" data-target="#mail"><span class="fa fa-envelope-o"></span></button>
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
        <div class="row">
            <div class="col-sm-3">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                    
                        <h3 class="profile-username text-center"></h3>
                       
                            <p class="text-muted text-center"></p>
                            <p class="text-muted text-center"></p>
                        <ul class="list-group list-group-unbordered">
                            
                                <li class="list-group-item" style="background-color: #FFF">
                                    <b></b> <a class="pull-right"></a>
                                </li>
                           
                                <li class="list-group-item" style="background-color: #FFF">
                                    <b></b> <a class="pull-right"></a>
                                </li>
                                <li class="list-group-item" style="background-color: #FFF">
                                    <b></b> <a class="pull-right"></a>
                                </li>
                                <li class="list-group-item" style="background-color: #FFF">
                                    <b></b> <a class="pull-right"></a>
                                </li>
                                <li class="list-group-item" style="background-color: #FFF">
                                    <b></b> <a class="pull-right"></a>
                                </li>
    
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-mergin">
              	<div class="box box-primary box-height">
                	<div class="box-body box-profile">
                    	<h5></h5>
                    	<p></p>
                	</div>
              	</div>
            </div>
            <div class="col-sm-3">
              	<div class="box box-primary">
                	<div class="box-body box-profile">
                  		<div class="single_box">
                    		<strong></strong>
                    		<p class="text-muted"></p>
                  		</div>
	                  	<div class="single_box">
	                    	<strong></strong>
	                    	<p class="text-muted"></p>
	                  	</div>
	                  	<div class="single_box">
	                    	<strong></strong>
	                    	<p class="text-muted"></p>
	                  	</div>
	                  	<div class="single_box">
	                    	<strong></strong>
	                    	<p class="text-muted"></p>
	                  	</div>
	                  	<div class="single_box">
	                    	<strong></strong>
	                    	<p class="text-muted"></p>
	                  	</div>
	                  	<div class="single_box">
	                    	<strong></strong>
	                    	<p class="text-muted"></p>
	                  	</div>
	                  	<div class="single_box">
	                    	<strong></strong>
	                    	<p class="text-muted"></p>
	                  	</div>
	                  	<div class="single_box">
	                    	<strong></strong>
	                    	<p class="text-muted"></p>
	                  	</div>
	                  	<div class="single_box">
	                    	<strong></strong>
	                    	<p class="text-muted">
	                    	</p>
	                  	</div>
                	</div>
              	</div>
            </div>
        </div>
    </div>

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

		              
		                    <label for="message" class="col-sm-2 control-label">
		                    
		                    </label>
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

	<script type="text/javascript">
	  	function printDiv(divID) {
	      	//Get the HTML of div
	      	var divElements = document.getElementById(divID).innerHTML;
		    //Get the HTML of whole page
		    var oldPage = document.body.innerHTML;

		    //Reset the page's HTML with div's HTML only
		    document.body.innerHTML ="<html><head><title></title></head><body>" +divElements + "</body>";

		    //Print Page
		    window.print();

		    //Restore orignal HTML
		    document.body.innerHTML = oldPage;
		    window.location.reload();
	  	}

  		function check_email(email) {
      		var status = false;
      		var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
      		if(email.search(emailRegEx) == -1) {
          		$("#to_error").html('');
          		$("#to_error").html("").css("text-align", "left").css("color", 'red');
      		} else {
          		status = true;
      		}
      		return status;
  		}


  		$("#send_pdf").click(function(){
      		var to = $('#to').val();
      		var subject = $('#subject').val();
      		var message = $('#message').val();
      		var leaveapplicationID = "<?=$leaveapply->leaveapplicationID;?>";
      		var error = 0;

      		$("#to_error").html("");
      		if(to == "" || to == null) {
          		error++;
          		$("#to_error").html("");
          		$("#to_error").html("").css("text-align", "left").css("color", 'red');
      		} else {
          		if(check_email(to) == false) {
              		error++
          		}
      		}

	      	if(subject == "" || subject == null) {
	          	error++;
	          	$("#subject_error").html("");
	          	$("#subject_error").html("").css("text-align", "left").css("color", 'red');
	      	} else {
	          	$("#subject_error").html("");
	      	}

      		if(error == 0) {
	            $('#send_pdf').attr('disabled','disabled');
          		$.ajax({
              		type: 'POST',
              		url: "",
              		data: 'to='+ to + '&subject=' + subject + "&leaveapplicationID=" + leaveapplicationID+ "&message=" + message,
              		dataType: "html",
              		success: function(data) {
                		var response = JSON.parse(data);
                		if (response.status == false) {
                        	$('#send_pdf').removeAttr('disabled');
                  			$.each(response, function(index, value) {
                    			if(index != 'status') {
                      				toastr["error"](value)
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
                		} else {
                  			location.reload();
                		}
              		}
          		});
      		}
  		});
	</script>
