<?php
include("./admin/includes/config.php");

//get the target link
if (isset($_GET['id']) && isset($_GET['status'])) {

    // get the required id
    $id = $_GET["id"];

    // get the status of the lawyer
    $status = $_GET['status'];

    //query the database;
    $res = $conn->query("SELECT * FROM lawyer_db WHERE id=$id AND status='$status'");

    $count = mysqli_num_rows($res);

    if ($count > 0) {
        // if there is data in the database then display it
        while ($row = $res->fetch_assoc()) {
            $id = $row['lawyer_id'];
            $name = $row['fullname'];
            $email = $row['email'];
            $mobile = $row['mobile'];
            $officeAddress = $row['officeAddress'];
            $experience = $row['experience'];
            $practiceArea = $row['practiceArea'];
            $city = $row['city'];
            $state = $row['state'];
            $image_name = $row['image_name'];
            $court = $row['courts'];
            $website = $row['website'];
            $desc = $row['description'];
        }
    }
}
?>
<?php include('./partials/header.php'); ?>
<?php include('./partials/menu.php'); ?>
<div id="site-content">
    <main class="main-content">
        <div class="hero">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 m-0 p-3">
                        <!-- <div class="quote-section"> -->
                        <div class="quote-slider">
                            <ul class="slides">
                                <li class="lawyer_bg">
                                    <div class="slides-content">
                                        <h1 class="display-3">Profile Of <?php echo $name; ?></h1>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div> <!-- .hero-slider -->

        <div class="fullwidth-block" data-bg-color="#111113">
            <div class="container">
                <div class="row">
                    <!-- column that holds the image -->
                    <div class="col-md-4">
                        <div>
                            <div class="card border-0" style="width: 200px; border-radius:50%;">
                                <?php if ($image_name != "") {
                                    // display image;
                                ?>
                                <img class=" card-img-top" src="<?php echo './uploads/' . $image_name; ?>"
                                    style="width: 200px; height:300px; border-radius:40%;">
                                <?php
                                } else {
                                    echo "<h5 class='text-danger'>Image not found</h5>";
                                }
                                ?>
                            </div>
                        </div>

                    </div>

                    <!-- column that holds the personal details -->
                    <div class=" col-md-4 ">
                        <h2>Personal Details</h2>
                        <ul class=" list-unstyled">
                            <li><span class="font-italic font-weight-bold">Email:
                                </span><span><?php echo $email; ?></span>
                            </li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><span class="font-italic font-weight-bold">Mobile:
                                </span><span><?php echo $mobile; ?></span>
                            </li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><span class=" font-italic font-weight-bold">Office Address:
                                </span><span><?php echo $officeAddress; ?></span>
                            </li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><span class=" font-italic font-weight-bold">City:
                                </span><span><?php echo $city; ?></span>
                            </li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><span class=" font-italic font-weight-bold">State:
                                </span><span><?php echo $state; ?></span>
                            </li>
                        </ul>

                    </div>

                    <!-- Column that holds registered Attorneys -->
                    <div class="col-md-4">
                        <div class="latest-news">
                            <h3>Our Attorneys</h3>
                            <?php
                            $result = $conn->query("SELECT * FROM lawyer_db WHERE status='active'");
                            $count = mysqli_num_rows($result);
                            if ($count > 0) {
                                while ($rows = $result->fetch_assoc()) {
                                    $fullname = $rows['fullname'];
                                    $id = $rows['id'];
                                    // $status = $row['status'];
                            ?>
                            <ul>
                                <li>
                                    <h3 class="entry-title"><a
                                            href="lawyer_details.php?id=<?php echo $id; ?>&status=<?php echo $status; ?>"><?php echo $fullname; ?></a>
                                    </h3>
                                </li>
                            </ul>
                            <?php
                                }
                            }
                            ?>
                        </div> <!-- .latest-news -->
                    </div>
                    <div class="col-md-12 my-5">
                        <h3 class="font-italic font-weight-bold">Work Experience</h3>
                        <ul class="list-unstyled">
                            <li>
                                <span><?php echo $experience; ?></span>
                            </li>
                        </ul>
                        <h3 class="font-italic font-weight-bold">Practice Areas</h3>
                        <ul class="list-unstyled">
                            <li>
                                <span><?php echo $practiceArea;  ?></span>
                            </li>
                        </ul>
                        <h3 class="font-italic font-weight-bold">Courts</h3>
                        <ul class="list-unstyled">
                            <li>
                                <span><?php if ($court == "") {
                                            echo "Null";
                                        } else {
                                            echo $court;
                                        } ?></span>
                            </li>
                        </ul>
                        <h3 class="font-italic font-weight-bold">Website / Portfolio</h3>
                        <ul class="list-unstyled">
                            <li>
                                <span><?php if ($website == "") {
                                            echo "Null";
                                        } else {
                                            echo $website;
                                        } ?></span>
                            </li>
                        </ul>
                        <h3 class="font-italic font-weight-bold">Decsription</h3>
                        <ul class="list-unstyled">
                            <li>
                                <span>
                                    <?php if ($desc == "") {
                                        echo "Null";
                                    } else {
                                        echo $desc;
                                    } ?>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div> <!-- .row -->
            </div> <!-- .container -->
        </div> <!-- .fullwidth-block -->
    </main>
</div>
<?php include("./partials/footer.php"); ?>