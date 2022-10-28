<?php include("include/header.php"); ?>
<?php
// get the id to be update
if (isset($_GET["upd_cl"])) {
    // get the client id
    $id = $_GET["upd_cl"];

    $res = $conn->query("SELECT * FROM client_db WHERE id= $id");

    while ($rows = $res->fetch_assoc()) {
        $id = $rows["id"];
        $client_name = $rows["name"];
        $client_email = $rows["email"];
        $client_mobile = $rows["mobile"];
        $client_address = $rows["address"];
        $client_city = $rows["city"];
        $client_state = $rows["state"];
    }
}
?>
<?php include("include/menu.php"); ?>
<div class="ts-main-content">
    <?php include('include/leftbar.php'); ?>
    <div class="content-wrapper">
        <h2 class="page-title p-4">Update Client Dashboard</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1>Update Client</h1>
                        </div>
                        <div class="card-body">
                            <form action="update_client.php" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class=" form-group my-2">
                                            <label for="full_name">FullName</label>
                                            <input type="text" name="name" value="<?php echo $client_name; ?>"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" value="<?php echo $client_email; ?>"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input type="number" name="mobile" value="<?php echo $client_mobile; ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="address" value="<?php echo $client_address; ?>"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" name="city" value="<?php echo $client_city; ?>"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>State</label>
                                            <input type="text" name="state" value="<?php echo $client_state; ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" name="update_client" value="Update Client"
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
if (isset($_POST["update_client"])) {

    // the user input from input fields
    $id = $_POST["id"];
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
            WHERE id = $id");

    if ($result == true) {

        $_SESSION["update"] = "<div class='text-success pb-2'>Client has been updated successfully<div>";

        header("location: manage_client.php");
    } else {

        $_SESSION["update"] = "<div class='text-danger pb-3'>Something went wrong</div>";

        header("location: manage_client.php");
    }
}


?>