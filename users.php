<!-- author:Prince  -->

<style>
	h1{color: black;}
	table{
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
body{
	background-image: url(images/patient_home.jpg);
	background-size:cover;
	background-repeat:no-repeat;
	background-attachment:fixed;
	color:white;
}
</style>
<!-- including header and databse connection -->
<?php include('header.php'); 
include('admin_header.php');
include('dbcon.php');
session_start();

$sql1="select username from login where status=1";
$res=$conn->query($sql1); 
echo '<center> <br><h1 style="color:black;"> Doctor Details </h1><br><form method="POST"><table border="2"> ';
echo '<tr> <th> </th><th> Name </th> <th> Email </th> <th> Qualification</th> <th> Gender </th> <th> Specialization </th>
<th>Clinic Address</th>
<th> Consulting Time</th><th></th> </tr>';

//$sql2="select u_name,user_type from users where"
foreach ($res as $row)
{
	$email=$row['username'];
	$sql2="select * from d_registration where username='$email' ";
	$res2=$conn->query($sql2);
	foreach($res2 as $row)
	{
		echo '<tr> 
		<td> <input type="hidden" name="id" value="'.$row['id'].'"/></td>
		<td> '.$row['name'].'</td>
		<td> '.$row['email'].'</td>	
		<td> '.$row['qualification'].' </td>
		<td> '.$row['gender'].'</td>
		<td> '.$row['spec'].' </td>
		<td> '.$row['c_address'].'</td> 
		<td> '.$row['c_timing'].'</td> 	
		<td> <a href=""> <input type="button" value="UPDATE"> </a></td> </tr>';
		

		if(isset($_POST[$row['id']]))
		{
			if($_POST[$row['id']]==$_POST['id'])
			{
				$id=$_POST['id'];
				$name=$_POST['name'];
    			echo $id;
			}
			
		}
		
		
	}
	
}

echo '</table> </form></center>';		



$sql1="select username,status from login where status=1";
$res=$conn->query($sql1); 
echo '<center> <br><h1 style="color:black;"> Patient Details </h1><br><form method="POST"><table border="1"> ';
echo '<tr> <th> First Name </th> <th> Last Name </th> <th> Email </th> <th> Gender </th> <th> Status </th><th> </th> </tr>';

//$sql2="select u_name,user_type from users where"
foreach ($res as $row)
{
    $uname=$row['username'];
    $status=$row['status'];
	
	$sql2="select * from p_reg where username='$uname' ";
	$res2=$conn->query($sql2);
	foreach($res2 as $row)
	{
		echo '<tr> <td> <input type="text" name="fname" value="'.$row['f_name'].'"/></td>';
		echo '<td> <input type="text" name="lname" value="'.$row['l_name'].'"/></td>';	
		echo '<td> <input type="text" name="email" value="'.$row['email'].'"/></td>';		
		echo '<td> <input type="text" name="gender" value="'.$row['gender'].'"/> </td> ';	
		echo '<td> <input type="text" name="status" value="'.$status.'"/> </td> ';
		
		echo '<td><input type="submit" name="'.$row['id'].'" value="UPDATE">';
		
		echo '</td> </tr>';
		
		if(isset($_POST[$row['id']]) and $row['id'])
		{
			$fname=$_POST['fname'];
			$pid=$row['id'];
			$lname=$_POST['lname'];
			$email=$_POST['email'];
			$gender=$_POST['gender'];
			$status=$_POST['status'];
			if(isset($fname) and isset($lname)and isset($email)and isset($gender)and isset($status))
			{
				$sql="update p_reg set f_name='$fname',l_name='$lname',email='$email',gender='$gender',status='$status' where id='$pid'";
				$sql2="update login set status='$status' where username='".$row['username']."'";
				$res=$conn->query($sql);
				$res2=$conn->query($sql2);
				if($res and $res2)
				{
					//echo '<script> alert("'.$fname.$lname.' updated"); window.location="users.php"; </script>';
				}
			}	
						
		}
		
	}
	
}

echo '</table> </form></center>';		
	
?>

<br>
<br>


<?php include("footer.php");?>