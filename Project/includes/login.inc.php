<?php

if (isset($_POST["submit"])) {

    //Retrive entered username and password
    $uname_login = $_POST["login-uname"];
    $pword_login = $_POST["login-pword"];

    require_once 'library.php';
    require_once 'functions.inc.php';

    // If emptyInputLogin returns anything but false, throw error in url
    if (emptyInputLogin($uname_login, $pword_login) !== false) {
        header("Location: ../login.php?error=emptyinput");
        exit();
    }

    // Call loginUser using entered username and password
    loginUser($conn, $uname_login, $pword_login);

} else {
    header("Location: ../login.php"); // Send user to login form if page is accessed incorrectly
    exit();
}

?>