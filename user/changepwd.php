<?php include("include/header.php"); ?>
<?php include("include/menu.php"); ?>
<?php include("functions.php"); ?>
<div class="ts-main-content">
    <?php include("include/leftbar.php"); ?>
    <div class="content-wrapper">
        <h2 class="page-title p-4">Personal Details Dashboard</h2>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card ">
                        <div class="card-header bk-dark text-white">
                            <h1> Update Details </h1>
                        </div>
                        <div class="card-body">
                            <form action="changepwd.php" method="POST">
                                <div class="form-group">
                                    <label for="email">Current Password</label>
                                    <input type="password" name="oldpwd" class="form-control" id="oldpwd"
                                        placeholder="Enter Old Password">
                                </div>
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
                                    <input type="submit" name="updatepwd" value="Submit"
                                        class="btn bk-dark text-white ">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("include/footer.php"); ?>

<?php
if (isset($_POST['updatepwd'])) {

    $oldpwd = $_POST['oldpwd'];
    $newpwd = $_POST['newpwd'];
    $confirmpwd = $_POST['confirmpwd'];

    $oldhash = "$2y$10$";
    $oldsalt = "iusesomecrazystrings22";
    $hashF_and_salt = $oldhash . $oldsalt;
    $oldpwd = crypt($oldpwd, $hashF_and_salt);

    $newhash = "$2y$10$";
    $newsalt = "iusesomecrazystrings22";
    $hash_and_salt =  $newhash . $newsalt;
    $newpwd = crypt($newpwd, $hash_and_salt);

    $conFhash = "$2y$10$";
    $conFsalt = "iusesomecrazystrings22";
    $conFhash_and_conFsalt = $conFhash . $conFsalt;
    $confirmpwd = crypt($confirmpwd, $conFhash_and_conFsalt);

    $email = $_SESSION['email'];

    $res = $conn->query("SELECT * FROM users WHERE email='$email'");
    while ($row = $res->fetch_assoc()) {
        $checkpwd = $row['confirmpwd'];
    }

    if ($oldpwd == "" or $newpwd == "" or $confirmpwd == "") {
        echo "<h5>please all fields are Required</h5>";
        // header("location: changepwd.php");
    } else {
        if ($checkpwd !== $oldpwd) {
            echo "<h5>The old Password doesn't match</h5>";
            // header("location: changepwd.php");
        } else {
            if ($newpwd != $confirmpwd) {
                echo "<h5>Password doesn't match</h5>";
                // header("location: changempwd.php");
            } else {
                $update = $conn->query("UPDATE users set password='$newpwd', confirmpwd='$confirmpwd'  WHERE email='$email'");
                if (!$update) {
                    die("QUERY FAILED " . mysqli_error($conn));
                } else {
                    echo "<h5>Password Updated Successfully</h5>";
                    // header("location: changepwd.php");
                }
            }
        }
    }
}

?>