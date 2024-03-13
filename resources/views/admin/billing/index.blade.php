@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-invoice"></i> Billing</h3>


        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Billing</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <form role="form" method="post" action="{{ route('showBilling') }}" id="singleDataPost">
                    @csrf
                    <div class="row">

                        <div class="col-xs-12 col-sm-2">
                            <div class="studentDiv form-group" >
                                <label for="studentID">
                                    Class
                                </label>
                                <select name="class" id="class" class="form-control select2" tabindex="-1">
                                    <option value="">Select Class</option>
                                    @foreach ($classes as $cls)
                                        <option value="{{ $cls->id }}" @if($class == $cls->id) selected @endif>{{ $cls->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-red">
                                </span>
                            </div>
                        </div>

                            <div class="col-xs-12 col-sm-2">
                                <div class="form-group" >
                                    <label for="feetypeID" class="control-label">
                                        Division
                                    </label>
                                    <select name="division" id="division" class="form-control select2" tabindex="-1">
                                        <option value="">Select Division</option>
                                        @if($division)
                                            @foreach ($divisions as $div)
                                                <option value="{{ $div->id }}" @if($division == $div->id) selected @endif>{{ $div->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="control-label"></span>
                                </div>
                            </div>


                        <div class="col-xs-12 col-sm-3">
                            <div class="classesDiv form-group" >
                                <label for="classesID">
                                    Student ID
                                </label>
                                <input type="text" class="form-control" id="student_id" name="student_id" value="{{ $student_id }}" placeholder="Enter Student Id">
                                <span class="text-red"></span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-3">
                            <div class="classesDiv form-group" >
                                <label for="classesID">
                                    Mobile Number
                                </label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $phone }}" placeholder="Enter Mobile Number">
                                <span class="text-red"></span>
                            </div>
                        </div>

                            <div class="col-xs-12 col-sm-2">
                                <label for="feetypeID" class="control-label visually-hidden">
                                    Submit <span class="text-red">*</span>
                                </label>
                                <input  type="submit" class="btn btn-primary btn-block" value="Submit" >
                            </div>

                    </div>
                    </form>


                <div id="hide-table">
                    <table id="PostList" class="table table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th><a href="javascript:;" class="p6n-sort-link">#</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Student ID</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Student Name</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Class</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Division</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Previous Billed Due</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Current Billed Due</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Fine</a></th>
                                {{-- <th><a href="javascript:;" class="p6n-sort-link">Discount</a></th> --}}
                                <th><a href="javascript:;" class="p6n-sort-link">Current Outstanding</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Payment Status</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Actions</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentAccounts as $item)
                                <tr>
                                    <td data-title="">1</td>
                                    <td data-title="">{{ $item->students->student_id }}</td>
                                    <td data-title="">{{ $item->students->first_name }} {{ $item->students->middle_name }} {{ $item->students->last_name }}</td>
                                    <td data-title="">{{ $item->classes->name }}</td>
                                    <td data-title="">{{ $item->divisions->name }}</td>
                                    <td data-title="">@if($item->previous_due) {{ $item->previous_due }} @else 0.00 @endif</td>
                                    <td data-title="">@if($item->current_due) {{ $item->current_due }} @else 0.00 @endif</td>
                                    <td data-title="">@if($item->fine) {{ $item->fine }} @else 0.00 @endif</td>
                                    {{-- <td data-title="">@if($item->discount) {{ $item->discount }} @else 0.00 @endif</td> --}}
                                    <td data-title="">@if($item->total_due) {{ $item->total_due }} @else 0.00 @endif</td>
                                    <td data-title="">@if($item->total_due > 0) <span class="btn btn-danger btn-xs mrg delete-butto">Pending</span> @else <span class="btn btn-success btn-xs mrg delete-butto">Paid</span> @endif</td>
                                    <td data-title="Action">
                                        <a href="{{ route('showPayment',['studentId'=> $item->students->code]) }}" class="btn btn-labeled btn-success btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Payment"><span class="btn-label"><i class="fa icon-credit_card"></i></span> Payments</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="paymentlist">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div id="hide-table">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><a href="javascript:;" class="p6n-sort-link">#</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Date</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Paid By</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Payment Amount</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Weaver</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Fine</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Action</a></th>
                            </tr>
                        </thead>
                        <tbody id="payment-list-body">

                        <tr><td data-title="#">1</td><td data-title="Date">20 Sep 2020</td><td data-title="Payment Method">Cash</td><td data-title="Payment Amount">5,475.00</td><td data-title="Weaver">1,000.00</td><td data-title="Fine">500.00</td><td data-title="Action"><a href="" class="btn btn-success btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa ti-eye"></i></a><a href=" onclick="return confirm('you are about to delete a record. This cannot be undone. are you sure?')" class="btn btn-danger btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Delete"><i class="fa ti-trash"></i></a></td></tr></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" style="margin-bottom:0px;" data-dismiss="modal"></button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $('#accounts-menu').addClass('active');
    $('#income-menu').addClass('active');
    $('#billing-menu').addClass('active');
</script>
<script type="text/javascript">
    $('.getpaymentinfobtn').click(function() {
        var maininvoiceID =  $(this).attr('id');
        if(maininvoiceID > 0) {
            $.ajax({
                type: 'POST',
                url: "",
                data: {'maininvoiceID' : maininvoiceID},
                dataType: "html",
                success: function(data) {
                    $('#payment-list-body').children().remove();
                    $('#payment-list-body').append(data);
                }
            });
        }
    });
</script>

<script type="text/javascript">
    $(function () {
      $("#PostList").dataTable({
    select: false,
    searching:false
      });
    });
</script>
<script>
 $("#class").change(function() {
    var class_name = $(this).val();
    $.ajax({
        type: "POST",
        url: "{{route('selectDivision')}}",
        data: {
            'class_name': class_name
        },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            if (data.status == 1) {
                var html = '<option value="">Select Division</option>';
                $.each(data.divisions, function(k, v) {
                    html = html + "<option value=" + v.id + ">" + v.name + "</option>";
                });
                $('#division').html(html);
            } else {
                var html = '<option value="">Select Division</option>';
                $('#division').html(html);
            }
        }
    });
});
</script>
@endsection
