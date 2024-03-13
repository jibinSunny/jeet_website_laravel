@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-issue"></i> Search</h3>

       
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Search</li>
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
                    </h5>

                <div class="col-lg-6 col-lg-offset-3 list-group">
                    <div class="list-group-item list-group-item-warning">
                        <form style="" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">  
                              <div class='form-group' >
                                <label for="lid" class="col-sm-3 control-label">
                                    <span class="text-red">*</span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="lid" name="lid" value="" >
                                </div>
                                <div class="col-sm-3">
                                    <input type="submit" class="btn btn-success iss-mar" value="" >
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')

@endsection