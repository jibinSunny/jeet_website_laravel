@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-video"></i> Online Class</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-laptop"></i>Dashboard</a></li>
            <li class="active">Online Class</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">

            </div> <!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->
@endsection
@section('scripts')
<script>
$('#online-class-menu').addClass('active')
</script>
@endsection
