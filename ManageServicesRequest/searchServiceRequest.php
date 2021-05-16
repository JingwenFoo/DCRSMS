<?php
session_start();
require_once '../Controller/serviceRequestController.php';

$request = new serviceRequestController();
$staffID = 1111;
$_SESSION['sid'] = $staffID;
$data = $request->viewList();

//confirm submitted service request
if(isset($_POST['confirm']))
{
	$request = new serviceRequestController();
  	$staffID = $_POST['sid'];
  	$serReqID = $_POST['serReqID'];
  	$data = $request->confirmRequest($serReqID);
}
?>

<html>
<head>
	<title>Dercs Computer Repair Shop Management System</title>
</head>

<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<!--style for menu sidebar-->
<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Baloo+Paaji+2:wght@400;600&display=swap');

*{
	font-family: 'Baloo Paaji 2', cursive;
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	list-style: none;
	text-decoration: none;
}

body{
	background: #f5f5f5;
}

.top_navbar{
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 60px;
	background: #fff;
	box-shadow: 1px 0 2px rgba(0,0,0,0.125);
	display: flex;
	align-items: center;
}

.top_navbar .logo{
	width: 250px;
	font-size: 25px;
	font-weight: 600;
	padding: 0 25px;
	color: #007dc3;
	letter-spacing: 2px;
	text-transform: uppercase;
	border-right: 1px solid #f5f5f5;
}

.top_navbar .logo span{
	font-weight: 400;
}

.top_navbar .menu{
	width: calc(100% - 250px);
	padding: 0 25px;
	display: flex;
	justify-content: space-between;
	align-items: center;
}

.top_navbar .hamburger{
	font-size: 25px;
	cursor: pointer;
	color: #005faf;
}

.top_navbar .hamburger:hover{
	color: #007dc3;
}

.top_navbar .menu .profile_wrap{
	padding-left: : 25px;
	border-left: 1px solid #f5f5f5;
}

.top_navbar .menu .profile{
	display: flex;
	align-items: center;
	cursor: pointer;
}

.top_navbar .menu .profile .name{
	margin: 0 15px;
}

.hover_collapse .sidebar{
	width: 70px;
}

.hover_collapse .sidebar ul li a .text{
	display: none;
}

.sidebar{
	position: fixed;
	top: 60px;
	left: 0;
	width: 250px;
	height: 100%;
	background: #005faf;
}

.sidebar ul li a{
	display: block;
	padding: 12px 25px;
	border-bottom: 1px solid #0e94d4;
	color: #0e94d4;
	transition: all 0.2s ease;
}

.sidebar ul li a .icon{
	font-size: 18px;
	vertical-align: middle;
	transition: background 0.2s ease;
}

.sidebar ul li a .text{
	margin-left: 10px;
	color: #fff;
	text-transform: uppercase;
	letter-spacing: 2px;
}

.sidebar ul li a:hover{
	background: #0e94d4;
	color: #fff;
}

.click_collapse .sidebar{
	transition: all 0.2s ease;
}
</style>
	
<!--Boostrap CDN-->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<body>
	<div class="wrapper">
    <div class="top_navbar">
        <div class="logo"><span>DCRSMS</span></div>
		<div class="menu">
			<div class="hamburger">
				<i class="fas fa-bars"></i>
			</div>
			<div class="profile_wrap">
				<div class="profile">
					<i class="fa fa-user-circle"></i>
					<span class="name"></span><a href="../../Manage Account/login.php">Logout</a> 
					
				</div>
			</div>
		</div>
	</div>

       <div class="sidebar">
		<div class="sidebar_inner">
		<ul>
			<li>
				<a href="../Manage Account/staffProfile.php">
					<span class="icon"><i class="fa fa-user-circle"></i> </span>
					<span class="text">Account</a></li></span>
			<li>
				<a href="../ManageServicesRequest/viewServiceRequest.php">
            	<span class="icon"><i class="fa fa-calendar-plus"></i></span>
					<span class="text">Request Service</a></li></span>
           </ul>
       </div>
</div>
<div style='margin-left:25%;padding:70px;height:1000px;'>
	<h1>Service Request List</h1>
	<hr>
	<!--Table shows the list of submitted service request-->
	 <table id="table" class="table table-striped table-bordered table-responsive-md">
        <thead>
    <tr >
      <th style="text-align: center;">NO.</th>
        <th style="text-align: center;">CUSTOMER NAME</th>
        <th style="text-align: center;">SERVICE TYPE</th>
        <th style="text-align: center;">DATE</th>
        <th style="text-align: center;">STATUS</th>
        <th style="text-align: center;">Action</th>
    </tr>
</thead>
<tbody>
  <?php 
  $i=0;
  foreach ($data as $row) {
  ?>
  <tr>
    <td style="text-align: center;"><?php echo $i+1?></td>
    <td style="text-align: center;"><a href='viewServiceRequest.php?id=<?php echo $row['serReqID'];?>'><?= $row['custName']?></a></td>
    <td style="text-align: center;"><?= $row['serviceType']?></td>
    <td style="text-align: center;"><?= $row['requestDate']?></td>
    <td style="text-align: center;"><?= $row['requestStatus']?></td>
    <td style="text-align: center;">
    	<form action="" method="POST">
    		<input type="hidden" name="sid" value="<?php echo $staffID?>">
    		<input type="hidden" name="serReqID" value="<?php echo $row['serReqID']?>">
      <button style="background-color:#add8e6"; name="confirm">&#10004 CONFIRM </button></form></td>
		
	</div>
</form>
</tr>
 <?php $i++; } ?>
</tbody>
</table>
<br>
	<h1>Confirmed Service Request List</h1>
	<hr>
	<?php
	$request1 = new serviceRequestController();
	$data = $request1->searchRequest();?>
	<!--Table shows the list of confirmed service request-->
	<table id="table1" class="table table-striped table-bordered table-responsive-md">
    <thead>
    <tr >
     	<th style="text-align: center;">NO.</th>
        <th style="text-align: center;">CUSTOMER NAME</th>
        <th style="text-align: center;">SERVICE TYPE</th>
        <th style="text-align: center;">DATE</th>
        <th style="text-align: center;">STATUS</th>
    </tr>
</thead>
<tbody>
  <?php 
  $j=0;
  foreach ($data as $row) {
  ?>
  <tr>
    <td style="text-align: center;"><?php echo $j+1?></td>
    <td style="text-align: center;"><?= $row['custName']?></td>
    <td style="text-align: center;"><?= $row['serviceType']?></td>
    <td style="text-align: center;"><?= $row['requestDate']?></td>
    <td style="text-align: center;"><?= $row['requestStatus']?></td>
</tr>
<?php $j++; } ?>
</tbody>
</table>

<script type="text/javascript">
        $(document).ready(function(){
            $('table').DataTable();
        });
    </script>
</body>
</html>