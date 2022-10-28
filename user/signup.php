<?php include "include/header.php"; ?>
<?php include "functions.php"; ?>
<style>
* {
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
}

body {
    background-image: url("../images/scales-justice-ICON.png");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100vh;
    width: 100vw;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 my-5 ">
            <div class="card mt-4 border-0">
                <div class="card-header bk-dark text-white">
                    <h3 class="display-4">Signup</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <?php
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                        ?>
                        <div class=" form-group">
                            <label for="full_name">FullName</label>
                            <input type="text" name="full_name" class="form-control" placeholder="Enter Fullname">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control"
                                placeholder="Enter Your Password">
                        </div>
                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input type="password" name="confirmpwd" class="form-control"
                                placeholder="Confirm Your Password">
                        </div>
                        <div class="form-group">
                            <label for="image">Upload Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="register" value="Submit"
                                class="btn btn-block bk-dark text-white">
                        </div>
                    </form>
                    <div class="text-center">
                        <p>Already have an Account? <a href="login.php">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>

<?php

if (isset($_POST["register"])) {

    $query = "SELECT * FROM users";
    $select_user = mysqli_query($conn, $query);

    //get user input
    $full_name = secure_input($_POST["full_name"]);
    $email = secure_input($_POST["email"]);
    $password = secure_input($_POST["password"]);
    $confirmpwd = secure_input($_POST["confirmpwd"]);

    $hashFormat = "$2y$10$";
    $salt = "iusesomecrazystrings22";
    $hashF_and_salt = $hashFormat . $salt;
    $password = crypt($password, $hashF_and_salt);

    $hash1Format = "$2y$10$";
    $salt1 = "iusesomecrazystrings22";
    $hash_and_salt = $hash1Format . $salt1;
    $confirmpwd = crypt($confirmpwd, $hash_and_salt);

    if (isset($_FILES['image']['name'])) {

        $image_name = $_FILES['image']['name'];

        if ($image_name != "") {

            // get the image size
            $image_size = $_FILES['image']['size'];

            // check for the allowed image extension;
            $allowed_image_ext = array("jpg", "jpeg", "png");

            // get the extension
            $ext = pathinfo($image_name, PATHINFO_EXTENSION);

            // check for the size of the image;
            if ($image_size > 2000000) {

                // display if extension is not valid;
                $_SESSION["image"] = " <span class='text-capitalize text-danger'>Image must be less than 2MB</span>";

                // redirect to add lawyer page;
                header("location: index.php");

                // kill the process 
                die();
            } else {

                if (!in_array($ext, $allowed_image_ext)) {

                    // display if extension is not valid;
                    $_SESSION["image"] = " <span class='text-capitalize'>Allowed extension are JPG, PNG & JPEG</span>";

                    // redirect to add lawyer page;
                    header("location: index.php");

                    // kill the process 
                    die();
                } else {

                    // get the source path;
                    $source_path = $_FILES["image"]["tmp_name"];

                    // get the destination source path;
                    $destination_path = "../uploads/" . $image_name;

                    // set the upload path;
                    $upload = move_uploaded_file($source_path, $destination_path);

                    // check if the image has been uploaded or not;
                    if ($upload == false) {

                        // if failed to upload display this message;
                        echo "<h5 class='text-danger'>File failed upload successfully</h5>";

                        // redirect to add lawyer page;
                        header("location:manage_lawyer.php");

                        //kill the process;
                        die();
                    }
                }
            }
        }
    }


    // check for empty fields and display message
    if (!$full_name || !$email || !$password || !$confirmpwd) {
        // display session message;
        $_SESSION["msg"] = "<div class='text-center'>Please fill in the fields</div>";

        // redirect to add_admin.php if fields are empty;
        header("location: signup.php");
    } else {

        while ($rows = $select_user->fetch_assoc()) {
            $useremail = $rows['email'];

            if ($email === $useremail) {

                $_SESSION["msg"] = "<div class='text-center text-danger'>Email Already existed, choose another</div>";

                // redirect to add_admin.php if fields are empty;
                header("location: signup.php");

                // kill the process;
                die();
            }
        };

        // check if the password and the confirm password match
        if ($password === $confirmpwd) {
            // insert user data into database;
            $stmt = $conn->prepare("INSERT INTO users(fullname, email, password, confirmpwd, image_name) VALUES(?,?,?,?,?)");
            $stmt->bind_param("sssss", $full_name, $email, $password, $confirmpwd, $image_name);
            $stmt->execute();

            if (!$stmt) {

                die("QUERY FAILED " . mysqli_error($conn));
            } else {

                $_SESSION["msg"] = "<div class='text-center text-success'>User Successfully Added</div>";

                header("location: login.php");
            }

            $stmt->close();
            $conn->close();
        } else {

            $_SESSION["msg"] = "<div class='text-center text-danger'>Provide a matching Password</div>";

            // redirect to add_admin.php if fields are empty;
            header("location: signup.php");
        }
    }
}

?>