<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["student-detail"])) {
    session_start();  
    $email = $_SESSION['email'];
    $name = $_POST['student-name'];
    $gender = $_POST['student-gender'];
    $dob = $_POST['student-dob'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $course = $_POST['course'];
    $branch = $_POST['branch'];
    $semester = $_POST['semester'];
    $contact = $_POST['contact'];
    $session = $_POST['college-session'];
    require_once('../php_configue/mysql.php');
    require_once("../php_function/fun.php");
    $sql = "SELECT * FROM `signup_user_data` WHERE `Email` LIKE  '$email'";
    $authorize = fetch_data($sql, $conn);
    $register_key = $authorize['user_key'];
    $passward = $authorize['Password'];
    $sql1= "INSERT INTO `student_data` (`student_id`, `username`, `register_id`, `Password`) VALUES (NULL,'$name','$register_key','$passward')";
    $result1 = mysqli_query($conn, $sql1);
    require_once('../php_configue/mysql2.php');
    $sql = "INSERT INTO student_list values ('NULL','$name','$dob','$gender','$city','$state','$course','$branch','$semester','$contact','$email','$session')";
    $result = mysqli_query($conn, $sql);
    if ($result && $result1) {
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['status'] = 1;
        $_SESSION['user'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['user_type'] = "student";
        $_SESSION['alert'] = "Hi $name, together, we can make it better - share your feedback!";
        header('location: /collegeProject');
    }
}
else {
    
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
}
