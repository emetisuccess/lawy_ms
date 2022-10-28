<?php include("include/header.php"); ?>
<?php include("functions.php"); ?>
<?php include("include/menu.php"); ?>
<?php
if (isset($_SESSION['email'])) {

    $email = $_SESSION['email'];

    // for lawyer id
    $query = "SELECT * FROM lawyer_db WHERE email = '{$email}' ";

    $select_lawyer_id = mysqli_query($conn, $query);

    while ($rows = $select_lawyer_id->fetch_assoc()) {
        $lawyer_id = $rows['lawyer_id'];
    }
}
?>
<div class="ts-main-content">
    <?php include('include/leftbar.php'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <h2 class="page-title p-4">Add File Dashboard</h2>
            <?php showAlert(); ?>
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="p-2">Add File</h5>
                        </div>
                        <div class="card-body">
                            <form action="addFile.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name Of File</label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Enter Client A vs Client B">
                                        </div>
                                        <div class="form-group">
                                            <label>File Number</label>
                                            <input type="text" name="number" class="form-control"
                                                placeholder="Enter Court & Case Number">
                                        </div>
                                        <div class="form-group">
                                            <label>Select ClientID</label>
                                            <select name="clientid" id="" class="form-control">
                                                <option value="">Select Client</option>
                                                <?php
                                                // for client id;
                                                $result = $conn->query("SELECT * FROM client_db WHERE client_lawyer_id= '{$lawyer_id}'");
                                                while ($row = $result->fetch_assoc()) {
                                                    $client_id = $row['id'];
                                                    $client_name = $row['name'];
                                                ?>
                                                <option value="<?php echo $client_id; ?>"><?php echo $client_name; ?>
                                                </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class=" form-group">
                                            <label>Case Type</label>
                                            <input type="text" name="type" class="form-control"
                                                placeholder="Enter Case Type">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date Case Was Reported</label>
                                            <input type="date" name="openingDate" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>File</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>LawyerID</label>
                                            <input type="text" name="lawyerid" class="form-control"
                                                value="<?php echo $lawyer_id; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Closing Date of Case</label>
                                            <input type="date" name="closedate" class="form-control"
                                                placeholder="Enter file closing date">
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
    <!-- footer -->
    <?php include("include/footer.php"); ?>

    <?php
    if (isset($_POST["upload_file"])) {

        //get user input
        $number = secure_input($_POST["number"]);
        $name = secure_input($_POST["name"]);
        $clientid = secure_input($_POST["clientid"]);
        $type = secure_input($_POST["type"]);
        $openingDate = date('d-m-y');
        $file = $_FILES['image']['name'];
        $lawyerid = secure_input($_POST["lawyerid"]);
        $closingdate = secure_input($_POST["closedate"]);


        if (!$name || !$number || !$clientid || !$type || !$file || !$lawyerid) {

            // checks if the input fields is empty and display the message;
            $_SESSION['success'] = "<div class='text-danger p-2'>All Fields are Required</div>";

            // redirect to the same page if the fields are empty;
            header("location: addFile.php");
        } else {

            // insert user data into database;
            $stmt = $conn->prepare("INSERT INTO files_db(name, number, clientID, type, openingDate, files, lawyerID, closingDate) VALUES(?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssssssss", $name, $number, $clientid, $type, $openingDate, $file, $lawyerid, $closingdate);
            $stmt->execute();

            // display session massage;
            $_SESSION["success"] = "<div class='text-success p-2'>File Successfully Uploaded</div>";

            // redirect to manage_file.php;
            header("location: manage_file.php");

            $stmt->close();
            $conn->close();
        }
    }