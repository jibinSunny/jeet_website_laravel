@extends('layouts.admin')
@section('content')

<form role="form" method="post" class="payment-form">
    <div class="row">
        <div class="col-sm-3">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa icon-invoice"></i> Payment</h3>
                </div>
    
                <div class="box-body box-profile">
                    <center>
                    <img src="https://i.pinimg.com/originals/a6/58/32/a65832155622ac173337874f02b218fb.png" class="profile-user-img img-responsive img-circle" alt="">                </center>
    
                    <h3 class="profile-username text-center">Ankit Kumar</h3>
    
                    <p class="text-muted text-center">Student</p>
    
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item" style="background-color: #FFF">
                            <b>Register NO</b> <a class="pull-right">INI509</a>
                        </li>
                        <li class="list-group-item" style="background-color: #FFF">
                            <b>Roll</b> <a class="pull-right">9</a>
                        </li>
                        <li class="list-group-item" style="background-color: #FFF">
                            <b>Class</b> <a class="pull-right">Five</a>
                        </li>
                        <li class="list-group-item" style="background-color: #FFF">
                            <b>Section</b> <a class="pull-right">C</a>
                        </li>
                    </ul>
                </div>
            </div>
    
            <div class="box" style="margin-bottom:40px">
                <div class="box-body">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item" style="background-color: #FFF">
                            <b>Advance</b> <a class="pull-right"><span class="advance-payment">₹ 10000</span></a>
                        </li>
                    </ul>
    

                    <div id="payuInputs">
                        <div class="form-group ">
                            <!-- <label for="first_name">Add Advance</label> -->
                            <input type="text" class="form-control" id="first_name" name="first_name" value="Add Advance">
                            <!-- <label for="first_name">Date</label> -->
                            <input type="text" class="form-control mt-2" id="advance_date" name="advance_date" value="Date">
                            <span class="text-red">
                                                        </span>
                        </div>
                        <button data-toggle="modal" data-target="#generate_receipt" id="addPaymentButton" type="submit" class="btn btn-sm btn-primary">Generate Reciept</button>
                    </div>

                </div>
            </div>
        </div>
    
        <div class="col-sm-9">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa icon-feetypes"></i> Fee Type List</h3>
                    <ol class="breadcrumb">
                        <li><a href=""><i class="fa fa-laptop"></i> Dashboard</a></li>
                        <li><a href="v4.6/invoice/index">Invoice</a></li>
                        <li class="active">Add Payment</li>
                    </ol>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered feetype-style" style="font-size: 16px;">
                            <thead>
                                <tr>
                                    <th class="col-sm-1">#</th>
                                    <th class="col-sm-3">Fee ID</th>
                                    <th class="col-sm-3">Fee Type</th>
                                    <th class="col-sm-1">Amount</th>
                                    <th class="col-sm-1">Due</th>
                                </tr>
                            </thead>
                            <tbody id="feetypeList">
                                <tr id="tr_3153115763">
                                    <td>1</td>
                                    <td>101</td>
                                    <td>Books Fee</td>
                                    <td>2500</td>
                                    <td id="due_3153115763">0</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>102</td>
                                    <td>Library Fee</td>
                                    <td>2500</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                            <td>3</td>
                                            <td>103</td>
                                            <td>Hostel Fee</td>
                                            <td>2500</td>
                                            <td>100</td>
                                        </tr>
                                            </tbody>
                            <tfoot id="feetypeListFooter">
                                <tr>
                                    <td class="text-right" colspan="4">Sub Total</td>
                                    <td id="totalDue" style="font-weight: bold">7600.00</td>
                                </tr>
                                <tr>
                                    <td class="text-right v-middle" colspan="4">Paid Amount</td>
                                    <td><input class="form-control change-paidamount h-auto" type="text" name="paidamount_115" value=""></td>
                                </tr>
                                <tr>
                                    <td class="text-right v-middle" colspan="4">Discount</td>
                                    <td><input class="form-control change-paidamount h-auto" type="text" name="paidamount_115" value=""></td>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="4" style="font-weight: bold">Total</td>
                                    <td id="totalDue" style="font-weight: bold">6,875.00</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right" id="totalDue" style="font-weight: bold">
                                    <a href="{{ route('invoiceView') }}" class="btn btn-labeled btn-primary btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Generate Invoice"><span class="btn-label"><i class="fa icon-receipt"></i></span>Generate Invoice</a></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<div class="modal fade" id="generate_receipt">
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
                            </tr>
                            <tr>
                                <td><b>Name: </b>Tamim Iqbal </td>
                                <td><b>Class: </b>One</td>
                                <td>Roll: <b></b>1</td>
                            </tr>
                            <tr>
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
                                    <td>Advance</td>
                                    <td class="textright">100000</td>
                                </tr>

                                <tr>
                                    <td class="boldandred">Grand Total</td>
                                    <td class="boldandred textright">100000</td>
                                </tr>

                            </tbody>
                        </table>

                        <hr>
                        <div class="footer">
                            <p class="logo"><img src=""></p>
                            <p class="copyright">Jeet School Administration</p>
                        </div>

                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="">Print</button>
                <button type="button" class="btn btn-default" style="margin-bottom:0px;" data-dismiss="modal">Cancel</button>
            </div>

        </div>
    </div>
</div>

@endsection
@section('scripts')
<script type="text/javascript">
    function dd(data) {
        console.log(data);
    }

    $('.select2').select2();

    $('#advance_date').datepicker();

    function getRandomInt() {
      return Math.floor(Math.random() * Math.floor(9999999999999999));
    }

    function toFixedVal(x) {
      if (Math.abs(x) < 1.0) {
        var e = parseFloat(x.toString().split('e-')[1]);
        if (e) {
            x *= Math.pow(10,e-1);
            x = '0.' + (new Array(e)).join('0') + x.toString().substring(2);
        }
      } else {
        var e = parseFloat(x.toString().split('+')[1]);
        if (e > 20) {
            e -= 20;
            x /= Math.pow(10,e);
            x += (new Array(e+1)).join('0');
        }
      }
      return x;
    }

    function isNumeric(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }

    function dotAndNumber(data) {
        var retArray = [];
        var fltFlag = true;
        if(data.length > 0) {
            for(var i = 0; i <= (data.length-1); i++) {
                if(i == 0 && data.charAt(i) == '.') {
                    fltFlag = false;
                    retArray.push(true);
                } else {
                    if(data.charAt(i) == '.' && fltFlag == true) {
                        retArray.push(true);
                        fltFlag = false;
                    } else {
                        if(isNumeric(data.charAt(i))) {
                            retArray.push(true);
                        } else {
                            retArray.push(false);
                        }
                    }

                }
            }
        }

        if(jQuery.inArray(false, retArray) ==  -1) {
            return true;
        }
        return false;
    }

    function floatChecker(value) {
        var val = value;
        if(isNumeric(val)) {
            return true;
        } else {
            return false;
        }
    }

    function lenChecker(data, len) {
        var retdata = 0;
        var lencount = 0;
        data = toFixedVal(data);
        if(data.length > len) {
            lencount = (data.length - len);
            data = data.toString();
            data = data.slice(0, -lencount);
            retdata = parseFloat(data);
        } else {
            retdata = parseFloat(data);
        }

        return toFixedVal(retdata);
    }
    
    function parseSentenceForNumber(sentence) {
        var matches = sentence.replace(/,/g, '').match(/(\+|-)?((\d+(\.\d+)?)|(\.\d+))/);
        return matches && matches[0] || null;
    }

    function currencyConvert(data) {
        return data.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
    }

    var globaltotalpaidamount = 0;
    var globaltotalweaver = 0;
    var globaltotalfine = 0;
    function totalInfo() {
        var totalPaidAmount = 0;
        var totalWeaver = 0;
        var totalFine = 0;
        
        $('#feetypeList tr').each(function(index, value) {
            if($(this).children().eq(4).children().val() != '' && $(this).children().eq(4).children().val() != null && $(this).children().eq(4).children().val() != '.') {
                var paidamount = parseFloat($(this).children().eq(4).children().val());
                totalPaidAmount += paidamount;
            }

            if($(this).children().eq(5).children().val() != '' && $(this).children().eq(5).children().val() != null && $(this).children().eq(5).children().val() != '.') {
                var weaver = parseFloat($(this).children().eq(5).children().val());
                totalWeaver += weaver;
            }

            if($(this).children().eq(6).children().val() != '' && $(this).children().eq(6).children().val() != null && $(this).children().eq(6).children().val() != '.') {
                var fine = parseFloat($(this).children().eq(6).children().val());
                totalFine += fine;
            }
        });

        globaltotalpaidamount = totalPaidAmount;
        $('#totalPaidAmount').text(currencyConvert(totalPaidAmount)); 

        globaltotalweaver = totalWeaver;
        $('#totalWeaver').text(currencyConvert(totalWeaver));

        globaltotalfine = totalFine;
        $('#totalFine').text(currencyConvert(totalFine));
    }

    $(document).on('keyup', '.change-paidamount', function() {
        var trID = $(this).parent().parent().attr('id').replace('tr_','');
        var due = $('#due_'+trID).text();
        var paidamount = $('#paidamount_'+trID).val();
        var weaver = $('#weaver_'+trID).val();

        var duestatus = false;
        var dotandnumberstatus = false;
        var paidamountstatus = false;

        if(due != '' && due != null && due > 0) {
            duestatus = true;
        }

        if(duestatus) {
            if(dotAndNumber(paidamount)) {
                dotandnumberstatus = true;
            } else {
                dotandnumberstatus = false;
                $('#paidamount_'+trID).val(parseSentenceForNumber(toFixedVal(paidamount)));
            }
        }

        if(dotandnumberstatus) {
            if(paidamount.length > 15) {
                paidamount = lenChecker(paidamount, 15);
                $('#paidamount_'+trID).val(paidamount);
                paidamountstatus = true;
            } else {
                paidamountstatus = true;
            }
        } else {
            $('#paidamount_'+trID).val('');
        }

        if(paidamountstatus) {
            if(weaver > 0) {
                weaver = parseFloat(weaver);
                paidamount = parseFloat(paidamount);
                due = parseFloat(due);
                if(weaver+paidamount > due) {
                    $('#paidamount_'+trID).val((due-weaver));
                }
            } else {
                paidamount = parseFloat(paidamount);
                due = parseFloat(due);
                if(paidamount > due) {
                    $('#paidamount_'+trID).val(due);
                }
            }

            if(parseFloat($(this).val()) == 0) {
                $('#paidamount_'+trID).val('');
            }
            totalInfo();
        }
    });

    $(document).on('keyup', '.change-weaver', function() {
        var trID = $(this).parent().parent().attr('id').replace('tr_','');
        var due = $('#due_'+trID).text();
        var paidamount = $('#paidamount_'+trID).val();
        var weaver = $('#weaver_'+trID).val();

        var duestatus = false;
        var dotandnumberstatus = false;
        var weaverstatus = false;

        if(due != '' && due != null && due > 0) {
            duestatus = true;
        }

        if(duestatus) {
            if(dotAndNumber(weaver)) {
                dotandnumberstatus = true;
            } else {
                dotandnumberstatus = false;
                $('#weaver_'+trID).val(parseSentenceForNumber(toFixedVal(weaver)));
            }
        } else {
            $('#weaver_'+trID).val('');
        }

        if(dotandnumberstatus) {
            if(weaver.length > 15) {
                weaver = lenChecker(weaver, 15);
                $('#weaver_'+trID).val(weaver);
                weaverstatus = true;
            } else {
                weaverstatus = true;
            }
        }

        if(weaverstatus) {
            if(paidamount > 0) {
                paidamount = parseFloat(paidamount);
                weaver = parseFloat(weaver);
                due = parseFloat(due);
                if(weaver+paidamount > due) {
                    $('#weaver_'+trID).val((due-paidamount));
                }
            } else {
                weaver = parseFloat(weaver);
                due = parseFloat(due);
                if(weaver > due) {
                    $('#weaver_'+trID).val(due);
                }
            }

            if(parseFloat($(this).val()) == 0) {
                $('#weaver_'+trID).val('');
            }
            totalInfo();
        }
    });

    $(document).on('keyup', '.change-fine', function() {
        var fine = $(this).val();

        var dotandnumberstatus = false;
        var finestatus = false;

        if(dotAndNumber(fine)) {
            dotandnumberstatus = true;
        } else {
            dotandnumberstatus = false;
            $(this).val(parseSentenceForNumber(toFixedVal(fine)));
        }

        if(dotandnumberstatus) {
            if(fine.length > 15) {
                fine = lenChecker(fine, 15);
                $(this).val(fine);
                finestatus = true;
            } else {
                finestatus = true;
            }

            totalInfo();
        }
    });

    totalInfo();
</script>
@endsection