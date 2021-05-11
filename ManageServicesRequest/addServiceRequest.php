<?php
require_once '../Controller/serviceRequestController.php';

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
 <div class="container">
      <ul class="progressbar">
          <li class="active">Add Request</li>
          <li></li>
          <li></li>
  </ul>
  <style type="text/css">
  	 .container {
      width: 600px;
      margin: 100px auto; 
  }
  .progressbar {
      counter-reset: step;
  }
  .progressbar li {
      list-style-type: none;
      width: 25%;
      float: left;
      font-size: 12px;
      position: relative;
      text-align: center;
      text-transform: uppercase;
      color: #7d7d7d;
  }
  .progressbar li:before {
      width: 30px;
      height: 30px;
      content: counter(step);
      counter-increment: step;
      line-height: 30px;
      border: 2px solid #7d7d7d;
      display: block;
      text-align: center;
      margin: 0 auto 10px auto;
      border-radius: 50%;
      background-color: white;
  }
  .progressbar li:after {
      width: 100%;
      height: 2px;
      content: '';
      position: absolute;
      background-color: #7d7d7d;
      top: 15px;
      left: -50%;
      z-index: -1;
  }
  .progressbar li:first-child:after {
      content: none;
  }
  .progressbar li.active {
      color: green;
  }
  .progressbar li.active:before {
      border-color: #55b776;
  }
  .progressbar li.active + li:after {
      background-color: #55b776;
  }
  </style>
</div>

    <h1>Student Registration</h1>
     <form action="" method="POST">
    <table width="764" height="447" border="0">
    <tbody>
    <tr>
        <td colspan="6"><strong style="color: #42A88D"><i class="fas fa-user"></i> Register Information</strong><hr></td>
    </tr>
    <tr>
        <td>Name:</td>
        <td><input type="text" name="name" placeholder="Student Name" required></td>

        <td>Photo:</td>
        <td colspan="1" rowspan="2"><iframe src="ImageUpload.php" style="border: none"></iframe></td>
    </tr>
    <tr>
        <td>IC Number:</td>
        <td><input type="text" name="studic" placeholder="IC Number" required></td>
    </tr>
    <tr>
        <td>Tel No.:</td>
        <td><input type="text" name="phone"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" placeholder="Tel No." required></td>
    </tr>
    <tr>
        <td>Gender:</td>
        <td><select name="gender" >
            <option value="">-Choose Gender-</option>
             <option value="Male">Male</option>
             <option value="Female">Female</option>
        </td>
    </tr>
    <tr>
        <td>Class:</td>
        <td><select name="class" >
            <option value=""></option>
            <option value="01G">01G</option>
            <option value="02G">02G</option>
            <option value="03G">03G</option>
            <option value="04G">04G</option>
            <option value="05G">05G</option>
        </td>
    </tr>
</table>
</body>
</html>