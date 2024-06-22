<?php
// Assuming $conn is your database connection
$user = $_POST['user'];
$year = $_POST['year'];
$sem = $_POST['sem'];
$section = $_POST['section'];
if($user=='CSE')
{
  $conn = mysqli_connect("localhost","root","","cse");
}
else if ($user== 'ECE')
{
  $conn = mysqli_connect("localhost","root","","ece");
}
else if($user=='EEE')
{
  $conn = mysqli_connect("localhost","root","","eee");
}
else if($user=='MECH')
{
  $conn = mysqli_connect("localhost","root","","mech");
}
else if($user=='CSE-AIML')
{
  $conn = mysqli_connect("localhost","root","","cse-aiml");
}
else if($user=='CSE-DS')
{
  $conn = mysqli_connect("localhost","root","","cse-ds");
}

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
    echo "window.location.href = 'userprofile.php';</script>";
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
    $tableName = $year . "_" . $sem . "_details"; // Define $tableName here
  }
?>
<?php
$count_subject = 1;
$count_lab = 1;
?>

<div class="title">
  <h1 align="center"><?php echo $user.' '.$year."-Year ".$sem."-Sem Section-".$section?></h1>
</div>
<!-- Displaying data -->
<div class="data-dis" align="center">
<?php
// Fetching data from the table
$sql = "SELECT * FROM $tableName";
$result = $conn->query($sql);

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
            echo "<td>subject-" . $count_subject . "</td>";
            $count_subject++;
        } elseif ($row["type"] === "Lab") {
            echo "<td>lab-" . $count_lab . "</td>";
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
<hr>
<!-- Display data from tableName1 -->
<div class="title">
  <h1 align="center"> Feedback Collected on Subjects</h1>
</div>
<?php
$tableName1 = $year . '_' . $sem . '_feed_sub_' . $section;
$sql_cols = "SHOW COLUMNS FROM $tableName1";
$result_cols = $conn->query($sql_cols);
// Checking if there are any columns
if ($result_cols->num_rows > 0) {
    // Displaying table inside a container
    echo "<div class='table-container'>";
    echo "<table>";
    // Outputting column names
    echo "<tr>";
    while ($row = $result_cols->fetch_assoc()) {
        // Skip the 'count' column
        if ($row["Field"] === "count") {
            continue;
        }
        echo "<th>" . $row["Field"] . "</th>";
    }
    echo "</tr>";
    // Fetching data from the table
$sql_data = "SELECT * FROM $tableName1";
$result_data = $conn->query($sql_data);
$rowCount = $result_data->num_rows;
$currentRow = 0;

// Define a variable to store the first row value of the 'count' column
$firstCountValue = null;

// Outputting data of each row
while ($row = $result_data->fetch_assoc()) {
    $currentRow++;
    if ($currentRow === $rowCount) {
        // Skip the last row
        continue;
    }
    echo "<tr>";
    foreach ($row as $key => $value) {
        // Skip the 'count' column
        if ($key === "count") {
            // Store the value of the 'count' column in the first row
            if ($currentRow === 1 && $firstCountValue === null) {
                $firstCountValue = $value;
            }
            continue;
        }
        // Format decimal values up to two digits after the decimal point
        if (is_numeric($value) && strpos($value, '.') !== false) {
            $value = number_format($value, 2);
        }
        echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
// Now $firstCountValue contains the value of the 'count' column in the first row
    echo "</table>";
    echo "</div>"; // Close table container
} else {
    echo "0 results";
}

// Freeing result sets
$result_cols->free_result();
$result_data->free_result();
?>
<?php
// Fetching data from the table
$sql_data = "SELECT * FROM $tableName1";
$result_data = $conn->query($sql_data);
$rowCount = $result_data->num_rows;
$currentRow = 0;

// Define an array to store the sums of each subject column
$subjectSums = array();

// Outputting data of each row
while ($row = $result_data->fetch_assoc()) {
    $currentRow++;
    if ($currentRow === $rowCount) {
        // Skip the last row
        continue;
    }
    foreach ($row as $key => $value) {
        // Skip the 'count' column
        if ($key === "count") {
            continue;
        }
        // Check if the column is a subject column
        if (strpos($key, 'subject') !== false) {
            // Extract the subject number from the column name
            $subjectNumber = str_replace('subject', '', $key);
            // Add the value to the corresponding sum in the array
            if (!isset($subjectSums[$subjectNumber])) {
                $subjectSums[$subjectNumber] = 0;
            }
            $subjectSums[$subjectNumber] += $value;
        }
    }
}

// Calculate the sum divided by the number of students (assuming 15 students)
$numberOfStudents = $firstCountValue;
if($numberOfStudents>0)
{
    $subjectAverages = array();
    foreach ($subjectSums as $subjectNumber => $sum) {
        $average = $sum / $numberOfStudents;
        // Format the average to two decimal points
        $formattedAverage = number_format($average, 2);
        $subjectAverages["Subject " . $subjectNumber] = $formattedAverage;
}
// Output the averages
echo "<div class='average-container'>";
echo "<h2>Averages of Subjects Feedback</h2>";
echo "<h2>Number of Students Submitted - ".$numberOfStudents;
echo "<ul>";
foreach ($subjectAverages as $subject => $average) {
    echo "<li>$subject: $average</li>";
}
echo "</ul>";
echo "</div>";
}
else{
    echo "<h2>FeedBack not Taken Yet</h2>";
}
?>
<hr>
<!-- Lad Feedback Here........-->
<div class="title">
  <h1 align="center"> Feedback Collected on Labs</h1>
</div>
<?php
$tableName1 = $year . '_' . $sem . '_feed_lab_' . $section;
$sql_cols = "SHOW COLUMNS FROM $tableName1";
$result_cols = $conn->query($sql_cols);
// Checking if there are any columns
if ($result_cols->num_rows > 0) {
    // Displaying table inside a container
    echo "<div class='table-container'>";
    echo "<table>";
    // Outputting column names
    echo "<tr>";
    while ($row = $result_cols->fetch_assoc()) {
        // Skip the 'count' column
        if ($row["Field"] === "count") {
            continue;
        }
        echo "<th>" . $row["Field"] . "</th>";
    }
    echo "</tr>";
    // Fetching data from the table
$sql_data = "SELECT * FROM $tableName1";
$result_data = $conn->query($sql_data);
$rowCount = $result_data->num_rows;
$currentRow = 0;

// Define a variable to store the first row value of the 'count' column
$firstCountValue = null;

// Outputting data of each row
while ($row = $result_data->fetch_assoc()) {
    $currentRow++;
    if ($currentRow === $rowCount) {
        // Skip the last row
        continue;
    }
    echo "<tr>";
    foreach ($row as $key => $value) {
        // Skip the 'count' column
        if ($key === "count") {
            // Store the value of the 'count' column in the first row
            if ($currentRow === 1 && $firstCountValue === null) {
                $firstCountValue = $value;
            }
            continue;
        }
        // Format decimal values up to two digits after the decimal point
        if (is_numeric($value) && strpos($value, '.') !== false) {
            $value = number_format($value, 2);
        }
        echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
// Now $firstCountValue contains the value of the 'count' column in the first row
    echo "</table>";
    echo "</div>"; // Close table container
} else {
    echo "0 results";
}

// Freeing result sets
$result_cols->free_result();
$result_data->free_result();
?>
<?php
// Fetching data from the table
$sql_data = "SELECT * FROM $tableName1";
$result_data = $conn->query($sql_data);
$rowCount = $result_data->num_rows;
$currentRow = 0;

// Define an array to store the sums of each subject column
$subjectSums = array();

// Outputting data of each row
while ($row = $result_data->fetch_assoc()) {
    $currentRow++;
    if ($currentRow === $rowCount) {
        // Skip the last row
        continue;
    }
    foreach ($row as $key => $value) {
        // Skip the 'count' column
        if ($key === "count") {
            continue;
        }
        // Check if the column is a subject column
        if (strpos($key, 'lab') !== false) {
            // Extract the subject number from the column name
            $subjectNumber = str_replace('lab', '', $key);
            // Add the value to the corresponding sum in the array
            if (!isset($subjectSums[$subjectNumber])) {
                $subjectSums[$subjectNumber] = 0;
            }
            $subjectSums[$subjectNumber] += $value;
        }
    }
}

// Calculate the sum divided by the number of students (assuming 15 students)
$numberOfStudents = $firstCountValue;
if($numberOfStudents>0)
{
    $subjectAverages = array();
    foreach ($subjectSums as $subjectNumber => $sum) {
        $average = $sum / $numberOfStudents;
        // Format the average to two decimal points
        $formattedAverage = number_format($average, 2);
        $subjectAverages["Lab " . $subjectNumber] = $formattedAverage;
    }

// Output the averages
echo "<div class='average-container'>";
echo "<h2>Averages of Labs Feedback</h2>";
echo "<h2>Number of Students Submitted - ".$numberOfStudents;
echo "<ul>";
foreach ($subjectAverages as $subject => $average) {
    echo "<li>$subject: $average</li>";
}
echo "</ul>";
echo "</div>";
}
else{
    echo "<h2>FeedBack not Taken Yet</h2>";
}
?>

<br>
<br>
<div class="mar">
  <marquee scrollamount="10" style="color:black;" >Copyright © RISE Krishna Sai Groups - 2024 | For Technical Issue: Contact Dept. Of CSE </marquee>
</div>
</body>
</html>
