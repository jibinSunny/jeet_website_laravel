<!DOCTYPE html>
<html>
<style>
table, th, td {
  border: 0.01px solid skyblue;text-align:center;width:100%;padding:8px; 

}
tr:nth-child(even) {background: #f2f2f2}
tr:nth-child(odd) {background: #FFF}
body
{
	margin:0 !important;
	background-color:white;
	color:black;
	border:none;
	border-style: solid;
	word-wrap: break-word:
}
#table
{
	max-width: 2480px;
  width:100%;
	word-wrap: break-word:
}
td
{
	width: 10px;
	overflow: hidden;
	word-wrap: break-word;
}
td+td 
{
	width: auto;
	overflow: hidden;
	word-wrap: break-word;
}

</style>
<div style="margin-left:30%;position:absolute;top:0;"></div>
<div style="position:absolute;top:0;right:0;">
<?php
// echo sizeof($array);
// var_dump($array);
date_default_timezone_set("Asia/Kolkata");
echo date("d-m-Y")."(".date("h:i:A").")";
?>
</div>
<?php
echo "<h1 style='text-align:center;font-size:35px;text-decoration:underline;'><br>"."Student Details"."</h1>";
echo "<table style='border-collapse: collapse;table-layout:auto;width:100%;' id='table'>";?>
            <tr>
						<th>Sl.No</th>
						<th>Name</th>
					  </tr>
                     <td> xcvcv</td>
					 <td> xcvcv</td>
</tr>
</table>
</html>
