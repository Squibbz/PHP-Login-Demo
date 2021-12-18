<?php

/**************************
      SIGNUP FUNCTIONS
***************************/

function emptyInputSignup($email, $uname, $pword, $pwordRepeat) {
    $result;

    if (empty($email) || empty($uname) || empty($pword) || empty($pwordRepeat)) { // If input missing from any of these fields, return true
        $result = true;
    } else { // Else return false
        $result = false;
    }

    return $result;
}

function invalidUname($uname) {
    $result;

    if (!preg_match("/^[a-zA-Z0-9]*$/", $uname)) { // If username is NOT alphanumerical, return true (invalidUname = true)
        $result = true;
    } else {
        $result = false; // Else return false
    }

    return $result;
}

function invalidEmail($email) {
    $result;

    // Using built-in filter_var() function
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // If email is not valid (xxx@xxx.com), return true (invalidEmail = true)
        $result = true;
    } else {
        $result = false; // Else return false
    }

    return $result;
}

function pwordMatch($pword, $pwordRepeat) {
    $result;

    if ($pword !== $pwordRepeat) { // If first password is not the same as the second password, return true (pwordMatch = true)
        $result = true;
    } else {
        $result = false; // Else return false
    }
    return $result;
}

function userExists($conn, $uname, $email) {
    
    // Prepared statement prevents user from entering code into form and performing an SQL injection attack
    // Without a prepared statement, all inputs are being sent DIRECTLY to the database on submission
    // This will send input piece by piece and fill in the placeholders of the premade statement

    $sql = "SELECT * FROM accounts WHERE username = ? OR email = ?;"; // Basic prepared statement (select all from accounts where username OR email = *placeholder*)
    $stmt = mysqli_stmt_init($conn); // Initalize mysqli_stmt with connection to proper database
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=stmtfailed"); // If prepared statement fails, return error
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $uname, $email); // Pass user data (two strings, hence "ss") to stmt parameters

    mysqli_stmt_execute($stmt); 

    $resultData = mysqli_stmt_get_result($stmt); // Set data of stmt to $resultData variable

    if ($row = mysqli_fetch_assoc($resultData)) { // Fetch data within $resultData as an associative array
        return $row; // Returns as true if there is data in the function, also sets $row to the function's output as an associative array for use when logging in
    } else {
        $result = false;
        return $result; // If there is no data in $resultData (the stmt), then userExists = false
    }

    mysqli_stmt_close($stmt);

}

function createUser($conn, $email, $uname, $pword) {
    
    $sql = "INSERT INTO accounts (email, username, pword) VALUES (?, ?, ?);"; // Prepared statement for inserting data into table
    $stmt = mysqli_stmt_init($conn); // Establishing database connection with mysqli_stmt
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=stmtfailed"); // If prepare statement fails, return error
        exit();
    }

    $hashedPword = password_hash($pword, PASSWORD_DEFAULT); // Hashing password using password_hash and default algorithm

    mysqli_stmt_bind_param($stmt, "sss", $email, $uname, $hashedPword); // Insert user data to table as three strings
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../signup.php?error=none"); // Returns no error meaning user has been successfully created
    exit();
}

/**************************
      LOGIN FUNCTIONS
***************************/

function emptyInputLogin($uname, $pword) {
    $result;

    if (empty($uname) || empty($pword)) { // If username or password variables are empty, return emptyInputLogin = true
        $result = true;
    } else {
        $result = false; // Else return false
    }

    return $result;
}

function loginUser($conn, $uname_login, $pword_login) {

    $checkUserExists = userExists($conn, $uname_login, $uname_login); /* Checking that userExists with $uname in place of username AND email parameters
                                                                         to account for either being entered by user for login */

    $storedHash = $checkUserExists["pword"]; // Retrieving hashed password from previously established associative array
    $checkPword = password_verify($pword_login, $storedHash); // Comparing entered password to hashed password

    if ($checkUserExists === false || $checkPword === false) {
        header("Location: ../login.php?error=wronglogin"); // If user does not exist in database, throw error
        exit();
    } else if ($checkPword === true) {
        session_start(); // If passwords match, start session and initialize user's id and username as session variables
        $_SESSION["userid"] = $checkUserExists["userid"];
        $_SESSION["username"] = $checkUserExists["username"];
        $_SESSION["email"] = $checkUserExists["email"];
        $_SESSION["regdate"] = $checkUserExists["regdate"];
        header("Location: ../index.php"); // Return to homepage
        exit();
    }

}

/**************************
      PROFILE FUNCTIONS
***************************/

function emptyPasswordInput($uname, $pword, $pword_new) {
    $result;

    if (empty($uname) || empty($pword)) { // If username or password variables are empty, return emptyInputLogin = true
        $result = true;
    } else {
        $result = false; // Else return false
    }

    return $result;
}

function changePassword ($conn, $uname_verify, $pword_verify, $pword_new) {

    $checkUserExists = userExists($conn, $uname_verify, $uname_verify); /* Checking that userExists with $uname in place of username AND email parameters
                                                                         to account for either being entered by user for login */
                                                             
    $sql = "UPDATE accounts SET pword = ? WHERE username = ? OR email = ?;"; // Basic prepared statement (select all from accounts where username OR email = *placeholder*)
    $stmt = mysqli_stmt_init($conn); // Initalize mysqli_stmt with connection to proper database
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../profile.php?error=stmtfailed"); // If prepared statement fails, return error
        exit();
    }

    

    $storedHash = $checkUserExists["pword"]; // Retrieving hashed password from previously established associative array
    $checkPword = password_verify($pword_verify, $storedHash); // Comparing entered CURRENT password to hashed password
    $hashedNewPword = password_hash($pword_new, PASSWORD_DEFAULT); // Hashing new password using password_hash and default algorithm

    mysqli_stmt_bind_param($stmt, "sss", $hashedNewPword, $uname_verify, $uname_verify); // Pass user data (three strings, hence "sss") to stmt parameters

    if ($checkUserExists === false || $checkPword === false) {
        header("Location: ../profile.php?error=wronglogin"); // If user does not exist in database, throw error
        exit();
    } else if ($checkPword === true) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../profile.php?error=none"); // Returns no error meaning user has been successfully created
        exit();
    }
    
}

?>