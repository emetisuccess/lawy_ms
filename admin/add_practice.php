<?php include("includes/header.php"); ?>
<?php include("includes/admin_login_check.php"); ?>
<?php include("functions.php"); ?>
<?php include("includes/menu.php"); ?>
<div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
        <h2 class="page-title p-4">Welcome To Practice Area</h2>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header bk-dark text-white">
                            <h2>Practice Area</h2>
                        </div>
                        <div class="card-body">
                            <?php showAlert(); ?>
                            <form action="add_practice.php" method="post">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" placeholder="Title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="description" placeholder="Description" class="form-control"
                                        cols="30" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="prac_area" class="btn bk-dark text-white"
                                        value="Add Practice Area">
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
if (isset($_POST['prac_area'])) {

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $result = $conn->query("SELECT * FROM practiceArea WHERE title='$title' OR description='$description'");
    while ($row = $result->fetch_assoc()) {
        $titleCheck = mysqli_real_escape_string($conn, $row['title']);
        $descriptionCheck = mysqli_real_escape_string($conn, $row['description']);
    }

    if ($title == "" || $description == "") {
        $_SESSION["msg"] = "<h6 class='text-danger text-center'>All fields are Required</h6>";
        header("location: add_practice.php");
    } else {

        if ($titleCheck == $title || $descriptionCheck == $description) {
            $_SESSION["msg"] = "<h6 class='text-danger text-center'>Practice area Already exist</h6>";
            header("location: add_practice.php");
        } else {
            // insert into database;
            $stmt = $conn->prepare("INSERT INTO practiceArea (title, description) VALUES(?,?)");
            $stmt->bind_param("ss", $title, $description);
            $stmt->execute();

            if (!$stmt) {
                die("QUERY FAILED " . mysqli_error($conn));
            }

            header("location: add_practice.php");

            $stmt->close();
            $conn->close();
        }
    }
}

?>