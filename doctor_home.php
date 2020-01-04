<?php include("header.php");
include("doctor_header.php");
session_start();
?>
<h1 align="center" style="color:#5b80a4;margin-top:150px;">Welcome <?php if(isset($_SESSION["sname"])and isset($_SESSION["sid"])){
				echo $_SESSION["sname"];
$id=$_SESSION["sid"];				
			}?> </h1>
<style>
body{background-image: url('images/1.jpg');background-size:cover;background-repeat:no-repeat;background-attachment:fixed;}
</style>
<body>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</body>
<?php include("footer.php");?>