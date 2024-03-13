<div class="row">
    <div class="col-sm-3">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-money"></i> Make Payment</h3>
            </div>
            <div class="box-body box-profile">
                <center>
                    
                </center>
                <h3 class="profile-username text-center"></h3>
                <p class="text-muted text-center"></p>
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item" style="background-color: #FFF">
                        <b></b> <a class="pull-right"></a>
                    </li>
                    <li class="list-group-item" style="background-color: #FFF">
                        <b></b> <a class="pull-right"></a>
                    </li>
                    <li class="list-group-item" style="background-color: #FFF">
                        <b></b> <a class="pull-right"></a>
                    </li>
                    <li class="list-group-item" style="background-color: #FFF">
                        <b></b> <a class="pull-right"></a>
                    </li>
                </ul>
            </div>
        </div>
            <div class="box" style="margin-bottom:40px">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-money"></i> </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <form role="form" method="post">
                        <div class="form-group">
                            <label for="gross_salary"><span class="text-red">*</span></label>
                            <input type="text" name="gross_salary" class="form-control" id="gross_salary" value="" disabled>
                        </div>

                        <div class="form-group">
                            <label for="total_deduction"><span class="text-red">*</span></label>
                            <input type="text" name="total_deduction" class="form-control" id="total_deduction" value="" disabled>
                        </div>

                        <div class="form-group">
                            <label for="net_salary"><span class="text-red">*</span></label>
                            <input type="text" name="net_salary" class="form-control" id="net_salary" value="" disabled>
                        </div>

                        <div class="form-group">
                            <label for="month"><span class="text-red">*</span></label>
                            <input type="type" name="month" class="form-control" id="month" value="">
                            <span class="text-red">
                            </span>
                        </div>

                            <div class="form-group">
                                <label for="total_hours"><span class="text-red">*</span></label>
                                <input type="text" name="total_hours" class="form-control" id="total_hours" value="">
                                <span class="text-red">
                                </span>
                            </div>

                        <div class="form-group">
                            <label for="payment_amount"><span class="text-red">*</span></label>
                            <input type="text" name="payment_amount" class="form-control" id="payment_amount" value="">
                            <span class="text-red"></span>
                        </div>

                        <div class="form-group">
                            <label for="payment_method"><span class="text-red">*</span></label>
                            <span class="text-red"></span>
                        </div>

                        <div class="form-group">
                            <label for="comments"></label>
                            <input type="text" name="comments" class="form-control" id="comments">
                        </div>

                        <button type="submit" class="btn btn-success"></button>
                    </form>
                </div>
            </div>
    </div>

    <div class="col-sm-9">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa icon-payment"></i></h3>
                <ol class="breadcrumb">
                    <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
                    <li><a href="">Make Payment</a></li>
                    <li class="active">Add a Payment</li>
                </ol>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="col-sm-1">#</th>
                                <th class="col-sm-2"></th>
                                <th class="col-sm-2"></th>
                                <th class="col-sm-2"></th>
                                <th class="col-sm-3"></th>
                                <th class="col-sm-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td data-title=""></td>
                                    <td data-title=""></td>
                                    <td data-title=""></td>
                                    <td data-title=""></td>
                                    <td data-title=""></td>
                                    <td data-title=""></td>
                                    <td data-title=""></td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    $("#month").datepicker( {
        format: "mm-yyyy",
        startView: "months", 
        minViewMode: "months"
    });

    jQuery("#total_hours").focus(function(){   

    })
    .blur(function(){
        var net_salary = "";
        var total_hours = $(this).val();

        if(parseFloat(total_hours)) {
            $('#hourdis').html('('+total_hours+' X '+net_salary+')').addClass('text-red');
            $('#payment_amount').val(parseFloat(total_hours*net_salary));
        }
    });

    $(document).ready(function() {
        var net_salary = "";
        var total_hours = $('#total_hours').val();

        if(total_hours != '' || total_hours != null) {
            if(parseFloat(total_hours)) {
                $('#hourdis').html('('+total_hours+' X '+net_salary+')').addClass('text-red');
            }
        }
    });
</script>





