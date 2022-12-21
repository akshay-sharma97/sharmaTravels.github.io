<?php
    include "header.php";
?>

<div class="artl-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Registration</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="container secon">
    <div class="row mb-3">
        <div class="col-lg-12 text-center">
            <h1>Registration</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    Registration
                </div>
                <div class="card-body">
                    <form method="post" action="registeration.php">
                        <fieldset>
                            <div class="form-group">
                                <label for="inputName">Full Name</label>
                                <input type="text" class="form-control" id="inputName" placeholder="Enter Your Full Name" name="fullnm" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="inputRgMobile">Mobile No</label>
                                <input type="tel" class="form-control" id="inputRgMobile" placeholder="Enter Mobile No" minlength="10" maxlength="10" name="usermob" required>
                            </div>
                            <div class="form-group">
                                <label for="InpEmail">Email</label>
                                <input type="email" class="form-control" name="InpEmail" id="InpEmail" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Password</label>
                                <input type="password" class="form-control" id="inputPassword" placeholder="Enter Your Password" minlength="8" name="nwpassword" required>
                            </div>
                            <div class="form-group">
                                <label for="inputCrnfPassword">Confrim Password</label>
                                <input type="password" class="form-control" id="inputCrnfPassword" placeholder="Enter Your Password" minlength="8" name="cfmpassword" required>
                                <span style="color:red;" id="mbNoErr"></span>
                            </div>
                            <br><br>
                            <button type="submit" id="UrReg" name="signup_check" class="btn btn-warning btn-lg btn-block"> Register </button>
                            <br>
                            <div>Do you have an account <a class="cust-links" href="login.html">Sign In?</a></div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>


<?php
    include "footer.php";
?>

<?php
        //Storing the data in contact_us table 
        
        if(isset($_POST['signup_check'])){

            $fullnm = $_POST['fullnm'];
            $usermob = $_POST['usermob'];
            $InpEmail = $_POST['InpEmail'];
            $nwpassword = $_POST['nwpassword'];
            $cfmpassword = $_POST['cfmpassword'];
           
            $get_user = mysqli_query($con, "SELECT * FROM users WHERE user_email = '$email' LIMIT 1");

            if( mysqli_num_rows($get_user) > 0 ){

                echo "<script> alert('A user already signed up with the given email, please enter another email!!') </script>";
                echo "<script> window.open('registeration.php','_self') </script>";

            }else{

                date_default_timezone_set('Asia/Calcutta'); 
                $created_date = date('Y-m-d', time());

                $insert_user = "INSERT INTO users( user_name, user_email, mobile_no, password, created_date) VALUES ('$fullnm','$InpEmail','$usermob','$nwpassword','$created_date')";
                
                if( mysqli_query($con, $insert_user) ){
                    $_SESSION['logged_in_useremail'] = $InpEmail;

                    echo "<script> alert('Your have successfully signed up!!') </script>";
                    echo "<script> window.open('index.php','_self') </script>";
                }
                
            }
                
        }
    
?>