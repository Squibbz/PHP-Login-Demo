
<?php

include_once 'header.php';
if (isset($_SESSION["username"])) { // If there is a valid username in session, display game
    echo "<section class='game-window'>";
    echo "<h1>Protected Window</h1>";
    echo "<iframe style = 'position: relative; margin: auto 0;' width='760' height='515' allow='fullscreen; autoplay; encrypted-media' src='https://games.construct.net/769/latest' frameborder='0' allowfullscreen='true' msallowfullscreen='true' mozallowfullscreen='true' webkitallowfullscreen='true' allowpaymentrequest='false' referrerpolicy='unsafe-url' sandbox='allow-same-origin allow-forms allow-scripts allow-pointer-lock allow-orientation-lock allow-popups' scrolling='no'></iframe>";
    echo "<p> Congratulations! You've successfully created an account and are allowed to access this super fun page! Enjoy a game of Super Mario (or, go and give my other projects a look on <a href='https://github.com/Squibbz'>Github</a>!</p>";
        echo "</section>";
} else {
    echo "<section class='failed-access'>"; // If no username detected, display prompt to sign up or log in
    echo "<h2>Sorry! You're not logged in!</h2>";
    echo "<span><p>To access this page, you need to be logged in to the website. This is because the website detects whether or not you are logged in via PHP session variables!</p><br/>";
    echo "<p>Click <a href='login.php'>here</a> to log in or <a href='signup.php'>here</a> to create an account.</p></span>";
    echo "</section>";
}

?>  
</div>
</body>
</html>

