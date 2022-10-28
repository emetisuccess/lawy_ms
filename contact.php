<?php include("partials/header.php"); ?>
<style>
.center {
    margin-top: 8rem;
}
</style>
<div id="site-content">
    <?php include("partials/menu.php"); ?>
    <main class="main-content">
        <!-- background image -->
        <div class="slides">
            <div class="slideImage6">
                <div class="slides-contents ">
                    <h1 class="display-3 text-center center">Contact Us</h1>
                </div>
            </div>
        </div>
        <div class="fullwidth-block content">
            <div class="container">
                <div class="row contact-info">
                    <div class="col-md-6">
                        <div class="map-container">
                            <div class="row">
                                <div class="col-md-4">
                                    <address>
                                        <strong>Address</strong>
                                        <p style="font-size:19px;">
                                            Uyo City, Akwa Ibom State <br>Nwangiba Road<br>No.60 Use Offot
                                        </p>
                                    </address>
                                </div>
                                <div class="col-md-8">
                                    <div class="contact ">
                                        <strong>Contact</strong>
                                        <p style="font-size:19px;">
                                            <a href="#">(234) 7034 772 399</a>
                                            <a href="#">office@attorneymanager.com</a>
                                            <br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <div class="info"></div>
                        <form class="contact-form">
                            <div class="form-group">
                                <input type="text" name="name" id="name" placeholder="Name...">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" placeholder="Email...">
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" id="subject" placeholder="Subject...">
                            </div>
                            <div class="form-group">
                                <textarea name="body" id="message" placeholder="Message..."></textarea>
                            </div>
                            <div class="text-right form-group">
                                <input name="submit" type="submit" id="sendmail" value="Send message">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main> <!-- .main-content -->
</div> <!-- #site-content -->
<!-- .site-footer -->
<?php include "partials/footer.php"; ?>