<?php include("admin/includes/config.php"); ?>
<?php include("partials/header.php"); ?>
<div id="site-content">
    <?php include("partials/menu.php"); ?>
    <main class="main-content">
        <div class="hero">
            <div class="container-fluid">
                <div class="col-md-12 m-0 p-3">
                    <div class="row">
                        <!-- <div class="quote-section"> -->
                        <div class="quote-slider">
                            <ul class="slides">
                                <li class="slideImage">
                                    <div class="slides-content">
                                        <div class="col-md-8 text-center mt-5">
                                            <h1 class="display-4 mt-5">We Offer The Best Practice Around The
                                                Nation
                                            </h1>
                                            <a href="#explore" class="btn btn-info">Explore Our Page</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="slideImage1">
                                    <div class="slides-content">
                                        <div class="col-md-8 text-center mt-5">
                                            <h1 class="display-4 mt-5">We Offer The Best Practice Around The
                                                Nation
                                            </h1>
                                            <a href="#explore" class="btn btn-info">Explore Our Page</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="slideImage2">
                                    <div class="slides-content">
                                        <div class="col-md-8 text-center mt-5">
                                            <h1 class="display-4 mt-5">We Offer The Best Practice Around The
                                                Nation
                                            </h1>
                                            <a href="#explore" class="btn btn-info">Explore Our Page</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="slideImage3">
                                    <div class="slides-content">
                                        <div class="col-md-8 text-center mt-5">
                                            <h1 class="display-4 mt-5">We Offer The Best Practice Around The
                                                Nation
                                            </h1>
                                            <a href="#explore" class="btn btn-info">Explore Our Page</a>
                                        </div>
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
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-7 text-center mr-5 " id="explore">
                        <h2 class="display-4">Welcome to our website</h2>

                        <p style="font-size:24px;">Every individual or corporation
                            knows the importance of quality legal
                            services both in Nigeria and anywhere in the world. Lawyers that are
                            extremely hardworking and committed to their goals will definitely able
                            to negotiate a better bargain for a client, either in transaction
                            roundtable or arbitration or courtroom. Our lawyers are driven by their
                            passion for legal services and they are always after the best and fair
                            deal in every bargaining.
                        </p>

                        <p style="font-size:24px;">The firm is internationally recognized and has over the period
                            assisted in several international and cross-border transactions for
                            individuals and foreign corporations.
                        </p>

                        <p style="font-size:24px;">Our lawyers and affiliate colleagues across various states in Nigeria
                            generally strive to offer legal services and represent clients all over
                            the country.
                        </p>

                        <p style="font-size:24px;">We are one of the top law firms in West Africa, assisting local and
                            businesses through various legal requirements from Nigeria. The law
                            firm, which is ranked among the top law firms in Nigeria has a standard
                            of deploying a minimum of two experienced lawyers to review every legal
                            matter and transaction.
                        </p>
                    </div>
                    <?php
                    // query the database;
                    $result = $conn->query("SELECT * FROM lawyer_db WHERE status='active' LIMIT 5");

                    // get the number of rows
                    $count = mysqli_num_rows($result);
                    ?>
                    <div class="col-md-3 my-5">
                        <form action="search.php" method="post">
                            <div class="form-group">
                                <label for="search">Search</label>
                                <div style="display:flex; flex-direction:row;">
                                    <input type="search" placeholder="Search Lawyer By Case" name="search"
                                        class="form-control mt-2">
                                    <input type="submit" name="submit" value="search" class="btn btn-info btn-sm ml-2">
                                </div>
                            </div>
                        </form>

                        <div class="latest-news">
                            <h3 class="text-center">Our Attorneys</h3>
                            <?php
                            if ($count > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $fullname = mysqli_real_escape_string($conn, $row['fullname']);
                            ?>
                            <ul>
                                <li>
                                    <h3 class="entry-title"><i class="fa fa-angle-left text-white mr-1"></i>
                                        <a>
                                            <?php echo $fullname; ?>
                                        </a>
                                    </h3>
                                </li>
                            </ul>
                            <?php
                                }
                            }
                            ?>
                            <a href="experience.php" class="btn text-white">view more <i
                                    class="fa fa-angle-double-right"></i></a>
                        </div> <!-- .latest-news -->
                    </div>
                </div> <!-- .row -->
            </div> <!-- .container -->
        </div> <!-- .fullwidth-block -->

        <div class="fullwidth-block">
            <h1 class="text-center mb-0">Practice Areas</h1>
            <div class="container">
                <hr class="bg-white mb-5">
                <div class="row feature-list-section">
                    <?php
                    $select_practice_query = $conn->query("SELECT * FROM practiceArea LIMIT 9");
                    while ($row = $select_practice_query->fetch_assoc()) {
                        $title = mysqli_real_escape_string($conn, $row['title']);
                        $desc = mysqli_real_escape_string($conn, substr($row['description'], 0, 340) . "... ");
                    ?>
                    <div class="col-md-4">
                        <div class="feature">
                            <header class="text-center">
                                <img src="images/icon-2.png" class="feature-icon">
                                <div class="feature-title-copy mt-3">
                                    <h2 class="feature-title text-center"><?php echo $title; ?></h2>
                                </div>
                            </header>
                            <p style="font-size:18px;" class="text-center"><?php echo $desc; ?></p>
                            <!-- <a href="readmore.php?readmore=" class="btn btn-info btn-sm text-white mt-0">read
                                more</a> -->
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="my-4 text-center">
                    <a href="service.php" class="text-white border-0" style="text-decoration: none; color:black;">View
                        All <i class="fa fa-angle-double-right ml-3"></i></a>
                </div>
                <div class="container my-5 ">
                    <div class="quote-section">
                        <div class="quote-slider ">
                            <ul class="slides">
                                <li class="col-md-11 d-flex justify-content-around">
                                    <figure class="quote-avatar my-3"><img src="dummy/avatar.png"></figure>
                                    <blockquote class="mx-5">
                                        <p class="mt-3">When lawyers are muddled ordinary people win
                                            and lose disputes for
                                            no good reason. More accurately, my mistake. In short because of
                                            intellectual pigheadedness injustice is done. And that is
                                            disgraceful.
                                        </p>
                                        <footer class="d-block">
                                            <cite>PETER BIRKS</cite>
                                            <span>(Quote)</span>
                                        </footer>
                                    </blockquote>
                                </li>
                                <li class="col-md-11 d-flex justify-content-around">
                                    <figure class="quote-avatar my-3"><img src="dummy/avatar.png"></figure>
                                    <blockquote class="mx-5">
                                        <p class="mt-3">We lawyers are always curious, always inquisitive,
                                            always picking
                                            up odds and ends for our patchwork minds, since there is no knowing
                                            when and where they may fit into some corner.</p>
                                        <footer class="d-block">
                                            <cite>CHARLES DICKENS</cite>
                                            <span>(Quote)</span>
                                        </footer>
                                    </blockquote>
                                </li>
                                <li class="col-md-11 d-flex justify-content-around">
                                    <figure class="quote-avatar my-3"><img src="dummy/avatar.png"></figure>
                                    <blockquote class="mx-5">
                                        <p class="mt-3">If lawyers were to undertake no causes till they were
                                            sure they
                                            were just, a man might be precluded altogether from a trial of his
                                            claim, though, were it judicially examined, it might be found a very
                                            just claim.</p>
                                        <footer class="d-block">
                                            <cite class="">SAMUEL JOHNSON</cite>
                                            <span>(Quote)</span>
                                        </footer>
                                    </blockquote>
                                </li>
                                <li class="col-md-11 d-flex justify-content-around">
                                    <figure class="quote-avatar  my-3"><img src="dummy/avatar.png"></figure>
                                    <blockquote class="mx-5">
                                        <p class="mt-3">It is in the habits of lawyers that every accusation
                                            appears
                                            insufficient if they do not exaggerate it even to calumny; it is
                                            thus that justice itself loses its sanctity and its respect amongst
                                            men.</p>
                                        <footer class="d-block">
                                            <cite>LARMATINE</cite>
                                            <span>(Quote)</span>
                                        </footer>
                                    </blockquote>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> <!-- .main-content -->
</div>
<?php include("partials/footer.php"); ?>