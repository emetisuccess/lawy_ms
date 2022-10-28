<?php include("./includes/header.php"); ?>
<?php include("includes/admin_login_check.php"); ?>
<?php include("functions.php"); ?>
<?php include("./includes/menu.php"); ?>
<div class="ts-main-content">
    <?php include('./includes/leftbar.php'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="page-title">Manage Admin Dashboard</h3>
                    <div class=" my-5 ">
                        <div class="my-3">
                            <h4 class="text-info">
                                <?php if (isset($_SESSION["delete"])) {
                                    echo $_SESSION["delete"];
                                    unset($_SESSION["delete"]);
                                } ?>
                            </h4>
                        </div>
                        <div class="flex-row">
                            <span class="my-3 float-left">
                                <a href="add_user.php" class="btn btn-info btn-sm">Add User</a>
                            </span>
                            <!-- <span class="float-right">
                                        <a href="#" class="btn btn-info btn-sm">Add Client</a>
                                        </span> -->
                        </div>
                    </div>
                    <?php

                    $res = $conn->query("SELECT * FROM users_db");
                    // $rows = $res->fetch_assoc();
                    $sn = 1;
                    ?>

                    <div>
                        <table class="table table-bordered text-center">
                            <thead>
                                <th>S/N</th>
                                <th>FullName</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th colspan="2">Action</th>
                            </thead>
                            <tbody>
                                <?php while ($rows = $res->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $rows["fullname"]; ?></td>
                                    <td><?php echo $rows["username"]; ?></td>
                                    <td><?php echo $rows["role"]; ?></td>
                                    <td>
                                        <a href="delete_user.php?delete=<?php echo $rows["id"]; ?>"
                                            class="btn btn-danger btn-sm mx-1"><i class="fa fa-trash"></i></a>
                                        <a href="update_user.php?update=<?php echo $rows["id"]; ?>"
                                            class="btn btn-info btn-sm  mx-1"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- footer -->
<?php include("./includes/footer.php"); ?>