<?php include("./includes/header.php"); ?>
<?php include("includes/admin_login_check.php"); ?>
<?php include("functions.php"); ?>
<?php include("./includes/menu.php"); ?>
<div class="ts-main-content">
    <?php include('./includes/leftbar.php'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Add Resource Dashboard</h2>
                    <div class="text-danger text-capitalize">
                        <?php
                        if (isset($_SESSION["msg"])) {
                            echo $_SESSION["msg"];
                            unset($_SESSION["msg"]);
                        }
                        ?>
                    </div>
                    <form action="addLibrary.php" method="POST" enctype="multipart/form-data">
                        <div class=" form-group my-2">
                            <label>Number</label>
                            <input type="number" name="number" value="<?php echo rand(000000, 999999); ?>"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your  Name">
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <input type="text" name="type" class="form-control" placeholder="Enter Your Case type">
                        </div>
                        <div class="form-group">
                            <label>Upload Date</label>
                            <input type="date" name="uploadDate" class="form-control" placeholder="Select Date">
                        </div>
                        <div class="form-group">
                            <label>Files</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">LawyerID</label>
                            <input type="text" name="lawyerID" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="add_library" value="Add Resource" class="btn btn-dark">
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
if (isset($_POST["add_library"])) {

    // get input fields;
    $number = $_POST["number"];
    $name = $_POST["name"];
    $type = $_POST["type"];
    $uploadDate = $_POST["uploadDate"];
    $file = $_POST["file"];
    $lawyerID = $_POST["lawyerID"];


    if (
        !$number || !$name || !$type ||
        !$uploadDate || !$file || !$lawyerID
    ) {
        $_SESSION["msg"] = "All fields are required";

        header("location:addLibrary.php");
    } else {

        $stmt = $conn->prepare("INSERT INTO library_db(number, name, type, uploadDate, files, lawyerID) 
        VALUES(?,?,?,?,?,?)");
        $stmt->bind_param("issssi", $number, $name, $type, $uploadDate, $file, $lawyerID);
        $stmt->execute();

        if ($stmt == true) {
            $_SESSION["msg"] = "File Added Successfully";

            header("location: manage_library.php");
        } else {
            $_SESSION["msg"] = "An error occur, please try again!!!";

            header("location:../add_library.php");
        }

        $stmt->close();
        $conn->close();
    }
}