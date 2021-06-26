<?php
    session_start();
    if(isset($_SESSION['uniquewebId'])){
        include_once "config.php";
        $outgoingid = $_SESSION['uniquewebId'];
        $incomingid = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        // $incomingid = (int)$incomingid;
        // $outgoingid = (int)$outgoingid;
        $outgoing = "";
        $sql = "SELECT * FROM `wmassage`
        LEFT JOIN userwebchat ON userwebchat.uniquewebId = wmassage.woutgoing_id WHERE (`wincomming_id` = {$outgoingid} AND `woutgoing_id` = {$incomingid}) OR (`woutgoing_id` = {$outgoingid} AND `wincomming_id` = {$incomingid} ) ORDER BY `wmassage_id` ASC";
        $query = mysqli_query($conn, $sql);

        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query))
            {
                if($row['woutgoing_id'] === $incomingid){
                    $outgoing .= '<div class="chat incoming">
                    <img src="./php/images/'.$row['wimg'].'" alt="">
                    <div class="details">
                    <p>'.$row['mgs'].'</p>
                    </div>
                    </div>';
                }
                if($row['wincomming_id'] === $incomingid)
                {
                    $outgoing .= '<div class="chat outgoing">
                    <div class="details">
                        <p>'.$row['mgs'].'</p>
                    </div>
                </div>';
                }
            }
        }
        else{
        }
        echo $outgoing ;
    }else{
        header("../login.php");
    }


?>