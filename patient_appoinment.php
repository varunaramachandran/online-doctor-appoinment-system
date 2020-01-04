<?php
include('dbcon.php');
include("header.php");
include("patient_header.php");
?>

<!Doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>
</title>
<style>
a{color:white;}
body{
	background-image: url(images/patient_home.jpg);
	background-size:cover;
	background-repeat:no-repeat;
	background-attachment:fixed;}
</style>
</head>
<body>
<h1 style="text-align:center;">APPOINTMENTS</h1>
<Div style="padding:40px;">
<center>
<div align="center" style="borde:2px solid red;width:500px;height:200px;padding:20px;" class="appbtn">
<ul style="padding:40px;background-color: #58200B;">
<li><a href="appointment_view.php">VIEW APPOINTMENTS</a></li><br><br>
<li><a href="patient_record.php">MEDICAL RECORD</a></li><br><br>
<li><a href="#">CANCEL APPOINTMENTS</a></li><br><br>
</ul>
</div>
</center>
</Div>
<br> <br><br><br><br>
<br><br><br>
</body>
</html>

<?php include("footer.php");?>