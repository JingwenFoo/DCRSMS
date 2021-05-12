<?php
session_start();
require_once '../Controller/serviceRequestController.php';
include '../index.html';


$custID = $_POST['custID'];
$request = new serviceRequestController();
$data = $request->viewList();

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
 <table id="table" class="table table-striped table-bordered table-responsive-md" width="100%">
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
    <td style="text-align: center;"><form action="" method="POST">
      <button style="background-color:#008CBA"; name="view"><i class="fa fa-eye"></i> View </button>&emsp;&emsp;&emsp;
       <button style="background-color:#4CAF50" name="edit"><i class="fa fa-edit"></i> Edit </button>&emsp;&emsp;&emsp;
       <button style="background-color: #f44336;" name="delete"><i class="fa fa-trash"></i> Delete </button>
    </form>
    </td>
  </tr>
  <?php $i++; } ?>
</tbody>
<script type="text/javascript">
        $(document).ready(function(){
            $('table').DataTable();
        });
    </script>
</body>
</html>