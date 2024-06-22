<?php
// Assuming $conn is your database connection
$user = $_POST['user'];
$year = $_POST['year'];
$sem = $_POST['sem'];

if($user == 'CSE') {
    $conn = mysqli_connect("localhost", "root", "", "cse");
} else if ($user == 'ECE') {
    $conn = mysqli_connect("localhost", "root", "", "ece");
} else if ($user == 'EEE') {
    $conn = mysqli_connect("localhost", "root", "", "eee");
} else if ($user == 'MECH') {
    $conn = mysqli_connect("localhost", "root", "", "mech");
} else if ($user == 'CSE-AIML') {
    $conn = mysqli_connect("localhost", "root", "", "cse-aiml");
} else if ($user == 'CSE-DS') {
    $conn = mysqli_connect("localhost", "root", "", "cse-ds");
}

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Find all tables whose names start with $year and $sem
$tableName_prefix = $year . '_' . $sem;
$sql_find_tables = "SHOW TABLES LIKE '{$tableName_prefix}%'";
$result_tables = mysqli_query($conn, $sql_find_tables);

if (mysqli_num_rows($result_tables) > 0) {
    // Loop through and back up each table before dropping it
    $backup_directory = 'backups/';
    if (!is_dir($backup_directory)) {
        mkdir($backup_directory, 0777, true);
    }

    $tables_dropped = true;
    while ($row = mysqli_fetch_row($result_tables)) {
        $table_to_drop = $row[0];
        $backup_file = $backup_directory . $table_to_drop . '.sql';

        // Backup the table
        $command = "mysqldump -u root -p --databases " . mysqli_real_escape_string($conn, $conn->query("select database()")->fetch_row()[0]) . " --tables $table_to_drop > $backup_file";
        exec($command, $output, $return_var);

        if ($return_var !== 0) {
            $tables_dropped = false;
            echo "Error backing up table $table_to_drop.<br>";
            continue;
        }

        // Drop the table
        $sql_drop_table = "DROP TABLE $table_to_drop";
        if (!mysqli_query($conn, $sql_drop_table)) {
            $tables_dropped = false;
            echo "Error dropping table $table_to_drop: " . mysqli_error($conn) . "<br>";
        }
    }

    if ($tables_dropped) {
        echo "<script>alert('Feedback tables backed up and deleted successfully.');";
        echo "window.location.href = 'deletefeed.php';</script>";
    }
} else {
    echo "<script>alert('No feedback tables found for the selected branch, year, and semester.');";
    echo "window.location.href = 'deletefeed.php';</script>";
}

// Close the connection
mysqli_close($conn);
?>

