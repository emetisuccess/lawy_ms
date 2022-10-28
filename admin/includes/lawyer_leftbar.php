<nav class="ts-sidebar mt-0">
    <ul class="ts-sidebar-menu">

        <li class="ts-label"><?php echo $name; ?>'s Dashboard</li>

        <li><a href="#"><img src="<?php echo '../uploads/' . $image; ?>"
                    style="border-radius:50%; width:40px; height:40px; margin-right: 6px;">
                <?php echo $name; ?>
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
                <li><a href="view_client.php">View Client File</a></li>
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
                <li><a href="">Update Profile</a></li>
                <li><a href="changePassword.php">Change Password</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>