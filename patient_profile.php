<!---Author:Joish

-->
<?php 
include('header.php');
 include('dbcon.php');
include("patient_header.php");
 session_start();
 ?>   

<!DOCTYPE html>
<head>

	<title>PROFILE</title>
<style>
*{ margin:0px;
padding:0px;}
td
{padding:10px;
color:white;
 }
 body{
	background-image: url(images/patient_home.jpg);
	background-size:cover;
	background-repeat:no-repeat;
	background-attachment:fixed;}
</style>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<br><br><br><br><br>
	<center>
		<div style="height:250px"class="log">
		<form name="create"
			  method="POST"
			  action="";
			  onsubmit=""	>
<div class="head">
		<h2 style="text-align:center;color:white">PROFILE</h2>
</div>
		<?php if(isset($_SESSION["sname"])and isset($_SESSION["sid"]))
{
				//echo $_SESSION["sname"];
				$u_id=$_SESSION["sid"];				
			}?>
<?php

$sql="select * from p_reg where id=$u_id";
$res=$conn->query($sql);

if($res)
{
	foreach($res as $row)
	{
?>

<table style="padding:20px;" >
			<tr>
				<td><b>FISRT NAME :</b></td>
				<td>
					<?php
						$sql="select f_name from  p_reg";
						$res=$conn->query($sql);
						echo $row["f_name"];
					?>
				</td>
			</tr>
			<tr>
				<td><b>LAST NAME :</b></td>
				<td>
					<?php
						$sql="select l_name from p_reg";
						$res=$conn->query($sql);
						echo $row["l_name"];
					?>
				</td>
			</tr>
            
		    <tr>
				<td><b>EMAIL:</b></td>
				<td><?php
						$sql="select email from  p_reg";
						$res=$conn->query($sql);
						echo $row["email"];

					?>
				</td>
		    </tr>
			<tr>
				<td><b>GENDER :</b></td>
				<td><?php
						$sql="select gender from  p_reg";
						$res=$conn->query($sql);
						echo $row["gender"];

					?>
				</td>
		    </tr>
			
			
		</table>
<?php
}}
?>
		</form>
		</div>
	</center>
</body>
<br><br><br><br><br><br>
 <?php
include('footer.php');
?>