<<<<<<< Updated upstream
=======
<?php
require_once '../Controller/serviceRequestController.php';
include '../index.html';

$serReqID = $_GET['id'];

$request = new serviceRequestController();
$data = $request->viewQuotationDetail($serReqID);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Service Request Quotation</title>
</head>
<body>
	<div style="margin-left:25%;padding:70px;height:1000px;">
	<h1>Service Request Quotation</h1>
	<hr>
	<!--Table to display the data of service request quotation-->
	<table width="764" height="447" border="1">
		<?php

		foreach ($data as $row) {
			//condition to display the value of amount price and request detail
			if($row['amountPrice']==0)
				$amountPrice="To be determined";
			else 
				$amountPrice=$row['amountPrice'];

			if($row['requestDetail'] =='No detail')
				$requestDetail="-";
			else 
				$requestDetail=$row['requestDetail'];
		?>
		<tr>
			<td>Service Request ID:</td>
			<td style="text-align: center;"><?=$row['serReqID']?></td>
		</tr>
		<tr>
			<td>Customer Name:</td>
			<td style="text-align: center;"><?=strtoupper($row['custName'])?></td>
		</tr>
		<tr>
			<td>Request Date:</td>
			<td style="text-align: center;"><?=$row['requestDate']?></td>
		</tr>
		<tr>
			<td>Request Time:</td>
			<td style="text-align: center;"><?=$row['requestTime']?></td>
		</tr>
		<tr>
			<td>Service Type:</td>
			<td style="text-align: center;"><?=$row['serviceType']?></td>
		</tr>
		<tr>
			<td>Symptom:</td>
			<td style="text-align: center;"><?=$row['symptom']?></td>
		</tr>
		<tr>
			<td>Damage Information:</td>
			<td style="text-align: center;"><?=$row['damageInfo']?></td>
		</tr>
		
		<tr>
			<td>Request Status:</td>
			<td style="text-align: center;"><?=$row['requestStatus']?></td>
		</tr>
		<tr>
			<td>Amount Price:</td>
			<td style="text-align: center;">RM <?=$amountPrice?></td>
		</tr>
		<tr>
			<td>Request Detail:</td>
			<td style="text-align: center;"><?=$requestDetail?></td>
		</tr>
	</table>
				<?php } ?>
</body>
</html>
>>>>>>> Stashed changes
