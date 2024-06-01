<?php
function signup()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        require './php_configue/mysql.php';
        $sql = "SELECT * FROM `signup_user_data` WHERE `Email` LIKE  '$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            alert('your email have already register please loging with password');
        } else {
            require './php_configue/mysql.php';
            $hash = password_hash($cpassword, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `signup_user_data` (`Email`, `Password`, `date`) VALUES ('$email','$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                alert('your account have been successful created go to login by email and password');
            }
        }
    }
    else{
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
    }
}
?>
