<?php
require_once '../Model/serviceRequestModel.php';

class serviceRequestController
{

	function addSerReq()
	{
		$request = new serviceRequestModel();
		
		$request->custID = $_POST['custID'];
		$request->serviceType = $_POST['serviceType'];
		$request->symptom = $_POST['symptom'];
		$request->damageInfo = $_POST['damageInfo'];
		$request->requestStatus = 'Pending';
		$request->requestDate = $_POST['requestDate'];
		$request->requestTime = $_POST['requestTime'];

		if($request->addSerReq()>0)
		{
			 $message = "Add Service Request Success!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../../ManageServicesRequest/viewList.php';</script>";
		}
	}
}