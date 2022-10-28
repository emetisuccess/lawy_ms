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

                <div class="card-body">
                    <div class="card-header text-center bk-dark text-white">
                        <h1> Reset Your Password </h1>
                    </div>
                    <div class="card-body">
                        <span><?php showAlert(); ?> </span>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" name="newpwd" class="form-control"
                                    placeholder="Enter New Password">
                            </div>
                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input type="password" name="confirmpwd" class="form-control"
                                    placeholder="Confirm New Password">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="resetpwd" value="Submit" class="btn bk-dark text-white ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>


<?php
if (isset($_POST['resetpwd'])) {
    // echo  $email = $_SESSION['emailcheck'];
    // die();
    $newpwd = $_POST['newpwd'];
    $confirmpwd = $_POST['confirmpwd'];


    $newhash = "$2y$10$";
    $newsalt = "iusesomecrazystrings22";
    $hash_and_salt =  $newhash . $newsalt;
    $newpwd = crypt($newpwd, $hash_and_salt);

    $conFhash = "$2y$10$";
    $conFsalt = "iusesomecrazystrings22";
    $conFhash_and_conFsalt = $conFhash . $conFsalt;
    $confirmpwd = crypt($confirmpwd, $conFhash_and_conFsalt);

    $email = $_SESSION['emailcheck'];

    $res = $conn->query("SELECT * FROM users WHERE email='$email'");
    while ($row = $res->fetch_assoc()) {
        $checkpwd = $row['confirmpwd'];
    }

    if ($newpwd == "" or $confirmpwd == "" or empty($newpwd) or empty($confirmpwd)) {
        $_SESSION['reset'] = "<h5>please all fields are Required</h5>";
        // header("location: changepwd.php");
    } else {

        if ($newpwd != $confirmpwd) {
            $_SESSION['reset'] = "<h5>Password doesn't match</h5>";
            // header("location: changempwd.php");
        } else {
            $update = $conn->query("UPDATE users set password='$newpwd', confirmpwd='$confirmpwd'  WHERE email='$email'");
            if (!$update) {
                die("QUERY FAILED " . mysqli_error($conn));
            } else {
                $_SESSION['reset'] = "<h5>Password Updated Successfully: <a href='login.php'>Login</a> </h5>";
                // header("location: changepwd.php");
            }
        }
    }
}

?>