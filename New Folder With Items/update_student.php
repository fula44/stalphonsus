<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


$conn = mysqli_connect("localhost", "root", "", "st_alphonsus_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$id = $_POST['id'];
$first = $_POST['first_name'];
$last = $_POST['last_name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$class = $_POST['class'];


$sql = "UPDATE students SET 
            first_name = '$first', 
            last_name = '$last', 
            dob = '$dob', 
            gender = '$gender', 
            class = '$class' 
        WHERE student_id = $id";

if (mysqli_query($conn, $sql)) {
    echo "Student updated successfully. <a href='vstudents.php'>Back to Students</a>";
} else {
    echo "Error updating student: " . mysqli_error($conn);
}

mysqli_close($conn);
?>



