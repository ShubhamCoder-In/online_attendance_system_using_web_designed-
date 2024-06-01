<?php
function login()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        require_once("./php_function/fun.php");
        require "./php_configue/mysql.php";
        $email = $_POST['login_email'];
        $cpassword = $_POST['login_password'];
        $sql = "SELECT * FROM `signup_user_data` WHERE `Email` LIKE  '$email'";
        $authorize = fetch_data($sql, $conn);
        if (isset($authorize)) {
            if (password_verify($cpassword, $authorize['Password'])) {
                $key = $authorize['user_key'];
                $sql1 = "SELECT * FROM `student_data` WHERE `register_id`= $key";
                $student = fetch_data($sql1, $conn);
                $sql2 = "SELECT * FROM `teacher_data` WHERE `register_id`= $key";
                $teacher = fetch_data($sql2, $conn);

                if (isset($student)) {
                    // student detail found
                    $name = $student['username'];
                    $sid = $student['student_id'];
                    $_SESSION['id'] = $sid;
                    $_SESSION['login'] = true;
                    $_SESSION['status'] = 1;
                    $_SESSION['user'] = $name;
                    $_SESSION['user_type'] = "student";
                    $_SESSION['email'] = $email;
                    $_SESSION['alert'] = "welcomeback $name, together, we can make it better - share your feedback!";
                    header('location: /collegeProject');
                } 

                else if (isset($teacher)) {
                    // teacher_detail found
                    $name = $teacher['username'];
                    $tid = $teacher['teacher_id'];
                    $_SESSION['id'] = $tid;
                    $_SESSION['login'] = true;
                    $_SESSION['status'] = 1;
                    $_SESSION['user'] = $name;
                    $_SESSION['email'] = $email;
                    $_SESSION['user_type'] = "teacher";
                    $_SESSION['alert'] = "welcomeback $name, together, we can make it better - share your feedback!";
                    header('location: /collegeProject');
                }

                else {
                    $_SESSION['email'] = $email;
                    $host  = $_SERVER['HTTP_HOST'];
                    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                    $extra = 'login/page.php';
                    header("Location: http://$host$uri/$extra");
                }

            } 
            else {
                alert('password are incorrect please try agian !');
            }
        } 
        else {
            alert('your email id not found please enter register email and password if you new sign up first then try again!');
        }
    }
     else {
        header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
    }
}
