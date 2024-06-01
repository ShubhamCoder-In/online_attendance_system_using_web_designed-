<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "users_database";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
    die('sorry connection not establish' . mysqli_connect_error());
}
?>