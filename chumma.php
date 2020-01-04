<?php 
if(isset($fname)){
				$fname=$_POST['fname'];
				$lname=$_POST['lname'];
				$gmail=$_POST['gmail'];
				$gender=$_POST['gender'];
				$status=$_POST['status'];
				
				$sq="update p_reg set f_name='$fname' and l_name='$lname'and email='$email'and gender='$gender'and status='$status'"; 
				$res=$conn->query($sq);
				echo $sq;
				if($res)
				{
					echo "<script> alert ('OK'); </script>";
				}
				else
				{
					echo "<script> alert ('error'); </script>";
				}	
}
?>