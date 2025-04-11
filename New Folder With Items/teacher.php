
<!DOCTYPE html>
<html>
<head>
    <title>Add Teacher</title>
</head>
<body>
    <h2>Add New Teacher</h2>
    <form method="POST" action="save_teacher.php">
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" required><br><br>

    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" required><br><br>

    <label for="subject">Subject:</label>
    <input type="text" name="subject" required><br><br>

    <button type="submit">Save Teacher</button>
</form>

</body>
</html>
