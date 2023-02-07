<?php
// V. Kid
// include("db.php");

// if (empty($_POST['type']) or empty($_SESSION)) {
//     http_response_code(404);
//     die();
// }

// $sid = $_SESSION['sid'];
// $type = $_POST['type'];
// $sql ="SELECT * FROM `students` WHERE `sid` = " . mysqli_real_escape_string($mysql, $sid);
// $qurey=mysqli_query($mysql,$sql);
// if($qurey->num_rows > 0) {
//     $sql_update = "UPDATE `students` SET `type_code` = '$type' WHERE `students`.`sid` = '$sid';";
//     $qurey = mysqli_query($mysql,$sql_update);
//     if ($qurey == TRUE) {
//         echo '<script type="text/javascript"> window.location = "account.php" </script>';

//     }
// } else {
//     die('error');
// }


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
        $sql_type = "SELECT * FROM types WHERE `code` = '" . mysqli_real_escape_string($mysql, $type) . "'";
        $wish_type = mysqli_fetch_object(query($sql_type));

        if ($wish_type->allow_not_meet_req == 0) { // Can't check if value of allow_not_meet_req is 1
            if ($student->GPAX < $wish_type->min_GPAX or $student->GPA_MAT < $wish_type->min_GPA_MAT or $student->GPA_SCI < $wish_type->min_GPA_SCI) {
                http_response_code(403);
                die();
            }
            if ($wish_type->allow_ungrade == 0 and $student->ungrade == 1) {
                http_response_code(403);
                die();
            }
        }
        // End protect against hacking

        // Update student information
        $sql = "UPDATE `students` SET `type_code` = '$type' WHERE `sid` = $sid;";
        $query = query($sql);
        // Check if update is successful
        if ($query) {
            // Update successfully
            // header('Location:account.php');
            echo '<script type="text/javascript"> window.location = "account.php" </script>';
            die();
        } else {
            // Update failed
            die("Failed to update student information");
        }
    } else {
        // No student exists
        die();
    }
}
