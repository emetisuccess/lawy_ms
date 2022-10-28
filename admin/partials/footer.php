<footer class="site-footer">
    <div class="container">
        <div class="social-links">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-google-plus"></i></a>
            <a href="#"><i class="fa fa-pinterest"></i></a>
        </div>
        <div class="copy">
            <p>Copyright 2014 Company name. Designed by Emeti. All rights reserved.</p>
        </div>
    </div> <!-- #site-content -->
</footer> <!-- .site-footer -->

<script src="js/jquery-1.11.1.min.js"></script>
<script>
$(document).ready(function() {
    $('a').on('click', function(event) {

        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 1000, function() {
                window.location.hash = hash;
            });
        }
    });
});
</script>
<script src="js/plugins.js"></script>
<script src="js/app.js"></script>

</body>

</html>