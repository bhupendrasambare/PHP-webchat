<?php 
include_once "./php/header.php"
?>
        <section class="form login">
            <header>Realtime Web Chat</header>
            <form action="#">
                <div class="error"></div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter Email">
                </div>
                <div class="field password input">
                    <label>Password</label>
                    <input type="password" name="password" class="pass-check" placeholder="Enter password">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to Chat">
                </div>
            </form>
            <div class="link">Don't have an account <a href="./index.php">Sign up</a></div>
        </section>
        <script src="./js/pass-info.js"></script>
        <script src="./js/login.js"></script>
    </div>
</body>
</html>