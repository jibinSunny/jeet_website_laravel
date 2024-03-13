@extends('layouts.admin')
@section('content')
<style>
    @media print {
      body * {
        visibility: hidden;
      }
      #generate_receipt * {
        visibility: visible;
      }
      #button-div *{
        visibility: hidden;
      }
    }
    /* @page { size: landscape; } */
    </style>
    <div class="row">
        <div class="col-sm-3">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa icon-invoice"></i> Payment</h3>
                    <a href="#paymentlist" class="pull-right btn btn-info btn-xs mrg getpaymentinfobtn mt-1" data-toggle="modal">View Payments</a>
                </div>

                <div class="box-body box-profile">
                    <center>
                    <img onerror="this.onerror=null;this.src='https://i.pinimg.com/originals/a6/58/32/a65832155622ac173337874f02b218fb.png'"  src="{{ asset('user-files/student/profile/'.$student->code.'/'.$student->profile_image) }}" class="profile-user-img img-responsive img-circle" alt="">                </center>

                    <h3 class="profile-username text-center">{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</h3>

                    <p class="text-muted text-center">Reg No: {{ $student->reg_number }}</p>
                        <input type="hidden" value="{{ $student->code }}" name="code" id="code">
                        <input type="hidden" value="{{ $student->advance }}" id="total_advance">
                        <input type="hidden" value="{{ $student->deposit }}" id="total_deposit">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item" style="background-color: #FFF">
                            <b>Department</b> <a class="pull-right">{{ $student->departmentname->name }}</a>
                        </li>
                        <li class="list-group-item" style="background-color: #FFF">
                            <b>Class</b> <a class="pull-right">{{ $student->classname->name }}</a>
                        </li>
                        <li class="list-group-item" style="background-color: #FFF">
                            <b>Division</b> <a class="pull-right">{{ $student->divisions->name }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="box" style="margin-bottom:40px">
                <div class="box-body">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item" style="background-color: #FFF">
                            <b>Advance</b>
                            <a class="pull-righ" id="advance-amount"><span class="advance-payment">₹ {{ $student->advance }}</span></a>
                        </li>
                    </ul>


                    <div id="payuInputs">
                        <div class="form-group ">
                            <label for="first_name">Advance Amount</label>
                            <input type="hidden" id="avl_adv" value="{{ $student->advance }}">
                            <input type="number" class="form-control " id="advance_amt" name="advance_amt" placeholder="Enter Advance Amount" required>
                            <label for="first_name" class="mt-1">Date</label>
                            <input type="text" class="form-control" id="advance_date" name="advance_date" placeholder="Choose Date" value="@php echo date('d-m-Y'); @endphp" required>
                        </div>
                        <button id="advance_pay" type="submit" class="btn btn-sm btn-primary">Pay & Generate Reciept</button>
                    </div>

                </div>
            </div>
            <div class="box" style="margin-bottom:40px">
                <div class="box-body">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item" style="background-color: #FFF">
                            <b>Deposit</b>
                            <a class="pull-righ" id="deposit-amount"><span class="advance-payment">₹ {{ $student->deposit }}</span></a>
                        </li>
                    </ul>


                    <div id="payuInputs">
                        <div class="form-group ">
                            <label for="first_name">Deposit Amount</label>
                            <input type="hidden" id="avl_dep" value="{{ $student->deposite }}">
                            <input type="number" class="form-control " id="deposit_amt" name="deposit_amt" placeholder="Enter Deposit Amount" required>
                            <label for="first_name" class="mt-1">Date</label>
                            <input type="text" class="form-control" id="deposit_date" name="deposit_date" placeholder="Choose Date" value="@php echo date('d-m-Y'); @endphp" required>
                        </div>
                        <button id="deposit_pay" type="submit" class="btn btn-sm btn-primary">Pay & Generate Reciept</button>
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
                        <li><a href="{{ route('showBilling') }}">Billing</a></li>
                        <li class="active">Payment</li>
                    </ol>
                </div>

                @if(count($postings)>0)
                <div class="box-body">
                    <div class="table-responsive">
                        <form id="paymentForm">
                            <input type="hidden" value="{{ $student->code }}" name="student_code" id="student_code">
                        <table class="table table-bordered feetype-style" style="font-size: 16px;">
                            <thead>
                                <tr>
                                    <th class="col-sm-1">#</th>
                                    <th class="col-sm-3">Fee ID</th>
                                    <th class="col-sm-3">Fee Type</th>
                                    <th class="col-sm-1">Amount</th>
                                    <th class="col-sm-1">Discount</th>
                                    <th class="col-sm-1">Due</th>
                                </tr>
                            </thead>
                            <tbody id="feetypeList">
                                @php $total = 0;  @endphp
                                @if($postings)
                                    @foreach ($postings as $item)

                                    <tr id="tr_3153115763">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->feetypes->fee_id }}</td>
                                        <td>{{ $item->feetypes->name }}</td>
                                        <td>{{ $item->amount }}
                                            @php $total += $item->amount @endphp
                                            <input type="hidden" value="{{ $item->id }}" name="posting_id[]">
                                        </td>
                                        <td>
                                            <input class="form-control indv_discount{{ $loop->iteration }} indv-discount h-auto" onchange="updateDue({{ $loop->iteration }},{{ $item->amount }})" type="number" max="{{ $item->amount }}" min="0" value="0" name="discount_item[]">
                                        </td>
                                        <td id="due_{{ $loop->iteration }}">{{ $item->amount }}</td>
                                    </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            <tfoot id="feetypeListFooter">
                                <tr>
                                    <td class="text-right" colspan="4">Total</td>
                                    <td colspan="2" id="totalDue" style="font-weight: bold"><input class="form-control h-auto" type="text" id="total-amount" name="total" value="{{ $total }}" readonly></td>
                                </tr>
                                <tr>
                                    <td class="text-right v-middle" colspan="4">Advance</td>
                                    <td colspan="2"><input class="form-control h-auto" type="number" name="advance" id="advance" value="0" max="{{ $student->advance }}" min="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-right v-middle" colspan="4">Advance Balance</td>
                                    <td colspan="2"><input class="form-control total-paid h-auto" type="text" id="advance_balance" name="advance_balance" name="paid" value="0" readonly></td>
                                </tr>
                                <tr>
                                    <td class="text-right v-middle" colspan="4">Discount</td>
                                    <td colspan="2"><input class="form-control total-discount h-auto" type="text" id="discount" name="discount" value="0" readonly></td>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="4">Sub Total</td>
                                    <td style="font-weight: bold" colspan="2">
                                        <input class="form-control sub-total h-auto" type="text" id="subtotal_amount" name="subtotal" value="{{ $total }}" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6"  class="text-right" style="font-weight: bold">
                                    <a data-toggle="modal" href="#payNow"  class="btn btn-labeled btn-primary btn-md mrg" data-placement="top" data-toggle="tooltip" data-original-title="Pay Now"><span class="btn-label"><i class="fa icon-receipt"></i></span>Pay Now</a></td>
                                </tr>
                            </tfoot>
                        </table>
                        </form>
                    </div>
                </div>
                @else

                <div class="box-body">
                    <div class="table-responsive">
                        <div class="callout callout-danger">
                            <p><b>Note:</b> All postings are paid</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="modal fade" id="paymentlist">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">View Payments</h4>
                </div>
                <div class="modal-body">
                    <div id="hide-table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Invoice Date</th>
                                    <th>Invoice Paid By</th>
                                    <th>Amount</th>
                                    <th>Discount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="payment-list-body">
                                @foreach($payments as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->students->first_name }} {{ $item->students->middle_name }} {{ $item->students->last_name }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ $item->discount }}</td>
                                        <td><a href="{{ route('showInvoice',['student_code'=>$item->students->code,'payment_code' =>$item->code]) }}" class="btn btn-info btn-xs mrg">View Invoice</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" style="margin-bottom:0px;" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="payNow">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Complete Your Payment</h4>
                </div>
                <div class="modal-body" style="height:100px;">
                    <div id="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="col-sm-4 col-md-4">
                                <select class="form-control" id="payment_type" name="payment_type">
                                    <option value="">Select Payment Type</option>
                                    <option value="1">Cash</option>
                                    <option value="2">Cheque</option>
                                    <option value="3">Online Payment</option>
                                </select>
                            </div>
                            <div class="col-sm-4 col-md-4" id="cheque_div">
                                <input type="cheque_number" id="cheque_number" class="form-control" placeholder="Enter Cheque Number">
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <button class="btn btn-info" onclick="payment()">Pay Now</button>
                                <button type="button" class="btn btn-default" style="margin-bottom:0px;" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

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
                        <span class="header"><p class="logo"><img src="{{ asset('frontend/icons/logo.svg') }}"></p></span>
                        <p class="title">Jeet School Management System</p>
                        <p class="title-desc">Trivandrum, Kerala</p>
                        <hr>

                        <table class="table info">
                            <tr>
                                <td><b>Invoice Number: </b>INV-G-</td>
                                <td><b>Clearance: </b>PAID</td>
                                <td class="advance_date_td"></td>
                            </tr>
                            <tr>
                                <td><b>Name: </b>{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</td>
                                <td><b>Class: </b>{{ $student->classname->name }}</td>
                                <td><b>Roll: </b>{{ $student->roll_number }}</td>
                            </tr>
                            <tr>
                                <td> <b>Division:</b>{{ $student->divisions->name }}</td>
                                <td> <b>Department: </b>{{ $student->departmentname->name }}</td>
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
                                    <td class="textright advance_amount_td" ></td>
                                </tr>
                                <tr>
                                    <td class="boldandred">Grand Total</td>
                                    <td class="boldandred textright advance_amount_td"></td>
                                </tr>
                            </tbody>
                        </table>

                        <hr>
                        <div class="footer modal-footer">
                            <p class="logo"><img src="{{ asset('frontend/icons/logo.svg') }}"></p>
                            <p class="copyright">Jeet School Administration</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer" id="button-div">
                <a type="submit" class="btn btn-primary" onClick="window.print()">Print</a>
                <button type="button" class="btn btn-default" style="margin-bottom:0px;" data-dismiss="modal">Cancel</button>
            </div>

        </div>
    </div>
</div>

{{-- <div class="modal fade" id="paymentlist">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">View Advance History</h4>
            </div>
            <div class="modal-body">
                <div id="hide-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Receipt</th>
                            </tr>
                        </thead>
                        <tbody id="payment-list-body">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" style="margin-bottom:0px;" data-dismiss="modal">close</button>
            </div>
        </div>
    </div>
</div> --}}
@endsection
@section('scripts')
<script>
    $('#accounts-menu').addClass('active');
    $('#income-menu').addClass('active');
    $('#billing-menu').addClass('active');
</script>

<script>
    $(document).ready(function() {
        var avl_adv = parseFloat($('#avl_adv').val());
        var sub_total = parseFloat($('.sub-total').val());
        if(sub_total<= 0){
            $('#advance').val(0);
        }else if(avl_adv > sub_total){
            $('#advance').val(sub_total);
            $('.sub-total').val(0);
        }else{
            var new_sub_tot = sub_total-avl_adv;
            $('#advance').val(avl_adv);
            $('.sub-total').val(new_sub_tot);
        }
        if(sub_total>avl_adv){
            var avail_adv = 0;
        }else{
            var avail_adv = parseFloat(avl_adv)-parseFloat(sub_total);
        }
        $('#advance_balance').val(avail_adv);
    });
    function updateDue(iteration,amount){
        var discount = $('.indv_discount'+iteration).val();
        var total = amount-discount;
        if(parseFloat(total) <= 0){
            $('#due_'+iteration).html(0);
            $('.indv_discount'+iteration).val(amount);
        }else{
            $('#due_'+iteration).html(total);
        }
        var tot_dis = 0;
        $('.indv-discount').each(function(){
            tot_dis += parseFloat($(this).val());
            $('.total-discount').val(tot_dis);
        });
        var adv = parseFloat($('#advance').val());
        var sub_total = parseFloat($('.sub-total').val());
        var act_total = parseFloat($('#advance').val());
        var total_one = parseFloat($('#total-amount').val());
        if(parseFloat(tot_dis+adv) > parseFloat(sub_total) ){
            var adv_minus = parseFloat(act_total) - parseFloat(tot_dis);
            var adv_plus = parseFloat(act_total) + parseFloat(tot_dis);
            if(adv_plus>total_one){
                var adv_minus_amt = parseFloat(adv_plus)- parseFloat(total_one);
                var adv_bal = $('#advance').val();
                var avail_adv = parseFloat(adv_bal)-parseFloat(adv_minus_amt);
                $('#advance').val(avail_adv);
                var adv_bal = $('#advance_balance').val();
                var avail_adv = parseFloat(adv_bal)+parseFloat(adv_minus_amt);
                $('#advance_balance').val(avail_adv);
            }else{
                var act_adv = $('#total_advance').val();
                $('#advance').val(act_adv);
                $('#advance_balance').val(0);
            }
        }

        var sum = parseFloat($('#total-amount').val()) - parseFloat(tot_dis) - parseFloat($('#advance').val());
        $('#subtotal_amount').val(sum);
    }
    $(document).on('keyup', '#advance', function() {
        var adv = parseFloat($(this).val());
        var avl_adv = $('#avl_adv').val();
        var sub_total = $('.sub-total').val();
        var act_total = parseFloat($('#total-amount').val());
        var total_dis = $('.total-discount').val();
        var tot_without_adv = parseFloat(act_total) - parseFloat(total_dis);
        if(adv > avl_adv){
            $('#advance').val(avl_adv);
        }else if(adv < 0){
            $('#advance').val(0);
        }
        var sum = parseFloat(act_total) - parseFloat(total_dis) - parseFloat($('#advance').val());
        $('.sub-total').val(sum);
        var adv_bal = $('#advance_balance').val();
        var avail_adv = parseFloat(avl_adv)-parseFloat(adv);
        if(adv > avl_adv){
            $('#advance_balance').val(0);
        }else{
            $('#advance_balance').val(avail_adv);
        }
    });
    $(document).on('keyup', '.change-discount', function() {
        var amount = $('#total').val();
        var discount =  $(this).val();
        var dis_count = (parseFloat(discount)/100)*parseFloat(amount);
        var subtotal = parseFloat(amount) - parseFloat(dis_count);
        $('#subtotal').val(subtotal);
        $('#subtotal-hidden').val(subtotal);
    });
    $('#advance_date').datepicker();
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>

document.getElementById("advance_pay").onclick = function() {
    var amt = $('#advance_amt').val();
    var adv_date = $('#advance_date').val();
    var code = $('#code').val();
    if(amt == ''){
        alert("Please enter an amount")
    }else{
        $.ajax({
            type: "POST",
            url: "{{route('addAdvance')}}",
            data: {
                'adv_amt': amt, 'adv_date' : adv_date, 'student_code' : code
            },
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.status == 1) {
                    var total_amt = $('#total_advance').val();
                    var total_plus = parseFloat(total_amt)+parseFloat(amt);
                    document.getElementById("advance-amount").innerHTML="<span class='advance-payment'>₹ "+total_plus+"</span>",
                    $('#advance_amt').val('');
                    $('#generate_receipt').modal('toggle');
                    $('.advance_amount_td').html(amt);
                    $('.advance_date_td').html('<b>Date: </b>'+adv_date);
                    $('#total_advance').val(total_plus);
                    $('#avl_adv').val(total_plus);
                    var adv_bal = $('#advance_balance').val();
                    $('#advance_balance').val(parseFloat(adv_bal)+parseFloat(amt))
                } else {

                }
            }
        });
    }
}
document.getElementById("deposit_pay").onclick = function() {
    var amt = $('#deposit_amt').val();
    var adv_date = $('#deposit_date').val();
    var code = $('#code').val();
    if(amt == ''){
        alert("Please enter an amount")
    }else{
        $.ajax({
            type: "POST",
            url: "{{route('addDeposit')}}",
            data: {
                'deposit_amt': amt, 'deposit_date' : adv_date, 'student_code' : code
            },
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.status == 1) {
                    var total_amt = $('#total_deposit').val();
                    var toal_plus = parseFloat(total_amt)+parseFloat(amt);
                    document.getElementById("deposit-amount").innerHTML="<span class='advance-payment'>₹ "+toal_plus+"</span>",
                    $('#deposit_amt').val('');
                    $('#generate_receipt').modal('toggle');
                    $('.advance_amount_td').html(amt);
                    $('.advance_date_td').html('<b>Date: </b>'+adv_date);
                } else {

                }
            }
        });
    }
}
</script>
<script>
    $('#payment_type').change(function(){
        if($(this).val() == 2){
            $('#cheque_div').show();
        }else{
            $('#cheque_div').hide();
        }
    })
</script>
<script>
    $(document).ready(function() {
        @if(Session::has('success'))
        toastr.success('{{ Session::get('
            success ') }}', 'Successful');
        @endif
        @if(Session::has('errors'))
        @foreach($errors -> all() as $error)
        toastr.error('{{ $error }}', 'Error');
        @endforeach
        @endif
    });
</script>
<script>
$(document).ready(function() {
    $('#cheque_div').hide();
});
</script>
<script>
function payment(){
    var payment_type = $('#payment_type').val();
    var cheque_number = $('#cheque_number').val();
    var form = document.getElementById('paymentForm');
    $.ajax({
            type: "POST",
            url: "{{route('addPayment')}}",
            data: $(form).serialize() + '&payment_type='+payment_type +'&cheque_number='+cheque_number,
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                if (data.status == 1) {
                    var student_code = data.student_code;
                    var payment_code = data.payment_code;
                    window.location = '../invoice/'+student_code+'/'+payment_code;
                }else{
                    window.location.reload();
                }
            }
        });
}
</script>
@endsection
