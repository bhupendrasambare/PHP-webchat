<?php
    session_start();
    include_once "./php/config.php";
    if(!isset($_SESSION['uniquewebId'])){
        header("location: login.php");
    }
?>
<?php 
include_once "./php/header.php";
?>
        <section class="chat-area">
            <header>
            <?php
                $webuserId = mysqli_real_escape_string($conn, $_GET['uniquewebId']);
                $sql = mysqli_query($conn, "SELECT * FROM userwebchat WHERE uniquewebId = {$webuserId}");
                if(mysqli_num_rows($sql)>0){
                    $row = mysqli_fetch_assoc($sql);
                }
                else{
                    "location:users.php";
                }
            ?>
                <a href="./user.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="<?php echo "./php/images/".$row['wimg'] ?>" alt="">
                <div class="details">
                    <span><?php echo $row['wname'] ." ". $row['wlast']?></span>
                    <p><?php echo $row['webstatus']?></p>
                </div>
            </header>
            <div class="chat-box">
            </div>
            <form class="typing-area" action="#" >
                <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $webuserId?>" hidden>
                <input type="text" name="massage" class="input" placeholder="Enter massage...">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>
    <script src="./js/chat.js"></script>
</body>
</html>