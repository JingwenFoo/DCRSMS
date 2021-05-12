<?php
class DB
{

  public static function connect($value='')
  {
    // define a constant variable to store our database settings
    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'dcrsms');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    // create a new PDO connection
    $pdo = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
  }

  public static function run($sql, $args = NULL)
    {
        if (!$args) // if no parameter
        {
          // run the query straight away without parameter binding
             return DB::connect()->query($sql);
        }
        // prepare the sql query
        $stmt = DB::connect()->prepare($sql);
        // execute the query with bind parameter values
        try {
            $stmt->execute($args);
            return $stmt;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            die();
        }   
     }
}

class serviceRequestModel
{
	public $custID, $staffID, $repairStaffID, $serviceType, $symptom, $damageInfo, $requestStatus, $requestDate, $requestTime, $amountPrice, $requestDetail, $requestProgress;

	function addSerReq()
	{
		$sql = "insert into serviceRequestQuotation (custID, staffID, repairStaffID, serviceType, symptom, damageInfo, requestStatus, requestDate, requestTime, amountPrice, requestDetail, requestProgress) values(:custID, :staffID, :repairStaffID, :serviceType, :symptom, :damageInfo, :requestStatus, :requestDate, :requestTime, :amountPrice, :requestDetail, :requestProgress)";
        $args = [':custID'=>$this->custID, ':staffID'=>$this->staffID, ':repairStaffID'=>$this->repairStaffID, ':serviceType'=>$this->serviceType, ':symptom'=>$this->symptom, ':damageInfo'=>$this->damageInfo, ':requestStatus'=>$this->requestStatus, ':requestDate'=>$this->requestDate, ':requestTime'=>$this->requestTime, ':amountPrice'=>$this->amountPrice, ':requestDetail'=>$this->requestDetail, ':requestProgress'=>$this->requestProgress];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
	}

    function viewList()
    {
        $sql = "Select * from serviceRequestQuotation where custID=:custID";
        $args = [':custID'=>$this->custID];
        return DB::run($sql,$args);
    }
}

?>