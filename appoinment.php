<!--Author:Varuna
    Page Name:Appoinment.php
	-->
<?php include("header.php");?>
<?php include("doctor_header.php");  ?>

<html>
<head>
<title>view</title>

<script>

function check()
    {
        var date=document.forms["form"]["date"].value;
		if(date=="")
        {
            alert("Enter the Date");
            document.forms["form"]["date"].focus();
				return false;
        }
	}
</script>

<style>


table{align:center;
	text-align:center;
	border-collapse:collapse;
	width:50%;
	color:black;
	text-align:left;
	font-family:comic sans MS;
	
}
.a td,th{
	text-align:center;
}
.a th{
	background-color:#d96455;
}
h1{text-align:center;background-color:#606269;color:white;height:50px}
.b a h2:hover{

background-color:orange;
display:block;
border-radius:30px;
width:100px;
height:30px;
text-align:center
}
.b{margin-right:1300px;
margin-top:20px;
width:80px;
}
.img{ background-image: url('images/1.jpg');
background-repeat:no-repeat;
background-size:cover;
background-attachment:fixed;}
</style>
</head>
<body class="img">
<h1>FIXED APPOINMENTS</h1>
<div class="b">

<a href="appoinment.php"><h2>BACK</h2></a>
 </div>
<div align="center" style="background-color:#DDE3E2;width:500px;height:250Px;border-radius:10px;margin-left:430px;padding:10px">
<form name="form" method="post" onsubmit="return check()">

<table>
<tr><td>Date:</td>
 <td><input type="date"  name="date" style="width:250px;
	 border-radius:10px;
	 height:10px;
	 margin:10px;
	 padding:20px;
	 background-color:rgba(0,0,0,0.8);
	 color:white;
	 outline:none;
	 border:1px solid #5b80a4;
	 transition:0.5s;"></td></tr>
 <tr><td></td><td>	<input type="submit" name="submit"  value="Submit" style="background-color:rgba(0,0,0,0.6);
		color:white;
		outline:none;
		border-radius:30px;
		border:1px solid #5b80a4;
		margin:5px;
		height:10px;
		padding:20PX;
		width:100px;"></td></tr>
		
 </table>
 </div>
 </body>
 
 
 <?php
 session_start();
 include('dbcon.php'); 
 $d_id=$_SESSION['sid'];

 
 	
 if(isset($_POST["submit"]))
 {
	 $date=$_POST['date'];
	  $_SESSION["date"]=$date;
	  if(isset($_SESSION["date"]))
	  {
	  
	 header('location:appoinment_report.php');
 }
 }
 
 ?>
 <?php include("footer.php");?>
