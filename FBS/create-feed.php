<?php session_start();
if(empty($_SESSION['id'])):
  header('Location:admin.php');
endif;
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .field-container {
            margin-bottom: 10px; /* Adjust spacing as needed */
            color:white;
        }
        .field-container1 {
            margin-bottom: 10px; /* Adjust spacing as needed */
            color:white;
        }
        </style>
<script>
        // JavaScript function to dynamically add input fields
        function addFields(num) {
            var container = document.getElementById("container");
            container.innerHTML = ''; // Clear previous content
            for (var i = 0; i < num; i++) {
                container.appendChild(document.createTextNode("Subject " + (i + 1) + ": "));
                var inputSubject = document.createElement("input");
                inputSubject.type = "text";
                inputSubject.name = "subject[]"; // Use array notation to handle multiple inputs
                container.appendChild(inputSubject);

                container.appendChild(document.createTextNode("faculty_subject " + (i + 1) + ": "));
                var inputFaculty = document.createElement("input");
                inputFaculty.type = "text";
                inputFaculty.name = "faculty_subject[]"; // Use array notation to handle multiple inputs
                container.appendChild(inputFaculty);

                container.appendChild(document.createElement("br"));
            }
        }
        function addFields1(num) {
            var container = document.getElementById("container1");
            container.innerHTML = ''; // Clear previous content
            for (var i = 0; i < num; i++) {
              container.appendChild(document.createTextNode("Lab " + (i + 1) + ": "));
              var inputSubject = document.createElement("input");
              inputSubject.type = "text";
              inputSubject.name = "lab[]"; // Corrected naming
              container.appendChild(inputSubject);

              container.appendChild(document.createTextNode("faculty_lab " + (i + 1) + ": "));
              var inputFaculty = document.createElement("input");
              inputFaculty.type = "text";
              inputFaculty.name = "faculty_lab[]"; // Use array notation to handle multiple inputs
              container.appendChild(inputFaculty);

              container.appendChild(document.createElement("br"));
    }
}
// Call the addFields function when the page loads to generate initial input fields
    </script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
<?php include 'index.css'; ?>
<?php include 'admin.css'; ?>
</style>
<title>StudentFeedback</title>
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
  <li><a href="userprofile.php">View Feedback</a></li>
  <li><a href="deletefeed.php">Delete FeedBack</a></li>
  <li><a href="create-feed.php" style="background-color:#00215E;">Create Feedback</a></li> 
</ul>
<br>
<form class="create-feed" method="POST" action="feed-submit.php" align=center>
<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['num_subjects'])) {
            $num_fields = $_POST['num_subjects'];
        } else {
            // Default number of fields
            $num_fields = 1;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['num_labs'])) {
            $num_fields = $_POST['num_labs'];
        } else {
            // Default number of fields
            $num_fields = 1;
        }
        ?>
        
    <br>
    <br>
  <select id="year" required class="from control" name="year" style="text-align:center;">
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
  <input id="section" required class="from control" style="text-align:center;" type="number" name="sections" placeholder="Number Of Sections">
  <br>
  <br>
  <input type="number" id="num_subjects" name="num_subjects" placeholder="Enter number of Subjects" min="1" max="10" onchange="addFields(this.value)">
  <br>
  <br>
  <div id="container" style="color:white;"></div>
  <br>
  <input type="number" id="num_labs" name="num_labs" placeholder="Enter number of Labs" min="1" max="10" onchange="addFields1(this.value)">
  <br>
  <br>
  <div id="container1" style="color:white;"></div>
  <br>
<br>
        <input type="submit" style="background-color:#FFC55A;" value="Create Feedback">
</form>

</body>
</html>