<?php include("includes/header.php"); ?>
<?php include("includes/admin_login_check.php"); ?>
<?php include("functions.php"); ?>
<?php include("includes/menu.php"); ?>
<div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title p-3">Manage Practice Area</h2>
                    <div class="mt-2 mb-3">
                        <a href="add_practice.php" class="btn bk-dark text-white">Add Practice</a>
                    </div>
                    <?php showAlert() ?>
                    <div class="mb-5">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <th>S/N</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date Created</th>
                                <th colspan="2">Action</th>
                            </thead>
                            <tbody>
                                <?php
                                $result = $conn->query("SELECT * FROM practiceArea");
                                $sn = 1;
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['p_id'];
                                    $ptitle = $row['title'];
                                    $pdescription = substr($row['description'], 0, 100) . "... ";
                                    $pdate = $row['date'];
                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?> </td>
                                    <td><?php echo $ptitle; ?></td>
                                    <td><?php echo $pdescription; ?></td>
                                    <td><?php echo $pdate; ?></td>
                                    <td>
                                        <a href="delete_practice.php?del=<?php echo $id; ?>" class="btn btn-danger">
                                            <i class="fa fa-trash"></i></a>
                                        <a href="edit_practice.php?edit=<?php echo $id; ?>" class="btn btn-info">
                                            <i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
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