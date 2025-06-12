<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM students WHERE student_id = $id";

    if (mysqli_query($conn, $query)) {
        echo "Student deleted successfully.";
        echo "<br><a href='vstudents.php'>Back to Student List</a>";
    } else {
        echo "Error deleting student: " . mysqli_error($conn);
    }
} else {
    echo "No student ID provided.";
}
?>
