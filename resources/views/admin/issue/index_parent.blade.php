
@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-issue"></i> Issue</h3>

       
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Issue</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                
                <h5 class="page-header">
                        <a href="">
                            <i class="fa fa-plus"></i>
                        </a>
                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 pull-right drop-marg"></div>

                </h5>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td data-title="">
                                      
                                    </td>
                                    <td data-title="">
                                       
                                    </td>
                                    <td data-title="">
                                       
                                    </td>
                                    <td data-title="">
                                        
                                    </td>
                                    <td data-title="">
                                        
                                    </td>
                                    <td data-title="">
                                    
                                    </td>
                                   
                                        <td data-title="">
                                        
                                        </td>
                                </tr>
                        </tbody>
                    </table>
                </div>

            </div> <!-- col-sm-12 -->
            
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->


<!-- For invoice -->
<form class="form-horizontal" role="form" action="" method="post">
    <div class="modal fade" id="invoice">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" id="libraryID" name="libraryID" value="" style="display:none" >
                <div class="form-group">
                    <label for="amount" class="col-sm-2 control-label">
                        
                    </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="amount" name="amount" value="" >
                    </div>
                    <span class="col-sm-4 control-label" id="amount_error">
                    </span>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" style="margin-bottom:0px;" data-dismiss="modal"></button>
                <input type="button" id="add_invoice" class="btn btn-success" value="" />
            </div>
        </div>
      </div>
    </div>
</form>
<!-- invoice end here -->

@endsection
@section('scripts')
<script type="text/javascript">
    $('.select2').select2();
    $('#studentID').change(function() {
        var studentID = $(this).val();
        if(studentID == 0) {
            $('#hide-table').hide();
        } else {
            $.ajax({
                type: 'POST',
                url: "",
                data: "id=" + studentID,
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }
    });

    $('#add_invoice').click(function() {
        var amount = $('#amount').val();
        var libraryID = $('#libraryID').val();
        if(amount != '') {
            if(amount.length < 21) {
                var valid = !/^\s*$/.test(amount) && !isNaN(amount);
                if(valid) {
                    $.ajax({
                        type: 'POST',
                        url: "",
                        data: {'libraryID' : libraryID, 'amount' : amount},
                        dataType: "html",
                        success: function(data) {
                            window.location.href = data;
                        }
                    });

                    $('#amount_error').html("");
                } else {
                    $('#amount_error').html("").css('color', 'red');
                }
            } else {
                $('#amount_error').html("").css('color', 'red');
            }
        } else {
            $('#amount_error').html("").css('color', 'red');
        }
    });
</script>
@endsection