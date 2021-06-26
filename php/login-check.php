<?php
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($email) && !empty($password)){

        $sql = mysqli_query($conn, "SELECT * FROM userwebchat WHERE wemail = '{$email}' AND wpassword = '{$password}' ");
        if(mysqli_num_rows($sql)>0){

            $row = mysqli_fetch_assoc($sql);

            $sqlupdate = mysqli_query($conn, "UPDATE `userwebchat` SET `webstatus` = 'Active now' WHERE `userwebchat`.`uniquewebId` = '{$row['uniquewebId']}'");
            if($sqlupdate){
                if($_SESSION['uniquewebId'] = $row['uniquewebId']){
                    echo"success";
                }else{
                    echo"session problem";
                }
            }else{
                echo"status problem";
            }
        
        }else{
            echo"Check the email and password";
        }
        
    }else{
        echo"all input are neccessary";
    }

?>