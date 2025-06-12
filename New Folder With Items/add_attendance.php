<?php
$conn = mysqli_connect("localhost", "root", "", "st_alphonsus_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$students = mysqli_query($conn, "SELECT student_id, first_name, last_name FROM students");
$subjects = mysqli_query($conn, "SELECT subject_id, subject_name FROM subjects");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Record Attendance</title>
</head>
<body>
    <h2>Record Attendance</h2>
    <form action="save_attendance.php" method="POST">
        <label>Select Student:</label>
        <select name="student_id" required>
            <option value="">-- Select Student --</option>
            <?php while ($row = mysqli_fetch_assoc($students)) { ?>
                <option value="<?php echo $row['student_id']; ?>">
                    <?php echo $row['first_name'] . ' ' . $row['last_name']; ?>
                </option>
            <?php } ?>
        </select><br><br>

        <label>Select Subject:</label>
        <select name="subject_id" required>
            <option value="">-- Select Subject --</option>
            <?php while ($row = mysqli_fetch_assoc($subjects)) { ?>
                <option value="<?php echo $row['subject_id']; ?>">
                    <?php echo $row['subject_name']; ?>
                </option>
            <?php } ?>
        </select><br><br>

        <label>Date:</label>
        <input type="date" name="date" required><br><br>

        <label>Status:</label>
        <select name="status" required>
            <option value="">-- Select Status --</option>
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
            <option value="Late">Late</option>
        </select><br><br>

        <button type="submit">Save Attendance</button>
    </form>
</body>
</html>
