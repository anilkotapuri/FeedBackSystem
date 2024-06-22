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
  <h1  align=center>Student Feedback System</h1>
</div>
<div class="login">
    <form  action="config.php" method="post">
        <input type="text" id="user" name="user" required class="from control" placeholder="Enter UserName" name="user">
        <br>
        <br>
        <input type="password" id="pass" name="pass" required class="from control" placeholder="Enter Pasword" name="pass">
        <br>
        <br>
        <button type="submit" name="sub" id="btn"> Login</button>
</div>
<br>
<br>
<div class="mar">
  <marquee scrollamount="10" >Copyright © RISE Krishna Sai Groups - 2024 | For Technical Issue: Contact Dept. Of CSE </marquee>
</div>

</body>
</html>
