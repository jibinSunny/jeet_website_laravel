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
            <button class="btn-cs btn-sm-cs" onClick="window.print()"><span class="fa fa-print"></span> Print </button>
        </div>

        <div class="col-sm-6">
            <ol class="breadcrumb">
                <li><a href=""><i class="fa icon-dashboardIcon"></i> </a></li>
                <li><a href="{{ route('showBilling') }}">Billing</a></li>
                <li class="active">Invoice</li>
            </ol>
        </div>
    </div>
</div>

<div id="section-to-print">
    <section class="content invoice">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <img src="{{ asset('frontend/icons/logo.svg')}}" width="25px" height="25px" class="img-circle" style="margin-top:-10px" alt=""> Jeet School Management System
                    {{-- <small class="pull-right">Create Date : 09 Nov 2020</small> --}}
                </h2>
            </div><!-- /.col -->
        </div>
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col" style="font-size: 16px;">
                From <address>
                    <strong>Jeet School Management System</strong><br>
                    {{ $settings->address }}<br>
                    Phone : {{ $settings->phone }}<br>
                    Email : {{ $settings->email }}<br>
                </address>


            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col" style="font-size: 16px;">
                To <address>
                    <strong>{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</strong><br>
                    Email : {{ $student->email }}<br>
                    Phone : {{ $student->phone }}<br>
                    Register No : {{ $student->reg_number }}<br>
                    {{-- Roll : {{ $student->roll_number }}<br>
                    Class : {{ $student->classname->name }} {{ $student->divisions->name }}<br> --}}

                </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col" style="font-size: 16px;">
                Invoice id : {{ $payment->transaction_id }}<br>
                Payment Status : Paid
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
                            @foreach ($paidPostings as $item)
                            <tr>
                                <td data-title="#">{{ $loop->iteration }}</td>

                                <td data-title="Fee Type">
                                    {{ $item->postings->feetypes->name }}
                                </td>

                                <td data-title="Amount">
                                    {{ $item->postings->amount }}
                                </td>

                                <td data-title="Discount"> {{ $item->postings->discount }}</td>

                                <td data-title="Subtotal">{{ $item->postings->amount - $item->postings->discount}}</td>
                            </tr>

                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4"><span class="pull-right"><b>Total Amount</b></span></td>
                                <td><b>{{ $payment->amount }}</b></td>
                            </tr>
                            <tr>
                                <td colspan="4"><span class="pull-right"><b>Discount</b></span></td>
                                <td><b>{{ $payment->discount }}</b></td>
                            </tr>
                            <tr>
                                <td colspan="4"><span class="pull-right"><b>Debited from Advance</b></span></td>
                                <td><b>{{ $payment->advance_deduction }}</b></td>
                            </tr>
                            <tr>
                                <td colspan="4"><span class="pull-right"><b>Paid Amount</b></span></td>
                                <td><b>{{   $payment->paid_amount  }}</b></td>
                            </tr>
                            <tr>
                                <td colspan="4"><span class="pull-right"><b>Advance Balance</b></span></td>
                                <td><b>{{ $payment->advance_balance }}</b></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <div class="col-sm-3 col-xs-12 pull-right">
                <div class="well well-sm">
                    <p>
                        Created By : Admin <br>
                        Date : 20 Sep 2020 </p>
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
    $('#income-menu').addClass('active');
    $('#billing-menu').addClass('active');
</script>
<script language="javascript" type="text/javascript">

</script>
@endsection
