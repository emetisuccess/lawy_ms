<?php include("include/header.php"); ?>
<?php include("functions.php"); ?>
<?php include("include/menu.php"); ?>
<div class="ts-main-content">
    <?php include('include/leftbar.php'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Manage Client</h2>
                    <div class="my-4">
                        <a href="add_client.php" class="btn btn-dark btn-sm">Add Client</a>
                    </div>
                    <table class="table table-hover table-bordered">
                        <?php
                        // display alert;
                        showAlert();

                        // get the target session email;
                        if (isset($_SESSION['email'])) {

                            $email = $_SESSION['email'];

                            $query = "SELECT * FROM lawyer_db WHERE email='$email'";

                            $result = mysqli_query($conn, $query);

                            while ($row = $result->fetch_assoc()) {

                                $lawyer_id = $row['lawyer_id'];
                            }
                        }
                        $res = $conn->query("SELECT * FROM client_db WHERE client_lawyer_id = '{$lawyer_id}'");

                        $sn = 1;
                        ?>

                        <thead>
                            <th>S/N</th>
                            <th>FullName</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Lawyer Id</th>
                            <th colspan="3" class="text-center">Action</th>
                        </thead>

                        <tbody>
                            <?php
                            while ($rows = $res->fetch_assoc()) :
                                $cl_id = $rows['id'];
                                $cl_name = $rows['name'];
                                $cl_email = $rows['email'];
                                $cl_mobile = $rows['mobile'];
                                $cl_address = $rows['address'];
                                $cl_city = $rows['city'];
                                $cl_state = $rows['state'];
                                $client_lawyer_id = $rows['client_lawyer_id'];
                            ?>
                            <tr>
                                <td><?php echo $cl_id; ?></td>
                                <td><?php echo $cl_name; ?></td>
                                <td><?php echo $cl_email; ?></td>
                                <td><?php echo $cl_mobile; ?></td>
                                <td><?php echo $cl_address; ?></td>
                                <td><?php echo $cl_city; ?></td>
                                <td><?php echo $cl_state; ?></td>
                                <td><?php echo $client_lawyer_id; ?></td>
                                <td class="text-center">
                                    <a href="update_client.php?upd_cl=<?php echo $cl_id; ?>"><i
                                            class="fa fa-edit text-primary p-1"></i></a>
                                    <a href="delete_client.php?del_cl=<?php echo $cl_id; ?>"><i
                                            class="fa fa-trash text-danger p-1"></i></a>
                                </td>
                            </tr>
                            <?php
                            endwhile;
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
<?php include("include/footer.php"); ?>