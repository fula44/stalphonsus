<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';

$sql = "
    SELECT a.attendance_id, s.first_name, s.last_name, a.date, a.status 
    FROM attendance a 
    JOIN students s ON a.student_id = s.student_id
";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Attendance</title>
</head>
<body>
    <h2>Attendance Records</h2>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Student</th>
            <th>Date</th>
            <th>Status</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['attendance_id'] . "</td>";
            echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

