<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $subject_id = $_POST['subject_id'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    $errors = [];

    if (empty($student_id)) {
        $errors[] = "Student is required.";
    }
    if (empty($subject_id)) {
        $errors[] = "Subject is required.";
    }
    if (empty($date)) {
        $errors[] = "Date is required.";
    }
    if (empty($status)) {
        $errors[] = "Attendance status is required.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        exit;
    }

    $query = "INSERT INTO attendance (student_id, subject_id, date, status) 
              VALUES ('$student_id', '$subject_id', '$date', '$status')";

    if (mysqli_query($conn, $query)) {
        echo "Attendance recorded successfully.";
        echo "<br><a href='add_attendance.php'>Record Another</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>



