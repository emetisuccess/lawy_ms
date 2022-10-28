<?php include("includes/header.php"); ?>
<?php include("includes/admin_login_check.php"); ?>
<?php include("functions.php"); ?>
<?php

if (isset($_GET["edit"])) {
    echo "emeti";
}

?>
<?php include("includes/menu.php"); ?>
<div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title"> Update Resource Dashboard</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer -->
<?php include("./includes/footer.php"); ?>