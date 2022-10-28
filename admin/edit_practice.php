<?php include("includes/header.php"); ?>
<?php include("includes/admin_login_check.php"); ?>
<?php include("functions.php"); ?>
<?php include("includes/menu.php"); ?>
<div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
        <h2 class="page-title p-4">Welcome To Practice Area</h2>
        <div class="container-fluid">
            <?php
            if (isset($_GET['edit'])) {

                $edit_id = $_GET['edit'];

                $res = $conn->query("SELECT * FROM practiceArea WHERE p_id=$edit_id");
                while ($row = $res->fetch_assoc()) {
                    $title = $row['title'];
                    $desc = $row['description'];
                }
            }
            ?>
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h2>Update Practice Area</h2>
                        </div>
                        <div class="card-body">
                            <form action="edit_practice.php" method="post">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" value="<?php echo $title ?>" name="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="description" class="form-control" cols="30"
                                        rows="4"><?php echo $desc; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $edit_id; ?>">
                                    <input type="submit" name="editp" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>

<?php
if (isset($_POST['editp'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $result = $conn->query("UPDATE practiceArea SET title='$title', description='$description' WHERE p_id=$id");

    if (!$result) {
        die("QUERY FAILED " . mysqli_error($conn));
    } else {
        $_SESSION['success'] = "<h5 class='text-success'>Updated Successfully!</h5>";
        header("location: manage_practice.php");
    }
}

?>