@extends('layouts.install')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading-install">
		<ul class="nav nav-pills d-table mx-auto">
		  	<li><a href="{{ route('start') }}"><span class="fa fa-check"></span> Checklist</a></li>
              <li><a href="{{ route('purchaseCode') }}">Purchase Code</a></li>
		  	<li class="active"><a href="javascript:;">Database</a></li>
		  	<li><a href="{{ route('timeZone') }}">Time Zone</a></li>
		  	<li><a href="{{ route('site') }}">Site Config</a></li>
		  	<li><a href="{{ route('done') }}">Done</a></li>
		</ul>
    </div>
    <div class="panel-body ins-bg-col">
    	<h4>Database Config</h4>

		<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
        @csrf
			<div class="form-group">
				<label for="host" class="col-sm-2 control-label">
				    <p>Hostname <span class="text-aqua">*</span></p>
				</label>
				<div class="col-sm-6">
				    <input type="text" class="form-control" id="host" name="hostname" value="" >
				</div>
				<span class="col-sm-4 control-label">
                    @if($errors->has('hostname'))
                        <div class="error">{{ $errors->first('hostname') }}</div>
                    @endif
				</span>
			</div>

			<div class="form-group">
				<label for="database" class="col-sm-2 control-label">
				    <p>Database <span class="text-aqua">*</span></p>
				</label>
				<div class="col-sm-6">
				    <input type="text" class="form-control" id="database" name="database" value="" >
                </div>
                <span class="col-sm-4 control-label">
				@if($errors->has('database'))
                    <div class="error">{{ $errors->first('database') }}</div>
                @endif
                </span>
			</div>

			<div class="form-group">
				<label for="user" class="col-sm-2 control-label">
				    <p>Username <span class="text-aqua">*</span></p>
				</label>
				<div class="col-sm-6">
				    <input type="text" class="form-control" id="username" name="username" value="" >
                </div>
                <span class="col-sm-4 control-label">
				@if($errors->has('username'))
                    <div class="error">{{ $errors->first('username') }}</div>
                @endif
                </span>
			</div>

			<div class="form-group">
				<label for="password" class="col-sm-2 control-label">
				    <p>Password <span class="text-aqua">*</span></p>
				</label>
				<div class="col-sm-6">
				    <input type="password" class="form-control" id="password" name="password" value="" >
                </div>
                <span class="col-sm-4 control-label">
				@if($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif
                </span>
			</div>

	        <div class="form-group">
				<div class="col-sm-4">
	                <a href="{{ route('purchaseCode') }}" class="btn btn-default pull-right">Previous Step</a>
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
