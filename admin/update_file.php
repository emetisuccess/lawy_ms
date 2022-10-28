<?php include("./includes/header.php"); ?>
<?php include("includes/admin_login_check.php"); ?>
<?php include("functions.php"); ?>

<?php
// get the id to be update
if (isset($_GET["edit"])) {
    $id = $_GET["edit"];

    $res = $conn->query("SELECT * FROM files_db WHERE number=$id");

    // $clientid= $conn->query("SELECT id FROM client_db ");

    $numRows = mysqli_num_rows($res);

    if ($numRows > 0) {
        $rows = $res->fetch_array();

        //get user input
        $name = secure_input($rows["name"]);
        $clientid = secure_input($rows["clientID"]);
        $type = secure_input($rows["type"]);
        $openingDate = secure_input($rows["openingDate"]);
        $file = secure_input($rows["files"]);
        $lawyerid = secure_input($rows["lawyerID"]);
        $closingdate = secure_input($rows["closingDate"]);
    }
} ?>
<?php include("includes/menu.php"); ?>
<div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Dashboard</h2>
                    <div class=" bg-dark p-5 text-white rounded ">
                        <div class=" text-center">
                            <h3>Update File</h3>
                        </div>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            </div>
                            <div class="form-group">
                                <label>ClientID</label>
                                <input type="number" name="clientid" class="form-control"
                                    value="<?php echo $clientid; ?>">
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" name="type" class="form-control" value="<?php echo $type; ?>">
                            </div>
                            <div class="form-group">
                                <label>Opening Date</label>
                                <input type="date" name="openingDate" class="form-control"
                                    value="<?php echo $openingDate; ?>">
                            </div>
                            <div class="form-group">
                                <label>File</label>
                                <input type="file" name="file" class="form-control" value="<?php echo $file; ?>">
                            </div>
                            <div class="form-group">
                                <label>LawyerID</label>
                                <input type="number" name="lawyerid" class="form-control"
                                    value="<?php echo $lawyerid; ?>">
                            </div>
                            <div class="form-group">
                                <label>Closing Date</label>
                                <input type="date" name="closedate" class="form-control"
                                    value="<?php echo $closingdate; ?>">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="upload_file" value="Upload File"
                                    class="btn btn-block btn-outline-light">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- footer -->
<?php include("./includes/footer.php"); ?>

<?php

if (isset($_POST["upload_file"])) {

    //get the user input from input fields
    $name = secure_input($_POST["name"]);
    $clientid = secure_input($_POST["clientid"]);
    $type = secure_input($_POST["type"]);
    $openingDate = secure_input($_POST["openingDate"]);
    $file = secure_input($_POST["file"]);
    $lawyerid = secure_input($_POST["lawyerid"]);
    $closingdate = secure_input($_POST["closedate"]);


    // echo $number, $name, $clientid, $type, $openingDate, $file, $lawyerid, $closingdate;

    // sqli query to update database
    $result = $conn->query("UPDATE files_db SET 
    name='$name',
    clientID='$clientid', 
    type ='$type', 
    openingDate='$openingDate', 
    files='$file', 
    lawyerID='$lawyerid',
    closingDate='$closingdate' WHERE number=$id");


    if ($result == true) {
        echo "File has been updated successfully";
    } else {
        echo "Something went wrong";
    }
}