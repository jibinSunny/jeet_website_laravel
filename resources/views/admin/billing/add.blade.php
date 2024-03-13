@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-sm-4">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa icon-invoice"></i> Posting</h3>
                <ol class="breadcrumb flex align-items-center justify-items-center">
                    <p class="f-500 mb-0 mr-1">Batch Post</p>
                    <input type="checkbox" class="js-switch toggle-batch-post">
                </ol>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form role="form" method="post" enctype="multipart/form-data" id="singleDataPost"> 
                    <div class="classesDiv form-group" >
                        <label for="classesID">
                            Class <span class="text-red">*</span>
                        </label>
                        <select name="class" id="class" class="form-control select2" tabindex="-1">
                            <option value="0">Select Class</option>
                            </select>
                        <span class="text-red"></span>
                    </div>

                    <div class="classesDiv form-group" >
                        <label for="classesID">
                            Division <span class="text-red">*</span>
                        </label>
                        <select name="class" id="class" class="form-control select2" tabindex="-1">
                            <option value="0">Select Division</option>
                            </select>
                        </select>
                        <span class="text-red"></span>
                    </div>

                    <div class="studentDiv form-group" >
                        <label for="studentID">
                            Student <span class="text-red">*</span>
                        </label>
                        <select name="class" id="class" class="form-control select2" tabindex="-1">
                            <option value="0">Select Student</option>
                            </select>
                        </select>
                        <span class="text-red">
                        </span>
                    </div>

                    <div class="form-group" >
                        <label for="feetypeID" class="control-label">
                            Fee Type <span class="text-red">*</span>
                        </label>
                        <select name="class" id="class" class="form-control select2" tabindex="-1">
                            <optgroup label="Select Fee Types">
                            <option value="0"><strong>[101]</strong> Library Fee</option>
                            <option value="0"><strong>[102]</strong> Transport Fee</option>
                            <option value="0"><strong>[103]</strong> Hostel Fee</option>
                            <optgroup label="[104] Tuition Fee">
                                <option value="0">Tuition Fee [Jan]</option>
                                <option value="0">Tuition Fee [Feb]</option>
                                <option value="0">Tuition Fee [Mar]</option>
                                <option value="0">Tuition Fee [Apr]</option>
                                <option value="0">Tuition Fee [May]</option>
                                <option value="0">Tuition Fee [Jun]</option>
                                <option value="0">Tuition Fee [Jul]</option>
                                <option value="0">Tuition Fee [Aug]</option>
                                <option value="0">Tuition Fee [Sep]</option>
                                <option value="0">Tuition Fee [Oct]</option>
                                <option value="0">Tuition Fee [Nov]</option>
                                <option value="0">Tuition Fee [Dec]</option>
                            </optgroup>
                            </select>
                        </optgroup>
                        </select>
                        <span class="control-label"></span>
                    </div>

                    <div class="amountDiv form-group" >
                        <label for="amountDiv">
                            Amount <span class="text-red">*</span>
                        </label>
                        <input type="text" class="form-control" id="amount" name="amount" value="" >
                        <span class="text-red">
                        </span>
                    </div>

                    <input id="addInvoiceButton" type="button" class="btn btn-primary" value="Submit" >
                </form>

                <form role="form" method="post" enctype="multipart/form-data" id="batchDataPost" style="display: none;"> 
                    <div class="classesDiv form-group" >
                        <label for="classesID">
                            Class Batch <span class="text-red">*</span>
                        </label>
                        <select name="class" id="class" class="form-control select2" tabindex="-1">
                            <option value="0">Select Class</option>
                            </select>
                        </select>
                        <span class="text-red"></span>
                    </div>

                    <div class="classesDiv form-group" >
                        <label for="classesID">
                            Division Batch <span class="text-red">*</span>
                        </label>
                        <select name="class" id="class" class="form-control select2" tabindex="-1">
                            <option value="0">Select Division</option>
                            </select>
                        </select>
                        <span class="text-red"></span>
                    </div>

                    <div class="form-group" >
                        <label for="feetypeID" class="control-label">
                            Fee Type <span class="text-red">*</span>
                        </label>
                        <select name="class" id="class" class="form-control select2" tabindex="-1">
                            <optgroup label="Select Fee Types">
                            <option value="0"><strong>[101]</strong> Library Fee</option>
                            <option value="0"><strong>[102]</strong> Transport Fee</option>
                            <option value="0"><strong>[103]</strong> Hostel Fee</option>
                            <optgroup label="[104] Tuition Fee">
                                <option value="0">Tuition Fee [Jan]</option>
                                <option value="0">Tuition Fee [Feb]</option>
                                <option value="0">Tuition Fee [Mar]</option>
                                <option value="0">Tuition Fee [Apr]</option>
                                <option value="0">Tuition Fee [May]</option>
                                <option value="0">Tuition Fee [Jun]</option>
                                <option value="0">Tuition Fee [Jul]</option>
                                <option value="0">Tuition Fee [Aug]</option>
                                <option value="0">Tuition Fee [Sep]</option>
                                <option value="0">Tuition Fee [Oct]</option>
                                <option value="0">Tuition Fee [Nov]</option>
                                <option value="0">Tuition Fee [Dec]</option>
                            </optgroup>
                            </select>
                        </optgroup>
                        </select>
                        <span class="control-label"></span>
                    </div>

                    <div class="amountDiv form-group" >
                        <label for="amountDiv">
                            Amount <span class="text-red">*</span>
                        </label>
                        <input type="text" class="form-control" id="amount" name="amount" value="" >
                        <span class="text-red">
                        </span>
                    </div>

                    <!-- <div class="statusDiv form-group" >
                        <label for="statusID">
                            Payment Status <span class="text-red">*</span>
                        </label>
                        <select name="class" id="class" class="form-control select2" tabindex="-1">
                            <option value="0">Select Payment Status</option>
                            <option value="0">Not Paid</option>
                            <option value="0">Partially Paid</option>
                            <option value="0">Fully Paid</option>
                        </select>
                        <span class="text-red"></span>
                    </div> -->

                    <input id="addInvoiceButton" type="button" class="btn btn-primary" value="Submit" >
                </form>
            </div>
        </div>
    </div>


    <div class="col-sm-8">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa icon-feetypes"></i>[101] Library Fee</h3>
                <ol class="breadcrumb">
                    <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
                    <li><a href="">Invoice</a></li>
                    <li class="active">Add Invoice</li>
                </ol>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form class="" role="form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12">
                            
                        </div>
                    </div>
                </form>
                <div id="hide-table">
                    <table id="addPost" class="table table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                <th><a href="javascript:;" class="p6n-sort-link">#</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Student</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Class</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Division</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Amount</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Discount</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Invoice Date</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Action</a></th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td data-title="">1</td>
                                    <td data-title="">Ankit Kumar</td>
                                    <td data-title="">Five</td>
                                    <td data-title="">A</td>
                                    <td data-title="">7500.00</td>
                                    <td data-title="">50</td>
                                    <td data-title="">16 Dec 2020</td>
                                    <td data-title="Action">
                                        <input type="submit" id="addInvoiceButton" type="button" class="btn btn-xs btn-primary" value="Post" >
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')

<script type="text/javascript">
    $(function () {
      $("#addPost").dataTable({

'columnDefs': [
         {
            'targets': 0,
            'checkboxes': {
               'selectRow': false
            }
         }
      ],
      "info": false,
      "paging":   false,
      });
    });

    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(html) {
    var switchery = new Switchery(html, { size: 'small' });
    });

    var clickCheckbox = document.querySelector('.toggle-batch-post');
    clickCheckbox.onchange = function() {
    if(clickCheckbox.checked == true) {
        $('#singleDataPost').hide();
        $('#batchDataPost').show();
    } else {
        $('#singleDataPost').show();
        $('#batchDataPost').hide();
    }
    };
  </script>

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
                data: {'classesID' : classesID},
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

        var text = '';
            text += '';
                text += lastTdNumber;
            text += '';

            text += '';
                text += productText;
            text += '';

            text += '';
                text += ('<input type="text" class="form-control change-amount" id="td_amount_id_'+randID+'" data-amount-id="'+randID+'">');
            text += '';

            text += '';
                text += ('<input type="text" class="form-control change-discount" id="td_discount_id_'+randID+'" data-discount-id="'+randID+'">');
            text += '';

            text += '';
                text += '0.00';
            text += '';

            text += '';
                if($('#statusID').val() != 0 && $('#statusID').val() != 5) {
                    text += ('<input type="text" class="form-control change-paidamount" id="td_paidamount_id_'+randID+'" data-paidamount-id="'+randID+'">');
                } else {
                    text += ('<input type="text" class="form-control change-paidamount" id="td_paidamount_id_'+randID+'" data-paidamount-id="'+randID+'" readonly="readonly">');
                }
            text += '';

            text += '';
                text += ('<a style="margin-top:3px" href="#" class="btn btn-danger btn-sm deleteBtn" id="feetype_'+randID+'" data-feetype-id="'+randID+'">Delete</a>');
            text += '';
        text += '';

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

    $(document).on('click', '#addInvoiceButton', function() {
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
            formData.append("editID", 0);
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
            $('#addInvoiceButton').removeAttr('disabled');
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