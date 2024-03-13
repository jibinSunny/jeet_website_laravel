@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-sm-12" style="margin:10px 0px">
    </div>
</div>

    <div class="box">
        <div class="box-header bg-gray">
            <h3 class="box-title text-navy"><i class="fa fa-clipboard"></i>Revenue Overview Report</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div id="printablediv">
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12" style="margin-bottom: 15px;"></div>

                    <div class="col-sm-12">
                        <div class="box box-solid " style="border: 1px #ccc solid; border-left: 2px black solid">
                            <div class="box-header bg-gray with-border">
                                <h3 class="box-title text-navy">Revenue Informations</h3>
                            </div>
                            <div class="box-body">
                            <div class="col-sm-4">
                                    <div class="callout callout-info">
                                      <span class='text-blue'>Total Credited Amount : {{ $paid }}</span><br>
                                    </div>
                                </div> 
                                <div class="col-sm-4">
                                    <div class="callout callout-danger">
                                        <span class='text-blue'>Total Pending Amount : {{ $pending }}</span><br>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="callout callout-warning">
                                        <span class='text-blue'>Total Posted Amount : {{ $posted }}</span><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-wizard-label">
                                        Last updated at : {{ $date }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- row -->
            </div><!-- Body -->
        </div>
    </div>

    <div class="box">
        <div class="box-header bg-gray">
            <h3 class="box-title text-navy"><i class="fa fa-clipboard"></i>Revenue Detailed Report</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div id="printablediv">
            <div class="box-body">
                <div class="row">
                    <form action="{{ route('showOutstandingReport') }}" method="POST">
                    @csrf
                        <div class="col-sm-12">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <div class="form-wizard-label">Revenue Category</div>
                                    <select name="category" class="form-control">
                                        <option value="">Select Revenue Category</option>
                                        @foreach ($expensive_category as $item)
                                            <option @if($category == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <div class="form-wizard-label">Date from</div>
                                    <input type="text" value="{{ $from }}" class="form-control" id="from" name="from" placeholder="Choose from date">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <div class="form-wizard-label">Date to</div>
                                    <input type="text" value="{{ $to }}" class="form-control" id="to" name="to" placeholder="Choose to date">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group mt-2">
                                    <div class="col-sm-offset-2 col-sm-8">
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                        <a href="{{ route('showRevenueReport') }}" class="btn btn-warning">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col-sm-12">
                        <div class="box box-solid " style="border: 1px #ccc solid; border-left: 2px black solid">
                            <div class="box-header bg-gray with-border">
                                <h3 class="box-title text-navy">Revenue Informations</h3>
                            </div>

                            <div class="box-body">
                                <div id="hide-table">
                                  
                                    <table id="ListBatch" class="table table-bordered table-hover dataTable">
                                        <thead>
                                            <tr>
                                                <th><a href="javascript:;" class="p6n-sort-link">#</a></th>
                                                <th><a href="javascript:;" class="p6n-sort-link">Date</a></th>
                                                <th><a href="javascript:;" class="p6n-sort-link"> Category</a></th>
                                                <th><a href="javascript:;" class="p6n-sort-link">Amount</a></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         
                                                @foreach($collection as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration}}</td>
                                                    <td>{{ $item->date }}</td>
                                                    <td>{{ isset($item->expense_categories->name)?$item->expense_categories->name:''}}</td>
                                                    <td>{{ $item->amount}}</td>
                                                </tr>
                                                @endforeach

                                   
                                        </tbody>
                                    </table>
                                
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- row -->
            </div><!-- Body -->
        </div>
    </div>


<!-- email end here -->
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#from').datepicker();
    $('#to').datepicker();
});
</script>
<script type="text/javascript">

    $(function () {
        $('#feetype_chart').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y:f}</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y:f} ',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Amount',
                colorByPoint: true,
                data: [{
                    name: '',
                    y:
                }, {
                    name: '',
                    y: ,
                    sliced: true,
                    selected: true
                }]
            }]
        });
    });

    function check_email(email) {
        var status = false;
        var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
        if (email.search(emailRegEx) == -1) {
            $("#to_error").html('');
            $("#to_error").html("").css("text-align", "left").css("color", 'red');
        } else {
            status = true;
        }
        return status;
    }


    $('#send_pdf').click(function() {
        var field = {
            'to'     : $('#to').val(),
            'subject'     : $('#subject').val(),
            'message'     : $('#message').val(),
            'classesID'     : ,
            'sectionID'     : ,
        };

        var to = $('#to').val();
        var subject = $('#subject').val();
        var error = 0;

        $("#to_error").html("");
        $("#subject_error").html("");

        if(to == "" || to == null) {
            error++;
            $("#to_error").html("").css("text-align", "left").css("color", 'red');
        } else {
            if(check_email(to) == false) {
                error++
            }
        }

        if(subject == "" || subject == null) {
            error++;
            $("#subject_error").html(">").css("text-align", "left").css("color", 'red');
        } else {
            $("#subject_error").html("");
        }

        if(error == 0) {
            $('#send_pdf').attr('disabled','disabled');
            $.ajax({
                type: 'POST',
                url: "",
                data: field,
                dataType: "html",
                success: function(data) {
                    var response = JSON.parse(data);
                    if (response.status == false) {
                        $('#send_pdf').removeAttr('disabled');
                        if( response.to) {
                            $("#to_error").html("").css("text-align", "left").css("color", 'red');
                        }

                        if( response.subject) {
                            $("#subject_error").html("").css("text-align", "left").css("color", 'red');
                        }

                        if(response.message) {
                            toastr["error"](response.message)
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
                        location.reload();
                    }
                }
            });
        }
    });

</script>
<script>
    $('#accounts-menu').addClass('active');
    $('#account-report-menu').addClass('active');
    $('#revenue-report-menu').addClass('active');
</script>
@endsection
