@extends('layouts.admin')
@section('content')
<style>
    @media print {
        body * {
          visibility: hidden;
        }
        #section-to-print, #section-to-print * {
          visibility: visible;
        }
        #section-to-print {
           display : block;
        }
        .hide-from-printer {
            display: none !important;
            height: 0px;
        }
    }
    .visitentabelle {
        border-collapse: collapse;
    }
    </style>
<div class="well">
    <div class="row">

        <div class="col-sm-6">
            <button class="btn-cs btn-sm-cs" onclick="window.print()"><span class="fa fa-print"></span> Print </button>
        </div>

        <div class="col-sm-6">
            <ol class="breadcrumb">
                <li><a href="">Dashboard</i> </a></li>
                <li><a href="">Account</a></li>
                <li class="active">Trial balance</li>
            </ol>
        </div>
    </div>
</div>

<div id="section-to-print">
    <section class="content invoice">
        <div class="row">
            <div class="box-body">
                <div class="col-sm-4">
                    <div class="callout callout-info">
                        <span class='text-blue'>Projected Amount : {{ $projected_amount }}</span><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col" style="font-size: 16px;">
                <strong>Today Posted Revenue:{{$todayposted}}</strong>

                </address>
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
                                <th class="col-lg-2">Fee ID</th>
                                <th class="col-lg-2">Date</th>
                                <th class="col-lg-4">Fee Type</th>
                                <th class="col-lg-2">Amount</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($todayposted_data as $item)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ isset($item->feetypes->fee_id)?$item->feetypes->fee_id:''}}</td>
                                <td>{{$item->date}}</td>
                                <td>{{ isset($item->feetypes->name)?$item->feetypes->name:''}}</td>
                                <td>{{ $item->amount}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4"><span class="pull-right"><b>Total Amount</b></span></td>
                                <td><b>{{$todayposted}}</b></td>
                            </tr>
                            <tr>
                                <td colspan="4"><span class="pull-right"><b>Sub Total</b></span></td>
                                <td><b>{{$todayposted +  $projected_amount}}</b></td>
                            </tr>

                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col" style="font-size: 16px;">
                <strong>Today Credited Amount:{{$todaycredit}}</strong>

                </address>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-xs-12">
                <div class="table-responsive"style="overflow-x: hidden;">
                    <table class="table table-bordered product-style">
                        <thead>
                            <tr>
                                <th class="col-lg-2">#</th>
                                <th class="col-lg-5">Type</th>
                                <th class="col-lg-5">Amount</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>Cash</td>
                                <td>{{$total_cash_amount}}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Cheque</td>
                                <td>{{$total_cheque_amount}}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Credit/Debit</td>
                                <td>{{$total_credit_amount}}</td>
                            </tr>


                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"><span class="pull-right"><b>Total Amount</b></span></td>
                                <td><b>{{$todaycredit}}</b></td>
                            </tr>

                        </tfoot>
                    </table>
                    <div class="row">
                        <div class="box-body">
                            <div class="col-sm-12">
                                <div class="callout callout-info">
                                    <span class='text-blue pull-right'>Today Balance: {{($todayposted +  $projected_amount)-$todaycredit}}</span><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="box-body">
                            <div class="col-sm-12">
                                <div class="callout callout-info">
                                    <span class='text-blue pull-right'>Net Diffrence: {{  $projected_amount -(($todayposted + $projected_amount)-$todaycredit)}}</span><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- this row will not appear when printing -->
    </section>
</div>
@endsection
@section('scripts')
<script>
    $('#accounts-menu').addClass('active');
    $('#account-report-menu').addClass('active');
    $('#trialbalance-report-menu').addClass('active');
</script>
@endsection