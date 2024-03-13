@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-calculator "></i> View Salary Template</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="">Salary Template</a></li>
            <li class="active">View Salary Template</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-6" style="margin-bottom: 10px;">
                <div class="info-box">
                    <p style="margin:0 0 20px">
                        <span></span>
                    </p>

                    <p style="margin:0 0 20px">
                        <span></span>
                    </p>

                    <p style="margin:0 0 20px">
                        <span></span>
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="box" style="border: 1px solid #eee">
                    <div class="box-header" style="background-color: #fff;border-bottom: 1px solid #eee;color: #000;">
                        <h3 class="box-title" style="color: #1a2229"></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12" id="allowances">
                                <div class="info-box">
                                        <p>
                                            <span></span>
                                            
                                        </p>       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="box" style="border: 1px solid #eee;">
                    <div class="box-header" style="background-color: #fff;border-bottom: 1px solid #eee;color: #000;">
                        <h3 class="box-title" style="color: #1a2229"><?=$this->lang->line('salary_template_deductions')?></h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12" id="deductions">
                                <div class="info-box">
                                        <p>
                                            <span></span>
                                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-8 col-sm-offset-4">
                <div class="box" style="border: 1px solid #eee;">
                    <div class="box-header" style="background-color: #fff;border-bottom: 1px solid #eee;color: #000;">
                        <h3 class="box-title" style="color: #1a2229"></h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <td class="col-sm-8" style="line-height: 36px"></td>

                                <td class="col-sm-4" style="line-height: 36px"></td>
                            </tr>

                            <tr>
                                <td class="col-sm-8" style="line-height: 36px"></td>

                                <td class="col-sm-4" style="line-height: 36px"></td>
                            </tr>

                            <tr>
                                <td class="col-sm-8" style="line-height: 36px"></td>

                                <td class="col-sm-4" style="line-height: 36px"><b></b></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection