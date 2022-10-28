<?php include("includes/header.php"); ?>
<?php include("includes/admin_login_check.php"); ?>
<?php include("functions.php"); ?>
<?php
//get the target link;

if (isset($_GET["edit"]) && isset($_GET['status'])) {

    // get the edit link
    $id = $_GET["edit"];


    // get the status 
    $status = $_GET['status'];



    $result = $conn->query("SELECT * FROM lawyer_db WHERE id=$id AND status='$status'");

    $count = mysqli_num_rows($result);

    if ($count > 0) {
        while ($rows = $result->fetch_assoc()) {
            $id = secure_input($rows["id"]);
            $fullname = secure_input($rows["fullname"]);
            $mobile = secure_input($rows["mobile"]);
            $email = secure_input($rows["email"]);
            $lawyer_id = secure_input($rows["lawyer_id"]);
            $experience = secure_input($rows["experience"]);
            $practice = secure_input($rows["practiceArea"]);
            $address = secure_input($rows["officeAddress"]);
            $city = secure_input($rows["city"]);
            $state = secure_input($rows["state"]);
            $zipcode = secure_input($rows["zipCode"]);
            $current_image = secure_input($rows["image_name"]);
            $courts = secure_input($rows["courts"]);
            $website = secure_input($rows["website"]);
            $description = secure_input($rows["description"]);
            $status = secure_input($rows['status']);
            $gender = secure_input($rows["gender"]);
        }
    }
}
?>

<?php include("includes/menu.php"); ?>
<div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
        <div class="container">
            <h2 class="page-title p-4">Update Lawyer Dashboard</h2>
            <div class="row">
                <div class="col-md-11">
                    <div class="rounded ">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <label>Fullname</label>
                                        <input type="text" name="fullname" class="form-control"
                                            value="<?php echo $fullname; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">Mobile
                                            Number</label>
                                        <input type="text" name="mobile_number" class="form-control"
                                            value="<?php echo $mobile; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="<?php echo $email; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-bold">User Id</label>
                                        <input type="text" name="lawyer_id" class="form-control"
                                            value="<?php echo $lawyer_id; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Experience</label>
                                        <input type="text" name="experience" class="form-control"
                                            value="<?php echo $experience; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Practice Area</label>
                                        <input type="text" class="form-control" name="practice"
                                            value="<?php echo $practice; ?>" multiple>

                                    </div>
                                    <div class="form-group">
                                        <label>Office Address</label>
                                        <input type="text" name="address" class="form-control"
                                            value="<?php echo $address; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" name="state" class="form-control"
                                            value="<?php echo $state; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>ZipCode</label>
                                        <input type="text" name="zipcode" class="form-control"
                                            value="<?php echo $zipcode; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Current Image </label><br>
                                        <?php
                                        if ($current_image != "") {
                                            // display the image;
                                        ?>
                                        <img src="<?php echo '../uploads/' . $current_image; ?>" width="75px"
                                            height="75px">
                                        <?php
                                        } else {
                                            echo "<h5 class='text-danger'>No Image Added</h5>";
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>New Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Court</label>
                                        <input type="text" name="courts" class="form-control"
                                            value="<?php echo $courts; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" name="website" class="form-control"
                                            value="<?php echo $website; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="">Select Status</option>
                                            <option <?php if ($status == 'active') {
                                                        echo "selected";
                                                    } ?> value="active">Active
                                            </option>
                                            <option <?php if ($status == 'blocked') {
                                                        echo "selected";
                                                    } ?> value="blocked">Block
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <div>
                                    <input <?php if ($gender == 'm') {
                                                echo "checked";
                                            } ?> type="radio" name="gender" value="m" class="p-1 m-1"><span>Male</span>
                                    <input <?php if ($gender == 'f') {
                                                echo "checked";
                                            } ?> type="radio" name="gender" value="f"
                                        class="p-1 m-1"><span>Female</span>
                                    <input <?php if ($gender == 'o') {
                                                echo "checked";
                                            } ?> type="radio" name="gender" value="o"
                                        class="p-1 m-1"><span>Other</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="city" class="form-control" value="<?php echo $city; ?>">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" cols="30" rows="5"
                                    class="form-control"><?php echo $description; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                                <input type="submit" name="edit_lawyer" value="Edit Lawyer" class="btn"
                                    style="background-color: black; color:white;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- footer -->
<?php include("./includes/footer.php"); ?>

<?php
// function to update database;
updateLawyer();
?>