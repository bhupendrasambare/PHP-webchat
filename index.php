<?php 
include_once "./php/header.php"
?>
<section class="form signup">
            <header>Realtime Web Chat</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>Frist Name</label>
                        <input type="text" name="wname" placeholder="Frist name" required>
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="wlast" placeholder="Last name" required>
                    </div>
                </div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="email" name="wemail" placeholder="Enter Email" required>
                </div>
                <div class="field password input">
                    <label>Password</label>
                    <input type="password" name="wpassword" placeholder="Enter password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label>Select Image</label>
                    <input type="file" name="wimg" required>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to Chat">
                </div>
            </form>
            <div class="link">Alredy signed up? <a href="./login.php">Login Now</a></div>
        </section>
        <script src="./pass-info.js"></script>
    </div>
    <script src="./js/signup_php.js"></script>
</body>
</html>