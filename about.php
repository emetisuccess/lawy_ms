<?php include("./admin/includes/config.php"); ?>
<?php include("./partials/header.php"); ?>
<div id="site-content">
    <?php include("./partials/menu.php"); ?>
    <!-- background image -->
    <div class="container-fluid">
        <div class="quote-section">
            <div class="quote-slider">
                <ul class="slides">
                    <li class="slideImage4 center">
                        <div class="slides-content">
                            <h1 class="display-2 font-italic">About Us</h1>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <main class="main-content">
            <div class="fullwidth-block content">
                <div class="container text-center ">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <h2 class="entry-title">About ACMS Law Firm</h2>
                            <p style="font-size:24px;">ACMS Law Firm, which ranks among the leading legal consultants in
                                Nigeria was
                                founded by a group of passionate, hardworking and honest lawyers committed to
                                the
                                excellent delivery of legal services in Nigeria.</p>

                            <p style="font-size:24px;">Every individual or corporation knows the importance of quality
                                legal
                                services both in Nigeria and anywhere in the world. Lawyers that are
                                extremely hardworking and committed to their goals will definitely able
                                to negotiate a better bargain for a client, either in transaction
                                roundtable or arbitration or courtroom. Our lawyers are driven by their
                                passion for legal services and they are always after the best and fair
                                deal in every bargaining.</p>

                            <p style="font-size:24px;">The firm is internationally recognized and has over the period
                                assisted in several international and cross-border transactions for
                                individuals and foreign corporations.</p>

                            <p style="font-size:24px;">Our lawyers and affiliate colleagues across various states in
                                Nigeria
                                generally strive to offer legal services and represent clients all over
                                the country.</p>

                            <p style="font-size:24px;">We are one of the top law firms in West Africa, assisting local
                                and
                                businesses through various legal requirements from Nigeria. The law
                                firm, which is ranked among the top law firms in Nigeria has a standard
                                of deploying a minimum of two experienced lawyers to review every legal
                                matter and transaction.</p>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="col-md-12 my-5">
                            <div class="timeline flex-container" id="lawyers">

                                <?php
                                $res = $conn->query("SELECT * FROM lawyer_db WHERE status='active' LIMIT 4");
                                $count = mysqli_num_rows($res);
                                if ($count > 0) {
                                    while ($row = $res->fetch_assoc()) :
                                        $image_name = $row["image_name"];
                                        $status = $row['status'];
                                ?>
                                <div class="my-2">
                                    <div class="card border-0" style="width: 250px; height:250px; overflow:hidden;">
                                        <?php if ($image_name != "") {
                                                    // display image;
                                                ?>
                                        <img class="card-img-top"
                                            src=" <?php echo './uploads/' . $row['image_name']; ?>"
                                            style="width: auto; height:150px;">
                                        <?php
                                                } else {
                                                    echo "Image not found";
                                                }
                                                ?>
                                        <span class="card-footer pl-1 pt-2 text-left ">
                                            <h4>
                                                <a href="lawyer_details.php?id=<?php echo $row['id']; ?>&status=<?php echo $status; ?>"
                                                    style="text-decoration: none; color:black;">
                                                    <?php echo $row['fullname']; ?>
                                                </a>
                                            </h4>
                                            <p style="font-size:18px;"><?php echo $row['description']; ?></p>
                                        </span>
                                    </div>
                                </div>
                                <?php endwhile;
                                } ?>
                            </div>
                            <div class="my-4">
                                <a href="experience.php" class="text-white border-0"
                                    style="text-decoration: none; color:black;">View All <i
                                        class="fa fa-angle-double-right ml-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main> <!-- .main-content -->
    </div>
</div>
<?php include("./partials/footer.php"); ?>