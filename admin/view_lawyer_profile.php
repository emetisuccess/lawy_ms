<?php include("./includes/header.php"); ?>
<?php include("includes/admin_login_check.php"); ?>
<?php
if (isset($_GET['view'])) {

    $id = $_GET['view'];

    $result = $conn->query("SELECT * FROM lawyer_db WHERE id = $id");
    while ($rows = $result->fetch_array()) {
        $name = $rows['fullname'];
        $image = $rows['image_name'];
    } ?>
<?php include("./includes/menu.php"); ?>
<div class="ts-main-content">
    <?php include('./includes/lawyer_leftbar.php'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title"><?php echo $name; ?></h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body bk-warning text-light">
                                            <div class="stat-panel text-center">
                                                <div class="stat-panel-number h1">
                                                    <?php
                                                        $result = $conn->query("SELECT * FROM client_db");
                                                        $count = mysqli_num_rows($result);
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
                                                        $result = $conn->query("SELECT * FROM files_db");
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

<?php
}
?>
<!-- footer -->
<?php include("includes/footer.php"); ?>