<?php
require_once '../Model/serviceRequestModel.php';

class serviceRequestController
{
	//insert service request detail
	function addSerReq()
	{
		$request = new serviceRequestModel();
		
		$request->custID = $_POST['custID'];
		$request->serviceType = $_POST['serviceType'];
		$request->symptom = $_POST['symptom'];
		$request->damageInfo = $_POST['damageInfo'];
		$request->requestStatus = "Submitted";
		$request->requestDate = $_POST['requestDate'];
		$request->requestTime = $_POST['requestTime'];
		$request->staffID = 0;
		$request->repairStaffID = 0;
		$request->amountPrice = 0.00;
		$request->requestDetail = "No detail";
		$request->requestProgress = "On progress";

		if($request->addSerRequest()>0)
		{
			 $message = "Add Service Request Success!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../ManageServicesRequest/viewList.php';</script>";
		}
	}

<<<<<<< Updated upstream
	function viewList()
	{
		$request = new serviceRequestModel();
		return $request->viewList();
	}
=======
	//customer view service request list 
	function viewQuotationList()
	{

		$request = new serviceRequestModel();
		$request->custID = $_SESSION["cid"];
		return $request->viewQuotationList();
	}

	//customer view service request detail
	function viewQuotationDetail($serReqID)
	{
		$request = new serviceRequestModel();
		$request->serReqID = $serReqID;
		return $request->viewQuotationDetail();
	}

	//customer delete request row
	function deleteRequest($serReqID)
	{
		$request = new serviceRequestModel();
		$request->serReqID = $serReqID;
		if($request->deleteRequest()){
			$message = "Success delete!";
			echo "<script type='text/javascript'>alert('$message');
			window.location = '../ManageServicesRequest/viewList.php';</script>";
		}
	}

	//customer update service request quotation
	function editServiceRequest($serReqID)
	{
		$request = new serviceRequestModel();
		$request->serReqID = $serReqID;
		$request->serviceType = $_POST['serviceType'];
		$request->symptom = $_POST['symptom'];
		$request->damageInfo = $_POST['damageInfo'];

		if($request->editServiceRequest()){
			$message = "Success Update!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../ManageServicesRequest/viewList.php';</script>";
		}
	}
 	//staff view all the submitted service request list
	function viewList()
	{
		$request = new serviceRequestModel();
		$request->requestStatus = "Pending";
		return $request->viewList();
	}

	//staff view the detail of submitted service request quotation
	function viewDetail($serReqID)
	{
		$request = new serviceRequestModel();
		$request->serReqID = $serReqID;
		return $request->viewQuotationDetail();
	}

	//staff view all the confirmed service request list
	function searchRequest()
	{
		$request = new serviceRequestModel();
		$request->requestStatus = "Confirmed";
		return $request->searchRequest();
	}
	
	//staff confirm the submitted service request quotation
	function confirmRequest($serReqID)
	{
		$request = new serviceRequestModel();
		$request->serReqID = $serReqID;
		$request->staffID = $_SESSION["sid"];
		$request->requestStatus = 'Confirmed';

		if($request->confirmServiceRequest()){
			$message = "Service Request Quotation confirmed!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../ManageServicesRequest/searchServiceRequest.php';</script>";
		}
	}
>>>>>>> Stashed changes
}