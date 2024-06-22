<?php
// Start the session
session_start();

// Assuming $conn is your database connection
$branch = $_POST['branch'];
$year = $_POST['year'];
$sem = $_POST['sem'];
$section = $_POST['section'];
$conn = mysqli_connect("localhost", "root", "", $branch);

$feedback = $_POST['feedback'];

// Update subject feedback
foreach ($feedback as $item) {
    $parameters = $item['Parameters'];
    $values = "";
    foreach ($item as $key => $value) {
        if ($key !== 'Parameters') {
            // For columns other than 'Parameters', add the new value to the existing one and divide by (count + 1)
            $values .= "`$key`=(`$key`+$value)/(`count`+1),";
        }
    }
    $values = rtrim($values, ',');
    $tableName_sub = $year . '_' . $sem . '_feed_sub_' . $section;

    // Construct and execute the update SQL query
    $sql = "UPDATE $tableName_sub SET `count` = `count` + 1, $values WHERE Parameters=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $parameters);
    $stmt->execute();
    $stmt->close();
}

// Update lab feedback
$tableName_lab = $year . '_' . $sem . '_feed_lab_' . $section;
$feedback = $_POST['lab_feedback'];
foreach ($feedback as $item) {
    $parameters = $item['parameters'];
    $values = "";
    foreach ($item as $key => $value) {
        if ($key !== 'parameters') {
            // For columns other than 'parameters', add the new value to the existing one and divide by (count + 1)
            $values .= "`$key`=(`$key`+$value)/(`count`+1),";
        }
    }
    $values = rtrim($values, ',');

    // Construct and execute the update SQL query
    $sql = "UPDATE $tableName_lab SET `count` = `count` + 1, $values WHERE parameters=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $parameters);
    $stmt->execute();
    $stmt->close();
}

// Destroy the session
session_unset();
session_destroy();

// Close the database connection
mysqli_close($conn);
?>

<script>
    alert('Feedback taken successfully');
    window.location.href = 'index.php';
</script>
