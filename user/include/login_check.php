<?php
if (!isset($_SESSION['email'])) {
    // $_SESSION['msg'] = "<h5 class='text-danger text-center'>Login to Access this page!!</h5>";
    header("location: login.php");
}