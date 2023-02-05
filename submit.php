<?php
include('db.php');
if (empty($_POST['type']) or empty($_SESSION)) {
    http_response_code(404);
    die();
} else {
    $sid = $_SESSION['sid'];
    $type = $_POST['type'];

    $sql = "SELECT * FROM students WHERE `sid` = $sid";
    $student = query($sql);
    
    // Check if student is exists
    if ($student->num_rows > 0) {
        // Yes student exists

        // Start protect against hacking
        $student = mysqli_fetch_object($student);
        $sql = "SELECT * FROM types WHERE `code` = '$type'";
        $wish = mysqli_fetch_object(query($sql));

        if ($student->GPAX < $wish->min_GPAX or $student->GAP_MAT < $wish->min_GPA_MAT or $student->GPA_SCI < $wish->min_GPA_SCI) {
            http_response_code(403);
            die();
        }
        if ($wish->allow_ungrade == 0 and $student->ungrade == 1) {
            http_response_code(403);
            die();
        }
        // End protect against hacking

        // Update student information
        $sql = "UPDATE `students` SET `type_code` = '$type' WHERE `sid` = $sid;";
        $query = query($sql);
        // Check if update is successful
        if ($query) {
            // Update successfully
            header('Location:account.php');
        } else {
            // Update failed
            die("Failed to update student information");
        }
    } else {
        // No student exists
        die();
    }
}
