<?php
    session_start();
    if(isset($_SESSION['uniquewebId'])){
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline";
            $sql = mysqli_query($conn, "UPDATE `userwebchat` SET `webstatus` = 'Offline' WHERE `userwebchat`.`uniquewebId` = '{$logout_id}'");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../login.php");
            }
        }
    }else{
        header("location: ../login.php");
    }

?>