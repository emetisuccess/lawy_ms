<?php include("includes/header.php"); ?>
<?php include("includes/admin_login_check.php"); ?>
<?php include("functions.php"); ?>
<?php include("includes/menu.php"); ?>
<div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
        <h2 class="page-title p-4">Add Admin | Dashboard</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <?php showAlert(); ?>
                            <form action="add_admin.php" method="POST">
                                <div class=" form-group my-2">
                                    <label for="full_name">FullName</label>
                                    <input type="text" name="full_name" class="form-control"
                                        placeholder="Enter Fullname">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Enter Password">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="admin" value="Add Admin" class="btn text-white bk-dark">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("./includes/footer.php"); ?>
<?php
// get the target button;
if (isset($_POST['admin'])) {

    // get the input fields
    $fullname = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);


    $hashFormat = "$2y$10$";
    $salt = "iusesomecrazystrings22";
    $hashF_and_salt = $hashFormat . $salt;
    $password = crypt($password, $hashF_and_salt);

    // validate the input fields;
    if (empty($fullname) || empty($username) || empty($email) || empty($password)) {

        $_SESSION['msg'] = "<h5 class='text-danger text-center '>All Fields Are Required</h5>";

        header("location: add_user.php");
    } else {

        //insert into the database; 
        //  query database;
        $stmt = $conn->prepare("INSERT INTO admin (full_name, username, email, password) VALUES(?,?,?,?)");

        $stmt->bind_param("ssss", $fullname, $username, $email, $password);
        $stmt->execute();

        if (!$stmt) {
            // if the query failed, kill the process and redirect to add user page;
            die('QUERY FAILED' . mysqli_error($conn));

            // redirect to add user page;
            header("location:add_admin.php");
        }

        $stmt->close();
        $conn->close();
    }
}



?>