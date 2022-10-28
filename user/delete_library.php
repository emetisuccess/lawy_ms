<?php include("include/config.php"); ?>
<?php

// get the link to be deleted;
if (isset($_GET["del"])) {

    $id = $_GET["del"];

    $result = $conn->query("DELETE FROM library_db WHERE number=$id");

    if ($result == true) {
        $_SESSION["deleted"] = "Resource Deleted Successfully";
    } else {
        $_SESSION["deleted"] =  "Something went wrong";
    }
}