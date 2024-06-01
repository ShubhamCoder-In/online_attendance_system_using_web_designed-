<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["teacher-detail"])) {
    $email =  $_SESSION["email"];
    require_once("../php_configue/mysql.php");
    $sql = "select * FROM admin_data WHERE email = '$email'";

    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num) {
        $email =  $_POST["email"];
    } else $email =  $_SESSION["email"];
    var_dump($_POST);
    $name = $_POST['teacher-name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $qualification = $_POST['quality'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $contact = $_POST['contact'];
    require_once('../php_configue/mysql.php');
    require_once("../php_function/fun.php");
    $sql = "SELECT * FROM `signup_user_data` WHERE `Email` LIKE  '$email'";
    $authorize = fetch_data($sql, $conn);
    $register_key = $authorize['user_key'];
    $passward = $authorize['Password'];
    $sql1= "INSERT INTO `teacher_data` VALUES (NULL,'$name','$register_key','$passward')";
    $result1 = mysqli_query($conn, $sql1);
    require_once('../php_configue/mysql2.php');
    $sql = "INSERT INTO `teacher_list` VALUES (NULL,'$name', '$dob', '$gender', '$qualification', '$city','$state', '$contact', '$email')";
    $result = mysqli_query($conn, $sql);
    if ($result && $result1) {
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['status'] = 1;
        $_SESSION['user'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['user_type'] = "teacher";
        $_SESSION['alert'] = "Hi $name, together, we can make it better - share your feedback!";
        header('location: /collegeProject');
    }
} else {
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
}
