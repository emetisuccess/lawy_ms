<?php include("./includes/header.php"); ?>
<?php include("includes/admin_login_check.php"); ?>
<?php include("./includes/menu.php"); ?>
<div class="ts-main-content">
    <?php include('./includes/leftbar.php'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <h2 class="page-title">Add File Dashboard</h2>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class=" bg-dark text-white mb-5 rounded px-4 py-4">
                        <div class=" text-center">
                            <h3></h3>
                        </div>
                        <form action="addFile.php" method="POST">
                            <div class="form-group">
                                <label>FullName</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your  Fullname">
                            </div>
                            <div class="form-group">
                                <label>Number</label>
                                <input type="number" name="number" class="form-control" placeholder="Enter File Number">
                            </div>
                            <div class="form-group">
                                <label>ClientID</label>
                                <input type="number" name="clientid" class="form-control"
                                    placeholder="Enter Your mobile number">
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" name="type" class="form-control" placeholder="Enter File Type">
                            </div>
                            <div class="form-group">
                                <label>Opening Date</label>
                                <input type="date" name="openingDate" class="form-control"
                                    placeholder="Enter Date Opened">
                            </div>
                            <div class="form-group">
                                <label>File</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>LawyerID</label>
                                <input type="number" name="lawyerid" class="form-control"
                                    placeholder="Enter Lawyer's ID">
                            </div>
                            <div class="form-group">
                                <label>Closing Date</label>
                                <input type="date" name="closedate" class="form-control"
                                    placeholder="Enter file closing date">
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

    //get user input
    $number = secure_input($_POST["number"]);
    $name = secure_input($_POST["name"]);
    $clientid = secure_input($_POST["clientid"]);
    $type = secure_input($_POST["type"]);
    $openingDate = secure_input($_POST["openingDate"]);
    $file = secure_input($_FILES["image"]['name']);
    $lawyerid = secure_input($_POST["lawyerid"]);
    $closingdate = secure_input($_POST["closedate"]);






    if (!$name || !$number || !$clientid || !$type || !$openingDate || !$file || !$lawyerid || !$closingdate) {

        // checks if the input fields is empty;
        $_SESSION['error_msg'] = "Please fill in the fields";
    } else {


        // insert user data into database;
        $stmt = $conn->prepare("INSERT INTO files_db(number,name, clientID, type, openingDate, files, lawyerID, closingDate) VALUES(?,?,?,?,?,?,?,?)");
        $stmt->bind_param("isisssis", $number, $name, $clientid, $type, $openingDate, $file, $lawyerid, $closingdate);
        $stmt->execute();

        // display session massage;
        $_SESSION["success"] = "File Successfully Uploaded";

        // redirect to manage_file.php;
        header("location:manage_file.php");


        $stmt->close();
        $conn->close();
    }
}