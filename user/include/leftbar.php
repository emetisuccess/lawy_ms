<nav class="ts-sidebar mt-0">
    <ul class="ts-sidebar-menu">

        <li class="ts-label">Dashboard</li>

        <li><a href="index.php">
                <?php
                if (isset($_SESSION['email'])) {
                    $email = $_SESSION['email'];

                    $result = $conn->query("SELECT * FROM lawyer_db WHERE email='$email'");

                    while ($row = $result->fetch_assoc()) {

                        $name = $row['fullname'];

                        $image = $row['image_name'];

                        if ($image != "") {
                            echo "<img src='../uploads/$image' width='35px' style='border-radius:50%; margin-right:13px;'>";
                        } else {
                            echo "<img src='../dummy/avatar@2x.png' width='35px' style='border-radius:50%; margin-right:13px;'>";
                        }
                        echo $name;
                    }
                }
                ?>
            </a></li>

        <li><a href="#"><i class="fa fa-car"></i> Client Management</a>
            <ul>
                <li><a href="add_client.php">Add Client</a></li>
                <li><a href="manage_client.php">Manage Client</a></li>
            </ul>
        </li>

        <li><a href="#"><i class="fa fa-file"></i> Client File Management</a>
            <ul>
                <li><a href="addFile.php">Add CLient File</a></li>
                <li><a href="manage_file.php">Manage Client File</a></li>
            </ul>
        </li>
        <!-- <li><a href="#"><i class="fa fa-desktop"></i> Practice Areas</a>
            <ul>
                <li><a href="add_practice.php">Add Practice Area</a></li>
                <li><a href="manage_practice.php">Manage Practice Area</a></li>
            </ul>
        </li> -->
        <li><a href="#"><i class="fa fa-book"></i>Library</a>
            <ul>
                <li><a href="addLibrary.php">Add to Library</a></li>

                <li><a href="manage_library.php">Manage Library</a></li>
            </ul>
        </li>

        <li><a href="#"><i class="fa fa-user"></i> Account Settings</a>
            <ul>
                <li><a href="update_profile.php?upd_l=<?php echo $_SESSION['email']; ?>">Update Profile</a></li>
                <li><a href="changepwd.php">Change Password</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>