<?php include("admin/includes/config.php"); ?>
<?php include("partials/header.php"); ?>

<div id="site-content">
    <?php include("partials/menu.php"); ?>
    <!-- background image -->
    <div class="slides">
        <div class="slideImage5 ">
            <div class="slides-content">
                <h1 class="display-3 text-center">Our Team of Advocates</h1>
            </div>
        </div>
    </div>

    <!-- main page -->
    <main class="main-content">
        <div class="fullwidth-block content">
            <div class="container">
                <h2 class="entry-title">We have the best team ever presented by any Law Consultancy Firm
                </h2>
                <p class="text-center" style="font-size: 15px;">Our team of Advocate gives you the best practice you
                    will
                    ever imagine
                    of. Our team of
                    advocates are the best you will find anywhere around the Nation and around the globe. it is
                    our duty to make sure that any case linked to any of our advocates, must be followed
                    properlly and make sure that particular case has been won by him/her. Thanks for Choosing
                    LCMS as your sure plug for handling your case. </p>
                <div>
                    <h1 class="text-center">Our Team Of Lawyers</h1>
                </div>
                <div class="timeline flex-container" id="lawyers">
                    <?php
                    $res = $conn->query("SELECT * FROM lawyer_db WHERE status='active'");
                    $count = mysqli_num_rows($res);
                    if ($count > 0) {
                        while ($row = $res->fetch_assoc()) : $image_name = $row["image_name"]; ?>
                    <div class="mt-5">
                        <div class="card border-0" style="width: 250px; height:250px; overflow:hidden;">
                            <?php if ($image_name != "") {
                                        // display image;
                                    ?>
                            <img class="card-img-top" src=" <?php echo './uploads/' . $row['image_name']; ?>"
                                style="width: auto; height:150px;">
                            <?php
                                    } else {
                                        echo "Image not found";
                                    }
                                    ?>
                            <span class="card-footer pl-1 pt-2 ">
                                <h4>
                                    <a href="lawyer_details.php?id=<?php echo $row['id']; ?>&status=<?php echo $row['status']; ?>"
                                        style="text-decoration: none; color:black;">
                                        <?php echo $row['fullname']; ?>
                                    </a>
                                </h4>
                                <p style="font-size:14px"><?php echo $row['experience']; ?></p>
                            </span>
                        </div>
                    </div>
                    <?php
                        endwhile;
                    }
                    ?>
                </div>
            </div>
            <div class="counter mt-5">
                <div class="num">1500</div>
                <div class="copy">
                    <span>Satisfied Clients</span>
                    <span>In our whole career</span>
                </div>
            </div>
        </div>
    </main> <!-- .main-content -->
</div>
<?php include("partials/footer.php"); ?>