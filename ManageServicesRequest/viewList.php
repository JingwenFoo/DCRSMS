<?php
session_start();
require_once '../Controller/serviceRequestController.php';
include '../index.html';

<<<<<<< Updated upstream

$custID = $_POST['custID'];
$request = new serviceRequestController();
$data = $request->viewList();
=======
$request = new serviceRequestController();
$custID = $_SESSION['cid'];
$data = $request->viewQuotationList();

//delete service request row
if(isset($_POST['delete']))
{
  $request = new serviceRequestController();
  $serReqID = $_POST['deleteID'];
  $data = $request->deleteRequest($serReqID);
}

//view detail of service request
if(isset($_POST['view']))
{
  $request = new serviceRequestController();
  $serReqID = $_POST['serReqID'];
  $data = $request->viewQuotationDetail($serReqID);
}
>>>>>>> Stashed changes
?>
<html>
<head>
	<title>Service Request List</title>
</head>
<style type="text/css">
  button {
     width: 100px;
     height: 50px;
}
</style>
<body>
<div style='margin-left:300px;padding:70px;height:1000px;'>
 <h1>Service Request List</h1><hr/><br/>
<<<<<<< Updated upstream
 <table id="table" class="table table-striped table-bordered table-responsive-md" width="100%">
=======
 <!--Table shows all the list of service request made by customer-->
 <table id="table" class="table table-striped table-bordered table-responsive-md">
>>>>>>> Stashed changes
        <thead>
    <tr >
      <th style="text-align: center;">NO.</th>
        <th style="text-align: center;">SERVICE REQUEST ID</th>
        <th style="text-align: center;">DATE</th>
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
    <td style="text-align: center;"><?= $row['serReqID']?></td>
    <td style="text-align: center;"><?= $row['requestDate']?></td>
<<<<<<< Updated upstream
    <td style="text-align: center;"><form action="" method="POST">
      <button style="background-color:#008CBA"; name="view"><i class="fa fa-eye"></i> View </button>&emsp;&emsp;&emsp;
       <button style="background-color:#4CAF50" name="edit"><i class="fa fa-edit"></i> Edit </button>&emsp;&emsp;&emsp;
       <button style="background-color: #f44336;" name="delete"><i class="fa fa-trash"></i> Delete </button>
=======
    <td style="text-align: center;"><form action="viewForm.php?id=<?=$row['serReqID']?>" method="POST">
      <button style="background-color:#008CBA"; name="view"><i class="fa fa-eye"></i> View </button>&emsp;&emsp;&emsp;</form>
      <form action="editForm.php?id=<?=$row['serReqID']?>" method="POST">
       <button style="background-color:#4CAF50" name="edit"><i class="fa fa-edit"></i> Edit </button>&emsp;&emsp;&emsp;</form>
       <form action="" method="POST">
        <input type="hidden" name="deleteID" value="<?=$row['serReqID']?>">
       <button style="background-color: #f44336;" name="delete" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash"></i> Delete </button>
>>>>>>> Stashed changes
    </form>
    </td>
  </tr>
  
  <?php $i++; } ?>
</tbody>
<input type="text" name="custID" value="<?php echo $custID?>">
<script type="text/javascript">
        $(document).ready(function(){
            $('table').DataTable();
        });
    </script>
=======
<div style='margin-left:25%;padding:70px;height:1000px;'>
 
</body>
</html>