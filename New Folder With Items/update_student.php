<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['student_id'];
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $class = trim($_POST['class']);

    $errors = [];

    if (strlen($first_name) < 2) {
        $errors[] = "First name must be at least 2 characters.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }
    if (empty($gender)) {
        $errors[] = "Please select a gender.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        exit;
    }

    $query = "UPDATE students SET 
              first_name='$first_name', 
              last_name='$last_name',
              dob='$dob',
              gender='$gender',
              email='$email',
              class='$class' 
              WHERE student_id=$id";

    if (mysqli_query($conn, $query)) {
        echo "Student updated successfully.";
        echo "<br><a href='vstudents.php'>Back to Student List</a>";
    } else {
        echo "Error updating student: " . mysqli_error($conn);
    }
}
?>

