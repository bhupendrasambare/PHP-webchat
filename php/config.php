<?php
    $conn = new mysqli("localhost", "root", "","webchat");
    if(!$conn)
    {
        echo"Connection Problem" . mysqli_connect_error();
    }
?>