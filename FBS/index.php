<!DOCTYPE html>
<html>
<head>
  <title>StudentFeedback</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
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
        <h1 >Rise Krishna Sai Prakasam Group Of Institutions <span style="color:green;font-weight:bold">(Autonomous)</span></h1> 
        <h2 align=center >Aproved by AICTE, Permanent Affliated to JNTUK, Kakinada, Accrediated by NBA and NACC with 'A'</h2>
    </div>
  </div>
</div>
<div class="body">
  <h1  align=center>Student Feedback System</h1>
  
</div>
<a  class="active" class ="admin" href="admin.php">Admin Login</a>
<br>
<br>
<form class="main-form" action="givefeedback.php" method="POST" align=center>
  <select id="branch" name="branch" required class="from control" style="text-align:center;">
    <option value>---Select Branch---</option>
    <option name="CSE" value="cse">CSE</option>
    <option name="ECE" value="ece">ECE</option>
    <option value="eee">EEE</option>
    <option value="mech">MECH</option>
    <option value="cse-aiml">CSE-AIML</option>
    <option value="cse-ds">CSE-DS</option>
  </select>
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
  <button type="submit" class="btn btn-primary"> Give Feedback</button>
</form>
<br>
<br>
<div class="mar">
  <marquee scrollamount="10" >Copyright © RISE Krishna Sai Groups - 2024 | For Technical Issue: Contact Dept. Of CSE </marquee>
</div>
</body>
</html>