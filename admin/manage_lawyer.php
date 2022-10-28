<?php include("includes/header.php"); ?>
<?php include("includes/admin_login_check.php"); ?>
<?php include("functions.php"); ?>
<?php include("includes/menu.php"); ?>
<div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper my-5">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h2 class="page-title p-4">Manage Lawyer Dashboard</h2>
                    <div class="my-4 d-flex justify-content-between ">
                        <div class="">
                            <a href="addLawyer.php" class="btn btn-dark btn-sm">Add Lawyer</a>
                        </div>
                        <div class="">
                            <form action="" method="POST">
                                <input type="text" name="search" id="search" placeholder="Search Lawyer">
                                <input type="submit" value="Search" class="bk-dark text-white">
                            </form>
                        </div>
                    </div>
                    <?php

                    $result = $conn->query("SELECT * FROM lawyer_db");
                    $count = mysqli_num_rows($result);

                    $result_per_page = 5;

                    $number_of_pages = ceil($count / $result_per_page);

                    if (!isset($_GET['page'])) {
                        // if not page, set page number to 1;
                        $page = 1;
                    } else {
                        // else get the page number
                        $page = $_GET['page'];
                    }

                    $first_page_result = ($page - 1) * $result_per_page;

                    $res = $conn->query("SELECT * FROM lawyer_db LIMIT " . $first_page_result . "," . $result_per_page);

                    $sn = 1;

                    // show message alert
                    showAlert();
                    ?>
                    <div>
                        <table class="table table-striped text-center table-bordered table-condensed table-responsive">
                            <thead>
                                <tr>
                                    <th>FullName</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Lawyer_Id</th>
                                    <th>Experience</th>
                                    <th>Practice Area</th>
                                    <th>Office Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Zip Code</th>
                                    <th>Image</th>
                                    <th>Courts</th>
                                    <th>Website</th>
                                    <th>Profile Status</th>
                                    <th>Gender</th>
                                    <th>Description</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $res->fetch_assoc()) :
                                    $id = $row['id'];
                                    $fullname = $row['fullname'];
                                    $mobile = $row['mobile'];
                                    $email = $row['email'];
                                    $lawyer_id = $row['lawyer_id'];
                                    $experience = $row['experience'];
                                    $practice = $row['practiceArea'];
                                    $address = $row['officeAddress'];
                                    $city = $row['city'];
                                    $state = $row['state'];
                                    $zip = $row['zipCode'];
                                    $image_name = $row['image_name'];
                                    $courts = $row['courts'];
                                    $website = $row['website'];
                                    $status = $row['status'];
                                    $gender = $row['gender'];
                                    $description = $row['description'];
                                ?>
                                <tr>
                                    <td style="vertical-align:middle;"><?php echo $fullname; ?></td>
                                    <td style="vertical-align:middle;"><?php echo $mobile; ?></td>
                                    <td style="vertical-align:middle;"><?php echo $email; ?></td>

                                    <td style="vertical-align:middle;"><?php echo $lawyer_id; ?></td>

                                    <td style="vertical-align:middle;"><?php echo $experience; ?></td>
                                    <td style="vertical-align:middle;"><?php echo $practice; ?></td>
                                    <td style="vertical-align:middle;"><?php echo $address; ?></td>
                                    <td style="vertical-align:middle;"><?php echo $city; ?></td>
                                    <td style="vertical-align:middle;"><?php echo $state; ?></td>
                                    <td style="vertical-align:middle;"><?php echo $zip; ?></td>
                                    <td style="vertical-align:middle;">
                                        <?php if ($image_name != "") {
                                                // display image;
                                            ?>
                                        <div class="card  border-0">
                                            <img src="<?php echo '../uploads/' . $image_name; ?>" width="60px"
                                                height="60px">
                                        </div>
                                        <?php
                                            } else {
                                                echo "<h5 class='text-danger'>Image not Added<h5>";
                                            }
                                            ?>
                                    </td>
                                    <td style="vertical-align:middle;"><?php echo $courts; ?></td>
                                    <td style="vertical-align:middle;"><?php echo $website; ?></td>
                                    <td style="vertical-align:middle;"><?php echo $status; ?></td>
                                    <td style="vertical-align:middle;"><?php echo $gender; ?></td>
                                    <td style="vertical-align:middle;"><?php echo $description; ?></td>
                                    <td style="vertical-align:middle;">

                                        <a href="./update_lawyer.php?edit=<?php echo $id; ?>&status=<?php echo $status; ?>"
                                            class="btn p-0 "><i class="fa fa-edit text-info"></i></a>


                                        <a href="delete_lawyer.php?del=<?php echo $id ?>&image=<?php echo $image_name; ?>"
                                            class="btn p-0 "><i class="fa fa-trash text-danger"></i></a>


                                        <a href="../users/view_lawyer_profile.php?view=<?php echo $id; ?>"
                                            class="btn p-0 "><i class="fa fa-user text-info"></i></a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <ul class="pager">
                        <?php
                        for ($page = 1; $page <= $number_of_pages; $page++) :
                        ?>
                        <li>
                            <a href="manage_lawyer.php?page=<?php echo $page; ?>"
                                style=' background-color: black; color: white; padding: 4px;'><?php echo $page; ?>
                            </a>
                        </li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer -->
<?php include("./includes/footer.php"); ?>