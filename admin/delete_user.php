<?php include("./includes/config.php"); ?>
<?php
//get the id to be deleted

if (isset($_GET["delete"])) {
    $id = $_GET["delete"];

    $result = $conn->query("DELETE FROM users_db WHERE id=$id AND role='user'");

    if ($result == true) {
        $_SESSION["delete"] = "Admin Deleted successfully";
        header("location:manage_admin.php");
    } else {
        $_SESSION["delete"] = "Admin failed to delete, something went wrong";
        header("location:manage_admin.php");
    }
}