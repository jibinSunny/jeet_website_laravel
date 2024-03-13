@extends('layouts.install')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading-install">
        <ul class="nav nav-pills d-table mx-auto">
            <li><a href="{{ route('start') }}">Checklist</a></li>
            <li><a href="{{ route('purchaseCode') }}">Purchase Code</a></li>
            <li class="active"><a href="{{ route('timeZone') }}">Time Zone</a></li>
            <li><a href="{{ route('site') }}">Site Config</a></li>
            <li><a href="{{ route('done') }}">Done</a></li>
      </ul>
    </div>
    <div class="panel-body ins-bg-col">
    	<h4>Set Timezone and Country</h4>

		<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="host" class="col-sm-2 control-label">
                    <p>Country <span class="text-aqua">*</span></p>
                </label>
                <div class="col-sm-6">
                    <select class="form-control" required name="country">
                        <option>Select Country</option>
                        @foreach ($countries as $item)
                        <option value="{{ $item->id }}" @if($settings->default_country == $item->id) selected @endif>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
			<div class="form-group">
				<label for="host" class="col-sm-2 control-label">
				    <p>Timezone <span class="text-aqua">*</span></p>
				</label>
				<div class="col-sm-6">
				    <select class="form-control" required name="timezone">
                        <option>Select Timezone</option>
                        @foreach ($timezones as $item)
                        <option value="{{ $item->id }}" @if($settings->time_zone == $item->id) selected @endif>{{ $item->name }}</option>
                        @endforeach
                    </select>
				</div>
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
