<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>
<h2>Add New Student</h2>
<form action="save_student.php" method="POST">
    <label>First Name:</label>
    <input type="text" name="first_name" required minlength="2" maxlength="30"><br>

    <label>Last Name:</label>
    <input type="text" name="last_name" required minlength="2" maxlength="30"><br>

    <label>DOB:</label>
    <input type="date" name="dob" required><br>

    <label>Gender:</label>
    <select name="gender" required>
        <option value="">--Select--</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Class:</label>
    <input type="text" name="class" required maxlength="10"><br>

    <button type="submit">Add Student</button>
</form>
</body>
</html>

