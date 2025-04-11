<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject_name = $_POST['subject_name'];

    $sql = "INSERT INTO subjects (subject_name) VALUES ('$subject_name')";

    if (mysqli_query($conn, $sql)) {
        echo "✅ Subject saved successfully. <a href='vsubjects.php'>View Subjects</a>";
    } else {
        echo "❌ Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>

