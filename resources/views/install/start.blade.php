@extends('layouts.install')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading-install">
		<ul class="nav nav-pills d-table mx-auto">
              <li class="active"><a href="">Checklist</a></li>
              <li><a href="{{ route('purchaseCode') }}">Purchase Code</a></li>
            <li><a href="{{ route('timeZone') }}">Time Zone</a></li>
		  	<li><a href="{{ route('site') }}">Site Config</a></li>
		  	<li><a href="{{ route('done') }}">Done</a></li>
		</ul>
    </div>
    <div class="panel-body ins-bg-col">
        <h4>Pre-Install Checklist</h4>
        <?php
    		foreach ($success as $succ) {
    		 	echo "<div class=\"alert alert-success\"><span class=\"fa fa-check-circle\"></span> ". $succ ."</div>";
    		}

    		foreach ($errors as $er) {
    		 	echo "<div class=\"alert alert-danger\"><span class=\"fa fa-exclamation-circle\"></span> ". $er ."</div>";
    		}
    	?>

        @if(count($errors) > 0)
            <div class="col-sm-12"><a href="{{ route('purchaseCode') }}" class="btn btn-success pull-right disabled">Next Step</a></div>
        @else
        <div class="col-sm-12"><a href="{{ route('purchaseCode') }}" class="btn btn-success pull-right">Next Step</a></div>
        @endif
    </div>
</div>
@endsection
@section('scripts')
@endsection
