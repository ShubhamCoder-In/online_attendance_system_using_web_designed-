<?php
function str_verify($string)
{
    $len = strlen($string);
    $arr = [];
    $upperc = false ;
    $lowerc = false;
    $number = false;
    $specialc = false;
    for ($i = 0; $i < $len; $i++) {
        $char = $string[$i];
        echo '<br>';
        if (preg_match('/[A-Z]/', $char)) {
            $upperc = true;
        } elseif (preg_match('/[a-z]/', $char)) {
            $lowerc = true;
        } elseif (preg_match('/[0-9]/', $char)) {
            $number = true;
        } else {
            $specialc = true;
        }
    }
    if($upperc && $lowerc && $number && $specialc && $len >= 8){
        return true;
    }elseif($upperc && $lowerc && $number && $specialc ){
        return false;
    }
    elseif($lowerc && $number && $specialc){
        return false;
    } elseif( $lowerc && $specialc ){
        return false;
    }
    else{
        return false;
    }
}
?>