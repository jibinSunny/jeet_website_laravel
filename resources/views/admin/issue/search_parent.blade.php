
@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-issue"></i> Search Parent</h3>

       
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active"></li>
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

                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 pull-right drop-marg">
                    </div>

                </h5>

                <div class="col-sm-12">
                    <div class="row">
                        <div id="hide-table">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th class="col-lg-2"></th>
                                        <th class="col-lg-2"></th>
                                        <th class="col-lg-2"></th>
                                        <th class="col-lg-2"></th>
                                        <th class="col-lg-2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td data-title=""></td>
                                            <td data-title=""></td>
                                            <td data-title=""></td>
                                            <td data-title=""></td>
                                            <td data-title=""></td>
                                            </td>
                                       
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            
            </div> <!-- col-sm-12 -->
            
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

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
</script>
@endsection