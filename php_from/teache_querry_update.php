<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $qualification = $_POST['qualification'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];
    // Update teacher details in the database
    require_once("../php_configue/mysql2.php");
    session_start();
    $teacher_key = $_SESSION['id'];
    $update_sql = "UPDATE teacher_list SET 
                        name = '$name',
                        date_of_birth = '$dob',
                        gender = '$gender',
                        qualification = '$qualification',
                        state = '$state',
                        city = '$city',
                        contact = '$contact'
                        WHERE teacher_key = $teacher_key";

    if ($conn->query($update_sql) === TRUE) {
        echo "<p>Teacher details updated successfully.</p>";
        $_SESSION['alert'] = "your information update succesfully !!";
        // header() 
        header('location: /collegeProject/teacher_panel.php?page=profile');
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
