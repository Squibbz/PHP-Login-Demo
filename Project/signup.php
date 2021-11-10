<?php
    include_once 'header.php';
?>

    <section class="signup-form">
        <h2>Sign Up</h2>
        <div class="signup-form-form">
            <form action="includes/signup.inc.php" method="post">
                <label for="signup-email">Email:</label>
                <input type="text" name="signup-email" placeholder="Email...">
                <label for="signup-uname">Username:</label>
                <input type="text" name="signup-uname" placeholder="Username...">
                <label for="signup-pword">Password:</label>
                <input type="password" name="signup-pword" placeholder="Password...">
                <label for="pwordrepeat">Verify Password:</label>
                <input type="password" name="pwordrepeat" placeholder="Verify Password...">
                <button type="submit" name="submit">Sign Up</button>
            </form>
        </div>
        <?php

        // If there is ?error=xxx in url, use $_GET method
        if (isset($_GET["error"])) {
            // Setting error messages to pop up below form with their respective error names
            if ($_GET["error"] == "emptyinput") {
                echo "<p class='error-msg'>Fill in all fields.</p>";
            } else if ($_GET["error"] == "invaliduname") {
                echo "<p class='error-msg'>Username must contain alphanumerical characters only.</p>";
            } else if ($_GET["error"] == "invalidemail") {
                echo "<p class='error-msg'>Please enter a valid email.</p>";
            } else if ($_GET["error"] == "pwordmisatch") {
                echo "<p class='error-msg'>Passwords do not match.</p>";
            } else if ($_GET["error"] == "userexists") {
                echo "<p class='error-msg'>Username/email is already taken.</p>";
            } else if ($_GET["error"] == "stmtfailed") {
                echo "<p class='error-msg'>Sorry! Something went wrong, please try again.</p>";
            } else if ($_GET["error"] == "none") {
                echo "<p class='success-msg'>You have signed up!</p>";
            }
        }

        ?>
    </section>
    
    

</body>
</html>