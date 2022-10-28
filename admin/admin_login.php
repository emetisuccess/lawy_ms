<?php include("includes/header.php"); ?>
<?php include("functions.php"); ?>
<style>
* {
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
}

body {
    background-image: url("../images/scales-justice-ICON.png");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100vh;
    width: 100vw;
}
</style>

<body>
    <div class="container">
        <div class="row center_form">
            <div class="col-md-6 my-5 ">
                <div class="card border-0 ">
                    <div class="text-center">
                        <h2 class="mt-4 display-5">Login | Admin </h2>
                        <hr class="mb-4">
                    </div>
                    <?php showAlert();  ?>
                    <div class="card-body">
                        <form action="admin_login.php" method="POST">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Enter Password">
                            </div>
                            <div class="form-group mt-4">
                                <input type="submit" name="admin_login" value="Login"
                                    class="btn btn-block btn-lg bk-dark text-white">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
if (isset($_POST['admin_login'])) {

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $hashFormat = "$2y$10$";
    $salt = "iusesomecrazystrings22";
    $hashF_and_salt = $hashFormat . $salt;
    $password = crypt($password, $hashF_and_salt);

    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "<h5 class='text-danger text-center'>All fields are Required</h5>";
        header("location: admin_login.php");
    } else {

        $result = $conn->query("SELECT * FROM admin WHERE 
        email='$email' AND password='$password'");

        $count = mysqli_num_rows($result);

        if ($count == 1) {
            $_SESSION['emails'] = $email;

            header("location: index.php");
        } else {
            $_SESSION['error'] = "<h5 class='text-danger text-center'>Invalid Login Details</h5>";

            header("location: admin_login.php");
        }
    }
}

?>