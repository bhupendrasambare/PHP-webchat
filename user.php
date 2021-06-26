<?php
    session_start();
    if(!isset($_SESSION['uniquewebId'])){
        header("location: login.php");
    }

?>
<?php 
include_once "./php/header.php"
?>
        <section class="user">
            <header>
            <?php
                include_once "./php/config.php";
                $sql = mysqli_query($conn, "SELECT * FROM userwebchat WHERE uniquewebId = {$_SESSION['uniquewebId']}");
                if(mysqli_num_rows($sql)>0){
                    $row = mysqli_fetch_assoc($sql);
                }
            ?>
                <div class="content">
                    <img src="<?php echo "./php/images/".$row['wimg'] ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['wname'] ." ". $row['wlast']?></span>
                        <p><?php echo $row['webstatus']?></p>
                    </div>
                </div>
                <a href="./php/logout.php?logout_id=<?php echo $row['uniquewebId'] ?>" class="logout">Logout</a>
            </header>
            <div class="serch">
                <span class="text">Select user to chat</span>
                <input type="text" placeholder="Enter name to serch...">
                <button onclick="serch()"><i class="fas fa-search"></i></button>
            </div>
            <div class="user-list">
            
            </div>
        </section>
    </div>
    <script src="./js/user-check.js"></script>
</body>
</html>