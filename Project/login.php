<?php
    include_once 'header.php';
?>

    <section class="signup-form">
        <h2>Log In</h2>
        <div class="signup-form-form">
            <form action="includes/login.inc.php" method="post">
                <label for="login-uname">Username/Email:</label>
                <input type="text" name="login-uname" placeholder="Username/Email...">
                <label for="login-pword">Password:</label>
                <input type="password" name="login-pword" placeholder="Password...">
                <button type="submit" name="submit">Log In</button>
            </form>
        </div>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p class='error-msg'>Fill in all fields.</p>";
            } else if ($_GET["error"] == "wronglogin") {
                echo "<p class='error-msg'>Login information is incorrect.</p>";
            } else if ($_GET["error"] == "wrongpassword") {
                echo "<p class='error-msg'>Password is incorrect.</p>";
            }
        }
        ?>
    </section>

</body>
</html>