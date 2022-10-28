<?php
//start buffer loader to prevent header error;
ob_start();

//start session;
session_start();

//error reporting
// error_reporting(0);

// define("SITEURL", "localhost/law_ms/");
define("HOST", "localhost");
define("UNAME", "root");
define("PWORD", "");
define("DBNAME", "lawyer");

$conn = new mysqli(HOST, UNAME, PWORD, DBNAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// security for sql injection and cross-site scripting
function secure_input($data)
{
    global $conn;

    $data = trim($data);
    $data = htmlentities($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = stripcslashes($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}