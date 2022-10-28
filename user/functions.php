<?php require_once("include/config.php"); ?>
<?php
// function to display message
function showAlert()
{
    if (isset($_SESSION["added"])) {
        echo $_SESSION["added"];
        unset($_SESSION["added"]);
    }
    if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    if (isset($_SESSION["success"])) {
        echo $_SESSION["success"];
        unset($_SESSION["success"]);
    }
    if (isset($_SESSION["fail"])) {
        echo $_SESSION["fail"];
        unset($_SESSION["fail"]);
    }
    if (isset($_SESSION["allow"])) {
        echo $_SESSION["allow"];
        unset($_SESSION["allow"]);
    }

    if (isset($_SESSION["msg"])) {
        echo $_SESSION["msg"];
        unset($_SESSION["msg"]);
    }

    if (isset($_SESSION["delete"])) {
        echo $_SESSION["delete"];
        unset($_SESSION["delete"]);
    }
    if (isset($_SESSION["update"])) {
        echo $_SESSION["update"];
        unset($_SESSION["update"]);
    }
}

function imageAlert()
{
    if (isset($_SESSION["image"])) {
        echo $_SESSION["image"];
        unset($_SESSION["image"]);
    }
}


// function to add lawyers
function addLawyer()
{
    global $conn;

    if (isset($_POST["add_lawyer"])) {

        //get input fields
        $fullname = secure_input($_POST["fullname"]);
        $mobile = secure_input($_POST["mobile_number"]);
        $email = secure_input($_POST["email"]);
        $password = secure_input(md5($_POST["password"]));
        $lawyer_id = secure_input($_POST["lawyer_id"]);
        $experience = secure_input($_POST["experience"]);
        $practice = secure_input($_POST["practice"]);
        $address = secure_input($_POST["address"]);
        $city = secure_input($_POST["city"]);
        $state = secure_input($_POST["state"]);
        $zipcode = secure_input($_POST["zipcode"]);
        $court = secure_input($_POST["courts"]);
        $website = secure_input($_POST["website"]);
        $desc = secure_input($_POST["description"]);
        $gender = secure_input($_POST["gender"]);

        // validate the gender fields
        if ($gender !== "") {
            // get the selected button
            $gender = secure_input($_POST["gender"]);
        } else {
            // set gender to be other 'o';
            $gender = 'o';
        }



        // upload image to the database;
        if (isset($_FILES["image"]["name"])) {

            // get the image name
            $image_name = $_FILES["image"]["name"];

            // check for image;
            if ($image_name != "") {

                // get the image size;
                $image_size = $_FILES['image']['size'];

                // allowed image extension;
                $allowed_image_extension = array('jpg', 'png', 'jpeg');

                // get the extension type
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
                    if (!in_array($ext, $allowed_image_extension)) {

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


        // initialize input fields;
        if (
            !$fullname  || !$mobile || !$email || !$password ||
            !$lawyer_id || !$experience || !$practice || !$address
            || !$city || !$state || !$zipcode || !$court || !$website || !$desc
        ) {

            //display session message when the fields are empty;
            $_SESSION["fail"] = "<h5 class='text-danger text-capitalize'>Please fill in the fields</h5>";

            // redirect to the same page;
            header("location: index.php");
        } else {

            // insert data into database;
            $stmt = $conn->prepare("INSERT INTO lawyer_db(fullname, mobile, email,
             password, lawyer_id, experience, practiceArea, officeAddress, city,
              state, zipCode, image_name,courts, website, description, gender) 
              VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

            $stmt->bind_param(
                "sissssssssisssss",
                $fullname,
                $mobile,
                $email,
                $password,
                $lawyer_id,
                $experience,
                $practice,
                $address,
                $city,
                $state,
                $zipcode,
                $image_name,
                $court,
                $website,
                $desc,
                $gender
            );
            $stmt->execute();

            // check if the image has been added or not;
            if ($stmt == true) {

                // display the message if the condition is true;
                $_SESSION["added"] = "<h5 class='text-success'>Lawyer has been added successfully</h5>";

                // redirect to manage_lawyer page;
                header("location: index.php");
            } else {

                // display the message if the condition is false;
                $_SESSION["added"] = "<h5 class='text-danger'>Failed to Add Lawyer</h5>";

                // redirect to manage_lawyer page;
                header("location: index.php");
            }


            $stmt->close();
            $conn->close();
        }
    }
}

////////////// FUNCTION TO UPDATE LAWYER////////////////////////// 
function updateLawyer()
{

    // make the connection to database global;
    global $conn;

    // get the target edit button
    if (isset($_POST["edit_lawyer"])) {

        //get input fields
        $id = secure_input($_POST["id"]);
        $fullname = secure_input($_POST["fullname"]);
        $username = secure_input($_POST["username"]);
        $mobile = secure_input($_POST["mobile_number"]);
        $email = secure_input($_POST["email"]);
        $lawyer_id = secure_input($_POST["lawyer_id"]);
        $experience = secure_input($_POST["experience"]);
        $practice = secure_input($_POST["practice"]);
        $address = secure_input($_POST["address"]);
        $city = secure_input($_POST["city"]);
        $state = secure_input($_POST["state"]);
        $zipcode = secure_input($_POST["zipcode"]);
        $courts = secure_input($_POST["courts"]);
        $website = secure_input($_POST["website"]);
        $current_image = secure_input($_POST['current_image']);
        $description = secure_input($_POST["description"]);
        $status = secure_input($_POST['status']);
        $gender = $_POST['gender'];


        if ($gender != "") {
            $gender = $_POST['gender'];
        } else {
            $gender = "o";
        }

        // get the image to update;
        if (isset($_FILES['image']['name'])) {

            // get the image name;
            $image = $_FILES['image']['name'];

            if ($image != "") {

                // get the image name;
                $image_size = $_FILES['image']['size'];

                // set the allowable extensions 
                $allowable_image_ext = ["jpg", "jpeg", "png"];

                // get the extension;
                $ext = pathinfo($image, PATHINFO_EXTENSION);

                // check if the image size exit the maximum or not;
                if ($image_size > 2000000) {

                    // if the uploaded image is greater than 2MB display this message;
                    $_SESSION['image'] = "Image size is greater than 2MB";
                } else {

                    // check for the allowable extension;
                    if (!in_array($ext, $allowable_image_ext)) {

                        // display the message if the condition is true;
                        $_SESSION["added"] = "<h5 class='text-danger'>Allowable image types are jpg, jpeg, png</h5>";

                        // redirect to manage_lawyer page;
                        header("location: manage_lawyer.php");

                        // kill the process
                        die();
                    } else {

                        // get the image source path;
                        $source_path = $_FILES['image']['tmp_name'];

                        // get the image destination path;
                        $destination_path = "../uploads/" . $image;

                        // set the 
                        $uploads = move_uploaded_file($source_path, $destination_path);

                        if ($uploads == false) {
                            // display the message if the condition is true;
                            $_SESSION["added"] = "<h5 class='text-danger'>Failed to Upload Image!!</h5>";

                            // redirect to manage_lawyer page;
                            header("location: manage_lawyer.php");

                            // kill the process
                            die();
                        }

                        // delete the current image after setting the new image;
                        // get the current image path;
                        $current_image_path = "../uploads/" . $current_image;

                        // remove the current image;
                        $remove_current_image = unlink($current_image_path);

                        // check if the image has been removed or not;
                        if ($remove_current_image == false) {

                            // display the message if the condition is true;
                            $_SESSION["added"] = "<h5 class='text-danger'>Failed to remove Image!!</h5>";

                            // redirect to manage_lawyer page;
                            header("location: manage_lawyer.php");

                            // kill the process
                            // die();
                        }
                    }
                }
            } else {

                //set the current on if no image is selected;
                $image = $current_image;
            }
        }


        $result = $conn->query("UPDATE lawyer_db 
            SET 
            fullname='$fullname', 
            username='$username', 
            mobile='$mobile',
            email='$email',
            lawyer_id='$lawyer_id',
            experience='$experience',
            practiceArea='$practice',
            officeAddress='$address',
            city='$city',
            state='$state',
            zipCode='$zipcode',
            image_name='$image',
            courts='$courts',
            website='$website',
            description='$description',
            status='$status',
            gender='$gender'
            
            WHERE id=$id");

        if ($result == true) {

            // display the message if the condition is true;
            $_SESSION["added"] = "<h5 class='text-success'>Lawyer has been updated successfully!</h5>";

            // redirect to manage_lawyer page;
            header("location: manage_lawyer.php");
        } else {

            // display the message if the condition is true;
            $_SESSION["added"] = "<h5 class='text-danger'>Failed to Update lawyer!!</h5>";

            // redirect to manage_lawyer page;
            header("location: manage_lawyer.php");
        }
    }
}
//////xxxxx//////// FUNCTION TO UPDATE LAWYER ENDS////////xxxx////////////////// 
?>