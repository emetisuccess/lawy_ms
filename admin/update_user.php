<?php include("includes/header.php"); ?>
<?php include("includes/admin_login_check.php"); ?>
<?php include("functions.php"); ?>
<?php
// Check if the id is set;
if (isset($_GET["update"])) {

    // get the target id;
    $id = $_GET["update"];



    $res = $conn->query("SELECT * FROM users_db WHERE id=$id");

    $numRows = mysqli_num_rows($res);

    if ($numRows > 0) {
        $rows = $res->fetch_array();

        $id = $rows['id'];
        $full_name = $rows["fullname"];
        $username = $rows["username"];
        $role = $rows["role"];
    }
}
?>
<?php include("includes/menu.php"); ?>
<div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <h2 class="page-title">Update User Dashboard</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class=" bg-dark p-5 text-white rounded">
                        <fieldset>
                            <legend>Personal information:</legend>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="username">FullName</label>
                                    <input type="text" name="full_name" class="form-control"
                                        value="<?php echo $full_name; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="password">Username</label>
                                    <input type="text" name="username" class="form-control"
                                        value="<?php echo $username; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="user_role">Role</label>
                                    <select name="role" id="" class="form-control">
                                        <option <?php if ($role == 'admin') {
                                                    echo 'selected';
                                                }
                                                ?> value="admin">Admin</option>
                                        <option <?php if ($role == 'user') {
                                                    echo 'selected';
                                                }
                                                ?> value="user">User</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="update" value="Update"
                                        class="btn btn-block btn-outline-light">
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer -->
<?php include("./includes/footer.php"); ?>
<!-- update admin -->
<?php
if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $full_name = $_POST["full_name"];
    $username = $_POST["username"];
    $role = $_POST["role"];

    $result = $conn->query("UPDATE users_db 
        SET fullname='$full_name', 
        username='$username', 
        role='$role'
        WHERE id=$id");

    if ($result == true) {
        echo "Admin has been updated successfully";
    } else {
        echo "Something went wrong";
    }
}
?>