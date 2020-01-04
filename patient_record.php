<!--Author:ANJU
    
    -->

<?php
include("header.php");
include("patient_header.php");
?>

<html>
<head><title>appoinment</title>
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
	text-align:left;
}

th,td{
	text-align:center;
}
th{
		color:white;
	background-color:#293FAC;
}
</style>
</head>
<body background="images/services-2">
<ul>
<li>
	<b><a href="patient_appoinment.php">BACK</a></b>
</li>
</ul>
</body>

<?php
include('dbcon.php');

session_start();

echo '<br><br>';
echo '<center> <form method="POST"><table border="1"> ';
echo '<tr><th> REASON </th><th> MEDICINE </th><th> COMMENT </th>  </tr>';


$p_id=$_SESSION['sid'];		
$sql="SELECT reason,medicine,comment from consult where p_id='$p_id' ";
//echo $sql;
$res=$conn->query($sql);

if($res)
{
	foreach($res as $row)
	{
		echo '<tr> <td>'.$row["reason"].' </td><td>'.$row["medicine"].'</td> <td>'.$row["comment"].'</td></tr>';
	}
}
echo'</table>';	
echo '<br><br><br><br><br><br><br><br>';

include("footer.php");
?>
