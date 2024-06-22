<?php
// Assuming $conn is your database connection
$branch = $_POST['branch'];
$year = $_POST['year'];
$sem = $_POST['sem'];
$section = $_POST['section'];
$conn = mysqli_connect("localhost", "root", "", $branch);

// Check if the tables exist
$tableName_sub = $year . '_' . $sem . '_feed_sub_' . $section;
$tableName_lab = $year . '_' . $sem . '_feed_lab_' . $section;

// Query to check if subject feedback table exists
$sql_sub = "SHOW TABLES LIKE '$tableName_sub'";
$result_sub = mysqli_query($conn, $sql_sub);

// Query to check if lab feedback table exists
$sql_lab = "SHOW TABLES LIKE '$tableName_lab'";
$result_lab = mysqli_query($conn, $sql_lab);

// Check if both tables exist
if (mysqli_num_rows($result_sub) === 0 || mysqli_num_rows($result_lab) === 0) {
    // Tables do not exist, show alert and redirect
    echo "<script>alert('Feedback tables not yet created for the selected branch, year, semester, and section. Please create the feedback tables first.');";
    echo "window.location.href = 'index.php';</script>";
    exit; // Exit the script
}

?>

<!DOCTYPE html>
<html>
<head>
<title>StudentFeedback</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
<?php include 'index.css'; ?>
<?php include 'give.css'; ?>

/* Add custom CSS for table */
.table-container table {
    width: 70%; /* Adjust the width as needed */
    border-collapse: collapse;
    margin: 20px auto; /* Center the table horizontally */
}

.table-container th, .table-container td {
    border: 1px solid #ddd;
    padding: 15px; /* Increase padding for taller rows */
    text-align: left;
    font-size: 15px; /* Increase font size for better readability */
}
.table-container select{
  width: 80px;
  height:20px;
}

.table-container th {
    color:yellow;
}

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
  <?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year=$_POST['year'];
    $sem=$_POST['sem'];
    $section=$_POST['section'];
    $branch=$_POST['branch'];
    $conY = $con = mysqli_connect("localhost","root","","$branch");
    $tableName = $year . "_" . $sem . "_details"; // Define $tableName here
  }
?>
<?php
$count_subject = 1;
$count_lab = 1;
?>

<div class="title">
  <h1 align="center"><?php echo strtoupper("$branch").' '.$year."-Year ".$sem."-Sem"?></h1>
  <h2 align="center"><?php echo "Section- ".$section?></h2>
</div>
<!-- Displaying data -->
<div class="data-dis" align="center">
<?php
// Fetching data from the table
$sql = "SELECT * FROM $tableName";
$result = $conY->query($sql);

// Checking if there are any results
if ($result->num_rows > 0) {
    // Displaying table inside a container
    echo "<div class='table-container'>";
    echo "<table>";
    // Outputting data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        // Skipping 'subject' and 'lab' columns
        if ($row["type"] === "Subject") {
            echo "<td>Subject-" . $count_subject . "</td>";
            $count_subject++;
        } elseif ($row["type"] === "Lab") {
            echo "<td>Lab-" . $count_lab . "</td>";
            $count_lab++;
        }
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["faculty"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>"; // Close table container
} else {
    echo "0 results";
}
// Freeing result set
$result->free_result();
?>
</div>
<br>
<div class="feed-info">
<ul align="center">
  <li style="color:green;"><b>5-Excellent</b></li>
  <li style="color:lightgreen;"><b>4-Very Good</b></li>
  <li style="color:yellow;"><b>3-Good</b></li>
  <li style="color:lightyellow;"><b>2-Fair</b></li>
  <li style="color:red;"><b>1-Poor</b></li>  
</ul>
</div>
<h2 align="center">Feedback on Subjects</h2>
<div class="parameters_sub">
<?php

// Fetch column names from the table
$tableName1 = $year . '_' . $sem . '_feed_sub_' . $section;
$sql = "SHOW COLUMNS FROM $tableName1";
$result = $conY->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
  // Display table inside a container
  echo "<div class='table-container'>";
  echo "<form method='post' action='process_feedback.php'>"; // Form tag added
  echo "<input type='hidden' name='tableName' value='$tableName1'>"; // Inserted
  echo "<input type='hidden' name='branch' value='$branch'>"; // Inserted
  echo "<input type='hidden' name='year' value='$year'>"; // Inserted
  echo "<input type='hidden' name='sem' value='$sem'>"; // Inserted
  echo "<input type='hidden' name='section' value='$section'>"; // Inserted
  echo "<table>";
  echo "<tr>";
  // Output column names
  $parametersCol = ""; // Store parameter column name
  while ($row = $result->fetch_assoc()) {
    $fieldName = $row["Field"];
    if ($fieldName !== "count") { // Exclude the count column
        echo "<th>" . $fieldName . "</th>";
    }
    if ($fieldName == "Parameters") {
      $parametersCol = $fieldName;
    }
  }
  echo "</tr>";

  // Fetch data from the table
  $dataSql = "SELECT * FROM $tableName1";
  $dataResult = $conY->query($dataSql);

  // Output data of each row
  $rowCount = $dataResult->num_rows;
  $currentRow = 0;
  while ($rowData = $dataResult->fetch_assoc()) {
    $currentRow++;
    if ($currentRow === $rowCount) {
        // Skip the last row
        continue;
    }
    echo "<tr>";
    foreach ($rowData as $key => $value) {
      if ($key !== "count") { // Exclude the count column
        if ($key != $parametersCol) {
          // Display selection options for non-parameter columns
          echo "<td><select name='feedback[$currentRow][$key]' required>"; // Modified name attribute and added 'required' attribute
          echo "<option value=''></option>"; // Blank default value
          for ($i = 5; $i >= 1; $i--) {
            $optionValue = $i * 20;
            echo "<option value='$optionValue'>$i</option>";
          }
          echo "</select></td>";
        } else {
          // Display original data for the parameter column without any form element
          echo "<td>" . $value . "</td>";
          // Add parameters data to the array
          echo "<input type='hidden' name='feedback[$currentRow][$key]' value='$value'>";
        }
      }
    }
    echo "</tr>";
  }
  echo "</table>";
  echo "</div>"; // Close table container
} else {
  echo "0 results";
}
// Free result set
$result->free_result();
?>
</div>
<h2 align="center">Feedback on Labs</h2>
</div>
<div style="color:white;" class="parameters_lab">
<?php
// Fetch column names from the table
$tableName1 = $year . '_' . $sem . '_feed_lab_' . $section;
$sql = "SHOW COLUMNS FROM $tableName1";
$result = $conY->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
  // Display table inside a container
  echo "<div class='table-container'>";
  echo "<form method='post' action='process_feedback.php'>"; // Form tag added
  echo "<input type='hidden' name='tableName' value='$tableName1'>"; // Inserted
  echo "<input type='hidden' name='branch' value='$branch'>"; // Inserted
  echo "<input type='hidden' name='year' value='$year'>"; // Inserted
  echo "<input type='hidden' name='sem' value='$sem'>"; // Inserted
  echo "<input type='hidden' name='section' value='$section'>"; // Inserted
  echo "<table>";
  echo "<tr>";
  // Output column names
  $parametersCol = ""; // Store parameter column name
  while ($row = $result->fetch_assoc()) {
    $fieldName = $row["Field"];
    if ($fieldName !== "count") { // Exclude the count column
        echo "<th>" . $fieldName . "</th>";
    }
    if ($fieldName == "parameters") {
      $parametersCol = $fieldName;
    }
  }
  echo "</tr>";
  // Fetch data from the table
  $dataSql = "SELECT * FROM $tableName1";
  $dataResult = $conY->query($dataSql);

  // Output data of each row
  $rowCount = $dataResult->num_rows;
  $currentRow = 0;
  while ($rowData = $dataResult->fetch_assoc()) {
    $currentRow++;
    if ($currentRow === $rowCount) {
        // Skip the last row
        continue;
    }
    echo "<tr>";
    foreach ($rowData as $key => $value) {
      if ($key !== "count") { // Exclude the count column
        if ($key != $parametersCol) {
          // Display selection options for non-parameter columns
          echo "<td><select name='lab_feedback[$currentRow][$key]' required>"; // Modified name attribute and added 'required' attribute
          echo "<option value=''></option>"; // Blank default value
          $options = array("Yes" => 100, "Moderate" => 50, "No" => 0);
          foreach ($options as $option => $optionValue) {
              echo "<option value='$optionValue'>$option</option>";
          }
          echo "</select></td>";
        } else {
          // Display original data for the parameter column without any form element
          echo "<td>" . $value . "</td>";
          // Add parameters data to the array
          echo "<input type='hidden' name='lab_feedback[$currentRow][$key]' value='$value'>";
        }
      }
    }
    echo "</tr>";
  }
  echo "</table>";
  echo "</div>"; // Close table container
} else {
  echo "0 results";
}
// Free result set
$result->free_result();
?>
</div>
<!-- Single submit button for both forms -->
<div align="center">
    <input class="submit" type='submit' value='Submit Feedback'>
</div>
<br>
<br>
<div class="mar">
  <marquee scrollamount="10" style="color:black;" >Copyright © RISE Krishna Sai Groups - 2024 | For Technical Issue: Contact Dept. Of CSE </marquee>
</div>
</body>
</html>
