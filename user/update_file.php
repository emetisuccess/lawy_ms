<?php include("include/header.php"); ?>

<?php
// get the id to be update
if (isset($_GET["edit_fl"])) {

    $id = $_GET["edit_fl"];

    $res = $conn->query("SELECT * FROM files_db WHERE id = $id");
    while ($rows = $res->fetch_assoc()) {
        //get user input
        $fname = secure_input($rows["name"]);
        $filenumber = secure_input($rows["number"]);
        $clientid = secure_input($rows["clientID"]);
        $type = secure_input($rows["type"]);
        $openingDate = secure_input($rows["openingDate"]);
        $file = secure_input($rows["files"]);
        $lawyerid = secure_input($rows["lawyerID"]);
        $closingdate = secure_input($rows["closingDate"]);
    }
}
?>
<?php include("include/menu.php"); ?>
<div class="ts-main-content">
    <?php include('include/leftbar.php'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <h2 class="page-title p-4">Update File Dashboard</h2>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h1>Update File</h1>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name Of File</label>
                                            <input type="text" name="name" class="form-control"
                                                value="<?php echo $fname; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>File Number</label>
                                            <input type="text" name="filenumber" class="form-control"
                                                value="<?php echo  $filenumber; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>ClientID</label>
                                            <input type="number" name="clientid" class="form-control"
                                                value="<?php echo $clientid; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Type</label>
                                            <input type="text" name="type" class="form-control"
                                                value="<?php echo $type; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Opening Date</label>
                                            <input type="date" name="openingDate" class="form-control"
                                                value="<?php echo $openingDate; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>File</label>
                                            <input type="file" name="file" class="form-control"
                                                value="<?php echo $file; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>LawyerID</label>
                                            <input type="text" name="lawyerid" class="form-control"
                                                value="<?php echo $lawyerid; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Closing Date</label>
                                            <input type="date" name="closedate" class="form-control"
                                                value="<?php echo $closingdate; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="upload_file" value="Upload File"
                                        class="btn bk-dark text-white">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer -->
<?php include("include/footer.php"); ?>

<?php

if (isset($_POST["upload_file"])) {

    //get the user input from input fields
    $name = secure_input($_POST["name"]);
    $fileNumber = secure_input($_POST["filenumber"]);
    $clientid = secure_input($_POST["clientid"]);
    $type = secure_input($_POST["type"]);
    $openingDate = secure_input($_POST["openingDate"]);
    $file = secure_input($_FILES["file"]['name']);
    $lawyerid = secure_input($_POST["lawyerid"]);
    $closingdate = secure_input($_POST["closedate"]);


    // echo $number, $name, $clientid, $type, $openingDate, $file, $lawyerid, $closingdate;

    // sqli query to update database
    $result = $conn->query("UPDATE files_db SET 
    name='$name',
    number='$fileNumber',
    clientID='$clientid', 
    type ='$type', 
    openingDate='$openingDate', 
    files='$file', 
    lawyerID='$lawyerid',
    closingDate='$closingdate' WHERE id = $id");


    if ($result == true) {

        // if the file has been updated display this message;
        $_SESSION["update"] = "<div class='text-success'>File has been updated successfully</div>";

        // then redirect to manage_file.php page;
        header("location: manage_file.php");
    } else {

        // display the session message if it failed to update;
        $_SESSION["update"] =  "<div class='text-danger'>Something went wrong</div>";

        // redirect to manage_file.php  page
        header("location: manage_file.php");
    }
}