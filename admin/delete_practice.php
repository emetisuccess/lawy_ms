<?php include("includes/header.php"); ?>
<?php

if (isset($_GET['del'])) {

    $del_id = $_GET['del'];

    $res = $conn->query("DELETE FROM practiceArea WHERE p_id=$del_id");

    if (!$res) {
        die("QUERY FAILED " . mysqli_errno($conn));
    } else {

        $_SESSION['delete'] = "<h5 class='text-success'>Practice Area Has been Deleted Successfully</h5>";

        header("location: manage_practice.php");
    }
}


?>