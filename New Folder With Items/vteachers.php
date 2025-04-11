<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Teachers</title>
</head>
<body>
    <h2>All Teachers</h2>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Subject</th>
        </tr>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM teachers");

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['teacher_id'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['subject'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
