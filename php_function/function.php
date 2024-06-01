<!-- include all require file -->
<?php
require './php_configue/session.php';
require_once('./php_from/signup.php');
require_once('./php_from/login.php')
?>
<!-- call all require funcion -->
<?php
session_start();
if(!isset($_SESSION['login'])){
    $_SESSION['login'] = false;
}
session();
signup();
login();
?>