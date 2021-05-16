<?php
require_once '../libs/database.php';

class serviceRequestModel
{
    public $custID, $staffID, $repairStaffID, $serviceType, $symptom, $damageInfo, $requestStatus, $requestDate, $requestTime, $amountPrice, $requestDetail, $requestProgress;
    
    //add service request into database
    function addSerRequest()
    {
        $sql = "insert into serviceRequestQuotation (custID, staffID, repairStaffID, serviceType, symptom, damageInfo, requestStatus, requestDate, requestTime, amountPrice, requestDetail, requestProgress) values(:custID, :staffID, :repairStaffID, :serviceType, :symptom, :damageInfo, :requestStatus, :requestDate, :requestTime, :amountPrice, :requestDetail, :requestProgress)";
        $args = [':custID'=>$this->custID, ':staffID'=>$this->staffID, ':repairStaffID'=>$this->repairStaffID, ':serviceType'=>$this->serviceType, ':symptom'=>$this->symptom, ':damageInfo'=>$this->damageInfo, ':requestStatus'=>$this->requestStatus, ':requestDate'=>$this->requestDate, ':requestTime'=>$this->requestTime, ':amountPrice'=>$this->amountPrice, ':requestDetail'=>$this->requestDetail, ':requestProgress'=>$this->requestProgress];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
<<<<<<< Updated upstream
	}

    function viewList()
=======
    }

    //customer view service request list
    function viewQuotationList()
>>>>>>> Stashed changes
    {
        $sql = "Select * from serviceRequestQuotation where custID=:custID";
        $args = [':custID'=>$this->custID];
        return DB::run($sql,$args);
    }
<<<<<<< Updated upstream
=======

    //customer view service request detail
    function viewQuotationDetail()
    {
        $sql = "select * from serviceRequestQuotation inner join customer on serviceRequestQuotation.custID = customer.custID where serviceRequestQuotation.serReqID=:serReqID";
        $args = [':serReqID'=>$this->serReqID];
        return DB::run($sql,$args);
    }

    //customer delete request row
    function deleteRequest()
    {
        $sql = "delete from serviceRequestQuotation where serReqID=:serReqID";
        $args = [':serReqID'=>$this->serReqID];
        return DB::run($sql,$args);
    }

    //customer update service request quotation
    function editServiceRequest()
    {
        $sql = "update serviceRequestQuotation set serviceType=:serviceType, symptom=:symptom, damageInfo=:damageInfo where serReqID=:serReqID";
        $args = [':serviceType'=>$this->serviceType, ':symptom'=>$this->symptom, ':damageInfo'=>$this->damageInfo, ':serReqID'=>$this->serReqID];
        return DB::run($sql,$args);
    }

    //staff view all the submitted service request list
    function viewList()
    {
         $sql = "select * from serviceRequestQuotation inner join customer on serviceRequestQuotation.custID = customer.custID where requestStatus=:requestStatus";
        $args = [':requestStatus'=>$this->requestStatus];
        return DB::run($sql,$args);
    }

    //staff view all the confirmed service request list
    function searchRequest()
    {
        $sql = "select * from serviceRequestQuotation inner join customer on serviceRequestQuotation.custID = customer.custID where requestStatus=:requestStatus";
        $args = [':requestStatus'=>$this->requestStatus];
        return DB::run($sql,$args);
    }

    //staff confirm the submitted service request quotation
   function confirmServiceRequest()
   {
        $sql = "update serviceRequestQuotation set staffID=:staffID, requestStatus=:requestStatus where serReqID=:serReqID";
        $args = [':staffID'=>$this->staffID, ':requestStatus'=>$this->requestStatus, ':serReqID'=>$this->serReqID];
        return DB::run($sql,$args);
   }
>>>>>>> Stashed changes
}

?>