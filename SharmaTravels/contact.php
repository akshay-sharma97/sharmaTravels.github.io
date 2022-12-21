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
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="container secon">
    <div class="row">
        <div class="col-lg-6">
            <div class="mapouter">
                <div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=540&amp;height=600&amp;hl=en&amp;q=Ajmer&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://mcpedls.com/">Minecraft Download</a></div>
                <style>.mapouter{position:relative;text-align:right;width:540px;height:600px;}.gmap_canvas {overflow:hidden;background:none!important;width:540px;height:600px;}.gmap_iframe {width:540px!important;height:600px!important;}</style>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-12">
                    <h5>Contact Us</h5>
                    <ul class="addrs">
                        <li><i class="fa fa-home fa-fw"></i> Ajmer, Ajmer, Ajmer, Rajasthan 305001</li>
                        <li><i class="fa fa-envelope fa-fw"></i> websiteowner@gmail.com </li>
                        <li><i class="fa fa-phone fa-fw"></i> +91-9988774422</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h5>Contact Form</h5>
                    <form method="post" action="contact.php">
                        <div class="form-group">
                            <label for="InpFullNm">Full Name</label>
                            <input type="text" class="form-control" name="InpFullNm" id="InpFullNm" placeholder="Enter Full Name">
                        </div>
                        <div class="form-group">
                            <label for="InpEmail">Email</label>
                            <input type="email" class="form-control" name="InpEmail" id="InpEmail" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="InpSubject">Subject</label>
                            <input type="text" class="form-control" name="InpSubject" id="InpSubject" placeholder="Enter Subject">
                        </div>
                        <div class="form-group">
                            <label for="InpMessage">Message</label>
                            <textarea class="form-control" id="InpMessage" rows="5" name="InpMessage" placeholder="Enter Message"></textarea>
                        </div>
                        <button type="submit" name="submit_contact" class="btn btnshp">Submit</button>
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
        
        if(isset($_POST['submit_contact'])){

                $C_Name = $_POST['InpFullNm'];  
                $C_email = $_POST['InpEmail'];
                $sub = $_POST['InpSubject']; 
                $C_comment = $_POST['InpMessage'];

                date_default_timezone_set('Asia/Calcutta'); 
                $created_date = date('Y-m-d', time());

                //inserting contact us detail in database
                $sql = "INSERT INTO contact_us (name,email,subject,message,created_date)VALUES ('$C_Name','$C_email','$sub','$C_comment','$created_date')";
                $run_insert_query = mysqli_query($con, $sql);
            
              
              
                $admin_mail = "[ <Website's admin email address> ]";
                $msg_body = $C_comment;
                //$msg_body = wordwrap($msg_body,70);
                

                $sender_name = $C_Name;
                $sender_email = $C_email;
                $sender_subject = $sub;
                $sender_message = $C_comment;
                $headers = "From: $sender_email"; 

                $receiverEmail = $admin_mail;

                // to shoot mail
                //if(mail($receiverEmail, $sender_subject, $sender_message, $headers)){ ----- }

                echo "<script> alert('Data inserted in backend!!') </script>";
                echo "<script> window.load('contact.php','_self') </script>";


                
        }
    
?>