<?php

if (isset($_POST["submit"])) {

    // Retrive user-entered information
    $email_su = $_POST["signup-email"];
    $uname_su = $_POST["signup-uname"];
    $pword_su = $_POST["signup-pword"];
    $pwordRepeat = $_POST["pwordrepeat"];

    require_once 'library.php';
    require_once 'functions.inc.php';

    // If functions throw errors, redirect to new url with respective error thrown
    if (emptyInputSignup($email_su, $uname_su, $pword_su, $pwordRepeat) !== false) {
        header("Location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUname($uname_su) !== false) {
        header("Location: ../signup.php?error=invaliduname");
        exit();
    }

    if (invalidEmail($email_su) !== false) {
        header("Location: ../signup.php?error=invalidemail");
        exit();
    }

    if (pwordMatch($pword_su, $pwordRepeat) !== false) {
        header("Location: ../signup.php?error=pwordmismatch");
        exit();
    }

    if (userExists($conn, $uname_su, $email_su) !== false) {
        header("Location: ../signup.php?error=userexists");
        exit();
    }

    // If no errors are thrown, create new user
    createUser($conn, $email_su, $uname_su, $pword_su);

} else {
    header("Location: ../signup.php"); // If page is access incorrectly, send user to default signup page
    exit();
}

?>