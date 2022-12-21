
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <h4>ABOUT US</h4>
                    <p class="text-justify">We are Sharma Travels established in 2022. We will provide One Way And Round Trip Taxi Services in all over India at best price, we also provide Tours Packages, Holiday Packages.</p>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <h4>Main Menu</h4>
                    <ul class="ft-menu">
                        <li><a href="index.php"><i class="fas fa-angle-right"></i> Home</a></li>
                        <li><a href="aboutus.php"><i class="fas fa-angle-right"></i> About</a></li>
                        <?php
                            if( isset($_SESSION['logged_in_useremail']) ){
                                echo "<li><a href='logout.php'><i class='fas fa-angle-right'></i> LogOut</a></li>";
                            }else{
                                echo "<li><a href='login.php'><i class='fas fa-angle-right'></i> LogIn</a></li>";
                            }

                        ?>
                        <li><a href="registeration.php"><i class="fas fa-angle-right"></i> Registration</a></li>
                        <li><a href="privacypolicy.php"><i class="fas fa-angle-right"></i> Privacy Policy</a></li>
                        <li><a href="terms-condition.php"><i class="fas fa-angle-right"></i> Terms & Conditions</a></li>
                        <li><a href="contact.php"><i class="fas fa-angle-right"></i> Contact</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-5 col-md-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Social</h4>
                            <ul class="ft-social">
                                <li><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="https://www.pinterest.com" target="_blank"><i class="fab fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Accepet Online</h4>
                            <img src="https://www.s3cabsnholidays.com/assets/public/img/paymentoption.png" alt="">
                        </div>
                    </div>
                </div>
              
            </div>
            <br>
            <div class="row footer-bottom">
                <div class="col-md-12 text-center">
                    <p>Copyright © SharmaTravels 2022. All Rights Reserved</p>
                </div>
            </div>

            <div class="row scion">
                <div class="col-lg-6">
                    <a href="tel://+919782059058" style="color: #fb5718;"><span class="ft-icons"><i class="fas fa-phone"></i></span></a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- ========================================================================= -->

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/google.js"></script>
    <!-- <script src="assets/js/cabtimes.js"></script> -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCv_G7jfnOsMJaBj2FRAflll4YlGlYPzzg&amp;libraries=places"></script>

    <script>
    
        if ($(window).width() <= 800) {
            var $htmlOrBody = $('html, body'), // scrollTop works on <body> for some browsers, <html> for others
            scrollTopPadding = 120;
    
            $('input').focus(function() {
                // get textarea's offset top position
                var textareaTop = $(this).offset().top;
                // scroll to the textarea
                $htmlOrBody.scrollTop(textareaTop - scrollTopPadding);
            });
        }
    </script>
    

   
</body>
</html>

