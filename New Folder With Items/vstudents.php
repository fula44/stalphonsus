<?php
$conn = mysqli_connect("localhost", "root", "", "st_alphonsus_db");

if (!$conn) {
    die("Connection failed!");
}

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
</head>
<body>
    <h2>Student Records</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Class</th>
            <th>Actions</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['student_id'] . "</td>";
            echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
            echo "<td>" . $row['dob'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['class'] . "</td>";
            echo "<td>
                    <a href='edit_student.php?id=" . $row['student_id'] . "'>Edit</a> |
                    <a href='delete_student.php?id=" . $row['student_id'] . "' onclick=\"return confirm('Are you sure you want to delete this student?');\">Delete</a>
                  </td>";
            echo "</tr>";
        }
        mysqli_close($conn);
        ?>
    </table>
    <br>
    <a href="student.php">Add New Student</a>
</body>
</html>


