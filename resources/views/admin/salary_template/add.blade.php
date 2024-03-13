@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-calculator "></i> Add Salary Template</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="">Salary Template</a></li>
            <li class="active">Add Salary Template</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <form class="form-horizontal" action="{{ route('saveTemplate') }}" role="form" method="post" id="templateDataForm">
            @csrf
            <div class="row">
                <div class="col-sm-12" style="margin-bottom: 10px;">
                    <div class="form-group">
                        <label for="salary_grades" class="col-sm-2 control-label">
                            Usertype <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-4">
                            <select class="form-control" id="usertype" name="usertype" required>
                                <option value="">Select Usertype</option>
                                @foreach ($usertypes as $item)
                                @if($item->id != 1 && $item->id != 3 && $item->id != 4)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label" id="salary_grades_error">
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="user" class="col-sm-2 control-label">
                           Name <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-4">
                            <select class="form-control" id="user" name="user" required>
                                <option value="">Select User</option>
                            </select>
                        </div>
                        <span class="col-sm-4 control-label" id="user_error">
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="basic_salary" class="col-sm-2 control-label">
                           Basic Salary <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="basic_salary" name="basic_salary" value="" required>
                        </div>
                        <span class="col-sm-4 control-label" id="basic_salary_error">
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="overtime_rate" class="col-sm-2 control-label">
                            Overtime Rate (Per Hour) <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="overtime_rate" name="overtime_rate" value="0" required>
                        </div>
                        <span class="col-sm-4 control-label" id="overtime_rate_error"></span>
                    </div>

                </div>


                <div class="col-sm-6">
                    <div class="box" style="border: 1px solid #eee">
                        <div class="box-header" style="background-color: #fff;border-bottom: 1px solid #eee;color: #000;">
                            <h3 class="box-title" style="color: #1a2229">Allowances</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-12" id="allowances">

                                    <div class='form-group allowancesfield'>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="allowanceslabel1" name="allowanceslabel1" value="House Rent" placeholder="">
                                        </div>

                                        <div class="col-sm-5">
                                            <input type="text" class="form-control allowancesamount" id="allowancesamount1" name="allowancesamount1" value="" placeholder="Enter Allowances Value">
                                        </div>

                                        <div class="col-sm-2" >
                                            <button class="btn btn-light btn-xs addbtn" onclick="addAllowances()"><i class="fa icon-add"></i></button>
                                        </div>

                                        <span class="col-sm-12 errorpointallowances" id="allowanceserror1"></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="box" style="border: 1px solid #eee;">
                        <div class="box-header" style="background-color: #fff;border-bottom: 1px solid #eee;color: #000;">
                            <h3 class="box-title" style="color: #1a2229">Decuction</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-12" id="deductions">
                                    <div class='form-group deductionsfield'>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="deductionslabel1" name="deductionslabel1" value="Provident Fund" placeholder="">
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control deductionsamount" id="deductionsamount1" name="deductionsamount1" value="" placeholder="Enter Deduction Value">
                                        </div>
                                        <div class="col-sm-2" >
                                            <button type="button" class="btn btn-light btn-xs salary-btn salary-btn-deductions-add" id="salary-btn-deductions-add" onclick="addDeductions()">
                                                <i class="fa icon-add"></i>
                                            </button>
                                        </div>

                                        <span class="col-sm-12 errorpointdeductions" id="deductionserror1"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 col-sm-offset-4">
                    <div class="box" style="border: 1px solid #eee;">
                        <div class="box-header" style="background-color: #fff;border-bottom: 1px solid #eee;color: #000;">
                            <h3 class="box-title" style="color: #1a2229">Total Salary</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td class="col-sm-8" style="line-height: 36px">Gross Salary</td>
                                            <td class="col-sm-4"><input class="form-control" id="gross_salary" type="text" readonly  name="gross_salary"></td>
                                        </tr>

                                        <tr>
                                            <td class="col-sm-8" style="line-height: 36px">Total Deduction</td>

                                            <td class="col-sm-4"><input class="form-control" id="total_deduction" type="text" readonly  name="total_deduction"></td>
                                        </tr>

                                        <tr>
                                            <td class="col-sm-8" style="line-height: 36px">Net Salary</td>

                                            <td class="col-sm-4"><input class="form-control" id="net_salary" type="text" readonly  name="net_salary"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-xs-12">
                    <input class="btn btn-primary pull-right col-sm-3 col-xs-12 " type="submit" id="addSalaryTemplate" value="Add Salary">
                </div>

            </div>
        </form>
    </div>
</div>

@endsection
@section('scripts')
<script type="text/javascript">
    function zeroOrNull(value, error, status=true) {
        if(value != '') {
            if($.isNumeric(value)) {
                $(error).html('');
                $(error).parent().removeClass('has-error');

                if(value >= 0) {
                    $(error).html('');
                    $(error).parent().removeClass('has-error');
                    return true;
                } else {
                    if(status) {
                        $(error).html('The Basic Salary field is not negative number.');
                        $(error).parent().addClass('has-error');
                    }
                }
            } else {
                if(status) {
                    $(error).html('The Basic Salary field is only number.');
                    $(error).parent().addClass('has-error');
                }
            }
        } else {
            $(error).html('');
            $(error).parent().removeClass('has-error');
        }
    }

    function zeroOrNullExtend(value, errorID, errorField='field', status=true) {
        if(value != '') {
            if($.isNumeric(value)) {
                $(errorID).html('');
                $(errorID).parent().removeClass('has-error');

                if(value >= 0) {
                    $(errorID).html('');
                    $(errorID).parent().removeClass('has-error');
                    return true;
                } else {
                    if(status) {
                        $(errorID).html('The '+errorField+' field is not negative number.');
                        $(errorID).parent().addClass('has-error');
                        $(errorID).addClass('text-red');
                    }
                }
            } else {
                if(status) {
                    $(errorID).html('The '+errorField+' field is only number.');
                    $(errorID).parent().addClass('has-error');
                    $(errorID).addClass('text-red');
                }
            }
        } else {
            $(errorID).html('');
            $(errorID).parent().removeClass('has-error');
        }
    }

    $(document).ready(function(){
        $("#basic_salary").focus(function(){
            var basic_salary = $(this).val();

            if($.isNumeric(basic_salary)) {
                if(basic_salary >= 0) {
                    if(basic_salary == '') {
                        var basic_salary = 0;
                    } else {
                        if(basic_salary.length > 11) {
                            var basic_salary = parseFloat(0);
                        } else {
                            var basic_salary = parseFloat($(this).val());
                        }
                    }

                    var net_salary = $('#net_salary').val();
                    if(net_salary == '') {
                        var net_salary = 0;
                    } else {
                        var net_salary = parseFloat($('#net_salary').val());
                    }

                    var gross_salary = $('#gross_salary').val();
                    if(gross_salary == '') {
                        var gross_salary = 0;
                    } else {
                        var gross_salary = parseFloat($('#gross_salary').val());
                    }

                    equ = net_salary - basic_salary;
                    $('#net_salary').val(parseFloat(equ));

                    gross_salary_equ = gross_salary - basic_salary;
                    $('#gross_salary').val(parseFloat(gross_salary_equ));
                }
            }
        })
        .blur(function(){
            var basic_salary = $(this).val();
            if(zeroOrNull(basic_salary, '#basic_salary_error')) {
                var net_salary = $('#net_salary').val();
                var gross_salary = $('#gross_salary').val();

                if(basic_salary == '') {
                    var basic_salary = 0;
                } else {
                    if(basic_salary.length > 11) {
                        var basic_salary = '';
                        $(this).val('');
                    } else {
                        var basic_salary = parseFloat($(this).val());
                    }
                }

                if(net_salary == '') {
                    var net_salary = 0;
                } else {
                    var net_salary = parseFloat($('#net_salary').val());
                }

                if(gross_salary == '') {
                    var gross_salary = 0;
                } else {
                    var gross_salary = parseFloat($('#gross_salary').val());
                }

                equ = net_salary + basic_salary;
                $('#net_salary').val(parseFloat(equ));

                gross_salary_equ = gross_salary + basic_salary;
                $('#gross_salary').val(parseFloat(gross_salary_equ));

            }
        });


        $("#overtime_rate").blur(function(){
            var overtime_rate = $(this).val();
            if(overtime_rate.length > 11) {
                $(this).val('');
            } else {
                zeroOrNull(overtime_rate, '#overtime_rate_error');
            }
        });

        $("#salary_grades").blur(function(){
            var salary_grades = $(this).val();
            if(salary_grades !='') {
                $('#salary_grades_error').html('');
                $('#salary_grades_error').parent().removeClass('has-error');
            }
        });
    });

    $(document).on('focus', '.allowancesamount', function () {
        var allowancesamount = $(this).val();

        var errorID = $(this).parent().parent().children('.errorpointallowances').attr('id');

        if(zeroOrNullExtend(allowancesamount, errorID, 'label', false)) {
            if(allowancesamount == '') {
                var allowancesamount = 0;
            } else {
                if(allowancesamount.length > 11) {
                    var allowancesamount = '';
                    $(this).val('');
                } else {
                    var allowancesamount = parseFloat($(this).val());
                }
            }

            var net_salary = $('#net_salary').val();
            if(net_salary == '') {
                var net_salary = 0;
            } else {
                var net_salary = parseFloat($('#net_salary').val());
            }

            var gross_salary = $('#gross_salary').val();

            if(gross_salary == '') {
                var gross_salary = 0;
            } else {
                var gross_salary = parseFloat($('#gross_salary').val());
            }

            var equ = net_salary - allowancesamount;
            $('#net_salary').val(equ);

            var equfg = gross_salary - allowancesamount;
            $('#gross_salary').val(equfg);
        }
    });

    $(document).on('blur', '.allowancesamount', function () {
        var allowancesamount = $(this).val();

        var errorID = $(this).parent().parent().children('.errorpointallowances').attr('id');
        var errorID = '#'+errorID;

        if(zeroOrNullExtend(allowancesamount, errorID, "")) {

            if(allowancesamount == '') {
                var allowancesamount = 0;
            } else {
                if(allowancesamount.length > 11) {
                    var allowancesamount = '';
                    $(this).val('');
                } else {
                    var allowancesamount = parseFloat($(this).val());
                }
            }

            var net_salary = $('#net_salary').val();
            if(net_salary == '') {
                var net_salary = 0;
            } else {
                var net_salary = parseFloat($('#net_salary').val());
            }

            var gross_salary = $('#gross_salary').val();

            if(gross_salary == '') {
                var gross_salary = 0;
            } else {
                var gross_salary = parseFloat($('#gross_salary').val());
            }

            var equ = net_salary + allowancesamount;
            $('#net_salary').val(equ);

            var equfg = gross_salary + allowancesamount;
            $('#gross_salary').val(equfg);
        }
    });


    $(document).on('focus', '.deductionsamount', function () {
        var deductionsamount = $(this).val();

        var errorID = $(this).parent().parent().children('.errorpointallowances').attr('id');

        if(zeroOrNullExtend(deductionsamount, errorID, 'label', false)) {
            if(deductionsamount == '') {
                var deductionsamount = 0;
            } else {
                if(deductionsamount.length > 11) {
                    var deductionsamount = '';
                    $(this).val('');
                } else {
                    var deductionsamount = parseFloat($(this).val());
                }
            }

            var net_salary = $('#net_salary').val();
            if(net_salary == '') {
                var net_salary = 0;
            } else {
                var net_salary = parseFloat($('#net_salary').val());
            }

            var total_deduction = $('#total_deduction').val();

            if(total_deduction == '') {
                var total_deduction = 0;
            } else {
                var total_deduction = parseFloat($('#total_deduction').val());
            }

            var equ = net_salary + deductionsamount;
            $('#net_salary').val(equ);

            var equfg = total_deduction - deductionsamount;
            $('#total_deduction').val(equfg);
        }

    });

    $(document).on('blur', '.deductionsamount', function () {
        var deductionsamount = $(this).val();

        var errorID = $(this).parent().parent().children('.errorpointdeductions').attr('id');
        var errorID = '#'+errorID;

        if(zeroOrNullExtend(deductionsamount, errorID, "")) {

            if(deductionsamount == '') {
                var deductionsamount = 0;
            } else {
                if(deductionsamount.length > 11) {
                    var deductionsamount = '';
                    $(this).val('');
                } else {
                    var deductionsamount = parseFloat($(this).val());
                }
            }

            var net_salary = $('#net_salary').val();
            if(net_salary == '') {
                var net_salary = 0;
            } else {
                var net_salary = parseFloat($('#net_salary').val());
            }

            var total_deduction = $('#total_deduction').val();

            if(total_deduction == '') {
                var total_deduction = 0;
            } else {
                var total_deduction = parseFloat($('#total_deduction').val());
            }

            var equ = net_salary - deductionsamount;
            $('#net_salary').val(equ);

            var equfg = total_deduction + deductionsamount;
            $('#total_deduction').val(equfg);
        }

    });

    function removeAllowances(clickedElement) {
        var id = clickedElement.id;

        var label = [];
        var amount = [];
        var count = $(".allowancesfield").size();
        var removeAmount = 0;

        var totalOption= count-1;

        for(k=1; k<=count; k++) {
            if(k == id) {
                removeAmount = $('#allowancesamount'+k).val();
            }
        }

        for(j=1; j<=totalOption; j++) {

            if(j >= id) {
                var point = j + 1;
                label[j]    = $('#allowanceslabel'+point).val();
                amount[j]   = $('#allowancesamount'+point).val();
            } else {
                label[j]    = $('#allowanceslabel'+j).val();
                amount[j]   = $('#allowancesamount'+j).val();
            }
        }

        var type = 'allowances';
        $('#allowances').children().remove();
        for(i=1; i<=totalOption; i++) {
            if(i != totalOption) {
                $('#allowances').append(formHtmlData(type, i, label[i], amount[i], add='', remove=1));
            } else if(i == 1) {
                $('#allowances').append(formHtmlData(type, i, label[i], amount[i], add=1, remove=''));
            } else {
                $('#allowances').append(formHtmlData(type, i, label[i], amount[i], add=1, remove=1));
            }
        }


        var net_salary = $('#net_salary').val();
        if(net_salary == '') {
            var net_salary = 0;
        } else {
            var net_salary = parseFloat($('#net_salary').val());
        }

        var gross_salary = $('#gross_salary').val();
        if(gross_salary == '') {
            var gross_salary = 0;
        } else {
            var gross_salary = parseFloat($('#gross_salary').val());
        }

        if(removeAmount == '' || removeAmount == 0) {
            var removeAmount = 0;
        } else {
            var removeAmount = parseFloat(removeAmount);
        }

        var equ = net_salary - removeAmount;
        $('#net_salary').val(equ);

        var equfg = gross_salary - removeAmount;
        $('#gross_salary').val(equfg);
    }

    function removeDeductions(clickedElement) {
        var id = clickedElement.id;

        var label = [];
        var amount = [];
        var count = $(".deductionsfield").size();
        var removeAmount = 0;
        var totalOption= count-1;

        for(k=1; k<=count; k++) {
            if(k == id) {
                removeAmount = $('#deductionsamount'+k).val();
            }
        }

        for(j=1; j<=totalOption; j++) {
            if(j >= id) {
                var point = j + 1;
                label[j]    = $('#deductionslabel'+point).val();
                amount[j]   = $('#deductionsamount'+point).val();
            } else {
                label[j]    = $('#deductionslabel'+j).val();
                amount[j]   = $('#deductionsamount'+j).val();
            }
        }

        var type = 'deductions';
        $('#deductions').children().remove();
        for(i=1; i<=totalOption; i++) {
            if(i != totalOption) {
                $('#deductions').append(formHtmlData(type, i, label[i], amount[i], add='', remove=1));
            } else if(i == 1) {
                $('#deductions').append(formHtmlData(type, i, label[i], amount[i], add=1, remove=''));
            } else {
                $('#deductions').append(formHtmlData(type, i, label[i], amount[i], add=1, remove=1));
            }
        }

        var net_salary = $('#net_salary').val();
        if(net_salary == '') {
            var net_salary = 0;
        } else {
            var net_salary = parseFloat($('#net_salary').val());
        }

        var total_deduction = $('#total_deduction').val();
        if(total_deduction == '') {
            var total_deduction = 0;
        } else {
            var total_deduction = parseFloat($('#total_deduction').val());
        }

        if(removeAmount == '' || removeAmount == 0) {
            var removeAmount = 0;
        } else {
            var removeAmount = parseFloat(removeAmount);
        }

        var equ = net_salary + removeAmount;
        $('#net_salary').val(equ);

        var equfg = total_deduction - removeAmount;
        $('#total_deduction').val(equfg);
    }

    function addAllowances() {
        var label = [];
        var amount = [];
        var count = $(".allowancesfield").size();

        for(j=1; j<=count; j++) {
            label[j]    = $('#allowanceslabel'+j).val();
            amount[j]   = $('#allowancesamount'+j).val();
        }

        var totalOption= count+1;

        var type = 'allowances';
        $('#allowances').children().remove();
        for(i=1; i<=totalOption; i++) {
            if(i <= count) {
                $('#allowances').append(formHtmlData(type, i, label[i], amount[i], add='', remove=1));
            }
            else {
                $('#allowances').append(formHtmlData(type, i, label="", amount="", add=1, remove=1));
            }
        }
    }


    function addDeductions() {
        var label = [];
        var amount = [];
        var count = $(".deductionsfield").size();

        for(j=1; j<=count; j++) {
            label[j]    = $('#deductionslabel'+j).val();
            amount[j]   = $('#deductionsamount'+j).val();
        }

        var totalOption= count+1;

        var type = 'deductions';
        $('#deductions').children().remove();
        for(i=1; i<=totalOption; i++) {
            if(i <= count) {
                $('#deductions').append(formHtmlData(type, i, label[i], amount[i], add='', remove=1));
            }
            else {
                $('#deductions').append(formHtmlData(type, i, label="", amount="", add=1, remove=1));
            }
        }
    }


    function formHtmlData(type, id, label, amount, add, remove) {
        if(type == 'allowances') {
            var langLabel = "";
            var langValue = "";
        } else {
            var langLabel = "";
            var langValue = "";
        }

        var button = '';
        if(add == 1 && remove == 1) {
            var button = '<button type="button" class="btn btn-light btn-xs mr-1 salary-btn salary-btn-'+type+'-remove" id="'+id+'" onclick="remove'+capitalize(type)+'(this)"><i class="fa icon-delete"></i></button><button type="button" class="btn btn-light btn-xs salary-btn salary-btn-'+type+'-add" id="salary-btn-'+type+'-add" onclick="add'+capitalize(type)+'()"><i class="fa icon-add"></i></button>';
        } else if(remove == 1) {
            var button = '<button type="button" class="btn btn-light btn-xs salary-btn salary-btn-'+type+'-remove" id="'+id+'" onclick="remove'+capitalize(type)+'(this)"><i class="fa icon-delete"></i></button>';
        } else if(add == 1) {
            var button = '<button type="button" class="btn btn-light btn-xs salary-btn salary-btn-'+type+'-add" id="salary-btn-'+type+'-add" onclick="add'+capitalize(type)+'()"><i class="fa icon-add"></i></button>';
        }

        var html = '<div class="form-group '+type+'field" ><div class="col-sm-5"><input type="text" class="form-control" id="'+type+'label'+id+'" name="'+type+'label'+id+'" value="'+label+'" placeholder="'+langLabel+'"></div><div class="col-sm-5"><input type="text" class="form-control '+type+'amount" id="'+type+'amount'+id+'" name="'+type+'amount'+id+'" value="'+amount+'" placeholder="'+langValue+'"></div><div class="col-sm-2" >'+button+'</div><span class="col-sm-12 errorpoint'+type+'" id="'+type+'error'+id+'"></span></div>';

        return html;
    }

    function capitalize(s){
        return s.toLowerCase().replace( /\b./g, function(a){ return a.toUpperCase(); } );
    };

    $('#addSalaryTemplate').click(function() {
        var salary_grades       = $('#salary_grades').val();
        var basic_salary        = $('#basic_salary').val();
        var overtime_rate       = $('#overtime_rate').val();
        var error               = 0;
        var allowances_number   = $(".allowancesfield").size();
        var deductions_number   = $(".deductionsfield").size();

        for (i = 1;  i <= allowances_number; i++) {
            if($('#allowancesamount'+i).val() != '') {
                if($.isNumeric($('#allowancesamount'+i).val())) {

                    if($('#allowancesamount'+i).val().length > 11) {
                        error++;
                        $('#allowanceserror'+i).html("The field cannot exceed 11 characters in length.");
                        $('#allowanceserror'+i).parent().addClass('has-error');
                        $('#allowanceserror'+i).addClass('text-red');
                    } else {
                        $('#allowanceserror'+i).html('');
                        $('#allowanceserror'+i).parent().removeClass('has-error');
                        $('#allowanceserror'+i).removeClass('text-red');
                    }
                } else {
                    error++;
                    $('#allowanceserror'+i).html("The field is only number.");
                    $('#allowanceserror'+i).parent().addClass('has-error');
                    $('#allowanceserror'+i).addClass('text-red');
                }
            }
        }

        for (j = 1;  j <= deductions_number; j++) {
            if($('#deductionsamount'+j).val() != '') {
                if($.isNumeric($('#deductionsamount'+j).val())) {
                    if($('#deductionsamount'+j).val().length > 11) {
                        error++;
                        $('#deductionserror'+j).html("The field cannot exceed 11 characters in length.");
                        $('#deductionserror'+j).parent().addClass('has-error');
                        $('#deductionserror'+j).addClass('text-red');
                    } else {
                        $('#deductionserror'+j).html('');
                        $('#deductionserror'+j).parent().removeClass('has-error');
                        $('#deductionserror'+j).removeClass('text-red');
                    }
                } else {
                    error++;
                    $('#deductionserror'+j).html("The field is only number.");
                    $('#deductionserror'+j).parent().addClass('has-error');
                    $('#deductionserror'+j).addClass('text-red');
                }
            }
        }

        if(salary_grades == '') {
            $('#salary_grades_error').html('The Salary Grades field is required.');
            $('#salary_grades_error').parent().addClass('has-error');
            error++;
        } else {
            if(salary_grades.length > 128) {
                error++;
                $('#salary_grades_error').html('The Salary Grades field cannot exceed 128 characters in length.');
                $('#salary_grades_error').parent().addClass('has-error');
            } else {
                $('#salary_grades_error').html('');
                $('#salary_grades_error').parent().removeClass('has-error');
            }
        }

        if(basic_salary == '') {
            $('#basic_salary_error').html('The Basic Salary field is required.');
            $('#basic_salary_error').parent().addClass('has-error');
            error++;
        } else {
            if($.isNumeric(basic_salary)) {
                if(basic_salary.length > 11) {
                    error++;
                    $('#basic_salary_error').html('The Basic Salary field cannot exceed 11 characters in length.');
                    $('#basic_salary_error').parent().addClass('has-error');
                } else {
                    $('#basic_salary_error').html('');
                    $('#basic_salary_error').parent().removeClass('has-error');
                }
            } else {
                error++;
                $('#basic_salary_error').html('The Basic Salary field is only number.');
                $('#basic_salary_error').parent().addClass('has-error');
            }
        }

        if(overtime_rate == '') {
            $('#overtime_rate_error').html('The Overtime Rate ( Per Hour) field is required.');
            $('#overtime_rate_error').parent().addClass('has-error');
            error++;
        } else {
            if($.isNumeric(overtime_rate)) {
                if(overtime_rate.length > 11) {
                    error++;
                    $('#overtime_rate_error').html('The Overtime Rate ( Per Hour) field cannot exceed 11 characters in length.');
                    $('#overtime_rate_error').parent().addClass('has-error');
                } else {
                    $('#overtime_rate_error').html('');
                    $('#overtime_rate_error').parent().removeClass('has-error');
                }
            } else {
                error++;
                $('#overtime_rate_error').html('The Overtime Rate ( Per Hour) field is only number.');
                $('#overtime_rate_error').parent().addClass('has-error');
            }
        }


        if(error == 0) {
            var formData = new FormData($('#templateDataForm')[0]);
            formData.append("allowances_number", allowances_number);
            formData.append("deductions_number", deductions_number);
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: "",
                data: formData,
                async: false,
                dataType: "html",
                success: function(data) {
                    var response = jQuery.parseJSON(data);
                    if(response.status == 'success') {
                        window.location = "";
                    } else {
                        if(response.errors['salary_grades']) {
                            $('#salary_grades_error').html(response.errors['salary_grades']);
                            $('#salary_grades_error').parent().addClass('has-error');
                        }
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
    });

</script>
<script>
 $("#usertype").change(function() {
    var usertype = $(this).val();
    $.ajax({
        type: "POST",
        url: "{{route('selectUsers')}}",
        data: {
            'usertype': usertype
        },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            if (data.status == 1) {
                if(usertype == 2){
                var html = '<option value="">Select Teacher</option>';
                }else{
                var html = '<option value="">Select User</option>';
                }
                $.each(data.users, function(k, v) {
                    html = html + "<option value=" + v.id + ">"+v.first_name+" "+v.last_name+"</option>";
                });
                $('#user').html(html);
            } else {
                var html = '<option value="">Select Teacher</option>';
                $('#user').html(html);
            }
        }
    });
});
</script>
<script>
    $('#accounts-menu').addClass('active');
    $('#expense-menu').addClass('active');
    $('#payroll-menu').addClass('active');
    $('#salary-template-menu').addClass('active');
</script>
@endsection
