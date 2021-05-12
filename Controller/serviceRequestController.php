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
		$request->requestStatus = "Pending";
		$request->requestDate = $_POST['requestDate'];
		$request->requestTime = $_POST['requestTime'];
		$request->staffID = 0;
		$request->repairStaffID = 0;
		$request->amountPrice = 0.00;
		$request->requestDetail = "No detail";
		$request->requestProgress = "On progress";

		if($request->addSerReq()>0)
		{
			 $message = "Add Service Request Success!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../DCRSMS/ManageServicesRequest/viewList.php';</script>";
		}
	}
}