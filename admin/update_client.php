<?php include("includes/header.php"); ?>
<?php include("includes/admin_login_check.php"); ?>
<?php include("functions.php"); ?>
<?php
// get the id to be update
if (isset($_GET["edit"])) {
    $id = $_GET["edit"];

    $res = $conn->query("SELECT * FROM client_db WHERE id=$id");

    $numRows = mysqli_num_rows($res);

    if ($numRows > 0) {
        $rows = $res->fetch_array();

        // $id = $rows["id"];
        $name = $rows["name"];
        $email = $rows["email"];
        $mobile = $rows["mobile"];
        $address = $rows["address"];
        $city = $rows["city"];
        $state = $rows["state"];
    }
}
?>
<?php include("includes/menu.php"); ?>
<div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Update Client | Dashboard</h2>
                    <div class=" bg-dark p-5 text-white rounded ">
                        <div class=" text-center">
                            <h3>session</h3>
                        </div>
                        <form action="update_client.php" method="POST">
                            <div class=" form-group my-2">
                                <label for="full_name">FullName</label>
                                <input type="text" name="name" value="<?php echo $name; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="<?php echo $email; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="number" name="mobile" value="<?php echo $mobile; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" value="<?php echo $address; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="city" value="<?php echo $city; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>State</label>
                                <input type="text" name="state" value="<?php echo $state; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="update_client" value="Update Client"
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
if (isset($_POST["update_client"])) {

    // the user input from input fields
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];

    // sqli query to update database
    $result = $conn->query("UPDATE client_db 
            SET name='$name', 
            email='$email', 
            mobile='$mobile', 
            address ='$address', 
            city='$city', 
            state='$state' 
            WHERE id=$id");

    if ($result == true) {
        $_SESSION["update"] = "Client has been updated successfully";
        header("location:update_client.php");
    } else {
        $_SESSION["update"] = "Something went wrong";
        header("location:manage_client.php");
    }
}