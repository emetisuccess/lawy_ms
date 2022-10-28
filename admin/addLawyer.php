<?php include("./includes/header.php"); ?>
<?php include("includes/admin_login_check.php"); ?>
<?php include_once("./functions.php"); ?>
<?php include("./includes/menu.php"); ?>
<div class="ts-main-content">
    <?php include('./includes/leftbar.php'); ?>
    <div class="content-wrapper">
        <h2 class="page-title p-4">Add Lawyer Dashboard</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-5 rounded mb-5 ">
                        <?php showAlert(); ?>
                        <div class="card">
                            <div class="card-header bk-dark text-white p-4">
                                <h3>Add Lawyer</h3>
                            </div>
                            <div class="card-body">
                                <form action="addLawyer.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class=" form-group">
                                                <label>Fullname :</label>
                                                <input type="text" name="fullname" class="form-control"
                                                    placeholder="Enter Fullname">
                                            </div>
                                            <div class="form-group">
                                                <label for="mobile">Mobile
                                                    Number</label>
                                                <input type="tel" name="mobile_number" class="form-control"
                                                    placeholder="Enter Mobile Number">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="Enter Email">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Enter Password">
                                            </div>
                                            <div class="form-group">
                                                <label class="text-bold">Lawyer Id</label>
                                                <input type="text" name="lawyer_id" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="username">Experience</label>
                                                <input type="text" name="experience" class="form-control"
                                                    placeholder="Enter Years of Experience">
                                            </div>
                                            <div class="form-group">
                                                <label for="username">Practice Area</label>
                                                <input type="text" class="form-control" name="practice"
                                                    placeholder="Enter Practice Area">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="city" class="form-control"
                                                    placeholder="Enter City">
                                            </div>
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" name="state" class="form-control"
                                                    placeholder="Enter State">
                                            </div>
                                            <div class="form-group">
                                                <label>ZipCode</label>
                                                <input type="text" name="zipcode" class="form-control"
                                                    placeholder="Enter ZipCode">
                                            </div>
                                            <div class="form-group">
                                                <label>Profile Picture</label><span
                                                    class="text-danger"><?php imageAlert(); ?></span>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Courts</label>
                                                <input type="text" name="courts" class="form-control"
                                                    placeholder="Enter courts">
                                            </div>
                                            <div class="form-group">
                                                <label>Website</label>
                                                <input type="website" name="website" class="form-control"
                                                    placeholder="Enter website ">
                                            </div>
                                            <div class="form-group mt-4 ">
                                                <label>Gender</label>
                                                <div class="mt-2 ">
                                                    <input type="radio" name="gender" value="m"
                                                        class="p-1 m-1"><span>Male</span>
                                                    <input type="radio" name="gender" value="f"
                                                        class="p-1 m-1"><span>Female</span>
                                                    <input type="radio" name="gender" value="o"
                                                        class="p-1 m-1"><span>Other</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Office Address</label>
                                        <input type="text" name="address" class="form-control"
                                            placeholder="Enter Address">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" cols="30" rows="4" class="form-control"
                                            placeholder="Describe Yourself"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="add_lawyer" value="Add Lawyer"
                                            class="btn bk-dark text-white">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer -->
<?php include("./includes/footer.php"); ?>

<!--function to add lawyers -->
<?php addLawyer(); ?>