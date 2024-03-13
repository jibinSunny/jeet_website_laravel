@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-beer"></i> Manage Salary</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="">Manage Salary</a></li>
            <li class="active">Add</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="post">
                        <label for="salary" class="col-sm-2 control-label">
                             <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>

                        <label for="template" class="col-sm-2 control-label">
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="" >
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">

$('#salary').change(function(event) {
    var salary = $(this).val();
    if(salary === '0') {
        $('#template').html("");
    } else {
        $.ajax({
            async: false,
            type: 'POST',
            url: "",
            data: "salary=" + salary,
            dataType: "html",
            success: function(data) {
               $('#template').html(data);
            }
        });
    }
});
</script>
@endsection