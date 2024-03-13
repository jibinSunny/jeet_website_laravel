
@extends('layouts.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
  	<div>
    	<table width="100%">
      		<tr>
        		<td widht="5%">
          			<h2>
          			</h2>
        		</td>
				<td widht="75%">
					<h3 class="top-site-header-title"></h3>
				</td>
				<td class="20%">
					<h5 class="top-site-header-create-title"></h5>
				</td>
			</tr>
		</table>
    	<br>
	    <table width="100%">
	      	<tr>
	        	<td width="33%">
	          		<table>
	            		<tbody>
	                		<tr>
	                    		<th class="site-header-title-float"></th>
	                		</tr>
			                    <tr>
			                        <td></td>
			                    </tr>
			                    <tr>
			                        <td></td>
			                    </tr>
			                    <tr>
			                        <td></td>
			                    </tr>
			                    <tr>
			                        <td></td>
			                    </tr>
	            		</tbody>
	          		</table>
	        	</td>
	        	<td width="33%">
	            	<table >
	              		<tbody>
	              			<tr>
			                    <th class="site-header-title-float"></th>
			                </tr>
			                <tr>
			                    <td></td>
			                </tr>
			                <tr>
			                    <td>></td>
			                </tr>
			                <tr>
			                    <td></td>
			                </tr>
			                <tr>
			                    <td></td>
			                </tr>
				                <tr>
				                  <td></td>
				                </tr>
	              		</tbody>
	            	</table>
	        	</td>
	        	<td width="34%" style="vertical-align: text-top;">
		          	<table>
		            	<tbody>
		              		<tr>
		                		<td></td>
		              		</tr>
		              		<tr>
		                		<td></td>
		              		</tr>
		            	</tbody>
		          	</table>
	        	</td>
	      	</tr>
	    </table>
	    <br>

	    <table class="table table-bordered">
	      	<thead>
		        <tr>
		            <th></th>
		            <th></th>
		            <th></th>
		            <th></th>
		            <th></th>
		            <th></th>
		        </tr>
	      	</thead>
	      	<tbody>
		            <tr>
						<td data-title=""></td>
						<td data-title=""></td>
						<td data-title=""></td>
						<td data-title=""></td>
						<td data-title=""></td>
						<td data-title=""></td>
						<td data-title=""></td>
						<td data-title=""></td>
		            </tr>
	      	</tbody>

	      	<tfoot>
                <tr>
                    <td colspan="2"><span class="pull-right"><b></b></span></td>
                    <td><b></b></td>
                    <td><b></b></td>
                    <td><b></b></td>
                    <td><b></b></td>
                </tr>
            </tfoot>
	    </table>

	    <table width="100%">
        	<tr>
	            <td width="65%" >
	                <p><?=$globalpayment->invoicedescription?></p>
	            </td>
	            <td width="35%">
	                <table>
	                    <tr>
	                        <td></td>
	                    </tr>
	                    <tr>
	                        <td></td>
	                    </tr>
	                </table>
	            </td>
	        </tr>
	    </table>
  	</div>
</body>
</html>
@endsection
@section('scripts')

@endsection