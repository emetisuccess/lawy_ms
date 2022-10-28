<?php include("includes/header.php"); ?>
<?php include("includes/admin_login_check.php"); ?>
<?php include("functions.php"); ?>
<?php include("includes/menu.php"); ?>
<div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
        <h2 class="page-title p-4">Manage File</h2>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <a href="addFile.php" class="btn btn-dark btn-sm">Add File</a>
                    </div>
                    <table class="table table-hover table-bordered">
                        <?php $result = $conn->query("SELECT * FROM files_db");
                        $count = mysqli_num_rows($result);

                        $result_per_page = 2;

                        $number_per_page = ceil($count / $result_per_page);

                        if (!isset($_GET['page'])) {
                            $page = 1;
                        } else {
                            $page = $_GET['page'];
                        }

                        $first_page_result = ($page - 1) * $result_per_page;


                        $res = $conn->query("SELECT * FROM files_db LIMIT " . $first_page_result . "," . $result_per_page);

                        $sn = 1;
                        ?>
                        <thead>
                            <th>Number</th>
                            <th>Name</th>
                            <th>ClientID</th>
                            <th>Type</th>
                            <th>Opening Date</th>
                            <th>Files</th>
                            <th>LawyerID</th>
                            <th>Closing Date</th>
                            <th colspan="3">Action</th>
                        </thead>
                        <tbody>
                            <?php while ($row = $res->fetch_assoc()) :
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
                                <td><?php echo $number; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $clientid; ?></td>
                                <td><?php echo $type; ?></td>
                                <td><?php echo $open; ?></td>
                                <td><?php echo $file; ?></td>
                                <td><?php echo $lawyerid; ?></td>
                                <td><?php echo $close; ?></td>
                                <td>
                                    <a href="update_file.php?edit=<?php echo $row["number"]; ?>" class="btn btn-info">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="delete_file.php?number=<?php echo $row["number"]; ?>"
                                        class="btn btn-danger ">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <?php
                    for ($page = 1; $page <= $number_per_page; $page++) {
                        // display the navigation link
                    ?>
                    <a href="manage_file.php?page=<?php echo $page; ?>"
                        style="background-color:black; color:white; padding:4px;"><?php echo $page; ?></a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer -->
<?php include("includes/footer.php"); ?>