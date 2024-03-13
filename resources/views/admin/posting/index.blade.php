@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-invoice"></i> Posting</h3>


        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Posting</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="page-header">
                    <a href="{{ route('addPosting') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Add a Post
                    </a>
                </h5>

                <div id="hide-table">
                    <table id="PostList" class="table table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th><a href="javascript:;" class="p6n-sort-link">#</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Student</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Class</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Total</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Discount</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Paid</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Weaver</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Balance</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Status</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Invoice Date</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Action</a></th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td data-title="">1</td>
                                    <td data-title="">Ankit Kumar</td>
                                    <td data-title="">Five</td>
                                    <td data-title="">7500.00</td>
                                    <td data-title="">50</td>
                                    <td data-title="">0.00</td>
                                    <td data-title="">0.00</td>
                                    <td data-title="">6675</td>
                                    <td data-title="status"><button class="btn btn-danger btn-xs">Not Paid</button></td>
                                    <td data-title="">16 Dec 2020</td>
                                    <td data-title="Action">
                                        <a href="{{ route('invoiceView') }}" class="btn btn-success btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa ti-eye"></i></a>
                                        <a href="{{ route('editInvoice') }}" class="btn btn-warning btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Edit"><i class="fa ti-pencil-alt"></i></a>
                                        <a href="delete/45" onclick="return confirm('you are about to delete a record. This cannot be undone. are you sure?')" class="btn btn-danger btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Delete"><i class="fa ti-trash"></i></a>
                                        <a href="{{ route('invoicePayment') }}" class="btn btn-primary btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Payment"><i class="fa ti-credit-card"></i></a>
                                        <!-- <a href="#paymentlist" id="45" class="btn btn-info btn-xs mrg getpaymentinfobtn" rel="tooltip" data-toggle="modal"><i class="fa fa-list-ul" data-toggle="tooltip" data-placement="top" data-original-title="View Payments"></i></a> -->
                                    </td>
                                </tr>
                                <tr>
                                    <td data-title="">1</td>
                                    <td data-title="">Ram Kumar</td>
                                    <td data-title="">Five</td>
                                    <td data-title="">7500.00</td>
                                    <td data-title="">50</td>
                                    <td data-title="">0.00</td>
                                    <td data-title="">0.00</td>
                                    <td data-title="">6675</td>
                                    <td data-title="status"><button class="btn btn-warning btn-xs">Partially Paid</button></td>
                                    <td data-title="">16 Dec 2020</td>
                                    <td data-title="Action">
                                        <a href="{{ route('invoiceView') }}" class="btn btn-success btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa ti-eye"></i></a>
                                        <a href="{{ route('editInvoice') }}" class="btn btn-warning btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Edit"><i class="fa ti-pencil-alt"></i></a>
                                        <a href="delete/45" onclick="return confirm('you are about to delete a record. This cannot be undone. are you sure?')" class="btn btn-danger btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Delete"><i class="fa ti-trash"></i></a>
                                        <a href="{{ route('invoicePayment') }}" class="btn btn-primary btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Payment"><i class="fa ti-credit-card"></i></a>
                                        <!-- <a href="#paymentlist" id="45" class="btn btn-info btn-xs mrg getpaymentinfobtn" rel="tooltip" data-toggle="modal"><i class="fa fa-list-ul" data-toggle="tooltip" data-placement="top" data-original-title="View Payments"></i></a> -->
                                    </td>
                                </tr>
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

'columnDefs': [
         {
            'targets': 0,
            'checkboxes': {
               'selectRow': true
            }
         }
      ],
select: true
      });
    });
  </script>
  <script>
    $('#accounts-menu').addClass('active');
    $('#income-menu').addClass('active');
    $('#posting-menu').addClass('active');
</script>
@endsection
