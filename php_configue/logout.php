<?php 

function logout_sec(){   
    session_start();
    session_unset();
    session_destroy();
    header('location: /collegeProject');
}
logout_sec();
?>