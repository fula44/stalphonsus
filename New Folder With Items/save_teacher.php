<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $subject = $_POST["subject"];

    $sql = "INSERT INTO teachers (first_name, last_name, subject) 
            VALUES ('$first_name', '$last_name', '$subject')";

    if (mysqli_query($conn, $sql)) {
        echo "Teacher saved successfully. <a href='vteachers.php'>View All</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>


