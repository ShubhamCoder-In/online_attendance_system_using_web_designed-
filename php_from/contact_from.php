<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $meassage = $_POST['message'];
    session_start();
    if (isset($_SESSION['login'])) {
        $user_type = $_SESSION['user_type'];
        if ($email == $_SESSION['email']) {
            require_once("../php_configue/mysql.php");
            $sql = "INSERT INTO `contact_from`  VALUES (NULL, '$name', '$user_type', '$email', '$meassage', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result){
                $_SESSION['alert'] = "thanks to response your message request send to server have good day !!";
                header("location: /collegeProject");
            }else{
                $_SESSION['alert'] = "please try again somethig worng !!";
                header("location: /collegeProject/contact.php?sfvghhjxhxvgstysygsggxghiwyysgx445644654455&error");
            }
        } else {
            header("location: /collegeProject/contact.php?nofound");
        }
    } else {
        header("location: /collegeProject/contact.php?failed");
    }
}
