<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $subject_id = $_POST['subject_id'];
    $grade = $_POST['grade'];
    $date = date("Y-m-d");

    $errors = [];

    if (empty($student_id)) $errors[] = "Student is required.";
    if (empty($subject_id)) $errors[] = "Subject is required.";
    if (empty($grade)) $errors[] = "Grade is required.";

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        exit;
    }

    $query = "INSERT INTO grades (student_id, subject_id, grade, date_recorded) 
              VALUES ('$student_id', '$subject_id', '$grade', '$date')";

    if (mysqli_query($conn, $query)) {
        echo "Grade assigned successfully.";
        echo "<br><a href='add_grade.php'>Assign Another</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
