<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-money"></i> Make Payment</h3>


        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Make Payment</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                <form method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    <div class="" >
                                        <label for="role" class="control-label">
                                            <span class="text-red">*</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-sm-2"></th>
                                <th class="col-sm-2"></th>
                                <th class="col-sm-2"></th>
                                <th class="col-sm-2"></th>
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
    $(".select2").select2();

    $('#role').change(function() {
        var role = $(this).val();
        if(role == 0) {
            $('#hide-table').hide();
        } else {
            $.ajax({
                type: 'POST',
                url: "",
                data: "id=" + role,
                dataType: "html",
                success: function(data) {  
                    window.location.href = data;
                }
            });
        }
    });
</script>