<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $subject_id = $_POST['subject_id'];
    $grade = $_POST['grade'];

    $sql = "INSERT INTO grades (student_id, subject_id, grade) 
            VALUES ('$student_id', '$subject_id', '$grade')";

    if (mysqli_query($conn, $sql)) {
        echo "✅ Grade saved successfully. <a href='vgrades.php'>View Grades</a>";
    } else {
        echo "❌ Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
