<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $date = $_POST['attendance_date'];
    $status = $_POST['status'];

    if (empty($student_id)) {
        die("❌ Please select a student.");
    }

    $sql = "INSERT INTO attendance (student_id, date, status) 
            VALUES ('$student_id', '$date', '$status')";

    if (mysqli_query($conn, $sql)) {
        echo "✅ Attendance recorded successfully. <a href='vattendance.php'>View Attendance</a>";
    } else {
        echo "❌ Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>


