@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-balance-scale"></i> Global Payment</h3>

        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Global Payment</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">

            <div class="col-sm-12">
                <div class="col-sm-12">

                    <form method="POST">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label for="classesID" class="control-label">
                                                Class <span class="text-red">*</span>
                                            </label>
                                            <select name="class" id="class" class="form-control select2" tabindex="-1">
                                                <option value="0">Select Class</option>
                                                </select>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label for="sectionID" class="control-label">Division</label>
                                            <select name="class" id="class" class="form-control select2" tabindex="-1">
                                                <option value="0">Select Division</option>
                                                </select>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label for="studentID" class="control-label">
                                               Student <span class="text-red">*</span>
                                            </label>
                                            <select name="class" id="class" class="form-control select2" tabindex="-1">
                                                <option value="0">Select Student</option>
                                                </select>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 col-xs-12">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <div class="form-group" >
                                            <button type="submit" class="btn btn-success col-md-12 col-xs-12 global_payment_search">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-sm-12" >
                        <div class="col-sm-12 feesPaymentInfo">
                            <div class="col-sm-3 info">
                                <img class="img" src="">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Register No</td>
                                            <td>INI101</td>
                                        </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td>Tamim Iqbal</td>
                                        </tr>
                                        <tr>
                                            <td>Class</td>
                                            <td>One</td>
                                        </tr>
                                        <tr>
                                            <td>Roll</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>Division</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Group</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="vl"></div>

                            <div class="col-sm-9 invoice-table-responsive">
                                <div class="table-responsive">
                                    <table id="" class="table table-striped table-bordered table-hover dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th>Invoice Number</th>
                                                <th>Total Pay</th>
                                                <th>Weaver</th>
                                                <th>Fine</th>
                                                <th>Total Collection</th>
                                                <th>Clearance</th>
                                                <th>Payment Date</th>
                                                <th>Auction</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    <td>INV-G-19</td>
                                                    <td>6880</td>
                                                    <td>20</td>
                                                    <td>10</td>
                                                    <td>6890</td>
                                                    <td>Paid</td>
                                                    <td>20-Sep-2020</td>
                                                    <td>Action</td>
                                                </tr>
                                            <tr>
                                                <td><b></b></td>
                                                <td><b></b></td>
                                                <td><b></b></td>
                                                <td><b></b></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12" style="padding-left: 0px; padding-right: 0px;">
                            <table class="table table-striped table-bordered" style="margin-top: 10px">
                                <thead>
                                    <tr>
                                        <td style="border-bottom-width: 1px;">Invoice Name</td>
                                        <td style="border-bottom-width: 1px;"><input class="form-control" id="invoicename" type="text" name="invoicename" value="INI101-Tamim Iqbal"></td>

                                        <td style="border-bottom-width: 1px;">Description</td>
                                        <td style="border-bottom-width: 1px;"><input class="form-control" id="invoicedescription" type="text" name="invoicedescription"></td>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>Invoice Number</td>
                                        <td><input class="form-control" id="invoicenumber" type="text" name="invoicenumber" value="INV-G-29" readonly=""></td>
                                        <td>Year</td>
                                        <td><input class="form-control" id="paymentyear" type="text" name="paymentyear" value="2020"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-sm-12" style="padding-left: 0px; padding-right: 0px;">
                            <div class="table-responsive" style="margin-top:10px !important">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Fees Name</td>
                                            <td>Fees Amount</td>
                                            <td>Due</td>
                                            <td>Paid Amount</td>
                                            <td>Weaver</td>
                                            <td>Fine</td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                                                                        
                                                    <tr>
                                                        <td style="width:10%">1</td>
                                                        <td style="width:10%">Books Fine</td>
                                                        <td style="width:10%">4500</td>
                                                        <td id="_due_0" style="width:10%">0.00</td>
                                                        <td style="width:10%">
                                                            Paid<input style="display:none" name="paid-1-1" class="form-control paid_amount _paid_0" type="text">                                                            </td>
                                                        <td style="width:10%">
                                                            <input style="display:none" name="weaver-1-1" class="form-control weaver _weaver_0" type="text">                                                            </td>
                                                        <td style="width:10%">
                                                            <input style="display:none" name="fine-1-1" class="form-control fine" type="text">                                                            </td>
                                                    </tr>
                                                                                                
                                                    <tr>
                                                        <td style="width:10%">2</td>
                                                        <td style="width:10%">Library Fee</td>
                                                        <td style="width:10%">2400</td>
                                                        <td id="_due_1" style="width:10%">0</td>
                                                        <td style="width:10%">
                                                            Paid<input style="display:none" name="paid-2-2" class="form-control paid_amount _paid_1" type="text">                                                            </td>
                                                        <td style="width:10%">
                                                            <input style="display:none" name="weaver-2-2" class="form-control weaver _weaver_1" type="text">                                                            </td>
                                                        <td style="width:10%">
                                                            <input style="display:none" name="fine-2-2" class="form-control fine" type="text">                                                            </td>
                                                    </tr>
                                                                                                <tr>
                                                <td></td>
                                                <td><b>Total</b></td>
                                                <td>6900.00</td>
                                                <td>0</td>
                                                <td id="set_paid_amount">0</td>
                                                <td id="set_weaver">0</td>
                                                <td id="set_fine">0</td>
                                            </tr>

                                            <tr>
                                                <td colspan="2" style="width:10%"></td>
                                                <td colspan="2" style="width:10%">Total Collection (Paid+Fine)</td>
                                                <td colspan="3" style="width:10%" id="TottalCollection">0</td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td>Payment Status</td>
                                                <td>
                                                    <select class="form-control" id="payment_status">
                                                        <option value="paid">Paid</option>
                                                        <option value="partial">Partial</option>
                                                        <option value="unpaid">Un-paid</option>
                                                    </select>
                                                </td>

                                                <td>Payment Type</td>
                                                <td>
                                                    <select class="form-control" id="payment_type">
                                                        <option value="cash">Cash</option>
                                                        <option value="chaque">Cheque</option>
                                                    </select>
                                                </td>
                                                <td colspan="2"></td>
                                            </tr>
                                                                                </tbody>
                                </table>
                            </div>
                        </div>

                            <button id="add_payment" type="submit" class="btn btn-success col-md-2" style="margin-top: 20px;">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="modal fade" id="">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div id="">
                    <style type="text/css">
                        .assign-fee-payment .table {
                            width: 100%;
                            margin-bottom: 20px;
                        }
                        .assign-fee-payment table {
                            font-size: 12px;
                            max-width: 100%;
                            background-color: transparent;
                        }
                        .assign-fee-payment table {
                            border-collapse: collapse;
                            border-spacing: 0;
                        }

                        .assign-fee-payment .table > thead > tr > th {
                            vertical-align: bottom;
                            border-bottom: 2px solid #ddd;
                        }

                        .assign-fee-payment th {
                            text-align: left;
                        }

                        .assign-fee-payment {
                          font-family: sans-serif;
                          background-color: #fff !important; 
                          border: 1px solid #ccc;
                          color: #000;
                          padding: 10px;
                        }

                        .assign-fee-payment .logo {
                          height: 50px;
                          width: 50px;
                          text-align: center;
                          margin-left: auto;
                          margin-right: auto;
                          margin-bottom: 0px;
                          margin-top: 0px;
                        }

                        .assign-fee-payment .header .logo img {
                            height: 50px;
                            width: 50px;
                        }

                        .assign-fee-payment .title {
                          font-size: 16px;
                          text-align: center;
                          margin-left: auto;
                          margin-right: auto;
                          margin-bottom: 0px;
                          margin-top: 0px;
                        }

                        .assign-fee-payment .title-desc {
                          font-size: 14px;
                          text-align: center;
                          margin-left: auto;
                          margin-right: auto;
                          margin-bottom: 0px;
                          margin-top: 0px;
                        }

                        .assign-fee-payment .info td {
                          border-top: none !important;
                          font-size: 12px;
                          color: #000;
                         }

                        .assign-fee-payment th, .assign-fee-payment td {
                          padding: 1px !important;
                        }

                        .assign-fee-payment th {
                          background-color: #ccc !important;
                          padding: 1px !important;
                        }

                        .assign-fee-payment .textright {
                          text-align: right;
                        }

                        .assign-fee-payment .boldandred {
                          font-weight: bold;
                          color: red !important;
                        }

                        .assign-fee-payment .footer .logo {
                          width: 20px;
                          height: 20px;
                          text-align: center;
                          margin-left: auto;
                          margin-right: auto;
                          margin-bottom: 0px;
                          margin-top: 0px;
                        }

                        .assign-fee-payment .footer .logo img {
                            height: 20px;
                            width: 20px;
                        }

                        .assign-fee-payment .copyright {
                          text-align: center;
                          margin-left: auto;
                          margin-right: auto;
                          margin-bottom: 0px;
                          margin-top: 0px;
                          font-size: 12px;
                        }

                        .assign-fee-payment hr {
                          margin-top: 5px;
                          margin-bottom: 5px;
                          border-top: 1px solid #eee;
                        }
                    </style>
                    <div class="modal-body" >
                        <div class="assign-fee-payment">
                            <span class="header"><p class="logo"><img src=""></p></span>
                            <p class="title">Jeet School Management System</p>
                            <p class="title-desc">Trivandrum, Kerala</p>
                            <hr>

                            <table class="table info">
                                <tr>
                                    <td><b>Invoice Number: </b>INV-G-</td>
                                    <td><b>Clearance: </b>PAID</td>
                                    <td><b>Date: </b>20-Sep-2020</td>
                                    <td><b>Name: </b>Tamim Iqbal </td>
                                    <td><b>Class: </b>One</td>
                                    <td>Roll: <b></b>1</td>
                                    <td>Division: <b></b>A</td>
                                    <td>Group: <b></b>1</td>
                                </tr>

                                <tr>
                                    <td colspan="3" ><center><b><span></span></b></center></td>
                                </tr>
                            </table>


                            <table class="table">
                                <thead>
                                                                                                                        
                                                <tr>
                                                    <th>Fees Name</th>
                                                    <th class="textright">Amount</th>
                                                </tr>
                                                                            </thead>
                                <tbody>
                                                                                                                                                                                                                        <tr>
                                                    <td>Books Fine</td>
                                                    <td class="textright">4500</td>
                                                </tr>
                                                                                                                                                                                                                                                                                                            <tr>
                                                    <td>Library Fee</td>
                                                    <td class="textright">2380</td>
                                                </tr>
                                                                                                                        
                                                                            <tr>
                                            <td class="boldandred">Total</td>
                                            <td class="boldandred textright">6880</td>
                                        </tr>
                                    

                                                                                                                                                                                                                                                                                                                                        <tr>
                                                    <th colspan="2">Fine</th>
                                                </tr>
                                            
                                                                                                                         
                                                                                                                                                                                                                                                                
                                                <tr>
                                                    <td>Library Fee</td>
                                                    <td class="textright">10</td>
                                                </tr>
                                             
                                                                            
                                                                            <tr>
                                            <td>Total Fine</td>
                                            <td class="textright">10</td>
                                        </tr>
                                        <tr>
                                            <td class="boldandred">Grand Total</td>
                                            <td class="boldandred textright">6890</td>
                                        </tr>
                                    
                                                                                                                                                                                                                                                                                                                                        <tr>
                                                    <th colspan="2">Weaver</th>
                                                </tr>
                                            
                                                                                                                         
                                                                                                                                                                                                                                                                
                                                <tr>
                                                    <td>Library Fee</td>
                                                    <td class="textright">20</td>
                                                </tr>
                                             
                                                                            
                                                                            <tr>
                                            <td class="boldandred">Total Weaver</td>
                                            <td class="boldandred textright">20</td>
                                        </tr>
                                                                    </tbody>
                            </table>

                            <hr>
                            <div class="footer">
                                <p class="logo"><img src=""></p>
                                <p class="copyright">></p>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick=""></button>
                    <button type="button" class="btn btn-default" style="margin-bottom:0px;" data-dismiss="modal"></button>
                </div>

            </div>
        </div>
    </div>

            
    <div class="modal fade in flashModel" style="display: block" aria-hidden="false" id="">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close flashClose" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div id="">
                            <style type="text/css">
                                .assign-fee-payment .table {
                                    width: 100%;
                                    margin-bottom: 20px;
                                }
                                .assign-fee-payment table {
                                    font-size: 12px;
                                    max-width: 100%;
                                    background-color: transparent;
                                }
                                .assign-fee-payment table {
                                    border-collapse: collapse;
                                    border-spacing: 0;
                                }

                                .assign-fee-payment .table > thead > tr > th {
                                    vertical-align: bottom;
                                    border-bottom: 2px solid #ddd;
                                }

                                .assign-fee-payment th {
                                    text-align: left;
                                }

                                .assign-fee-payment {
                                  font-family: sans-serif;
                                  background-color: #fff !important; 
                                  border: 1px solid #ccc;
                                  color: #000;
                                  padding: 10px;
                                }

                                .assign-fee-payment .logo {
                                  height: 50px;
                                  width: 50px;
                                  text-align: center;
                                  margin-left: auto;
                                  margin-right: auto;
                                  margin-bottom: 0px;
                                  margin-top: 0px;
                                }

                                .assign-fee-payment .header .logo img {
                                    height: 50px;
                                    width: 50px;
                                }

                                .assign-fee-payment .title {
                                  font-size: 16px;
                                  text-align: center;
                                  margin-left: auto;
                                  margin-right: auto;
                                  margin-bottom: 0px;
                                  margin-top: 0px;
                                }

                                .assign-fee-payment .title-desc {
                                  font-size: 14px;
                                  text-align: center;
                                  margin-left: auto;
                                  margin-right: auto;
                                  margin-bottom: 0px;
                                  margin-top: 0px;
                                }

                                .assign-fee-payment .info td {
                                  border-top: none !important;
                                  font-size: 12px;
                                  color: #000;
                                 }

                                .assign-fee-payment th, .assign-fee-payment td {
                                  padding: 1px !important;
                                }

                                .assign-fee-payment th {
                                  background-color: #ccc !important;
                                  padding: 1px !important;
                                }

                                .assign-fee-payment .textright {
                                  text-align: right;
                                }

                                .assign-fee-payment .boldandred {
                                  font-weight: bold;
                                  color: red !important;
                                }

                                .assign-fee-payment .footer .logo {
                                  width: 20px;
                                  height: 20px;
                                  text-align: center;
                                  margin-left: auto;
                                  margin-right: auto;
                                  margin-bottom: 0px;
                                  margin-top: 0px;
                                }

                                .assign-fee-payment .footer .logo img {
                                    height: 20px;
                                    width: 20px;
                                }

                                .assign-fee-payment .copyright {
                                  text-align: center;
                                  margin-left: auto;
                                  margin-right: auto;
                                  margin-bottom: 0px;
                                  margin-top: 0px;
                                  font-size: 12px;
                                }

                                .assign-fee-payment hr {
                                  margin-top: 5px;
                                  margin-bottom: 5px;
                                  border-top: 1px solid #eee;
                                }
                            </style>
                            <div class="modal-body" >
                                <div class="assign-fee-payment">
                                    <span class="header"><p class="logo"><img src=""></p></span>
                                    <p class="title">Jeet School Management System</p>
                                    <p class="title-desc">Trivandrum, Kerala</p>
                                    <hr>
        
                                    <table class="table info">
                                        <tr>
                                            <td><b>Invoice Number: </b>INV-G-</td>
                                            <td><b>Clearance: </b>PAID</td>
                                            <td><b>Date: </b>20-Sep-2020</td>
                                            <td><b>Name: </b>Tamim Iqbal </td>
                                            <td><b>Class: </b>One</td>
                                            <td>Roll: <b></b>1</td>
                                            <td>Division: <b></b>A</td>
                                            <td>Group: <b></b>1</td>
                                        </tr>
        
                                        <tr>
                                            <td colspan="3" ><center><b><span></span></b></center></td>
                                        </tr>
                                    </table>
        
        
                                    <table class="table">
                                        <thead>
                                                                                                                                
                                                        <tr>
                                                            <th>Fees Name</th>
                                                            <th class="textright">Amount</th>
                                                        </tr>
                                                                                    </thead>
                                        <tbody>
                                                                                                                                                                                                                                <tr>
                                                            <td>Books Fine</td>
                                                            <td class="textright">4500</td>
                                                        </tr>
                                                                                                                                                                                                                                                                                                                    <tr>
                                                            <td>Library Fee</td>
                                                            <td class="textright">2380</td>
                                                        </tr>
                                                                                                                                
                                                                                    <tr>
                                                    <td class="boldandred">Total</td>
                                                    <td class="boldandred textright">6880</td>
                                                </tr>
                                            
        
                                                                                                                                                                                                                                                                                                                                                <tr>
                                                            <th colspan="2">Fine</th>
                                                        </tr>
                                                    
                                                                                                                                 
                                                                                                                                                                                                                                                                        
                                                        <tr>
                                                            <td>Library Fee</td>
                                                            <td class="textright">10</td>
                                                        </tr>
                                                     
                                                                                    
                                                                                    <tr>
                                                    <td>Total Fine</td>
                                                    <td class="textright">10</td>
                                                </tr>
                                                <tr>
                                                    <td class="boldandred">Grand Total</td>
                                                    <td class="boldandred textright">6890</td>
                                                </tr>
                                            
                                                                                                                                                                                                                                                                                                                                                <tr>
                                                            <th colspan="2">Weaver</th>
                                                        </tr>
                                                    
                                                                                                                                 
                                                                                                                                                                                                                                                                        
                                                        <tr>
                                                            <td>Library Fee</td>
                                                            <td class="textright">20</td>
                                                        </tr>
                                                     
                                                                                    
                                                                                    <tr>
                                                    <td class="boldandred">Total Weaver</td>
                                                    <td class="boldandred textright">20</td>
                                                </tr>
                                                                            </tbody>
                                    </table>
        
                                    <hr>
                                    <div class="footer">
                                        <p class="logo"><img src=""></p>
                                        <p class="copyright">Copyright © Jeet School Management System | Hotline : +8801728660964</p>
                                    </div>
        
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" onclick="">Print</button>
                            <button type="button" class="btn btn-default flashClose" style="margin-bottom:0px;" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>

@endsection
@section('scripts')
<script type="text/javascript">
    $('.flashClose').click(function() {
        $('.flashModel').css('display', 'none');
        $('.flashModel').attr('aria-hidden', true);
        $('.flashModel').removeClass('in');
        $('.flashModel').removeClass('flashModel');
    }); 
</script>
<script type="text/javascript">

    $('.select2').select2();
    
    function printDiv(divID) {
        var data = $('#'+divID).html();
    
        var myWindow = window.open("", "_blank", "width=600,height=auto");
        myWindow.document.write(data);
        myWindow.print();
        myWindow.close();
    }
        
    $("#classesID").change(function() {
        var id = $(this).val();
        if(parseInt(id)) {
            if(id === '0') {
                $('#sectionID').val(0);
                $('#studentID').val(0);
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
                    data: {"classesID" : id},
                    dataType: "html",
                    success: function(data) {
                       $('#studentID').html(data);
                    }
                });
            }
        }
    });
    
    $("#sectionID").change(function() {
        var id = $(this).val();
        var classesID = $('#classesID').val();
        if(parseInt(id)) {
            if(id === '0') {
                $('#sectionID').val(0);
            } else {
                if(classesID === '0') {
                    $('#classesID').val(0);
                } else {
                    $.ajax({
                        type: 'POST',
                        url: "",
                        data: {"classesID" : classesID, "sectionID" : id},
                        dataType: "html",
                        success: function(data) {
                           $('#studentID').html(data);
                        }
                    });
                }
            }
        } else {
            $.ajax({
                type: 'POST',
                url: "",
                data: {"classesID" : classesID, "sectionID" : id},
                dataType: "html",
                success: function(data) {
                   $('#studentID').html(data);
                }
            });
        }
    });
    
    function isInt(data) {
        var val = data;
        if(isNumeric(val)) {
            return true;
        } else {
            return false;
        }
    }
    
    function parseSentenceForNumber(sentence){
        var matches = sentence.replace(/,/g, '').match(/(\+|-)?((\d+(\.\d+)?)|(\.\d+))/);
        return matches && matches[0] || null;
    }
    
    
    function isNumeric(n) {
      return !isNaN(parseFloat(n)) && isFinite(n);
    }
    
    function floatChecker(value) {
        var val = value;
        if(isNumeric(val)) {
            return true;
        } else {
            return false;
        }
    }
    
    var globalPaid = 0;
    var globalFine = 0;
    var globalWeaver = 0;
    $(document).on("keyup", ".paid_amount", function() {
        var paid_amount_value = parseSentenceForNumber($(this).val());
        var sum = 0;
    
        if($(this).val() != 0 && $(this).val() != '.') { 
            if(floatChecker($(this).val())) {
                if(parseFloat(paid_amount_value)) {
                    $('input[name^=paid]').removeClass('errorClass');
                    var input_weaver_value = 0;
                    var original_weaver_value = 0;
    
                    $(".paid_amount").each(function(i, valu) {
                        var original_value = $('#_due_'+i).text();
                        var weaver_value = $('._weaver_'+i).val();
    
                        var input_value = $(this).val();
                        if(input_value != '') {
                            if(input_value != 0) {
                                var input_value = parseFloat(input_value);
                                if(input_value >= 0 && $(this).val().length <= 10) {
                                    var input_value = parseFloat($(this).val());
    
                                    if(isInt(input_value)) {
                                        if(weaver_value != "") {
                                            weaver_value = parseFloat(weaver_value);
                                            input_weaver_value = weaver_value + input_value;
                                        } else {
                                            input_weaver_value = input_value;
                                        }
    
                                        original_value = parseFloat(original_value);
                                        if(input_weaver_value <= original_value) {
                                            sum += input_value;
                                        } else {
                                            if(weaver_value != "") {
                                                weaver_value = parseFloat(weaver_value);
                                                original_weaver_value = (original_value - weaver_value);
                                            } else {
                                                original_weaver_value = original_value;
                                            }
    
                                            if(original_weaver_value == 0) {
                                                $(this).val('');
                                            } else {
                                                $(this).val(parseFloat(original_weaver_value).toFixed(2));
                                            }
    
    
                                            sum += original_weaver_value;
                                            var message = 'Collection + Weaver can not cross amount '+original_value; 
                                            toastr["error"](message)
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
                                        if(weaver_value != "") {
                                            weaver_value = parseFloat(weaver_value);
                                            original_weaver_value = original_value - weaver_value;
                                        } 
                                        else {
                                            original_weaver_value = original_value;
                                        }
                                        $(this).val('');
                                        sum += original_weaver_value;
                                    }
                                } else {
                                    if(isInt(input_value)) {
                                        $(this).val(original_value-weaver_value);
                                    } else {
                                        $(this).val('');
                                    }
                                }
                            } else {
                                $(this).val('');
                            }
                        } 
                    });
                    $("#set_paid_amount").html(parseFloat(sum).toFixed(2));
                    globalPaid = sum;
                    $("#TottalCollection").html(parseFloat(globalPaid+globalFine).toFixed(2));   
                } else {
                    $(this).val(paid_amount_value);
                }
            } else {
                $(this).val(paid_amount_value);
                $(".paid_amount").each(function(i, valu) {
                    var paidVal = $('._paid_'+ i).val();
                    if(paidVal != '') { 
                        sum += parseFloat(paidVal);
                    }
                });
                globalPaid = sum;
                $("#set_paid_amount").html(sum);
                $("#TottalCollection").html(globalPaid+globalFine);
            }
        } else {
            $(".paid_amount").each(function(i, valu) {
                var paidVal = $('._paid_'+ i).val();
                if(paidVal != '') { 
                    sum += parseFloat(paidVal);
                }
            });
            globalPaid = sum;
            $("#set_paid_amount").html(sum);
            if(globalPaid > 0 && globalFine > 0) {
                $("#TottalCollection").html(parseFloat(globalPaid+globalFine).toFixed(2));
            } else if(globalPaid > 0) {
                $("#TottalCollection").html(parseFloat(globalPaid).toFixed(2));
            } else if(globalFine > 0) {
                $("#TottalCollection").html(parseFloat(globalFine).toFixed(2));
            }
    
            if((($(this).val()[0] == 0 || $(this).val()[0] == '.') && $(this).val()[1] != 0)) {
                $(this).val($(this).val());
            } else {
                $(this).val('');
            }
        }  
    });
    
    $(document).on("keyup", ".weaver", function() {
        var weaver_amount_value = parseSentenceForNumber($(this).val());
        var sum = 0;
    
        if($(this).val() != 0 && $(this).val() != '.') {
            if(floatChecker($(this).val())) {
                if(parseFloat(weaver_amount_value)) {
                    $('input[name^=weaver]').removeClass('errorClass');
                    var input_paid_value = 0;
                    var original_paid_value = 0;
                    $(".weaver").each(function(i, valu) {
                        var original_value = $('#_due_'+i).text();
                        var paid_value = $('._paid_'+i).val();
    
                        var input_value = $(this).val();
                        if(input_value != '') {
                            if(input_value != 0) {
                                var input_value = parseFloat(input_value);
                                if(input_value >= 0 && $(this).val().length <= 10) {
                                    var input_value = parseFloat($(this).val());
    
                                    if(isInt(input_value)) {
                                        if(paid_value != "") {
                                            paid_value = parseFloat(paid_value);
                                            input_paid_value = paid_value + input_value;
                                        } else {
                                            input_paid_value = input_value;
                                        }
    
                                        original_value = parseFloat(original_value);
                                        if(input_paid_value <= original_value) {
                                            sum += input_value;
                                            globalWeaver = sum;
                                        } else {
    
                                            if(paid_value != "") {
                                                paid_value = parseFloat(paid_value);
                                                original_paid_value = (original_value - paid_value);
                                            } else {
                                                original_paid_value = original_value;
                                            }
    
                                            if(original_paid_value == 0) {
                                                $(this).val('');
                                            } else {
                                                $(this).val(parseFloat(original_paid_value).toFixed(2));
                                            }
    
                                            sum += original_paid_value;
                                            globalWeaver = sum;
                                            var message = 'Collection + Weaver can not cross amount '+original_value; 
                                            toastr["error"](message)
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
                                        if(paid_value != "") {
                                            paid_value = parseFloat(paid_value);
                                            original_paid_value = original_value - paid_value;
                                        } 
                                        else {
                                            original_paid_value = original_value;
                                        }
    
                                        $(this).val(original_paid_value);
                                        sum += original_paid_value;
                                        globalWeaver = sum;
                                    }
                                } else {
                                    if(isInt(input_value)) {
                                        $(this).val(original_value-paid_value);
                                    } else {
                                        $(this).val('');
                                    }
                                }
                            } else {
                                $(this).val('');
                            }
                        }
                    });
                    $("#set_weaver").html(parseFloat(sum).toFixed(2));
                } else {
                    $(this).val(weaver_amount_value);
                }
            } else {
                $(".weaver").each(function(i, valu) {
                    var weaverVal = $('._weaver_'+i).val();
                    if(weaverVal != '') { 
                        sum += parseFloat(weaverVal);
                    }
                });
                $("#set_weaver").html(sum);
                $(this).val(weaver_amount_value);
            }
        } else {
            $(".weaver").each(function(i, valu) {
                var weaverVal = $('._weaver_'+i).val();
                if(weaverVal != '') { 
                    sum += parseFloat(weaverVal);
                }
            });
            $("#set_weaver").html(sum);
            if((($(this).val()[0] == 0 || $(this).val()[0] == '.') && $(this).val()[1] != 0)) {
                $(this).val($(this).val());
            } else {
                $(this).val('');
            }
        }
    });
    
    $(document).on("keyup", ".fine", function() {
        var fine_amount_value = parseSentenceForNumber($(this).val());
        var sum = 0;
    
        if($(this).val() != 0 && $(this).val() != '.') {
            if(floatChecker($(this).val())) {
                if(parseFloat(fine_amount_value)) {
                    $('input[name^=fine]').removeClass('errorClass');
                    $(".fine").each(function(){
                        var input_value = parseFloat($(this).val());
                        if(isInt(input_value)) {
                            if(input_value >= 0 &&  $(this).val().length <= 10) {
                                if(isInt(input_value)) {
                                    var input_value = parseFloat(input_value);
                                    sum += input_value;
                                } else {
                                    $(this).val('');
                                }
                            } else {
                                $(this).val('');
                            }
                        } else {
                            $(this).val('');
                        }
                    });
                    $("#set_fine").html(parseFloat(sum).toFixed(2));
                    globalFine = sum;
    
                    $("#TottalCollection").html(parseFloat(globalPaid+globalFine).toFixed(2));
                } else {
                    $(this).val(fine_amount_value);
                }
            } else {
                $(".fine").each(function(i, valu) {
                    var fineVal = $(this).val();
                    if(fineVal != '') { 
                        sum += parseFloat(fineVal);
                    }
                });
                globalFine = sum;
                $("#set_fine").html(sum);
                $("#TottalCollection").html(globalPaid+globalFine);
                $(this).val(fine_amount_value);
            }
        } else {
            $(".fine").each(function(i, valu) {
                var fineVal = $(this).val();
                if(fineVal != '') { 
                    sum += parseFloat(fineVal);
                }
            });
            globalFine = sum;
            $("#set_fine").html(sum);
            if(globalPaid > 0 && globalFine > 0) {
                $("#TottalCollection").html(parseFloat(globalPaid+globalFine).toFixed(2));
            } else if(globalPaid > 0) {
                $("#TottalCollection").html(parseFloat(globalPaid).toFixed(2));
            } else if(globalFine > 0) {
                $("#TottalCollection").html(parseFloat(globalPaid).toFixed(2));
            }
    
            if((($(this).val()[0] == 0 || $(this).val()[0] == '.') && $(this).val()[1] != 0)) {
                $(this).val($(this).val());
            } else {
                $(this).val('');
            }
        }
    });
    
    $(document).on("keyup", "#paymentyear", function() {
        var input_value = parseInt($(this).val());
        if(isInt(input_value)) {
            if($(this).val().length > 0 && $(this).val().length <= 4) {
                if($(this).val().length == 4) {
                    var str = "01/05/" + $(this).val();
                    var year = str.match(/\/(\d{4})/)[1];
                    var currYear = new Date().toString().match(/(\d{4})/)[1];
                    if (year >= 1500 && year <= currYear) {
                        $(this).removeClass('errorClass');
                    } else {
                        $(this).addClass('errorClass');
                    }
                }
            } else {
                $(this).val('');
            }
        } else {
            $(this).val('');
        }
    });
    
    
    $('#add_payment').on('click',function(e){
        var error = 0;
        var invoicename            = $('#invoicename'); 
        var invoicedescription     = $('#invoicedescription'); 
        var invoicenumber          = $('#invoicenumber'); 
        var paymentyear            = $('#paymentyear'); 
        var payment_status         = $('#payment_status'); 
        var payment_type           = $('#payment_type'); 
    
        if(invoicename.val() == '') {
            invoicename.addClass('errorClass');
            error++;
        } else if(invoicename.val().length > 127)  {
            invoicename.addClass('errorClass');
            error++;
        } else {
            invoicename.removeClass('errorClass');
        }
    
        if(invoicedescription.val().length > 127) {
            invoicedescription.addClass('errorClass');
            error++;
        } else {
            invoicedescription.removeClass('errorClass');
        }
    
        if(invoicenumber.val() == '') {
            invoicenumber.addClass('errorClass');
            error++;
        } else {
            invoicenumber.removeClass('errorClass');
        }
    
        if(paymentyear.val() == '') {
            paymentyear.addClass('errorClass');
            error++;
        } else if(paymentyear.val().length > 4 || paymentyear.val().length <= 3)  {
            paymentyear.addClass('errorClass');
            error++;
        } else {
            paymentyear.removeClass('errorClass');
        }
    
        // var classesID           = ;
        // var studentID           = ;
        invoicename             = invoicename.val(); 
        invoicedescription      = invoicedescription.val(); 
        invoicenumber           = invoicenumber.val(); 
        paymentyear             = paymentyear.val(); 
        payment_status          = payment_status.val(); 
        payment_type            = payment_type.val();
    
        var paid = $('input[name^=paid]').map(function(){
            return { paidFieldID: this.name , value: this.value };
        }).get();
    
        var weaver = $('input[name^=weaver]').map(function(){
            return { weaverFieldID: this.name , value: this.value };
        }).get();
    
        var fine = $('input[name^=fine]').map(function(){
            return { fineFieldID: this.name , value: this.value };
        }).get();
    
        if(globalPaid == 0 && globalFine == 0 && globalWeaver == 0) {
            $('input[name^=paid]').addClass('errorClass');
            $('input[name^=weaver]').addClass('errorClass');
            $('input[name^=fine]').addClass('errorClass');
            error++;
        } else {
            $('input[name^=paid]').removeClass('errorClass');
            $('input[name^=weaver]').removeClass('errorClass');
            $('input[name^=fine]').removeClass('errorClass');        
        }
    
        if(error == 0) {
            $(this).attr("disabled", "disabled");
            $.ajax({
                type: 'POST',
                url: "",
                data: {
                    "classesID" : classesID, 
                    "studentID" : studentID, 
                    'invoicename' : invoicename,
                    'invoicedescription' : invoicedescription,
                    'invoicenumber' : invoicenumber,
                    'paymentyear' : paymentyear,
                    'payment_status' : payment_status,
                    'payment_type' : payment_type,
                    "paid" : paid,
                    "weaver" : weaver,
                    "fine" : fine
                },
                dataType: "html",
                success: function(data) {
                    var response = jQuery.parseJSON(data);
    
                    if(response.status) {
                        window.location.reload();
                    } else {
                        $(this).removeAttr("disabled");
                        $(this).removeAttr("disabled", '');
                        if(response.paid) {
                            $('input[name^=paid]').addClass('errorClass');
                            $('input[name^=weaver]').addClass('errorClass');
                            $('input[name^=fine]').addClass('errorClass');
                        } else {
                            $('input[name^=paid]').removeClass('errorClass');
                            $('input[name^=weaver]').removeClass('errorClass');
                            $('input[name^=fine]').removeClass('errorClass');
                        }
    
                        if(response.invoicename) {
                            $('#invoicename').addClass('errorClass');
                        } else {
                            $('#invoicename').removeClass('errorClass');
                        }
    
                        if(response.invoicenumber) {
                            $('#invoicenumber').addClass('errorClass');
                        } else {
                            $('#invoicenumber').removeClass('errorClass');
                        }
    
                        if(response.paymentyear) {
                            $('#paymentyear').addClass('errorClass');
                        } else {
                            $('#paymentyear').removeClass('errorClass');
                        }
    
                        if(response.invoicedescription) {
                            $('#invoicedescription').addClass('errorClass');
                        } else {
                            $('#invoicedescription').removeClass('errorClass');
                        }
                    }
                }
            });  
        }
    });
    
    </script>
@endsection