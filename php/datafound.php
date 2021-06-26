<?php
$output = "";
    while($row = mysqli_fetch_assoc($sql)){
        $sql2 = "SELECT * FROM wmassage WHERE (wincomming_id = {$row['uniquewebId']} 
        OR woutgoing_id = {$row['uniquewebId']}) AND (woutgoing_id = {$outgoingId} 
        OR wincomming_id = {$outgoingId}) ORDER BY wmassage_id DESC LIMIT 1";
        
        $query2 = mysqli_query($conn, $sql2);

        $row2 = mysqli_fetch_assoc($query2);

        if(mysqli_num_rows($query2) > 0){
            $result = $row2['mgs'];
        }else{
            $result = "No massage found";
        }
        // word trim..
        (strlen($result)>20 ? $msg = substr($result, 0 ,20): $msg = $result);

        // $you= "";
        // ($outgoingId === $row2['woutgoing_id'] )? $you = "You: " : $you = "";
        // ($outgoingId == $row2['woutgoing_id'])? $you = "You: ": $you ="";

        ($row['webstatus'] === "Offline") ? $offline = "offline" : $offline = "";
        if($row['uniquewebId'] != $outgoingId ){
            $output .= '<a href="./chat.php?uniquewebId='.$row['uniquewebId'].'">
            <div class="content">
                <img src="./php/images/'.$row['wimg'].' " alt="">
                <div class="details">
                    <span>'. $row['wname']  . " " . $row['wlast'] .'</span>
                    <p>'.$msg .'</p>
                </div>
            </div>
            <div class="status-dot '.$offline.'"><i class="fas fa-circle "></i></div>
        </a>';
        }
    }

?>