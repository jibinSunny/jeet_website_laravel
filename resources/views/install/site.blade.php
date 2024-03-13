@extends('layouts.install')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading-install">
		<ul class="nav nav-pills d-table mx-auto">
		  	<li><a href="{{ route('start') }}"><span class="fa fa-check"></span> Checklist</a></li>
              <li><a href="{{ route('purchaseCode') }}">Purchase Code</a></li>
            <li><a href="{{ route('timeZone') }}"><span class="fa fa-check"></span> Time Zone</a></li>
		  	<li class="active"><a href="{{ route('site') }}">Site Config</a></li>
		  	<li><a href="{{ route('done') }}">Done</a></li>
		</ul>
    </div>
    <div class="panel-body ins-bg-col">
    	<h4>Site Config</h4>

        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
            @csrf
        <div class="form-group">
				<label for="sname" class="col-sm-2 control-label">
				    <p>Site Name <span class="text-aqua">*</span></p>
				</label>
				<div class="col-sm-6">
				    <input type="text" class="form-control" id="site_name" name="site_name" value="" required>
				</div>
				<span class="col-sm-4 control-label">

				</span>
            </div>
            <div class="form-group">
			    <label for="phone" class="col-sm-2 control-label">
			        <p>Phone <span class="text-aqua">*</span></p>
			    </label>
			    <div class="col-sm-6">
			        <input type="text" class="form-control" id="phone" name="phone" value="" required>
			    </div>
			    <span class="col-sm-4 control-label">
			    </span>
			</div>

            <div class="form-group">
			    <label for="email" class="col-sm-2 control-label">
			        <p>Email <span class="text-aqua">*</span></p>
			    </label>
			    <div class="col-sm-6">
			        <input type="text" class="form-control" id="email" name="email" value="" required>
			    </div>
			    <span class="col-sm-4 control-label">

			    </span>
			</div>

            <div class="form-group">
			    <label for="adminname" class="col-sm-2 control-label">
			        <p>Admin Name <span class="text-aqua">*</span></p>
			    </label>
			    <div class="col-sm-6">
			        <input type="text" class="form-control" id="adminname" name="admin_name" value="" required >
			    </div>
			     <span class="col-sm-4 control-label">
			    </span>
			</div>

            <div class="form-group">
			    <label for="address" class="col-sm-2 control-label">
			        <p>Address</p>
			    </label>
			    <div class="col-sm-6">
			        <textarea name="address" class="form-control" id="address"></textarea>
			    </div>
			     <span class="col-sm-4 control-label">

			    </span>
			</div>

            <div class="form-group">
			    <label for="currency_code" class="col-sm-2 control-label">
			        <p>Currency Code</p>
			    </label>
			    <div class="col-sm-6">
			        <input type="text" class="form-control" id="currency_code" name="currency_code" value="" >
			    </div>
			     <span class="col-sm-4 control-label">

			    </span>
            </div>
            <div class="form-group">
			    <label for="currency_symbol" class="col-sm-2 control-label">
			        <p>Currency Symbol</p>
			    </label>
			    <div class="col-sm-6">
			        <input type="text" class="form-control" id="currency_symbol" name="currency_symbol" value="" >
			    </div>
			     <span class="col-sm-4 control-label">

			    </span>
			</div>

            <div class="form-group">
			    <label for="username" class="col-sm-2 control-label">
			        <p>Username <span class="text-aqua">*</span></p>
			    </label>
			    <div class="col-sm-6">
			        <input type="text" class="form-control" id="username" name="username" value="" >
			    </div>
			     <span class="col-sm-4 control-label">

			    </span>
			</div>

            <div class="form-group">
			    <label for="password" class="col-sm-2 control-label">
			        <p>Password <span class="text-aqua">*</span></p>
			    </label>
			    <div class="col-sm-6">
			        <input type="password" class="form-control" id="password" name="password" data-toggle="tooltip" data-placement="right" title="Tooltip on right" value="" >
			    </div>
			     <span class="col-sm-4 control-label">

			    </span>
			</div>

			<div class="form-group">
				<div class="col-sm-4">
	                <a href="" class="btn btn-default pull-right">Previous Step</a>
	            </div>
	            <div class="col-sm-4 col-sm-offset-2">
	                <input type="submit" class="btn btn-success" value="Next Step" >
	            </div>
	        </div>

		</form>
    </div>
</div>
@endsection
@section('scripts')

@endsection
