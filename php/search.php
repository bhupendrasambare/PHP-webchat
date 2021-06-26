<?php
    session_start();
    include_once "config.php";

    $outgoingId = $_SESSION['uniquewebId'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = mysqli_query($conn, "SELECT * FROM userwebchat WHERE wname LIKE '%{$searchTerm}%' or wlast LIKE '%{$searchTerm}%'");
    if(mysqli_num_rows($sql) > 0){
        include "datafound.php";
    }else{
        $output ="No Matching Result found";
    }
    echo $output;
?>