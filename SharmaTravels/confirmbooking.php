<?php
    include "header.php";
?>



<div class="artl-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="https://www.s3cabsnholidays.com/cab_booking">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cab Booking</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<br><br>

<?php
    if( isset($_SESSION['logged_in_useremail']) ){
        if( isset($_GET['cab_id'])){
            $cab_id = $_GET['cab_id']; 
            $user_email = $_SESSION['logged_in_useremail'];

            $get_user = mysqli_query($con, "SELECT * FROM users WHERE user_email = '$user_email' LIMIT 1");
            $user_info = mysqli_fetch_array($get_user);
            $user_name = $user_info['user_name'];
            $mobile_no = $user_info['mobile_no'];

            $get_cabs = mysqli_query($con,"SELECT * FROM cabs WHERE cab_id = $cab_id LIMIT 1");
            $get_cab_modal = mysqli_query($con,"SELECT * FROM cab_models WHERE cab_id = $cab_id LIMIT 1");

            if( mysqli_num_rows($get_cabs) > 0 ){

                $cab_info = mysqli_fetch_array($get_cabs);
                $cab_id = $cab_info['cab_id'];
                $cab_name = $cab_info['cab_name'];
                $cab_image = $cab_info['cab_image'];
                $cab_feature = $cab_info['cab_feature'];
                $cab_price_perkm = $cab_info['cab_price_perkm'];
                $discount_rate = $cab_info['discount_rate'];
                $array_modals = array();

                if( mysqli_num_rows($get_cab_modal) > 0 ){
                    while( $modal_info = mysqli_fetch_array( $get_cab_modal )){
                        $cab_id = $modal_info['cab_id'];
                        $cab_model_id = $modal_info['cab_model_id'];
                        $model_name = $modal_info['model_name'];

                        array_push( $array_modals, $model_name );
                    }
                }

                $array_modals_str = implode(",",$array_modals);

                $roundwayCharges_inPer = 10;

                $fmcity = $_SESSION['fmcity'];
                $tocity = $_SESSION['tocity'];
                $pickdate = $_SESSION['pickdate'];
                $picktime = $_SESSION['picktime'];
                $isoneway = $_SESSION['isoneway'];
                $total_km = $_SESSION['total_km'];
                if( $isoneway == 0 ){
                    $rtndate = $_SESSION['rtndate'];
                }
                $total_price = $total_km * $cab_price_perkm;
                $price = $total_price;
                if( $isoneway == 0 ){
                    $total_price = ($total_km * 2 ) * $cab_price_perkm;
                    $total_price = round($total_price + ($total_price * ($roundwayCharges_inPer / 100)));
                }
                $price = $total_price;
            }
        }
    }else{
        echo "<script> alert('Please log in first in order to confirm booking!!'); </script>";
        echo "<script> window.open('login.php','_self'); </script>";
    }

?>

<div class="container secon">
    <div class="row mb-3">
        <div class="col-lg-12 text-center">
            <h1>Cab Booking</h1>
        </div>
    </div>
    <div class="head-box mb-5">
        <div class="row">
            <div class="col-lg-6">
            <strong>One Way Trip -  From: <?php echo substr($fmcity,0,strpos($fmcity,",")); ?> | To: <?php echo substr($tocity,0,strpos($tocity,",")); ?></strong>
            </div>
            <div class="col-lg-6 text-right">
                <?php if( $isoneway == 0 ){ ?>
                <strong>Date: <?php echo $pickdate; ?> | Return Date: <?php echo $rtndate; ?> | Time: <?php echo $picktime; ?></strong>
                <?php }else{ ?>
                <strong>Date: <?php echo $pickdate; ?> | Time: <?php echo $picktime; ?></strong>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div style="border-right: 2px dotted #828282;" class="col-lg-8">
            <div class="row">
                <?php
                
                    echo <<< data
                        <div class="col-lg-12 text-center" style="margin-bottom: 50px;">
                            <div style="padding-bottom: 0px;" class="tarffi-box">
                                <img class="img-fluid" src="assets/images/$cab_image" alt="$cab_name">
                                <h4 class="mt-3">$cab_name</h4>

                                <p>
                    data;
                    echo $array_modals_str;

                    echo <<< data
                        <br> $cab_feature <br> All Inclusive (Toll, State Tax) 
                    </p>

                    data;

                    if( $discount_rate != 0 ){
                        $price = round($total_price - ( $total_price * ( $discount_rate / 100 ) ));

                        echo <<< data
                            <h4 class="fntclr mt-4 mb-2">
                                $price Rs
                                <span style="text-decoration: line-through;font-weight:500; padding-left:10px; font-weight: bold; color:#000;">
                                    $total_price
                                </span>  
                            </h4>
                            <span style="color:green; font-weight:bold;">Flat Discount $discount_rate% off</span>
                        data;
                    }else{
                        echo <<< data
                            <h4 class="fntclr mt-4 mb-2">
                                $price Rs
                            </h4>
                        data;
                    }
                    echo "</div></div>"
                ?>
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" action="payment.php">
                        <fieldset>
                            <div class="form-group">
                                <label for="inputName">Full Name</label>
                                <input type="text" class="form-control" id="inputName" value="<?php echo $user_name; ?>" name="fullnm" required="" autofocus="">
                            </div>
                            <div class="form-group">
                                <label for="inputRgMobile">Mobile No</label>
                                <input type="tel" class="form-control" id="inputRgMobile" name="usermob" value="<?php echo $mobile_no; ?>" required="">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email Id</label>
                                <input type="email" id="inputEmail" class="form-control" value="<?php echo $user_email; ?>" name="email" required="">
                            </div>
                            <div class="form-group">
                                <label for="inputPickup">Pick Up From</label>
                                <input type="text" class="form-control" id="inputPickup" value="<?php echo $fmcity; ?>" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="inputDrop">Dropping</label>
                                <input type="text" class="form-control" id="inputDrop" value="<?php echo $tocity; ?>" readonly="">
                            </div>
                            <div class="form-group form-check">
                                <input class="form-check-input" type="radio" name="payment" id="InpPyFul" value="pay_full" required="">
                                <label class="form-check-label" for="InpPyFul">Pay Full Online ₹ <span id="bkFlAmt">2000</span>/-</label>
                                <input type="hidden" id="GtFlAmt" name="pdFlAmt" value="2000">
                            </div>
                            <a href="payment.php" class="btn btn-warning btn-lg btn-block" style="background: #fb5718; "> <strong style="color: #fff;">Payment</strong>  </a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                    <strong>Details</strong>
                    <table class="cus-table mt-2">
                        <tbody>
                            <tr>
                                <td>Toll Tax</td>
                                <td class="td-right">Included</td>
                            </tr>
                            <?php
                                    if( $isoneway == 0 ){
                                        echo "<tr><td>Distance</td> <td class='td-right'> $total_km KMs </td></tr>";
                                        echo "<tr><td>Return Distance</td> <td class='td-right'>  $total_km KMs </td></tr>";
                                    }else{
                                        echo "<tr><td>Distance</td> <td class='td-right'> $total_km KMs </td></tr>";
                                    }
                                ?>
                            <tr>
                                <td>Base Fare</td>
                                <td class="td-right">Included</td>
                            </tr>
                            <tr>
                                <td>One Pickup &amp; One Drop</td>
                                <td class="td-right">Included</td>
                            </tr>
                            <tr>
                                <td>Vehicle &amp; Fuel Charges</td>
                                <td class="td-right">Included</td>
                            </tr>
                            <tr>
                                <td>Parking &amp; Airport Entry</td>
                                <td class="td-right">If Applicable</td>
                            </tr>
                            <tr>
                                <td>Waiting Charge</td>
                                <td class="td-right">₹ 3/Min</td>
                            </tr>
                            <tr>
                                <td>Night Charge(9 Pm To 6 Am)</td>
                                <td class="td-right">₹ 250/Day</td>
                            </tr>
                            <tr>
                                <td>On Every Extra Pickup / Drop</td>
                                <td class="td-right">₹ 299</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <strong>Charges for More KMs</strong>
                    <table class="cus-table mt-2">
                        <tbody>
                            <tr>
                                <td><?php echo $cab_name; ?></td>
                                <td class="td-right">₹ <?php echo $cab_price_perkm; ?>/KM</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<?php 
    include "footer.php";
?>