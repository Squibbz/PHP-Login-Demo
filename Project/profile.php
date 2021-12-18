<?php
    include_once 'header.php';
?>

<section class="signup-form">
        <h2>Profile Information</h2>
        <div class="signup-form-form">
                <label for="login-uname">Username:</label>
                <?php echo $_SESSION['username'] ?><br />
                <label for="login-uname">Email:</label>
                <?php echo $_SESSION['email'] ?><br />
                <label for="login-uname">Date Joined:</label>
                <?php echo $_SESSION['regdate'] ?>
            </form>
        </div>
    </section>

    <section>
        
            <form class="signup-form" action="includes/profile.inc.php" method="post">
                <h2>Change Password</h2><h2></h2>
                <label for="login-uname">Username:</label>
                <input type="text" name="login-uname" placeholder="Username...">
                <label for="login-pword">Current Password:</label>
                <input type="password" name="login-pword" placeholder="Current Password...">
                <label for="new-login-pword">New Password:</label>
                <input type="password" name="new-login-pword" placeholder="New Password...">
                <label for="new-login-pword">Verify New Password:</label>
                <input type="password" name="verify-new-login-pword" placeholder="Repeat Password...">
                <button class="btn" type="submit" name="submit">Change Password</button>
            
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p class='error-msg'>Fill in all fields.</p>";
            } else if ($_GET["error"] == "wronglogin") {
                echo "<p class='error-msg'>Login information is incorrect.</p>";
            } else if ($_GET["error"] == "pwordmismatch") {
                echo "<p class='error-msg'>New password entries do not match. Please try again.</p>";
            }else if ($_GET["error"] == "none") {
                echo "<p class='success-msg'>Password changed successfully.</p>";
            }
        }
        ?>
        </form>
    </section>
    </div>
</body>
</html>