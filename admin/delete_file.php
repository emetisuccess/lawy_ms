<?php include("./includes/config.php"); ?>
<?php
//get the id to be deleted

if (isset($_GET["number"])) {
    $id = $_GET["number"];

    $result = $conn->query("DELETE FROM files_db WHERE number=$id");

    if ($result == true) {
        echo "File Deleted successfully";
    } else {
        echo "File failed to delete, something went wrong";
    }
}