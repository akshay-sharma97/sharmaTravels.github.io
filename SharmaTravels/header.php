<?php
    $con = mysqli_connect("localhost","root","","sharamtravels");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-205125015-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
    
        gtag('config', 'UA-205125015-1');
    </script>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sharma Tavels</title>



    <link rel="icon" href="https://www.s3cabsnholidays.com/assets/public/img/favicon.png" sizes="20x20" type="image/png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:700,800%7COpen+Sans:400,600,700" rel="stylesheet"> 

</head>
<body>
    <!-- header start -->
    <header class="header fixed-top">
        <div class="container">
            <div class="row mn-border">
                <div class="col-3">
                    <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" alt=""></a>
                </div>

                <div class="col-9 text-right">
                    <nav style="float:right;" class="navbar navbar-expand-lg navbar-dark bg-dark1">
                        <a class="navbar-brand" href="#"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse mn-spc" id="navbarColor02">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="aboutus.php">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="cabs.php">Cabs</a>
                                </li>
                                <?php
                                    if( isset($_SESSION['logged_in_useremail']) ){
                                        echo "<li class='nav-item'>
                                                <a class='nav-link' href='logout.php'>LogOut</a>
                                            </li>";
                                    }else{
                                        echo "<li class='nav-item'>
                                                <a class='nav-link' href='login.php'>LogIn</a>
                                            </li>";
                                    }
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- ========================================================================= -->