<!--Author:Rahul Prasad
    Page Name:Consult.php
	-->

<?php include("header.php");?>
<?php include("doctor_header.php");  ?>



<?php
session_start();
include('dbcon.php'); 
if(isset($_session['pid']))
{
	echo $_session['pid'];
}
$pid=$_GET['pid'];

if (isset($_POST["submit"]))
{
		$date=$_POST['date'];
		$reason=$_POST['reason'];
		$medicine=$_POST['medicine'];
    	$comment=$_POST['comment'];
		$p_name=$_POST['p_name'];
		
    	
		
		
		
		
		$sql="insert into consult(p_id,date,p_name,reason,medicine,comment,status)values('$pid','$date','$p_name','$reason','$medicine','$comment','0')";
		$sql1="update app_req set status=3 where p_id=$pid";
		$res=$conn->query($sql);
		$res=$conn->query($sql1);
		
		if ($conn->query($sql) === TRUE) {
			header('location:appoinment_report.php');
			echo "Data Saved successfully";
			echo '<script> window.location="appoinment_report.php" </script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
		
		
		

}
?>




<title></title>
<head>
<link rel="stylesheet" type="text/css" href="css/textstyle.css">
<style>
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


</style>
</head>
<div class="b">

<a href="appoinment.php"><h2>BACK</h2></a>
 </div>

<div class="var"> 
<h1 style="color:white">MEDICAL RECORD</h1>
<form method="post">
<table>
<?php
	include('dbcon.php');
	$sql1="select patient_name from app_req where p_id=$pid";
	$re=$conn->query($sql1);
	foreach($re as $row)
	{
		$p_name=$row['patient_name'];
	}
	
	$sql2="select date from app_req where p_id=$pid";
	$re=$conn->query($sql2);
	foreach($re as $row)
	{
		$date=$row['date'];
	}
?>
<tr><td>Name:</td> <td><input type="text"  class="frm"value="<?php echo $p_name; ?>" name="p_name"/> </td></tr>
<tr><td>Date:</td> <td><input type="date"  class="frm" value="<?php echo $date; ?>" name="date"/> </td></tr>
 <tr><td>Reason:</td>
 <td>   <textarea class="frm" name="reason"></textarea></td></tr>

	
   <tr><td>Medicine:</td>
  <td>  <textarea name="medicine"class="frm" ></textarea></td></tr>
	
   <tr><td>Comments</td>
  <td>  <textarea name="comment" class="frm"></textarea></td></tr>
	
<tr><td></td><td>	<input type="submit" name="submit" class="frm-btn" value="Submit"></td></tr>
</table>	
  
</form>
</div>
<?php include("footer.php");?>