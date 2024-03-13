@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-sm-3">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa icon-invoice"></i> Invoice</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form role="form" method="post" enctype="multipart/form-data" id="invoiceDataForm"> 

                    <div class="classesDiv form-group ">
                        <label for="s2id_autogen1">
                            Class <span class="text-red">*</span>
                        </label>
                            <select name="classesID" id="classesID" class="form-control select2" tabindex="-1">
                            <option value="0">Select Class</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="4">Four</option>
                            <option value="5" selected="selected">Five</option>
                            <option value="6">Graduate</option>
                            </select>
                        <span class="text-red">
                                                    </span>
                    </div>

                    <div class="studentDiv form-group ">
                        <label for="s2id_autogen2">
                            Student <span class="text-red">*</span>
                        </label>
                            <select name="studentID" id="studentID" class="form-control select2" tabindex="-1">
                            <option value="0">Select Student</option>
                            <option value="17">Virat Kholi - Roll - 1</option>
                            <option value="21">Rohit Sharma - Roll - 2</option>
                            <option value="22">Ms Dhoni - Roll - 3</option>
                            <option value="24">Kartina Kapoor - Roll - 4</option>
                            <option value="25">Saif Ali - Roll - 5</option>
                            <option value="27">Kareena Kapoor - Roll - 6</option>
                            <option value="28">Suresh Raina - Roll - 7</option>
                            <option value="31">Mohammed Shami - Roll - 8</option>
                            <option value="33" selected="selected">Ankit Kumar - Roll - 9</option>
                            </select>
                        <span class="text-red">
                                                    </span>
                    </div>

                    <div class="dateDiv form-group ">
                        <label for="date">
                            Date <span class="text-red">*</span>
                        </label>
                            <input type="text" class="form-control" id="date" name="date" value="16-12-2020">
                        <span class="text-red">
                                                    </span>
                    </div>

                    <div class="statusDiv form-group ">
                        <label for="s2id_autogen3">
                            Payment Status <span class="text-red">*</span>
                        </label>
                        <select name="statusID" id="statusID" class="form-control select2" tabindex="-1">
                        <option value="5">Select Payment Status</option>
                        <option value="0" selected="selected">Not Paid</option>
                        <option value="1">Partially Paid</option>
                        <option value="2">Fully Paid</option>
                        </select>
                        <span class="text-red">
                                                    </span>
                    </div>

                    <div class="paymentmethodDiv hide form-group ">
                        <label for="s2id_autogen4">
                            Payment Method <span class="text-red">*</span>
                        </label>
                        <select name="paymentmethodID" id="paymentmethodID" class="form-control select2" tabindex="-1">
                        <option value="0">Select Payment Method</option>
                        <option value="Cash">Cash</option>
                        <option value="Cheque">Cheque</option>
                        </select>
                        <span class="text-red">
                                                    </span>
                    </div>

                    <input id="editInvoiceButton" type="button" class="btn btn-success" value="Update Invoice">
                </form>
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
                    <li class="active">Edit Invoice</li>
                </ol>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form class="" role="form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group ">
                                <label for="s2id_autogen5" class="control-label">
                                    Fee Type <span class="text-red">*</span>
                                </label>
                                <select name="feetypeID" id="feetypeID" class="form-control select2" tabindex="-1">
<option value="0">Select Fee Type</option>
<option value="1">Books Fine</option>
<option value="2">Library Fee</option>
<option value="3">Transport Fee</option>
<option value="4">Hostel Fee</option>
<option value="5">Tuition Fee [Jan]</option>
<option value="6">Tuition Fee [Feb]</option>
<option value="7">Tuition Fee [Mar]</option>
<option value="8">Tuition Fee [Apr]</option>
<option value="9">Tuition Fee [May]</option>
<option value="10">Tuition Fee [Jun]</option>
<option value="11">Tuition Fee [Jul]</option>
<option value="12">Tuition Fee [Aug]</option>
<option value="13">Tuition Fee [Sep]</option>
<option value="14">Tuition Fee [Oct]</option>
<option value="15">Tuition Fee [Nov]</option>
<option value="16">Tuition Fee [Dec]</option>
</select>
                                <span class="control-label">
                                                                    </span>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered feetype-style" style="font-size: 16px;">
                        <thead>
                            <tr>
                                <th class="col-sm-1">#</th>
                                <th class="col-sm-3">Fee Type</th>
                                <th class="col-sm-2">Amount</th>
                                <th class="col-sm-1">Discount(%)</th>
                                <th class="col-sm-2">Subtotal</th>
                                <th class="col-sm-2">Paid Amount</th>
                                <th class="col-sm-1">Action</th>
                            </tr>
                        </thead>
                        <tbody id="feetypeList">
                            <tr id="tr_1010812991" invoicefeetypeid="1"><td>1</td><td>Books Fine</td><td><input type="text" class="form-control change-amount" id="td_amount_id_1010812991" data-amount-id="1010812991" value="2500"></td><td><input type="text" class="form-control change-discount" id="td_discount_id_1010812991" data-discount-id="1010812991" value="10"></td><td>2250</td><td><input type="text" class="form-control change-paidamount" id="td_paidamount_id_1010812991" data-paidamount-id="1010812991" readonly="readonly"></td><td><a style="margin-top:3px" href="#" class="btn btn-danger btn-sm deleteBtn" id="feetype_1010812991" data-feetype-id="1010812991">Delete</a></td></tr><tr id="tr_8975004847" invoicefeetypeid="2"><td>2</td><td>Library Fee</td><td><input type="text" class="form-control change-amount" id="td_amount_id_8975004847" data-amount-id="8975004847" value="2500"></td><td><input type="text" class="form-control change-discount" id="td_discount_id_8975004847" data-discount-id="8975004847" value="15"></td><td>2125</td><td><input type="text" class="form-control change-paidamount" id="td_paidamount_id_8975004847" data-paidamount-id="8975004847" readonly="readonly"></td><td><a style="margin-top:3px" href="#" class="btn btn-danger btn-sm deleteBtn" id="feetype_8975004847" data-feetype-id="8975004847">Delete</a></td></tr><tr id="tr_1090496955" invoicefeetypeid="4"><td>3</td><td>Hostel Fee</td><td><input type="text" class="form-control change-amount" id="td_amount_id_1090496955" data-amount-id="1090496955" value="2500"></td><td><input type="text" class="form-control change-discount" id="td_discount_id_1090496955" data-discount-id="1090496955" value="0"></td><td>2500</td><td><input type="text" class="form-control change-paidamount" id="td_paidamount_id_1090496955" data-paidamount-id="1090496955" readonly="readonly"></td><td><a style="margin-top:3px" href="#" class="btn btn-danger btn-sm deleteBtn" id="feetype_1090496955" data-feetype-id="1090496955">Delete</a></td></tr>                        </tbody>

                        <tfoot id="feetypeListFooter">
                            <tr>
                                <td colspan="2" style="font-weight: bold">Total</td>
                                <td id="totalAmount" style="font-weight: bold">7,500.00</td>
                                <td id="totalDiscount" style="font-weight: bold">25.00</td>
                                <td id="totalSubtotal" style="font-weight: bold">6,875.00</td>
                                <td id="totalPaidAmount" style="font-weight: bold">0.00</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function dd(data) {
        console.log(data);
    }

    $('.select2').select2();
    $('#date').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy',
        startDate:'',
        endDate:'',
    });

    $('#classesID').change(function(event) {
        var classesID = $(this).val();

        if(classesID === '0') {
            $('#studentID').html('');
        } else {
            $.ajax({
                type: 'POST',
                url: "",
                data: {'classesID' : classesID, 'edittype' : true },
                dataType: "html",
                success: function(data) {
                    $('#studentID').html(data);
                }
            });
        }
    });

    function getRandomInt() {
        return Math.floor(Math.random() * Math.floor(9999999999999999));
    }

    function productItemDesign(feetypeID, productText) {
        var randID = getRandomInt();
        if($('#feetypeList tr:last').text() == '') {
            var lastTdNumber = 0;
        } else {
            var lastTdNumber = $("#feetypeList tr:last td:eq(0)").text();
        }

        lastTdNumber = parseInt(lastTdNumber);
        lastTdNumber++;

        var text = '<tr id="tr_'+randID+'" invoicefeetypeID="'+feetypeID+'">';
            text += '<td>';
                text += lastTdNumber;
            text += '</td>';

            text += '<td>';
                text += productText;
            text += '</td>';

            text += '<td>';
                text += ('<input type="text" class="form-control change-amount" id="td_amount_id_'+randID+'" data-amount-id="'+randID+'">');
            text += '</td>';

            text += '<td>';
                text += ('<input type="text" class="form-control change-discount" id="td_discount_id_'+randID+'" data-discount-id="'+randID+'">');
            text += '</td>';

            text += '<td>';
                text += '0.00';
            text += '</td>';

            text += '<td>';
                if($('#statusID').val() != 0 && $('#statusID').val() != 5) {
                    text += ('<input type="text" class="form-control change-paidamount" id="td_paidamount_id_'+randID+'" data-paidamount-id="'+randID+'">');
                } else {
                    text += ('<input type="text" class="form-control change-paidamount" id="td_paidamount_id_'+randID+'" data-paidamount-id="'+randID+'" readonly="readonly">');
                }
            text += '</td>';

            text += '<td>';
                text += ('<a style="margin-top:3px" href="#" class="btn btn-danger btn-sm deleteBtn" id="feetype_'+randID+'" data-feetype-id="'+randID+'">Delete</a>');
            text += '</td>';
        text += '</tr>';

        return text; 
    }

    $('#feetypeID').change(function(e) {
        var feetypeID   = $(this).val();
        if(feetypeID != 0) {
            var feetypeText = $(this).find(":selected").text();
            var appendData  = productItemDesign(feetypeID, feetypeText);
            $('#feetypeList').append(appendData);
        }
    });

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

    var globaltotalamount = 0;
    var globaltotaldiscount = 0;
    var globaltotalsubtotal = 0;
    var globaltotalpaidamount = 0;
    function totalInfo() {
        var i = 1;
        var j = 1;

        var totalAmount = 0;
        var totalDiscount = 0;
        var totalSubtotal = 0;
        var totalPaidAmount = 0;

        var discount = 0; 

        $('#feetypeList tr').each(function(index, value) {
            if($(this).children().eq(2).children().val() != '' && $(this).children().eq(2).children().val() != null && $(this).children().eq(2).children().val() != '.') {
                var amount = parseFloat($(this).children().eq(2).children().val());
                totalAmount += amount;
            } 
        });
        globaltotalamount = totalAmount;
        $('#totalAmount').text(currencyConvert(totalAmount));

        $('#feetypeList tr').each(function(index, value) {
            if($(this).children().eq(3).children().val() != '' && $(this).children().eq(3).children().val() != null && $(this).children().eq(3).children().val() != '.') {
                var discount = parseFloat($(this).children().eq(3).children().val());
                totalDiscount += discount;
            } 
        });
        globaltotaldiscount = totalDiscount;
        $('#totalDiscount').text(currencyConvert(totalDiscount));


        $('#feetypeList tr').each(function(index, value) {
            var amount = parseFloat($(this).children().eq(2).children().val());
            var discount = parseFloat($(this).children().eq(3).children().val());
            var subtotal = 0;
            if(amount > 0) {
                if(discount > 0) {
                    if(discount == 100) {
                        subtotal = 0;
                    } else {
                        subtotal = (amount - ((amount/100) * discount));
                    }
                } else {
                    subtotal = amount;
                }
            }

            $(this).children().eq(4).text(subtotal);
            totalSubtotal += subtotal;
        });
        globaltotalsubtotal = totalSubtotal;
        $('#totalSubtotal').text(currencyConvert(totalSubtotal));

        $('#feetypeList tr').each(function(index, value) {
            if($(this).children().eq(5).children().val() != '' && $(this).children().eq(5).children().val() != null && $(this).children().eq(5).children().val() != '.') {
                var paidamount = parseFloat($(this).children().eq(5).children().val());
                totalPaidAmount += paidamount;
            } 
        });
        globaltotalpaidamount = totalPaidAmount;
        $('#totalPaidAmount').text(currencyConvert(totalPaidAmount));
    }

    $(document).on('keyup', '.change-amount', function() {
        var amount =  toFixedVal($(this).val());
        var amountID = $(this).attr('data-amount-id'); 

        if(dotAndNumber(amount)) {
            if(amount.length > 15) {
                amount = lenChecker(amount, 15);
                $(this).val(amount);
            }
            
            if(amount != '' && amount != null) {
                $(this).val(amount);
                totalInfo();
            } else {
                totalInfo();
            }
        } else {
            var amount = parseSentenceForNumber(toFixedVal($(this).val()));
            $(this).val(amount);
        }

        removePaidAmount(amountID);
    });

    $(document).on('keyup', '.change-paidamount', function() {
        var trID = $(this).parent().parent().attr('id').replace('tr_','');
        var amount = $('#'+'td_amount_id_'+trID).val();
        var discount = $('#'+'td_discount_id_'+trID).val();

        if(discount != '' && discount != null) {
            amount = (amount - ((amount/100) * discount));
        }

        if(amount != '' && amount != null) {
            var paidamount =  toFixedVal($(this).val());
            var paidamountID = $(this).attr('data-paidamount-id'); 
            
            if(dotAndNumber(paidamount)) {
                if(paidamount.length > 15) {
                    paidamount = lenChecker(paidamount, 15);
                    if(parseFloat(paidamount) > parseFloat(amount)) {
                        $(this).val(amount);
                    } else {
                        $(this).val(paidamount);
                    }
                }
                
                if(paidamount != '' && paidamount != null) {
                    if(parseFloat(paidamount) > parseFloat(amount)) {
                        $(this).val(amount);
                    } else {
                        $(this).val(paidamount);
                    }
                    totalInfo();
                } else {
                    totalInfo();
                }
            } else {
                var paidamount = parseSentenceForNumber(toFixedVal($(this).val()));
                if(parseFloat(paidamount) > parseFloat(amount)) {
                    $(this).val(amount);
                } else {
                    $(this).val(paidamount);
                }
            }
        } else {
            $(this).val('');
        }
    });

    $(document).on('keyup', '.change-discount', function() {
        var trID = $(this).parent().parent().attr('id').replace('tr_','');
        var randID = $(this).attr('data-discount-id'); 
        var amount = $('#'+'td_amount_id_'+trID).val();

        if(amount != '' && amount != null) {
            var discount =  toFixedVal($(this).val());
            var discountID = $(this).attr('data-discount-id'); 
            
            if(dotAndNumber(discount)) {
                if(discount > 100) {
                    discount = 100;
                }
                $(this).val(discount);
                totalInfo();
            } else {
                var discount = parseSentenceForNumber(toFixedVal($(this).val()));
                $(this).val(discount);
            }
        } else {
            $(this).val('');
        }

        removePaidAmount(randID);
    });

    $(document).on('click', '.deleteBtn', function(er) {
        er.preventDefault();
        var feetypeID = $(this).attr('data-feetype-id');
        $('#tr_'+feetypeID).remove();
        
        var i = 1;
        $('#feetypeList tr').each(function(index, value) {
            $(this).children().eq(0).text(i);
            i++;
        });
        totalInfo();
    });

    function removePaidAmount(randID) {
        var ramount = $('#td_amount_id_'+randID).val();
        var rdiscount = $('#td_discount_id_'+randID).val();
        var rpaidamount = ($('#td_paidamount_id_'+randID).val());
        
        if(ramount == '' && ramount == null) {
            ramount = 0;
        }

        if(rdiscount == '' && rdiscount == null) {
            rdiscount = 0;
        }

        if(rpaidamount != '' && rpaidamount != null) {
            ramount = parseFloat((ramount - (ramount/100) * rdiscount)); 
            rpaidamount = parseFloat(rpaidamount);  
            if(rpaidamount > ramount) {
                $('#td_paidamount_id_'+randID).val('');
            }
        }
    }
</script>

<script type="text/javascript">
    $('#statusID').change(function() {
        if(($(this).val() != 0) && ($(this).val() != 5)) {
            $('.paymentmethodDiv').removeClass('hide');

            $('#feetypeList tr').each(function(index, value) {
                $(this).children().eq(5).children().removeAttr('readonly');
            });
        } else {
            $('.paymentmethodDiv').addClass('hide');

            $('#feetypeList tr').each(function(index, value) {
                $(this).children().eq(5).children().attr('readonly', 'readonly');
            });
        }
    });

    $(document).on('click', '#editInvoiceButton', function() {
        var error=0;;
        var field = {
            'classesID'           : $('#classesID').val(), 
            'studentID'           : $('#studentID').val(), 
            'date'                : $('#date').val(),
            'statusID'            : $('#statusID').val(), 
            'paymentmethodID'     : $('#paymentmethodID').val(), 
        };
        
        if(field['classesID'] === '0') {
            $('.classesDiv').addClass('has-error');
            error++;
        } else {
            $('.classesDiv').removeClass('has-error');
        }

        if(field['date'] === '') {
            $('.dateDiv').addClass('has-error');
            error++;
        } else {
            $('.dateDiv').removeClass('has-error');
        }

        if(field['statusID'] === '5') {
            $('.statusDiv').addClass('has-error');
            error++;
        } else {
            $('.statusDiv').removeClass('has-error');
        }

        if(field['statusID'] != 0 && field['statusID'] != 5) {
            if(field['paymentmethodID'] === '0') {
                $('.paymentmethodDiv').addClass('has-error');
                error++;
            } else {
                $('.paymentmethodDiv').removeClass('has-error');
            }
        }

        var totalsubtotal = 0;
        var totalpaidamount = 0;
        var feetypeitems = $('tr[id^=tr_]').map(function(){
            if($(this).children().eq(4).text() != '' && $(this).children().eq(4).text() != null) {
                totalsubtotal += parseFloat($(this).children().eq(4).text());
            }

            if($(this).children().eq(5).children().val() != '' && $(this).children().eq(5).children().val() != null) {
                totalpaidamount += parseFloat($(this).children().eq(5).children().val());
            }

            return { feetypeID : $(this).attr('invoicefeetypeid'), amount: $(this).children().eq(2).children().val(), discount : $(this).children().eq(3).children().val(), subtotal: $(this).children().eq(4).text() , paidamount: $(this).children().eq(5).children().val() };
        }).get();

        if (typeof feetypeitems == 'undefined' || feetypeitems.length <= 0) {
            error++;
            toastr["error"]('The fee type item is required.')
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

        feetypeitems = JSON.stringify(feetypeitems);

        if(error === 0) {
            $(this).attr('disabled', 'disabled');
            var formData = new FormData($('#invoiceDataForm')[0]);
            formData.append("feetypeitems", feetypeitems);
            formData.append("totalsubtotal", totalsubtotal);
            formData.append("totalpaidamount", totalpaidamount);
            formData.append("editID", );
            makingPostDataPreviousofAjaxCall(formData);
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
            async: true,
            dataType: "html",
            success: function(data) {
                var response = JSON.parse(data);
                errrorLoader(response);
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }

    function errrorLoader(response) {
        if(response.status) {
            window.location = "";
        } else {
            $('#editInvoiceButton').removeAttr('disabled');
            $.each(response.error, function(index, val) {
                toastr["error"](val)
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
            });
        }
    }
</script>
@endsection
@section('scripts')

@endsection