<!--Author:joish
client-side validation
server-side validation

-->
<?php
session_start();
include('dbcon.php');
include("header.php");
include("patient_header.php");

$d_id=$_SESSION['d_id'];
$p_id=$_SESSION['sid'];
//echo $d_id;


if (isset($_POST['book']))
{
$name	=trim ($_POST['patient_name']);
$reason	=trim ($_POST['reason']);
$mobile	=trim ($_POST['mobile_number']);
$date	=trim ($_POST['date']);
if(empty($name))
 {
  $error = "please Enter a name";
  $code = 1;
 }
  else if(empty($reason))
 {
  $error = "please enter a reason";
  $code = 2;
 }
 else if(empty($mobile))
 {
  $error = "please enter a mobile number";
  $code = 3;
 }
 else if(empty($date))
 {
  $error = "please select a date";
  $code = 4;
 }
 else
 {	 


$sql="INSERT INTO app_req(d_id,p_id,patient_name,reason,date,contact,status) VALUES ($d_id,$p_id,'$name','$reason','$date',$mobile,0)";
$s=$conn->query($sql);
if($s==1)
		{
			echo '<script> alert("Booked"); window.location="appointment_view.php" </script>'; 
			
		}
		else
		{
			echo "failed".$sql;
			
		}
}
}
?>
<script>
function validate()
{
	var name=document.forms["booking"]["patient_name"].value;
	var reason=document.forms["booking"]["reason"].value;
	var mobile=document.forms["booking"]["mobile_number"].value;
	var date=document.forms["booking"]["date"].value;
	if(name=="")
	{
		alert("Name can't be blank");
		document.forms["booking"]["patient_name"].focus();
		return false;
	}
	if(reason=="")
	{
			alert("Enter a reason");
			document.forms["booking"]["reason"].focus();
			return false;
	}
	if(date=="")
	{
			alert("Enter a date");
			document.forms["booking"]["date"].focus();
			return false;
	}
	if(mobile=="")
	{
			alert("Enter a mobile number");
			document.forms["booking"]["mobile_number"].focus();
			return false;
	}
}
</script>

<html>
<head>
</head>
<style>
td{padding:20px;}
</style>
<body>
<center>
<div style="border:2px solid red;width:40%;padding:50px;margin:40px;"class="frm">
<h2 style="text-align:center;">APPOINTMENT BOOKING</h2>
<form method="POST" name="booking" onsubmit="return validate();">
<table>
<?php
$sql1="SELECT f_name FROM p_reg WHERE id=$p_id";
$re=$conn->query($sql1);
	foreach($re as $row)
	{
		$name=$row['f_name'];
	}
if(isset($error))
{
 ?>
    <tr>
    <td id="error" style="color:red; "><?php echo $error; ?></td>
    </tr>
    <?php
}
?>
<tr>
<td>
Patient Name:</td><td><input type="text" value="<?php echo $name; ?>" name="patient_name"  class="frm">
</td>
</tr>
<tr>
<td>
Reason:</td><td><input type="text" name="reason" class="frm">
</td>
</tr>
<tr>
<td>
Date:</td><td><input type="date" name="date" class="frm">
</td>
</tr>
<tr>
<td>
Mobile number:</td><td><input type="text" name="mobile_number" class="frm">
</td>
</tr>

<tr>
<td></td>
<td><input type="submit" name="book" value="Book Now" class="btn" class="frm">
</td>
</tr>
</table>
</form>
</div>
</center>
</body>
<?php include("footer.php");?>