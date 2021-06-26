<?php
    session_start();
    include_once "config.php";
    $name = mysqli_real_escape_string($conn,$_POST['wname']);
    $last = mysqli_real_escape_string($conn,$_POST['wlast']);
    $email = mysqli_real_escape_string($conn,$_POST['wemail']);
    $password = mysqli_real_escape_string($conn,$_POST['wpassword']);
    
    if(!empty($name) && !empty($email) && !empty($last) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $sql = mysqli_query($conn, "SELECT * FROM userwebchat WHERE wemail = '{$email}'");
            
            if(mysqli_num_rows($sql) > 0){

                echo"email alredy exist";

            }else{
                if(isset($_FILES['wimg'])){
                    $image_name = $_FILES['wimg']['name'];
                    $image_type = $_FILES['wimg']['type'];
                    $tmp_name = $_FILES['wimg']['tmp_name'];

                    $img_explode = explode('.',$image_name);
                    $img_ext = end($img_explode);

                    $extensions = ["png","jpeg", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg","image/jpg","image/png"];
                        if(in_array($image_type,$types) === true){

                            $time = time();
                            $new_img_name = $time.$image_name;

                            if(move_uploaded_file($tmp_name, "images/".$new_img_name)){
                                $random_id = rand(time(),1000000);
                                $status = "Active now";
                                $encrypt_pass = md5($password);
                                $sql_insert = mysqli_query($conn,"INSERT INTO `userwebchat` (`webuserId`, `uniquewebId`, `wname`, `wlast`, `wemail`, `wpassword`, `wimg`, `webstatus`) VALUES (NULL, {$random_id}, '{$name}', '{$last}', '{$email}', '{$password}', '{$new_img_name}','{$status}')");
                                if($sql_insert){
                                    $sql_check = mysqli_query($conn, "SELECT * from userwebchat WHERE wemail = '{$email}'");
                                    if(mysqli_num_rows($sql_check)>0)
                                    {
                                        $result = mysqli_fetch_assoc($sql_check);
                                        $_SESSION['uniquewebId'] = $result['uniquewebId'];
                                        echo"success";
                                    }
                                    else{
                                        echo "email doesent exist";
                                    }
                                }else{
                                    echo"something went wrong";        
                                }
                            }
                        }else{
                            echo "Upload 2 jpg jpeg png";
                        }
                    }
                    else{
                        echo "Upload 1 jpg jpeg png";
                    }
                }
            }
        }
        else
        {
            echo"$email - This is not a valid email";    
        }
    }
    else{
        echo "All input are required";
    }
?>