<?php include("include/config.php"); ?>
<?php
//get the id to be deleted

if (isset($_GET["del_fl"])) {

    $id = $_GET["del_fl"];

    $result = $conn->query("DELETE FROM files_db WHERE id = $id");

    if ($result == true) {

        $_SESSION['delete'] = "<div class='text-success'>File Deleted successfully</div>";

        header("location: manage_file.php");
    } else {

        $_SESSION['delete'] = "<div class='text-success'>Failed to Delete File</div>";

        header("location: manage_file.php");
    }
}