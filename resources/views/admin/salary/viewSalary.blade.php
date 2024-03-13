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
        <div class="col-sm-7">
            <button class="btn-cs btn-sm-cs" onClick="window.print()"><span class="fa fa-print"></span>Print Payslip</button>
        </div>

        <div class="col-sm-5">
            <ol class="breadcrumb">
                <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
                <li><a href="">Manage Salary</a></li>
                <li class="active">View Salary</li>
            </ol>
        </div>
    </div>
</div>

    <div id="section-to-print">
        <div class="row">

            <div class="col-sm-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#salaryinfo" data-toggle="tab">Pay Slip for {{ $date }}</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="active tab-pane" id="salaryinfo">
                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="box" style="border: 1px solid #eee;">
                                        <div class="box-header" style="background-color: #fff;border-bottom: 1px solid #eee;color: #000;">
                                            <h3 class="box-title" style="color: #1a2229"><b>Employee Details</b></h3>
                                        </div>
                                        <div class="box-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td class="col-sm-2" style="line-height: 30px">
                                                        Employee Name
                                                    </td>
                                                    <td class="col-sm-4" style="line-height: 30px">
                                                        {{ $user->first_name }} {{ $user->last_name }}
                                                    </td>
                                                    <td class="col-sm-2" style="line-height: 30px">
                                                        No. of working days
                                                    </td>
                                                    <td class="col-sm-4" style="line-height: 30px">
                                                        {{ $working_days }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="col-sm-2" style="line-height: 30px">
                                                        Employee Designation
                                                    </td>
                                                    <td class="col-sm-4" style="line-height: 30px">
                                                        {{ $user->usertypename->name }}
                                                    </td>
                                                    <td class="col-sm-4" style="line-height: 30px">
                                                        No. of days absent
                                                    </td>
                                                    <td class="col-sm-4" style="line-height: 30px">
                                                        {{ $absent }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="col-sm-2" style="line-height: 30px">
                                                        Email
                                                    </td>
                                                    <td class="col-sm-4" style="line-height: 30px">
                                                        {{ $user->email }}
                                                    </td>
                                                    <td class="col-sm-2" style="line-height: 30px">
                                                        Overtime hours
                                                    </td>
                                                    <td class="col-sm-4" style="line-height: 30px">
                                                        {{ $overtime_hour }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box" style="border: 1px solid #eee">
                                        <div class="box-header" style="background-color: #fff;border-bottom: 1px solid #eee;color: #000;">
                                            <h3 class="box-title" style="color: #1a2229"><b>Earnings</b></h3>
                                        </div>
                                        <div class="box-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td class="col-sm-2" style="line-height: 30px">
                                                        Basic Pay
                                                    </td>
                                                    <td class="col-sm-4" style="line-height: 30px">
                                                        {{ $salary->salary_templates->basic_salary }}
                                                    </td>
                                                </tr>
                                                @if(@isset($salary->salary_templates->allowances))
                                                    @foreach ($salary->salary_templates->allowances as $allowance)
                                                        <tr>
                                                            <td class="col-sm-2" style="line-height: 30px">
                                                                {{ $allowance->name }}
                                                            </td>
                                                            <td class="col-sm-4" style="line-height: 30px">
                                                                {{ $allowance->amount }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                <tr>
                                                    <td class="col-sm-2" style="line-height: 30px">
                                                        Overtime Allowances
                                                    </td>
                                                    <td class="col-sm-4" style="line-height: 30px">
                                                        {{ $overtime_allowence = $salary->salary_templates->overtime_rate*$overtime_hour }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="box" style="border: 1px solid #eee;">
                                        <div class="box-header" style="background-color: #fff;border-bottom: 1px solid #eee;color: #000;">
                                            <h3 class="box-title" style="color: #1a2229"><b>Deductions</b></h3>
                                        </div><!-- /.box-header -->
                                        <!-- form start -->
                                        <div class="box-body">
                                            <table class="table table-bordered">
                                                @if(@isset($salary->salary_templates->deductions))
                                                    @foreach ($salary->salary_templates->deductions as $deduction)
                                                        <tr>
                                                            <td class="col-sm-2" style="line-height: 30px">
                                                                {{ $deduction->name }}
                                                            </td>
                                                            <td class="col-sm-4" style="line-height: 30px">
                                                                {{ $deduction->amount }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                <tr>
                                                    <td class="col-sm-2" style="line-height: 30px">
                                                        LOP Deduction
                                                    </td>
                                                    <td class="col-sm-4" style="line-height: 30px">
                                                        {{ $lop }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="box" style="border: 1px solid #eee;">
                                        <div class="box-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td class="col-sm-6" style="line-height: 30px">
                                                        Gross Earnings
                                                    </td>
                                                    <td class="col-sm-6" style="line-height: 30px">
                                                        {{ $salary->salary_templates->gross_salary+$overtime_allowence }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="col-sm-6" style="line-height: 30px">
                                                        Total Deductions
                                                    </td>
                                                    <td class="col-sm-6" style="line-height: 30px">
                                                        {{ $salary->salary_templates->total_deduction+$lop }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="col-sm-6" style="line-height: 30px">
                                                        <b>Net Earnings</b>
                                                    </td>
                                                    <td class="col-sm-6" style="line-height: 30px">
                                                        <b>{{ $salary->salary_templates->net_salary-$lop+$overtime_allowence }}</b>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="form-group pull-right" style="margin-right: 30px;">
                                <div class="col-sm-offset-2 col-sm-8">
                                    @if($salary->processed == 0)
                                    <form action="{{ route('processSalary') }}" method="POST">
                                    @csrf
                                        <input type="hidden" value="{{ $salary->code }}" name="salary_code">
                                        <input type="hidden" value="{{ $overtime_hour }}" name="overtime_hour">
                                        <input type="hidden" value="{{ date('Y',strtotime($date)) }}" name="year">
                                        <input type="hidden" value="{{ date('m',strtotime($date)) }}" name="month">
                                        <input type="submit" class="btn btn-success" value="Click to pay" onclick="processSalary({{ $salary->code }},1,{{ $lop }})" id="click_to_pay_button">
                                    </form>
                                    @else
                                        <input type="submit" class="btn btn-secondary" value="Payment Status: Paid" onclick="processSalary({{ $salary->code }},0,{{ $lop }})" id="paid_button" disabled>
                                    @endif
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $('#accounts-menu').addClass('active');
    $('#expense-menu').addClass('active');
    $('#payroll-menu').addClass('active');
    $('#process-salary-menu').addClass('active');
</script>
<script>
    function processSalary(code,status,lop){
        $.ajax({
                    type: 'POST',
                    url: "{{ route('processSalary') }}",
                    data: "code=" + code + "&status=" + status+ "&lop=" + lop,
                    dataType: "html",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function(data) {
                        if(data == 'Success') {
                            toastr["success"]("Success")
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
                            window.location.reload();
                        }else {
                            toastr["error"]("Error")
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
                    }
            });
    }
</script>
@endsection
