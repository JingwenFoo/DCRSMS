<?php
require_once '../Controller/serviceRequestController.php';
require_once '../index.html';

$request = new serviceRequestController();

if(isset($_POST['add'])){
    $request->add();
}

?>
<html>
<head>
	<title>Add Service Request</title>
</head>
<body>
<div style='margin-left:25%;padding:70px;height:1000px;'>
 

    <h1>ADD SERVICE REQUEST</h1><br>
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
        <td style="text-align: top">Symptom:</td>
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
        <input type="radio" id="other" name="symptom" value="otherSymptom">
        <label for="other">Other: </label>
        <input type="text" name="otherSymptom" placeholder="Other symptom" maxlength="10"></td>
    </tr>
    <tr>
        <td>Damage Information:</td>
        <td><input type="text" name="damageInfo" placeholder="Damage information" width="100" height="100"required>
        </td>
    </tr>
    <tr>
      <td height="150px" colspan="4" align="center">
        <input type="submit" name="add" value="SUBMIT"></td></tr>
</table>
</form>
</body>
</html>