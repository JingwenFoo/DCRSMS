<?php
session_start();
require_once '../Controller/serviceRequestController.php';
include("../index.html");

//get service request ID
$serReqID = $_GET['id'];
$request = new serviceRequestController();

//update service request quotation
if(isset($_POST['update']))
	$data = $request->editServiceRequest($serReqID);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Service Request Quotation</title>
</head>
<body>
<div style='margin-left:25%;padding:70px;height:1000px;'>
 

    <h1>UPDATE SERVICE REQUEST</h1><br>
    <form action="" method="POST">
    <table width="500" height="700" border="0">
    <tbody>
    <tr>
        <td><strong style="color: #007dc3;font-size: 20px">Service Request Information</strong><hr></td>
    </tr>
    <tr>
        <td>Service Type:</td>
        <td><select name="serviceType" required="">
          <option value="">Select</option>
          <option value="Personal computer">Personal Computer</option>
          <option value="Smart phone">Smart phone</option>
          <option value="Laptop">Laptop</option>
          <option value="Printer">Printer</option>
          <option value="Tab">Tab</option>
        </select></td>        
    </tr>
    <tr>
        <td style="vertical-align: top" rowspan="1">Symptom:</td>
        <td><input type="radio" id="blackOut" name="symptom" value="Black out">
        <label for="blackOut">Black out</label><br>
        <input type="radio" id="blueScreen" name="symptom" value="Blue Screen">
        <label for="blueScreen">Blue screen</label><br>
        <input type="radio" id="blankScreen" name="symptom" value="The screen is blank">
        <label for="blankScreen">The screen is blank</label><br>
        <input type="radio" id="computerSlow" name="symptom" value="Computer slow">
        <label for="computerSlow">Computer slow</label><br>
        <input type="radio" id="dropInternetConnection" name="symptom" value="Drop internet connection">
        <label for="dropInternetConnection">Drop internet connection</label><br>
        <input type="radio" id="other" name="symptom" value="Other Symptom">
        <label for="other">Other</label>
        </td>
    </tr>
    <tr>
        <td>Damage Information:</td>
        <td><input type="text" name="damageInfo" placeholder="Damage information" width="100" height="100"required>
        </td>
    </tr>
    
      <td height="150px" colspan="4" align="center">
        <input type="submit" name="update" value="UPDATE"></td></tr>
</table>
</form>
</body>
</html>