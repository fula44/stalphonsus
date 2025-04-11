<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Subjects</title>
</head>
<body>
    <h2>All Subjects</h2>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Subject Name</th>
        </tr>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM subjects");

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['subject_id'] . "</td>";
            echo "<td>" . $row['subject_name'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
