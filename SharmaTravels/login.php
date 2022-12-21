<?php
    include "header.php";
?>

<div class="artl-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
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
            <h1>Login</h1>
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
                    Login
                </div>
                <div class="card-body">
                    <form method="post" action="login.php">
                        <fieldset>
                            <div class="form-group">
                                <label for="inputEmail">Email </label>
                                <input type="email" class="form-control" id="inputEmail" placeholder="Enter Email"  name="email" required="" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Password</label>
                                <input type="password" class="form-control" id="inputPassword" placeholder="Enter Your Password" name="password" required>
                            </div>
                            <span class="pull-right"><a href="#">Forgot Password ?</a></span>
                            <button type="submit" name="login_check" id="" class="btn btn-warning btn-lg btn-block mt-3"> Login </button>
                            <br>
                            <div>Don't have an account <a class="cust-links" href="registeration.php">Sign Up?</a></div>
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
        
        if(isset($_POST['login_check'])){

            $email = $_POST['email'];  
            $password = $_POST['password'];
           
            $get_user = mysqli_query($con, "SELECT * FROM users WHERE user_email = '$email' AND password = '$password' LIMIT 1");

            if( mysqli_num_rows($get_user) > 0 ){
                $user_info = mysqli_fetch_array($get_user);

                $_SESSION['logged_in_useremail'] = $user_info['user_email'];
                $_SESSION['status'] = "Login successfully";

                echo "<script> alert('Logged in successfull!!') </script>";
                echo "<script> window.open('index.php','_self') </script>";

            }else{
                $_SESSION['status'] = "Login failed";

                echo "<script> alert('Please check your email and password again!!') </script>";
                echo "<script> window.open('login.php','_self') </script>";
            }

            


                
        }
    
?>