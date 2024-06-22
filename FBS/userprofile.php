<?php 
session_start();
if(empty($_SESSION['id'])) {
  header('Location:admin.php');
  exit; // It's a good practice to add an exit after header redirection to stop the script execution
}

$user = $_SESSION['user'];

if ($user == 'admin') {
  header("Location: adminpro.php");
  exit;
}

// If it's not admin, continue with the rest of the page
?>
<!DOCTYPE html>
<html>
<head>
<title>StudentFeedback</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
<?php include 'index.css'; ?>
<?php include 'admin.css'; ?>
</style>
</head>
<body>
<div class="header">
  <a href="index.php" class="logo" src="logo.png">
    <img src="logo.png" width=100px height=100px>
  </a>
  <div class="header-right">
    <div class="clg-det">
        <h1 >Rise Krishna Sai Prakasam Group Of Institutions <span style="color:green;font-weight:bold">(Autonomous)</span></h1> 
        <h2 align=center >Aproved by AICTE, Permanent Affliated to JNTUK, Kakinada, Accrediated by NBA and NACC with 'A'</h2>
    </div>
  </div>
</div>
<ul>
  <li><a href="logout.php">Logout</a></li>
  <li><a href="change-pass.php">Change Password</a></li>
  <li><a href="userprofile.php" style="background-color:#00215E;">View Feedback</a></li>
  <li><a href="deletefeed.php">Delete Feedback</a></li>
  <li><a href="create-feed.php">Create Feedback</a></li> 
  
</ul>
<h1 style="color:white;"><?php $user=$_SESSION['user'];
if($user=='CSE')
{
  echo 'Welcome To Department Of CSE';
  $conX = mysqli_connect("localhost","root","","cse");
}
else if ($user== 'ECE')
{
  echo 'Welcome To Department Of ECE';
  $conX = mysqli_connect("localhost","root","","ece");
}
else if ($user== 'admin')
{
  header("Location: adminpro.php");
  die();
}
else if($user=='EEE')
{
  echo 'Welcome To Department Of EEE';
  $conX = mysqli_connect("localhost","root","","eee");
}
else if($user=='MECH')
{
  echo 'Welcome To Department Of MECH';
  $conX = mysqli_connect("localhost","root","","mech");
}
else if($user=='CSE-AIML')
{
  echo 'Welcome To Department Of CSE-AIML';
  $conX = mysqli_connect("localhost","root","","cse-aiml");
}
else if($user=='CSE-DS')
{
  echo 'Welcome To Department Of CSE-DS';
  $conX = mysqli_connect("localhost","root","","cse-ds");
}
?></h1>
<form class="main-form" action="viewfeed.php" method="POST" align=center>
<?php 


echo "<input type='hidden' name='user' value='$user'>";
?>
    <br>
    <br>
  <select id="year" name="year" required class="from control" style="text-align:center;">
    <option value>---Select year---</option>
    <option value="I">I</option>
    <option value="II">II</option>
    <option value="III">III</option>
    <option value="IV">IV</option>
  </select>
  <br>
  <br>
  <select id="sem" name="sem" required class="from control" style="text-align:center;">
    <option value>---Select Semester---</option>
    <option value="I">I</option>
    <option value="II">II</option>
  </select>
  <br>
  <br>
  <select id="section" name="section" required class="from control" style="text-align:center;">
    <option value>---Select Section---</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
  </select>
  <br>
  <br>
  <button type="submit" class="btn btn-primary"> View Feedback</button>
</form>
<br>
<div class="mar">
  <marquee scrollamount="10" >Copyright © RISE Krishna Sai Groups - 2024 | For Technical Issue: Contact Dept. Of CSE </marquee>
</div>
</body>
</html>