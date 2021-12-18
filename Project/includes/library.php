<?php

/***********************
    DATABASE HANDLING
************************/

/* To create database, insert this statement into MySql:

create database phplogin;

use database phplogin;

*/

//Create database connection
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'phplogin';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}

// Create table in database if it does not already exist
function make_table() {

    // Include to $conn variable
    global $conn;

    $sql = "CREATE TABLE IF NOT EXISTS accounts (
    userid INT(11) NOT NULL AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL,
    username VARCHAR(20) NOT NULL,
    pword VARCHAR(255) NOT NULL,
    regdate DATE DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY(userid)
    )";

    $result = mysqli_query($conn, $sql);
}