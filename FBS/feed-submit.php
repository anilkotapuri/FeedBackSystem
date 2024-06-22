<?php
// Establish database connection
include("userprofile.php");

// Check connection
if ($conX->connect_error) {
    die("Connection failed: " . $conX->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $year = $_POST["year"];
    $sem = $_POST["sem"];
    $sections = $_POST["sections"];

    // Create table name for combined details
    $Tname = $year . "_" . $sem . "_details";

    // Check if table already exists
    $check_table_sql = "SHOW TABLES LIKE '$Tname'";
    $table_result = $conX->query($check_table_sql);

    if ($table_result->num_rows > 0) {
        // Table already exists
        // You might want to handle this case
    } else {
        // Table does not exist, proceed with creation

        // Create table if not exists
        $fields = array(
            "type ENUM('Subject', 'Lab') NOT NULL", // Type indicating Subject or Lab
            "name VARCHAR(255) NOT NULL", // For both subject and lab name
            "faculty VARCHAR(255) NOT NULL"
        );

        // Construct CREATE TABLE query for combined details
        $sql = "CREATE TABLE IF NOT EXISTS $Tname (";
        $sql .= implode(", ", $fields);
        $sql .= ")";

        // Execute query for combined details
        if ($conX->query($sql) === TRUE) {
            echo '<script type="text/javascript">alert("Feedback created sucessfully")</script>';
        } else {
            echo "Error: " . $conX->error;
        }

        // Prepare and bind SQL statement for insertion
        $stmt = $conX->prepare("INSERT INTO $Tname (name, type, faculty) VALUES (?, ?, ?)");

        // Bind parameters and execute for each subject/lab and faculty pair
        if (isset($_POST['subject']) && isset($_POST['faculty_subject'])) {
            $subjects = $_POST['subject'];
            $faculties_subject = $_POST['faculty_subject'];
            $num_subjects = count($subjects);
            for ($i = 0; $i < $num_subjects; $i++) {
                $subject = $subjects[$i];
                $faculty = $faculties_subject[$i];
                $type = "Subject";
                $stmt->bind_param("sss", $subject, $type, $faculty);
                $stmt->execute();
            }
        }

        if (isset($_POST['lab']) && isset($_POST['faculty_lab'])) {
            $labs = $_POST['lab'];
            $faculties_lab = $_POST['faculty_lab'];
            $num_labs = count($labs);
            for ($i = 0; $i < $num_labs; $i++) {
                $lab = $labs[$i];
                $faculty = $faculties_lab[$i];
                $type = "Lab";
                $stmt->bind_param("sss", $lab, $type, $faculty);
                $stmt->execute();
            }
        }

        // Loop to create duplicate tables for feed_sub
        for ($i = 1; $i <= $sections; $i++) {
            $tableName_sub = $year . "_" . $sem . "_feed_sub_" . $i; // Name of the duplicate table for subjects

            // Create table if not exists
            $sql_create_sub = "CREATE TABLE IF NOT EXISTS $tableName_sub LIKE feed_sub";
            if ($conX->query($sql_create_sub) === TRUE) {
                // Copy data from feed_sub to new table
                $sql_copy_sub = "INSERT INTO $tableName_sub SELECT * FROM feed_sub";
                if ($conX->query($sql_copy_sub) !== TRUE) {
                    echo "Error copying data to $tableName_sub: " . $conX->error;
                }

                // Alter table to add columns for number of subjects
                for ($j = 1; $j <= $num_subjects; $j++) {
                    $sql_alter_sub = "ALTER TABLE $tableName_sub ADD subject$j VARCHAR(255) DEFAULT '0'";
                    if ($conX->query($sql_alter_sub) !== TRUE) {
                        echo "Error adding column to $tableName_sub: " . $conX->error;
                        break;
                    }
                }

            } else {
                echo "Error creating table: " . $conX->error;
            }
        }

        // Loop to create duplicate tables for feed_lab
        for ($i = 1; $i <= $sections; $i++) {
            $tableName_lab = $year . "_" . $sem . "_feed_lab_" . $i; // Name of the duplicate table for labs

            // Create table if not exists
            $sql_create_lab = "CREATE TABLE IF NOT EXISTS $tableName_lab LIKE feed_lab";
            if ($conX->query($sql_create_lab) === TRUE) {
                // Copy data from feed_lab to new table
                $sql_copy_lab = "INSERT INTO $tableName_lab SELECT * FROM feed_lab";
                if ($conX->query($sql_copy_lab) !== TRUE) {
                    echo "Error copying data to $tableName_lab: " . $conX->error;
                }

                // Alter table to add columns for number of labs
                for ($j = 1; $j <= $num_labs; $j++) {
                    $sql_alter_lab = "ALTER TABLE $tableName_lab ADD lab$j VARCHAR(255) DEFAULT '0'";
                    if ($conX->query($sql_alter_lab) !== TRUE) {
                        echo "Error adding column to $tableName_lab: " . $conX->error;
                        break;
                    }
                }

            } else {
                echo "Error creating table: " . $conX->error;
            }
        }

        // Close prepared statement
        $stmt->close();
    }
}

// Close connection
$conX->close();

// Destroy the session
session_destroy();

// Closing PHP tag
?>
