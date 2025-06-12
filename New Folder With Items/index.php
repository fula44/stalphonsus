<?php
// index.php
?>

<!DOCTYPE html>
<html>
<head>
    <title>St Alphonsus Primary School - Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        h1 {
            color: #333;
        }
        .container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }
        .btn {
            padding: 15px 30px;
            font-size: 18px;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Welcome to the St Alphonsus Primary School System</h1>
    <div class="container">
        <a href="student.php" class="btn">View Students</a>
        <a href="teacher.php" class="btn">Manage Teachers</a>
        <a href="subject.php" class="btn">Manage Subjects</a>
        <a href="add_attendance.php" class="btn">Record Attendance</a>
        <a href="grades.php" class="btn">Assign Grades</a>
        <a href="vattendance.php" class="btn">View Attendance Records</a>
        <a href="vgrades.php" class="btn">View Grades</a>
    </div>
</body>
</html>

