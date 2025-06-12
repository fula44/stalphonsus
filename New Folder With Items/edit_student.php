<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM students WHERE student_id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $student = mysqli_fetch_assoc($result);
    } else {
        echo "Student not found.";
        exit;
    }
} else {
    echo "No ID provided.";
    exit;
}
?>

<h2>Edit Student</h2>
<form action="update_student.php" method="POST">
    <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">

    <label>First Name:</label>
    <input type="text" name="first_name" value="<?php echo $student['first_name']; ?>" required minlength="2" maxlength="30"><br>

    <label>Last Name:</label>
    <input type="text" name="last_name" value="<?php echo $student['last_name']; ?>" required minlength="2" maxlength="30"><br>

    <label>DOB:</label>
    <input type="date" name="dob" value="<?php echo $student['dob']; ?>" required><br>

    <label>Gender:</label>
    <select name="gender" required>
        <option value="">--Select--</option>
        <option value="Male" <?php if($student['gender'] == 'Male') echo 'selected'; ?>>Male</option>
        <option value="Female" <?php if($student['gender'] == 'Female') echo 'selected'; ?>>Female</option>
    </select><br>

    <label>Email:</label>
    <input type="email" name="email" value="<?php echo $student['email']; ?>" required><br>

    <label>Class:</label>
    <input type="text" name="class" value="<?php echo $student['class']; ?>" required maxlength="10"><br>

    <button type="submit">Update Student</button>
</form>
