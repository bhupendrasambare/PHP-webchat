<?php
    session_start();
    if(isset($_SESSION['uniquewebId'])){
        include_once "config.php";
        $outgoingid = $_SESSION['uniquewebId'];
        $incomingid = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $massage = mysqli_real_escape_string($conn, $_POST['massage']);


        if(!empty($massage)){
            $sql = mysqli_query($conn, "INSERT INTO `wmassage` (`wmassage_id`, `wincomming_id`, `woutgoing_id`, `mgs`) VALUES (NULL, '{$incomingid}', '{$outgoingid}', '{$massage}');");
        }

    }else{
        header("../login.php");
    }

?>