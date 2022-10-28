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
        <div class="col-lg-5 col-md-9 col-sm-12 my-5 ">
            <div class="card border-0 ">
                <div class="text-center">
                    <h2 class="mt-4 display-5">Reset Password</h2>
                    <hr class="mb-4">
                </div>
                <span class="text-center">
                    <?php showAlert(); ?>
                </span>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="form-group mt-4">
                            <input type="submit" name="checkemail" value="Submit"
                                class="btn btn-block btn-lg bk-dark text-white">
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

if (isset($_POST['checkemail'])) {

    $email = $_POST['email'];

    if ($email === "" || empty($email)) {
        $_SESSION['login'] = "<h6>This Field is Required</h6>";
        header("Location: emailcheck.php");
    } else {

        $result = $conn->query("SELECT * FROM users WHERE email='$email'");

        $count = mysqli_num_rows($result);

        $_SESSION['emailcheck'] = $email;

        if ($count > 0) {
            if ($result) {
                header("Location: resetpassword.php");
            }
        } else {
            $_SESSION['login'] = "You Don't have an Account: <a href='signup.php'>SignUp</a>";
            header("Location: emailcheck.php");
        }
    }
}

?>