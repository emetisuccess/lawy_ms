<?php include("includes/header.php"); ?>
<?php include("includes/admin_login_check.php"); ?>
<?php include("functions.php"); ?>
<?php include("includes/menu.php"); ?>
<div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-11">
                    <h2 class="page-title">Change Password Dashboard</h2>
                    <form action="changePassword.php" method="post">
                        <div class="form-group">
                            <label for="">Old Password</label>
                            <input type="text" name="oldpwd" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">New Password</label>
                            <input type="text" name="newpwd" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="text" name="confirmpwd" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="changepwd" value="Change Password" class="btn btn-dark">
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

if (isset($_POST["changepwd"])) {

    $oldpwd = $_POST["oldpwd"]; //NB, md5 hashing algorithm is not a powerful password hashing ;

    $newpwd = md5($_POST["newpwd"]);

    $confirmpwd = md5($_POST["confirmpwd"]);

    if (!$oldpwd  ||  !$newpwd  || !$confirmpwd) {

        echo "Please Fill in the fields";
    } else {
        $result = $conn->query("SELECT * FROM admin_db") or die(mysqli_error($conn));

        while ($row = $result->fetch_assoc()) {

            $row["password"];

            $id = $row["id"];

            // condition to met before successful execution
            if ($oldpwd === $row["password"]) {

                if ($newpwd === $confirmpwd) {

                    $stmt = $conn->query("UPDATE admin_db SET password='$newpwd' WHERE id=$id") or die(mysqli_error($conn));

                    if ($stmt = true) {
                        echo "Password Change successfully";
                    }
                } else {
                    echo "Password is not the same";
                }
            } else {
                echo "Old password doesn't match";
            }
        }
    }
}
?>