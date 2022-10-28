<?php include("./includes/config.php"); ?>
<?php include("./functions.php"); ?>
<?php
//get the target link
if (isset($_GET["del"]) && isset($_GET['image'])) {

    // get the target link
    $id = $_GET["del"];

    // get the image link;
    $image = $_GET['image'];

    // check if there is image present or not
    if ($image != "") {

        // get the image path;
        $image_path = "../uploads/" . $image;

        // remove the image once the delete button is clicked;
        $remove_image = unlink($image_path);

        // check if the image has been removed or not;
        if ($remove_image == false) {

            // display the message if the condition is true;
            $_SESSION["success"] = "<h5 class='text-danger'>Failed to Remove image!!</h5>";

            // redirect to manage lawyer page;
            header("location: manage_lawyer.php");

            // if the image failed to delete kill the process;
            die();
        }
    }


    // query the database to delete a field
    $res = $conn->query("DELETE FROM lawyer_db WHERE id=$id");

    // check if the record has been deleted or not;
    if ($res === true) {

        // display the success message;
        $_SESSION["success"] = "<h5 class='text-danger'>Lawyer Deleted successfully!!</h5>";

        // redirect to manage lawyer page;
        header("location: manage_lawyer.php");
    } else {

        // display the failure message
        $_SESSION["success"] = "<h5 class='text-danger'>Lawyer failed to delete, try again!!</h5>";

        // redirect to manage lawyer page;
        header("location: manage_lawyer.php");
    }
}