<?php 
include("header.php");
include("doctor_header.php");
include('dbcon.php');
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
 body{background-image: url('images/1.jpg');background-size:cover;background-repeat:no-repeat;background-attachment:fixed;}
</style>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


	<center>
		<div style="height:400px" class="log">
		<form name="create"
			  method="POST"
			  action="";
			  onsubmit=""	>
<div class="head">
	<h2 style="text-align:center;color:white">PROFILE</h2>
</div>
	

<?php
if(isset($_SESSION["sid"])){
$id=$_SESSION["sid"];
//echo $id;


$sql="select * from d_registration where id='$id'";
//echo $sql;
$res=$conn->query($sql);
if($res)
{
	foreach($res as $row)
	{
		?>
		<table style="padding:20px;" >
			<tr>
				<td><b>NAME:</b></td>
				<td style="color:white;">
<?php
	$sq="select name from  d_registration where id='$id'";
						$re=$conn->query($sq);


		echo $row["name"];?>
	</td></tr>	
	<tr>
				<td><b>EMAIL:</b></td>
				<td><?php
						$sq="select email from d_registration where id='$id'";
						$re=$conn->query($sql);
						echo $row["email"];

					?>
				</td>
		    </tr>
			<tr>
				<td><b>PHONE:</b></td>
				<td><?php
						$sq="select ph_no from d_registration where id='$id'";
						$re=$conn->query($sql);
						echo $row["ph_no"];

					?>
				</td>
		    </tr>
	<tr>
				<td><b>QUALIFICATION:</b></td>
				<td><?php
						$sq="select qualification from d_registration where id='$id'";
						$re=$conn->query($sql);
						echo $row["qualification"];

					?>
				</td>
		    </tr>
	<tr>
				<td><b>GENDER:</b></td>
				<td><?php
						$sq="select gender from d_registration where id='$id'";
						$re=$conn->query($sql);
						echo $row["gender"];

					?>
				</td>
		    </tr>
	<tr>
				<td><b>ADDRESS:</b></td>
				<td><?php
						$sq="select c_address from d_registration where id='$id'";
						$re=$conn->query($sql);
						echo $row["c_address"];

					?>
				</td>
		    </tr>
			<tr>
				<td><b>USERNAME:</b></td>
				<td><?php
						$sq="select username from d_registration where id='$id'";
						$re=$conn->query($sql);
						echo $row["username"];

					?>
				</td>
		    </tr>
			
			</table>
	</form>
</div>	
<?php		
}
}

}
?>
<?php include("footer.php");?>