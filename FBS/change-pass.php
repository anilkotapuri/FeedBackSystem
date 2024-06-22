<?php
include("database connection.php");
if(!empty($_POST['save'])){
	$op=$_POST['op'];
	$np=$_POST['np'];
	$cp=$_POST['cp'];
	if($np==$cp){
		$query="select * from login where pass='$op'";
		$result=mysqli_query($con,$query);
		$count=mysqli_num_rows($result);
		if($count>0){
			$query="update login set pass='$np'";
			mysqli_query($con,$query);
			echo "<script>
			alert('Password Updated Sucessfully');
			window.location.href='admin.php';
			</script>";
		}else{
			echo "<script>
			alert('Old Password Does not Match');
			window.location.href='userprofile.php';
			</script>";
		}
	}
	else{
		echo "<script>
			alert('New Password and Confirm Password Does not Match');
			window.location.href='change-pass.php';
			</script>";
	}
}
?>


<!DOCTYPE html>
<html>
<head>
<title>StudentFeedback</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
<?php include 'admin.css'; ?>
<?php include 'index.css'; ?>
</style>
</head>
<body>
<div class="header">
  <a href="index.php" class="logo" src="logo.png">
    <img src="logo.png" width=100px height=100px>
  </a>
  <div class="header-right">
    <div class="clg-det">
        <h1 >Rise Krishna Sai Prakasam Group Of Institutions <span style="color:green;font-weight:bold">( Autonomous )</span></h1> 
        <h2 align=center >Aproved by AICTE, Permanent Affliated to JNTUK, Kakinada, Accrediated by NBA and NACC with 'A'</h2>
    </div>
  </div>
</div>
<div class="body">
  <h1  align=center>Change Admin Password</h1>
</div>
<div class="change">
    <form   method="post">
        <input type="text" id="op" name="op" required class="from control" placeholder="Enter OldPasword">
        <br>
        <br>
        <input type="text" id="np" name="np" required class="from control" placeholder="Enter New Pasword" >
        <br>
        <br>
		<input type="text" id="cp" name="cp" required class="from control" placeholder="Confirm Pasword" >
        <br>
        <br>
        <input type="submit" style="background-color:#FFC55A;" name="save" class="savebtn" value="Update">
</div>
<br>
<br>
<div class="mar">
  <marquee scrollamount="10" >Copyright © RISE Krishna Sai Groups - 2024 | For Technical Issue: Contact Dept. Of CSE </marquee>
</div>

</body>
</html>
