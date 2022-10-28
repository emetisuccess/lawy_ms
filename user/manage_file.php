<?php include("include/header.php"); ?>
<?php include("functions.php"); ?>
<?php include("include/menu.php"); ?>
<div class="ts-main-content">
    <?php include('include/leftbar.php'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <h2 class="page-title p-4">Manage File</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-4">
                        <a href="addFile.php" class="btn btn-dark btn-sm">Add File</a>
                    </div>
                    <?php showAlert(); ?>
                    <table class="table table-hover table-bordered">
                        <?php
                        if (isset($_SESSION['email'])) {

                            $email = $_SESSION['email'];

                            $query = "SELECT * FROM lawyer_db WHERE email='{$email}'";

                            $select_file = mysqli_query($conn, $query);

                            while ($rows = $select_file->fetch_assoc()) {

                                $lawyer_id = $rows['lawyer_id'];
                            }
                        }
                        if ($lawyer_id == "") {
                            echo "emeti";
                        } else {
                            $res = $conn->query("SELECT * FROM files_db WHERE lawyerID='{$lawyer_id}'");
                            // $rows = $res->fetch_assoc();
                            $sn = 1;
                        }

                        ?>
                        <thead>
                            <th>S/N</th>
                            <th>Number</th>
                            <th>Name</th>
                            <th>ClientID</th>
                            <th>Case Type</th>
                            <th>Opening Date</th>
                            <th>Files</th>
                            <th>LawyerID</th>
                            <th>Closing Date</th>
                            <th colspan="3">Action</th>
                        </thead>
                        <tbody>
                            <?php while ($row = $res->fetch_assoc()) :

                                $id = $row['id'];
                                $number = $row['number'];
                                $name = $row['name'];
                                $clientid = $row['clientID'];
                                $type = $row['type'];
                                $open = $row['openingDate'];
                                $file = $row['files'];
                                $lawyerid = $row['lawyerID'];
                                $close = $row['closingDate'];
                            ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $number; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $clientid; ?></td>
                                <td><?php echo $type; ?></td>
                                <td><?php echo $open; ?></td>
                                <td><?php echo $file; ?></td>
                                <td><?php echo $lawyerid; ?></td>
                                <td><?php echo $close; ?></td>
                                <td>
                                    <a href="update_file.php?edit_fl=<?php echo $row["id"]; ?>">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="delete_file.php?del_fl=<?php echo $row["id"]; ?>">
                                        <i class="fa fa-trash text-danger"></i>
                                    </a>
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
<!-- footer -->
<?php include("include/footer.php"); ?>