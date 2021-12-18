<?php

    session_start(); // Initialize session
    session_unset(); // Unset ALL variables (globals not cleared by session_destroy())
    session_destroy(); // Destroy session

    header("Location: ../index.php") // Return to home upon logout

?>