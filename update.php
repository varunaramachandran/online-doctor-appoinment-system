<?php
	include('dbcon.php'); 
	include('header.php');
	include('admin_header.php');
?>
<style>
	table
	{
		text-align:center;
		border-collapse:collapse;
		width:50%;
		text-align:left;
	}
	td,input[type="button"]
	{
		color:black;
		text-align:center;
		text-align:center;
	}
	th{
		color:white;
		background-color:#293FAC;
		padding:5px;
	}
	h1
	{
		color:black;
		text-align: center;
	}
</style>
<br><br><br><br>	<h1 > EDIT DETAILS </h1> <br>
<?php
	session_start();
	//$id=$_GET['id'];
	$_session['id']=$id;

//echo $id;

if(isset($_POST['update']))
{
	
	if(isset($_POST['name']) and isset($_POST['qualification']) and isset($_POST['address']) and isset($_POST['email']) and isset($_POST['gender']) and isset($_POST['spec']) and isset($_POST['time']))
	{
		$name=$_POST['name'];
		$qualification=$_POST['qualification'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$gender=$_POST['gender'];
		$spec=$_POST['spec'];
		$time=$_POST['time'];
		$sql="update d_registration set name='$name',email='$email',qualification='$qualification',gender='$gender',spec='$spec',c_address='$address',c_timing='$time'";
		$res=$conn->query($sql);
		if($res)
		{
			echo "<script> alert('UPDATED'".$name."'Details'); window.location='users.php'; </script>";
		}
		else
		{
			echo "error";
		}

	}
}


 
$sql2="select * from d_registration where id='$id' ";
	$res2=$conn->query($sql2);
	echo '<center><form method="post"><table border="">';
	echo "<tr> <th> Name </th> <th> Email </th> <th> Qualification </th> <th> Gender </th> <th> Speciliazation</th><th> Address </th> <th> Time </th> <td></tr>";
	foreach($res2 as $row)
	{
		echo '<tr> 
		<td> <input type="text" name="name" value="'.$row['name'].'"/></td>
		<td> <input type="text" name="email" value="'.$row['email'].'"/></td>	
		<td> <input type="text" name="qualification" value="'.$row['qualification'].'"/> </td>
		<td> <input type="text" name="gender" value="'.$row['gender'].'"/></td>
		<td> <input type="text" name="spec" value="'.$row['spec'].'"/> </td>
		<td> <input type="text" name="address" value="'.$row['c_address'].'"/></td> 
		<td> <input type="text" name="time" value="'.$row['c_timing'].'"/></td> 	
		<td> <input type="submit" name="update" value="UPDATE"> </td> </tr>';

	}
	echo '</table><br><br>';
	
	echo '<input type="submit" name="sub" value="delete">';
?>



