<?php include "includes/header.php"; ?>
<?php
if (isset($_SESSION['emails'])) {

    session_destroy();

    header("location: ../index.php");
}
?>