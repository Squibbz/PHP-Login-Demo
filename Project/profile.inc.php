<?php

if (isset($_POST["submit"])) {

    //Retrive entered username and password
    $uname_verify = $_POST["login-uname"];
    $pword_verify = $_POST["login-pword"];
    $pword_new = $_POST["new-login-pword"];
    $pword_new_verify = $_POST["verify-new-login-pword"];

    require_once 'library.php';
    require_once 'functions.inc.php';

    // If emptyInputLogin returns anything but false, throw error in url
    if (emptyPasswordInput($uname_verify, $pword_verify, $pword_new) !== false) {
        header("Location: ../profile.php?error=emptyinput");
        exit();
    }

    // If pwordMatch returns anything but false, throw error in url
    if (pwordMatch($pword_new, $pword_new_verify) !== false) {
        header("Location: ../profile.php?error=pwordmismatch");
        exit();
    }

    // Call loginUser using entered username and password
    changePassword($conn, $uname_verify, $pword_verify, $pword_new);

} else {
    header("Location: ../profile.php"); // Send user to login form if page is accessed incorrectly
    exit();
}

?>