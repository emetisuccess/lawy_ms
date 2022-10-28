<?php include "include/header.php"; ?>
<?php include "functions.php"; ?>
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
<div class="container">
    <div class="row center_form">
        <div class="col-lg-6 col-md-9 col-sm-12 my-5 ">
            <div class="card border-0 ">
                <div class="text-center">
                    <h2 class="mt-4 display-5">Login</h2>
                    <hr class="mb-4">
                </div>
                <span> <?php showAlert(); ?></span>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="form-group mt-4">
                            <input type="submit" name="login" value="Login"
                                class="btn btn-block btn-lg bk-dark text-white">
                        </div>
                        <div class="form-group mt-4 ">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Forgot Password ? <a href="emailcheck.php?reset_password">Reset</a> </p>
                                </div>
                                <div class="col-md-6">
                                    <p>Don't have an Account? <a href="signup.php">Sign up</a></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
<?php
if (isset($_POST["login"])) {

    //get input fields
    $email = secure_input($_POST["email"]);
    $password = secure_input($_POST["password"]);

    $hashFormat = "$2y$10$";
    $salt = "iusesomecrazystrings22";
    $hashF_and_salt = $hashFormat . $salt;
    $password = crypt($password, $hashF_and_salt);

    if (empty($email) || empty($password)) {

        $_SESSION['login'] = "<h6 class='text-danger'>Please fill in the fields</h6>";

        header("location: login.php");
    } else {

        $results = $conn->query("SELECT * FROM users WHERE
         email='$email' AND confirmpwd='$password'");

        $count = mysqli_num_rows($results);

        if ($count == 1) {
            $_SESSION['login'] = "<h6 class='text-success'>Logged in Successful</h6>";

            $_SESSION['email'] = $email;

            header("location: index.php");
        } else {

            $_SESSION['login'] = "<h5 class='text-danger text-center'>Invalid Login Details</h5>";

            header("location: login.php");
        }
    }
}