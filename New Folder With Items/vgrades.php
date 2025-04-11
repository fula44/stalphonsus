<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';


$sql = "
    SELECT g.grade_id, s.first_name, s.last_name, sub.subject_name, g.grade
    FROM grades g
    JOIN students s ON g.student_id = s.student_id
    JOIN subjects sub ON g.subject_id = sub.subject_id
";
$result = mysqli_query($conn, $sql);


if (!$result) {
    die("Error in query: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Grades</title>
</head>
<body>
    <h2>Grades Records</h2>

    <table border="1" cellpadding="8">
        <tr>
            <th>Grade ID</th>
            <th>Student Name</th>
            <th>Subject</th>
            <th>Grade</th>
        </tr>

        <?php

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['grade_id'] . "</td>";
            echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
            echo "<td>" . $row['subject_name'] . "</td>";
            echo "<td>" . $row['grade'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>


