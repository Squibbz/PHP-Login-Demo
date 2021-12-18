<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Project</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <nav>
        <div class="nav-wrapper">
            <ul class="nav-list">
                <li class="nav-list-item"><a href="index.php" class="nav-list-link">Home</a></li>
                <li class="nav-list-item"><a href="protected.php" class="nav-list-link">Secret!</a></li>
                <?php
                // If there is a valid session username, display profile and logout tabs. If not, display sign up and login tabs
                    if (isset($_SESSION["username"])) {
                        echo "<li class='nav-list-item'><a href='profile.php' class='nav-list-link'>Profile</a></li>";
                        echo "<li class='nav-list-item'><a href='includes/logout.inc.php' class='nav-list-link'>Log Out</a></li>";
                    } else {
                        echo "<li class='nav-list-item'><a href='signup.php' class='nav-list-link'>Sign Up</a></li>";
                        echo "<li class='nav-list-item'><a href='login.php' class='nav-list-link'>Login</a></li>";
                    }
                ?>
                
            </ul>
        </div>
    </nav>