<?php include("include/header.php"); ?>
<?php include("include/menu.php"); ?>
<div class="ts-main-content">
    <?php include('include/leftbar.php'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Manage Resources Dashboard</h2>
                    <div>
                        <a href="addLibrary.php" class="btn btn-dark">Add Resource</a>
                    </div>
                    <div class="text-success">
                        <?php
                        $result = $conn->query("SELECT * FROM library_db");

                        if (isset($_SESSION["msg"])) {
                            echo $_SESSION["msg"];
                            unset($_SESSION["msg"]);
                        } ?>
                    </div>
                    <div class="text-center">
                        <table class="table table-striped">
                            <thead>
                                <th>Number</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Upload Date</th>
                                <th>Files</th>
                                <th>LawyerID</th>
                                <th colspan="2">Action</th>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $row["number"]; ?></td>
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo  $row["type"]; ?></td>
                                    <td><?php echo  $row["uploadDate"]; ?></td>
                                    <td><?php echo  $row["files"]; ?></td>
                                    <td><?php echo $row["lawyerID"]; ?></td>
                                    <td>
                                        <a href="delete_library.php?del=<?php echo $row["number"]; ?>" class="btn"><i
                                                class="fa fa-trash text-danger"></i></a>
                                        <a href="update_library.php?edit=<?php echo $row["number"]; ?>" class="btn "><i
                                                class="fa fa-edit text-info"></i></a>
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
<?php include("include/footer.php"); ?>