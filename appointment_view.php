<!-- Author Anju -->

<?php
session_start();
include('dbcon.php');
include("header.php");
include("patient_header.php");

$d_id=$_SESSION['d_id'];
//echo $d_id;
$p_id=$_SESSION['sid'];
//echo $p_id;
?>
<!DOCTYPE html>
<html>
<head><title>view</title>
<style>
	body{
	background-image: url(images/patient_home.jpg);
	background-size:cover;
	background-repeat:no-repeat;
	background-attachment:fixed;}
table{
	text-align:center;
	border-collapse:collapse;
	width:50%;
	color:white;
	text-align:left;
	font-family:comic sans MS;
	
}
td,th{
	text-align:center;
}
td{
	color:black;
}
th{
	background-color:#08034A ;
}
</style>
</head>
<body>
<center> <br>
<h1>APPOINTMENTS</h1> <br>	
<table border="">
<tr>
<th>DOCTOR-NAME</th>
<th>LOCATION</th>
<th>MOBILE NUMBER</th>
<th>DATE</th>
<th>REASON</th>
<th>STATUS</th>
</tr>

<?php
$sql="SELECT name,c_address,ph_no,app_req.date,app_req.reason,app_req.status  from d_registration INNER JOIN app_req WHERE d_registration.id=app_req.d_id ";

//echo $sql;
$res=$conn->query($sql);

if($res)
{
	
while($row=$res->fetch_assoc())
{
	$status=$row['status'];
	if($status==1)
	{
		$sta="Approved";
	}
	else
	{
		$sta="Pending";
	}
	echo "<tr><td>".$row["name"]."</td><td>".$row["c_address"]."</td><td>".$row["ph_no"]."</td><td>".$row["date"]."</td><td>".$row["reason"]."</td><td>".$sta."</td></tr>";
}
echo "</table>";
}
else{
	echo "0 result";
}

$conn-> close();
?>
</table> <br><br>
</body>
</html>

<?php include('footer.php'); ?>