<?php include("./includes/config.php"); ?>

<?php
//get the id to be deleted

if (isset($_GET["del"])) {
    $id = $_GET["del"];

    $result = $conn->query("DELETE FROM client_db WHERE id=$id");

    if ($result == true) {

        $_SESSION['delete'] = "Client Deleted successfully";

        header("location: manage_client.php");
    } else {

        $_SESSION["delete"] = "Client failed to delete, something went wrong";

        header("location: manage_client.php");
    }
}