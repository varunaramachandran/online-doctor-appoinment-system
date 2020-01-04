<!--Author:Rahul Prasad
    Page Name:Appoinment.php
	-->
<style>


table{align:center;
	margin-left:300px;
	margin-top:60px;
	margin-bottom:60px;
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
.img{ background-image: url('images/1.jpg');
background-repeat:no-repeat;
background-size:cover;
background-attachment:fixed;}
</style>
<body class="img">
</body>
<?php include("header.php");
include("doctor_header.php");  

session_start();
 include('dbcon.php'); 
 $d_id=$_SESSION['sid'];
if(isset($_SESSION["date"]))
{
	
    $date=$_SESSION['date'];
	 $sql="select *from app_req where date='$date' and d_id='$d_id' and status=1";
	    $res=$conn->query($sql);
		

if($res)
{
if($res->num_rows > 0)
{
	echo'<table class="a" border="" align="center">';
	echo "<tr><th>NAME</th><th>REASON</th><th>CONSULT</th><th>VIEW MEDICAL RECORD</th></tr>";
while($row=$res->fetch_assoc())
	
{
	$pid=$row["p_id"];
	
	
	
	    echo "<tr><td>".$row["patient_name"]."</td><td>".$row["reason"]."</td>"; 
		echo '<td> <a href="consult.php?pid='.$pid.'"><input type="button" value="CONSULT" onclick="this.disabled=disabled;this.form.submit();"> </a>';
		echo '<td> <a href="view_record.php?pid='.$pid.'"><input type="button"  value="View Med-Record"> </a></tr>';	
	
}


echo "</table>";

	
	

}
else{
	echo "<h1 style='color:black;align:center'>THERE IS NO APPOINTMENTS TODAY</h1>";
}
}




$conn-> close();
	}



?>

<?php include("footer.php");?>