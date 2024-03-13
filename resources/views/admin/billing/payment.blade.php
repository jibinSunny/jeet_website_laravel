@extends('layouts.admin')
@section('content')
<form role="form" method="post">
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
                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-money"></i> Invoice</h3>
                </div>
                <div class="box-body">
                    <div class="form-group ">
                        <label for="s2id_autogen1">Payment Method <span class="text-red">*</span></label>
    
                        <select name="paymentmethodID" id="paymentmethodID" class="form-control select2" onchange="CheckType()" tabindex="-1">
    <option value="0">Select Payment Method</option>
    <option value="Cash">Cash</option>
    <option value="Cheque">Cheque</option>
    </select>
                        <span class="text-red">
                                                </span>
                    </div>
    
                    <!-- Card Options fields -->
                    <div id="cardOption" style="display: none;">
                        <div class="form-group ">
                            <label for="amount">Card Number <span class="text-red">*</span></label>
                            <input type="text" class="form-control" id="card_number" name="card_number" value="" placeholder="4242 4242 4242 4242">
                        </div>
                        <div class="form-group ">
                            <label for="amount">Card Expire <span class="text-red">*</span></label>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="expire_month" name="expire_month" value="" placeholder="mm">
                                </div>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="expire_year" name="expire_year" value="" placeholder="yyyy">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="amount">CVV <span class="text-red">*</span></label>
                            <input type="text" class="form-control" id="cvv" name="cvv" value="" placeholder="123">
                        </div>
    
                    </div>
                    <!-- Card options end-->
                    <!-- PayUOptions Options fields -->
                    <div id="payuInputs" style="display: none;">
                        <div class="form-group ">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="">
                            <span class="text-red">
                                                        </span>
                        </div>
                        <div class="form-group ">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="">
                            <span class="text-red"></span>
                        </div>
                        <div class="form-group ">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="">
                            <span class="text-red">
                                                        </span>
                        </div>
                    </div>
                    <!-- PayUOptions options end-->
    
                    <button id="addPaymentButton" type="submit" class="btn btn-success">Add Payment</button>
                </div>
            </div>
        </div>
    
        <div class="col-sm-9">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa icon-feetypes"></i> Fee Type List</h3>
                    <ol class="breadcrumb">
                        <li><a href="https://demo.inilabs.net/school/v4.6/dashboard/index"><i class="fa fa-laptop"></i> Dashboard</a></li>
                        <li><a href="https://demo.inilabs.net/school/v4.6/invoice/index">Invoice</a></li>
                        <li class="active">Add Payment</li>
                    </ol>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered feetype-style" style="font-size: 16px;">
                            <thead>
                                <tr>
                                    <th class="col-sm-1">#</th>
                                    <th class="col-sm-3">Fee Type</th>
                                    <th class="col-sm-1">Amount</th>
                                    <th class="col-sm-1">Due</th>
                                    <th class="col-sm-2">Paid Amount</th>
                                                                        <th class="col-sm-2">Weaver</th>
                                        <th class="col-sm-2">Fine</th>
                                                                </tr>
                            </thead>
                            <tbody id="feetypeList">
                                <tr id="tr_3153115763"><td>1</td><td>Books Fine</td><td>2500</td><td id="due_3153115763">2250</td><td><input id="paidamount_3153115763" class="form-control change-paidamount " type="text" name="paidamount_115" value=""></td><td><input id="weaver_3153115763" class="form-control change-weaver " type="text" name="weaver_115" value=""></td><td><input id="fine_3153115763" class="form-control change-fine " type="text" name="fine_115" value=""></td></tr><tr id="tr_1617503460"><td>2</td><td>Library Fee</td><td>2500</td><td id="due_1617503460">2125</td><td><input id="paidamount_1617503460" class="form-control change-paidamount " type="text" name="paidamount_116" value=""></td><td><input id="weaver_1617503460" class="form-control change-weaver " type="text" name="weaver_116" value=""></td><td><input id="fine_1617503460" class="form-control change-fine " type="text" name="fine_116" value=""></td></tr><tr id="tr_6622864837"><td>3</td><td>Hostel Fee</td><td>2500</td><td id="due_6622864837">2500</td><td><input id="paidamount_6622864837" class="form-control change-paidamount " type="text" name="paidamount_117" value=""></td><td><input id="weaver_6622864837" class="form-control change-weaver " type="text" name="weaver_117" value=""></td><td><input id="fine_6622864837" class="form-control change-fine " type="text" name="fine_117" value=""></td></tr>                        </tbody>
                            <tfoot id="feetypeListFooter">
                                <tr>
                                    <td colspan="2" style="font-weight: bold">Total</td>
                                    <td id="totalAmount" style="font-weight: bold">7,500.00</td>
                                    <td id="totalDue" style="font-weight: bold">6,875.00</td>
                                    <td id="totalPaidAmount" style="font-weight: bold">0.00</td>
                                                                        <td id="totalWeaver" style="font-weight: bold">0.00</td>
                                        <td id="totalFine" style="font-weight: bold">0.00</td>
                                                            </tr></tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    function dd(data) {
        console.log(data);
    }

    $('.select2').select2();

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

    window.onload = function() {
        CheckType();
    };
    function CheckType() {
        var payment_method = $('#paymentmethodID').val();

        if (payment_method=="Stripe") {
            $('#cardOption').show();
            $('#payuInputs').hide();
        } else if (payment_method=="Payumoney") {
            $('#payuInputs').show();
            $('#cardOption').hide();
        } else{
            $('#cardOption').hide();
            $('#payuInputs').hide();
        }
    }
</script>
@endsection
@section('scripts')

@endsection