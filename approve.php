<!-- author:Prince  -->

<style>
	h1{color: black;}
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
<!-- including header and databse connection -->
<?php include('header.php'); 
include('admin_header.php');
include('dbcon.php');
session_start();
echo '<style> 
td,th{ background-color:white
	color:black;
}
td{color:black;
text-align:center;}
body{
	background-image: url(images/patient_home.jpg);
	background-size:cover;
	background-repeat:no-repeat;
	background-attachment:fixed;
	color:white;
} 
	</style>';
$sql1="select username from login where status=0";
$res=$conn->query($sql1); 
echo '<center> <br><h1 style="color:red;"> Verify Doctors </h1><br><form method="POST"><table border="1"> ';
echo '<tr> <th> Name </th> <th> Email </th> <th> Qualification</th> <th> Gender </th> <th> Specialization</th>
<th>Clinic Address</th>
<th> Consulting Time</th> <th> Status </th></tr>';

//$sql2="select u_name,user_type from users where"
while($row=$res->fetch_assoc())
{
    $email=$row['username'];
	
	$sql2="select * from d_registration where  username='$email'";
	$res2=$conn->query($sql2);
	foreach($res2 as $row)
	{
		echo '<tr> <td>';
		echo $row['name'];
		echo '</td> <td>'.$row['email'].' </td>';	
		echo '<td>'.$row['qualification'].' </td>';		
		echo ' <td>'.$row['gender'].' </td> <td> </td>
		<td>'.$row['c_address'].'</td> <td>'.$row['c_timing'].'</td> ';
		echo '<td> 
		<select name="status">
			<option value="1"> Approve </option>
			<option value="2"> Denied </option>
		</select> </td> ';
		
		
		
		echo '<td><input type="submit" name="'.$row['id'].'" value="Approve">';
		
		echo '</td> </tr>';
		
		
		
	}
	
	foreach($res2 as $row)
		{
			if(isset($_POST[$row['id']]) and $row['id'])
			{
			$s="update login set status=1 where username='".$row['username']."'";
			$result=$conn->query($s);
			if($result)
			{
				echo '<script> alert("Approved"); </script>'; 
				header("location:approve.php");
				
			}
			else
			{
				echo '<script> alert("error"); </script>';
			}			
			}

		}
}

echo '</table> </form></center>';		



$sql1="select username from login where status=0";
$res=$conn->query($sql1); 
echo '<center> <br><h1 style="color:red;"> Verify Patient </h1><br><form method="POST"><table border="1"> ';
echo '<tr> <th> First Name </th> <th> Last Name </th> <th> Email </th> <th> Gender </th> <th> Status </th> </tr>';

//$sql2="select u_name,user_type from users where"
while($row=$res->fetch_assoc())
{
    $email=$row['username'];
	
	$sql2="select * from p_reg where username='$email'";
	echo "$sql2";
	$res2=$conn->query($sql2);
	// PRINT DATA FROM TABLE 
	foreach($res2 as $row)
	{
		echo '<tr> <td>'.$row['f_name'].'</td>';
		echo '<td>'.$row['l_name'].'</td>';	
		echo '<td>'.$row['email'].'</td>';		
		echo '<td>'.$row['gender'].' </td> ';	
		echo '<td> 
		<select name="status">
			<option value="1"> Approve </option>
			<option value="2"> Denied </option>
		</select> </td> ';
		
		
		echo '<td><input type="submit" name="'.$row['id'].'" value="CONFIRM">';
		
		echo '</td> </tr>';
		
		
		
	}
	
	foreach($res2 as $row)
		{
			if(isset($_POST[$row['id']]) and $row['id'])
			{
			$s="update login set status=1 where username='".$row['username']."'";
			$result=$conn->query($s);
			if($result)
			{
				echo '<script> alert("Approved"); </script>'; 
				header("location:approve.php");
				
			}
			else
			{
				echo '<script> alert("error"); </script>';
			}			
			}

		}
}

echo '</table> </form></center>';		
	
?>

<br>
<br>


<?php include("footer.php");?>