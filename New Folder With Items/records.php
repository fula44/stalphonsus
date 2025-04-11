<?php
$conn = mysqli_connect("localhost", "root", "", "st_alphonsus_db");
if (!$conn) {
    die("Connection failed");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['save_grade'])) {
        $student_id = $_POST['student_id_grade'];
        $subject_id = $_POST['subject_id'];
        $grade = $_POST['grade'];

        $sql = "INSERT INTO grades (student_id, subject_id, grade)
                VALUES ('$student_id', '$subject_id', '$grade')";
        mysqli_query($conn, $sql);
        echo "✅ Grade added successfully<br>";
    }

    if (isset($_POST['save_attendance'])) {
        $student_id = $_POST['student_id_attendance'];
        $date = $_POST['date'];
        $status = $_POST['status'];

        $sql = "INSERT INTO attendance (student_id, date, status)
                VALUES ('$student_id', '$date', '$status')";
        mysqli_query($conn, $sql);
        echo "✅ Attendance recorded successfully<br>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Records</title>
    <script>
        function showForm(type) {
            document.getElementById("gradeForm").style.display = (type === "grade") ? "block" : "none";
            document.getElementById("attendanceForm").style.display = (type === "attendance") ? "block" : "none";
        }
    </script>
</head>
<body>
    <h2>Add Records</h2>

    <label>Choose what to add:</label>
    <select onchange="showForm(this.value)">
        <option value="">-- Select --</option>
        <option value="grade">Add Grade</option>
        <option value="attendance">Record Attendance</option>
    </select>


    <div id="gradeForm" style="display:none; margin-top: 20px;">
        <h3>Add Grade</h3>
        <form method="post" action="">
            <input type="hidden" name="form_type" value="grade">
            Student ID: <input type="number" name="student_id_grade" required><br><br>
            Subject ID: <input type="number" name="subject_id" required><br><br>
            Grade: <input type="text" name="grade" required><br><br>
            <input type="submit" name="save_grade" value="Save Grade">
        </form>
    </div>

   
    <div id="attendanceForm" style="display:none; margin-top: 20px;">
        <h3>Record Attendance</h3>
        <form method="post" action="">
            <input type="hidden" name="form_type" value="attendance">
            Student ID: <input type="number" name="student_id_attendance" required><br><br>
            Date: <input type="date" name="date" required><br><br>
            Status: 
            <select name="status" required>
                <option value="Present">Present</option>
                <option value="Absent">Absent</option>
                <option value="Late">Late</option>
            </select><br><br>
            <input type="submit" name="save_attendance" value="Save Attendance">
        </form>
    </div>
</body>
</html>

<?php
$conn = mysqli_connect("localhost", "root", "", "st_alphonsus_db");
if (!$conn) {
    die("Connection failed");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Records</title>
</head>
<body>
    <h2>Students</h2>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM students");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row['student_id'] . " | " . $row['first_name'] . " " . $row['last_name'] . " | Class: " . $row['class'] . "<br>";
    }
    ?>

    <hr>

    <h2>Teachers</h2>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM teachers");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row['teacher_id'] . " | " . $row['first_name'] . " " . $row['last_name'] . " | Subject: " . $row['subject'] . "<br>";
    }
    ?>

    <hr>

    <h2>Subjects</h2>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM subjects");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row['subject_id'] . " | " . $row['name'] . "<br>";
    }
    ?>

    <hr>

    <h2>Grades</h2>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM grades");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Grade ID: " . $row['grade_id'] . " | Student ID: " . $row['student_id'] . " | Subject ID: " . $row['subject_id'] . " | Grade: " . $row['grade'] . "<br>";
    }
    ?>

    <hr>

    <h2>Attendance</h2>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM attendance");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Date: " . $row['date'] . " | Student ID: " . $row['student_id'] . " | Status: " . $row['status'] . "<br>";
    }

    mysqli_close($conn);
    ?>
</body>
</html>
