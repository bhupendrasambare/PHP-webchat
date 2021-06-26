<?php
    session_start();
    include_once "config.php";
    $outgoingId = $_SESSION['uniquewebId'];
    $sql = mysqli_query($conn,"SELECT * FROM  userwebchat");
    $output = '';
    if(mysqli_num_rows($sql)==1){
        $output .= "No user Found";
    }elseif(mysqli_num_rows($sql)>0){
        include "datafound.php";
    }
    echo $output;
?>