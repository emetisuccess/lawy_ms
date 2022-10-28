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
                    <h2 class="page-title">Manage Client</h2>
                    <div class="my-4">
                        <a href="add_client.php" class="btn btn-dark btn-sm">Add Client</a>
                    </div>
                    <?php
                    // query for displaying the data in the database;
                    $result = $conn->query("SELECT * FROM client_db");
                    $count = mysqli_num_rows($result);

                    $result_per_page = 4;

                    $number_per_page = ceil($count / $result_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $first_page_result = ($page - 1) * $result_per_page;

                    $res = $conn->query("SELECT * FROM client_db LIMIT " . $first_page_result . "," . $result_per_page);

                    $sn = 1;

                    ?>
                    <div>
                        <table class="table table-hover table-bordered text-center">
                            <thead>
                                <th>S/N</th>
                                <th>FullName</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Lawyer Id</th>
                                <th colspan="3">Action</th>
                            </thead>
                            <tbody>
                                <?php while ($row = $res->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><?php echo $row["mobile"]; ?></td>
                                    <td><?php echo $row["address"]; ?></td>
                                    <td><?php echo $row["city"]; ?></td>
                                    <td><?php echo $row["state"]; ?></td>
                                    <td><?php echo $row["client_lawyer_id"]; ?></td>
                                    <td>
                                        <a href="./update_client.php?edit=<?php echo $row["id"]; ?>" class="btn p-0"><i
                                                class="fa fa-edit text-info"></i></a>
                                        <a href="delete_client.php?del=<?php echo $row["id"]; ?>" class="btn p-0"><i
                                                class="fa fa-trash text-danger "></i></a>
                                        <a href="view_client.php?view=<?php echo $row["id"]; ?>" class="btn p-0"><i
                                                class="fa fa-user text-info"></i></a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                    for ($page = 1; $page <= $number_per_page; $page++) {
                    ?>
                    <a href="manage_client.php?page=<?php echo $page; ?>"
                        style="background-color: black; color: white; padding: 4px;"><?php echo $page; ?></a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer -->
<?php include("./includes/footer.php"); ?>