<?php require_once("./admin/includes/config.php"); ?>
<?php
function lawyerDetails()
{
    // set the database connection to global
    global $conn;

    //get the target link
    if (isset($_GET['id']) && isset($_GET['status'])) {

        // get the required id
        $id = $_GET["id"];

        // get the status of the lawyer
        $status = $_GET['status'];

        //query the database;
        $res = $conn->query("SELECT * FROM lawyer_db WHERE id=$id AND status='$status'");


        $count = mysqli_num_rows($res);

        if ($count > 0) {
            // if there is data in the database then display it
            while ($row = $res->fetch_assoc()) {
                $id = $row['lawyerID'];
                $name = $row['fullname'];
                $email = $row['email'];
                $mobile = $row['mobile'];
                $officeAddress = $row['officeAddress'];
                $experience = $row['experience'];
                $practiceArea = $row['practiceArea'];
                $city = $row['city'];
                $state = $row['state'];
                $image_name = $row['image_name'];
                $court = $row['courts'];
                $website = $row['website'];
                $desc = $row['description'];
            }
        }
    }
}
?>