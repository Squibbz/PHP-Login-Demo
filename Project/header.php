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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="html-wrapper">
    <nav class="navbar">
            <h1><a class="navbar-logo" href="https://github.com/Squibbz">CB</a></h1>
            <?php
                // If there is a valid session username, display username of current user
                if (isset($_SESSION["username"])) {
                    echo "<li class='nav-list-item' style='float: left; color: #fff;'>Signed in as: " . $_SESSION["username"] . "</li>";
                }
            ?>
            <ul class="nav-list">
                <li class="nav-list-item"><a href="index.php" class="nav-list-link">Home</a></li>
                <?php
                // If there is a valid session username, display profile and logout tabs. If not, display sign up and login tabs
                    if (isset($_SESSION["username"])) {
                        echo "<li class='nav-list-item'><a href='protected.php' class='nav-list-link'>Secret!</a></li>";
                        echo "<li class='nav-list-item'><a href='profile.php' class='nav-list-link'>Profile</a></li>";
                        echo "<li class='nav-list-item'><a href='includes/logout.inc.php' class='nav-list-link'>Log Out</a></li>";
                    } else {
                        echo "<li class='nav-list-item'><a href='signup.php' class='nav-list-link'>Sign Up</a></li>";
                        echo "<li class='nav-list-item'><a href='login.php' class='nav-list-link'>Login</a></li>";
                    }
                ?>
                
            </ul>
    </nav>