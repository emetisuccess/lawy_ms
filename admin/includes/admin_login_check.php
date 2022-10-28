<?php require_once("header.php"); ?>
<?php
if (!$_SESSION['emails']) {

    // $_SESSION['msg'] = "<h6 class='text-danger text-center'></h6>";

    header("location: admin_login.php");
}
?>