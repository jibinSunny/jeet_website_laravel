@extends('layouts.install')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading-install">
		<ul class="nav nav-pills d-table mx-auto">
            <li><a href="{{ route('start') }}">Checklist</a></li>
            <li class="active"><a href="">Purchase Code</a></li>
            <li><a href="{{ route('timeZone') }}">Time Zone</a></li>
		  	<li><a href="{{ route('site') }}">Site Config</a></li>
		  	<li><a href="{{ route('done') }}">Done</a></li>
		</ul>
    </div>
    <div class="panel-body ins-bg-col">
        <h4>Purchase Code</h4>
        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
				<label for="user" class="col-sm-2 control-label">
				    <p>Username<span class="text-aqua">*</span></p>
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
				<label for="purchase_code" class="col-sm-2 control-label">
				    <p>Purchase code <span class="text-aqua">*</span></p>
				</label>
				<div class="col-sm-6">
				    <input type="text" class="form-control" id="purchase_code" name="purchase_code" value="" >
				</div>
				<span class="col-sm-4 control-label">
                    @isset($message)
                        {{ $message }}
                    @endisset
                    @if($errors->has('purchase_code'))
                        <div class="error">{{ $errors->first('purchase_code') }}</div>
                    @endif
				</span>
            </div>

            <div class="form-group">
                <div class="col-sm-4">
                    <a href="{{ route('start') }}" class="btn btn-default pull-right">Previous Step</a>
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
