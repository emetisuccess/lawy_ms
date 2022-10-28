<?php include("include/header.php"); ?>
<?php
if (isset($_SESSION['email'])) {

    // destroy the session
    session_destroy();

    // redirect to the login page
    header("location: ../index.php");
} else if (isset($_SESSION['emails'])) {

    // destroy the session
    session_destroy();

    // redirect to the login page
    header("location: ../index.php");
}

?>