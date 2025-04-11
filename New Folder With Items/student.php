<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>
    <h2>Add New Student</h2>
    <form method="post" action="student.php">
        First Name: <input type="text" name="first_name" required><br><br>
        Last Name: <input type="text" name="last_name" required><br><br>
        Date of Birth: <input type="date" name="dob" required><br><br>
        Gender: 
        <select name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br><br>
        Class: <input type="text" name="class" required><br><br>
        <input type="submit" value="Add Student">
    </form>
</body>
</html>

<?php
$conn = mysqli_connect("localhost", "root", "", "st_alphonsus_db");

if (!$conn) {
    die("Connection failed");
}

$first = $_POST['first_name'];
$last = $_POST['last_name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$class = $_POST['class'];

$sql = "INSERT INTO students (first_name, last_name, dob, gender, class)
        VALUES ('$first', '$last', '$dob', '$gender', '$class')";

mysqli_query($conn, $sql);

echo "Student saved successfully";

mysqli_close($conn);
?>
