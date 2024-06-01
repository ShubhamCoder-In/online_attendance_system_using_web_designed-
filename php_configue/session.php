<?php
function session(){
    require 'alert.php';
    if(isset($_SESSION['login']) && isset($_SESSION['alert'])){
        if(isset($_SESSION['alert'])){
        alert($_SESSION['alert']);
        $_SESSION['alert'] = NULL;
        }
    }
 }
 ?>