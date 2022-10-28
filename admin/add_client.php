<?php include("./includes/header.php"); ?>
<?php include("includes/admin_login_check.php"); ?>
<?php include("functions.php"); ?>
<?php include("./includes/menu.php"); ?>
<div class="ts-main-content">
    <?php include('./includes/leftbar.php'); ?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Add Client Dashboard</h2>
                    <div class="p-5 rounded my-3">
                        <h4 class="text-danger">
                            <?php
                            if (isset($_SESSION["error"])) {
                                echo $_SESSION["error"];
                                unset($_SESSION["error"]);
                            }

                            if (isset($_SESSION["success"])) {
                                echo $_SESSION["success"];
                                unset($_SESSION["success"]);
                            }
                            ?>
                        </h4>
                        <div class="card">
                            <div class="card-header bk-dark text-white">
                                <h1>Add Client</h1>
                            </div>
                            <div class="card-body">
                                <form action="add_client.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class=" form-group">
                                                <label for="full_name">FullName</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Enter your  Fullname">
                                            </div>
                                            <div class="form-group">
                                                <label for="username">Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="Enter your  Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Mobile</label>
                                                <input type="text" name="mobile" class="form-control"
                                                    placeholder="Enter Your mobile number">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Address</label>
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="Enter Your Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">City</label>
                                        <input type="text" name="city" class="form-control"
                                            placeholder="Enter Your Current city">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">State</label>
                                        <input type="text" name="state" class="form-control"
                                            placeholder="Enter Your Current State">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="add_client" value="Add Client"
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
</div>
<!-- footer -->
<?php include("./includes/footer.php"); ?>


<?php


if (isset($_POST["add_client"])) {

    //get user input
    $full_name = secure_input($_POST["name"]);
    $email = secure_input($_POST["email"]);
    $mobile = secure_input($_POST["mobile"]);
    $address = secure_input($_POST["address"]);
    $city = secure_input($_POST["city"]);
    $state = secure_input($_POST["state"]);



    if (!$full_name || !$email || !$mobile || !$address || !$city || !$state) {

        $_SESSION["error"] = "Please fill in the fields";

        header("location:../add_client.php");
    } else {

        // insert user data into database;
        $stmt = $conn->prepare("INSERT INTO client_db(name,email, mobile, address, city, state) VALUES(?,?,?,?,?,?)");
        $stmt->bind_param("ssisss", $full_name, $email, $mobile, $address, $city, $state);
        $stmt->execute();

        $_SESSION["success"] = "Client Successfully Added";

        header("location:./manage_client.php"); //manage_client.php

        $stmt->close();
        $conn->close();
    }
}