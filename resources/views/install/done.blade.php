
@extends('layouts.install')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading-install">
        <ul class="nav nav-pills d-table mx-auto">
		  	<li><a href=""><span class="fa fa-check"></span> Checklist</a></li>
            <li><a href="{{ route('purchaseCode') }}">Purchase Code</a></li>
            <li><a href="{{ route('timeZone') }}"><span class="fa fa-check"></span> Time Zone</a></li>
		  	<li><a href="{{ route('site') }}">Site Config</a></li>
		  	<li class="active"><a href="{{ route('done') }}">Done</a></li>
		</ul>
    </div>
    <div class="panel-body ins-bg-col">
    	<h4><span class="fa fa-check"></span> Installation completed</h4>

    	<div class="alert alert-info">
    		<h5><span class="fa fa-info-circle"></span> You can login now using the following credential:</h5>

    		<p style="margin-top:25px;">
    		<h5>Username: <b>admin@gmail.com</b></h5>
			<h5>Password: <b>Jeet@123</b></h5> </p>
    	</div>

    	<div class="alert alert-warning">
    		<h5><span class="fa fa-exclamation-triangle"></span> Please click go to login then finish your job.</h5>
    	</div>

    	<form class="form-horizontal" role="form" method="post">
    		<input type="text" name="text" value="1" style="display:none;" />
			<div class="form-group">
				<div class="row">
					 <div class="col-sm-4 col-sm-offset-1">
		            </div>
		            <div class="col-sm-4 col-sm-offset-3">
					<a href="{{ route('showLogin') }}">
		                <input type="" name="submit" class="btn btn-success" value="Go to Login">
						</a>
		            </div>
				</div>
	        </div>
		</form>
    </div>
</div>
@endsection
@section('scripts')

@endsection
