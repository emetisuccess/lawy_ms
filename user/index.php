<?php include("include/header.php"); ?>
<?php include("functions.php"); ?>
<?php include("include/menu.php"); ?>
<div class="ts-main-content">
    <?php include('include/leftbar.php'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title text-capitalize">
                        <?php
                        error_reporting(0);
                        if (isset($_SESSION['email'])) {

                            $email = $_SESSION['email'];

                            $result = $conn->query("SELECT * FROM lawyer_db WHERE email='$email'");

                            while ($row = $result->fetch_assoc()) {
                                $lawyer_id = $row['lawyer_id'];
                                $name = $row['fullname'];
                                $image = $row['image_name'];
                                echo "Welcome " . $name;
                            }
                        }

                        if (isset($_SESSION['login'])) {
                            echo $_SESSION['login'];
                            unset($_SESSION['login']);
                        }
                        ?>
                    </h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body bk-warning text-light">
                                            <div class="stat-panel text-center">
                                                <div class="stat-panel-number h1">
                                                    <?php
                                                    $res = $conn->query("SELECT * FROM client_db WHERE client_lawyer_id='$lawyer_id'");
                                                    $count = mysqli_num_rows($res);
                                                    echo $count;
                                                    ?>
                                                </div>
                                                <div class="stat-panel-title text-uppercase">Client Management
                                                </div>
                                            </div>
                                        </div>
                                        <a href="manage_client.php" class="block-anchor panel-footer text-center">Full
                                            Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body bk-success text-light">
                                            <div class="stat-panel text-center">
                                                <div class="stat-panel-number h1">
                                                    <?php
                                                    $result = $conn->query("SELECT * FROM files_db  WHERE lawyerID='$lawyer_id'");
                                                    $count = mysqli_num_rows($result);
                                                    echo $count;
                                                    ?>
                                                </div>
                                                <div class="stat-panel-title text-uppercase">Client File
                                                    Management
                                                </div>
                                            </div>
                                        </div>
                                        <a href="manage_file.php" class="block-anchor panel-footer text-center">Full
                                            Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body bk-info text-light">
                                            <div class="stat-panel text-center">
                                                <div class="stat-panel-number h1">
                                                    5
                                                </div>
                                                <div class="stat-panel-title text-uppercase">Practice Area
                                                </div>
                                            </div>
                                        </div>
                                        <a href="manage_practice.php" class="block-anchor panel-footer text-center">Full
                                            Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body bk-info text-light">
                                            <div class="stat-panel text-center">

                                                <div class="stat-panel-number h1">5</div>
                                                <div class="stat-panel-title text-uppercase"> Library Management
                                                </div>
                                            </div>
                                        </div>
                                        <a href="manage_library.php" class="block-anchor panel-footer text-center">Full
                                            Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- footer -->
<?php include("./include/footer.php"); ?>