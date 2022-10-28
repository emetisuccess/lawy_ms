<header class="site-header sticky-top">
    <div class="container-fluid">
        <a href="index.php" id="branding" style="text-decoration: none;">
            <img src="images/logo.png" alt="Company Name" class="logo">
            <div class="branding-copy">
                <h1 class="site-title" style="font-size:15px;">Attorney Consultancy</h1>
                <small class="site-description">Law & Roles</small>
            </div>
        </a>

        <nav class="main-navigation">
            <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
            <ul class="menu">
                <li class="menu-item"><a href="index.php" style="text-decoration: none; font-size:15px;">Home</a></li>
                <li class="menu-item">
                    <a href="about.php" style="text-decoration: none; font-size:15px;">About Us</a>
                </li>
                <li class="menu-item">
                    <a href="experience.php" style="text-decoration: none; font-size:15px;">
                        Lawyers / Advocates</a>
                </li>
                <li class="menu-item">
                    <a href="service.php" style="text-decoration: none; font-size:15px;">Service</a>
                </li>
                <li class="menu-item">
                    <a href="contact.php" style="text-decoration: none; font-size:15px;">Contact</a>
                </li>
                <?php
                if (isset($_SESSION['email']) or isset($_SESSION['emails'])) {
                    // display logout
                ?>
                <li class="menu-item">
                    <a href="admin" style="text-decoration: none; font-size:15px;">Admin</a>
                </li>
                <li class="menu-item">
                    <a href="user/logout.php" style="text-decoration: none; font-size:15px;">Logout</a>
                </li>
                <?php
                }
                ?>

                <?php
                if (!isset($_SESSION['email']) && !isset($_SESSION['emails'])) {
                    // display logout
                ?>
                <li class="menu-item">
                    <a href="admin" style="text-decoration: none; font-size:15px;">Admin</a>
                </li>
                <li class="menu-item">
                    <a href="user/login.php" style="text-decoration: none; font-size:15px;">Login</a>
                </li>
                <?php
                }
                ?>

            </ul>
        </nav>
        <nav class="mobile-navigation"></nav>
    </div>
</header> <!-- .site-header -->