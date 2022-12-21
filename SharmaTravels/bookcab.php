<?php
    include "header.php";
?>



<!-- Breadcum -->
    <div class="artl-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cab Charges</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <br><br>
<!-- Breadcum -->

    <!-- ========================================================================= -->

    <!-- Main -->
    
    <div class="container secon">
        <div class="row mb-3">
            <div class="col-lg-12 text-center">
                <h1>Cab Charges</h1>
            </div>
        </div>

        <?php

            $isoneway = 1;
                
            if( isset($_POST['showtaxi']) ){

                $fmcity = $_POST['fmcity'];
                $tocity = $_POST['tocity'];
                $mob = $_POST['mob'];
                $pickdate = $_POST['pickdate'];
                $pickdate = date("d-m-Y", strtotime($pickdate));  
                $fromcitylong = $_POST['fromcitylong'];
                $fromcitylat = $_POST['fromcitylat'];
                $tocitylat = $_POST['tocitylat'];
                $tocitylong = $_POST['tocitylong'];
                $picktime = $_POST['picktime'];
                

                $theta = $tocitylong - $fromcitylong;
                $miles = (sin(deg2rad($tocitylat))) * sin(deg2rad($fromcitylat)) + (cos(deg2rad($tocitylat)) * cos(deg2rad($fromcitylat)) * cos(deg2rad($theta)));
                $miles = acos($miles);
                $miles = rad2deg($miles);
                $result['miles'] = $miles * 60 * 1.1515;
                $result['feet'] = $result['miles']*5280;
                $result['yards'] = $result['feet']/3;
                $result['kilometers'] = $result['miles']*1.609;
                $result['meters'] = $result['kilometers']*1000;

                $total_km =  $result['kilometers'];
                $total_km = round($total_km);

            }else if( isset($_POST['showtaxird']) ){

                $isoneway = 0;

                $fmcity = $_POST['fmcity'];
                $tocity = $_POST['tocity'];
                $mob = $_POST['mob'];
                $pickdate = $_POST['pickdate'];
                $pickdate = date("d-m-Y", strtotime($pickdate));  
                $fromcitylong = $_POST['fromcitylongrd'];
                $fromcitylat = $_POST['fromcitylatrd'];
                $tocitylat = $_POST['tocitylatrd'];
                $tocitylong = $_POST['tocitylongrd'];
                $rtndate = $_POST['rtndate'];
                $rtndate = date("d-m-Y", strtotime($rtndate));  
                $picktime = $_POST['picktime'];

                $theta = $tocitylong - $fromcitylong;
                $miles = (sin(deg2rad($tocitylat))) * sin(deg2rad($fromcitylat)) + (cos(deg2rad($tocitylat)) * cos(deg2rad($fromcitylat)) * cos(deg2rad($theta)));
                $miles = acos($miles);
                $miles = rad2deg($miles);
                $result['miles'] = $miles * 60 * 1.1515;
                $result['feet'] = $result['miles']*5280;
                $result['yards'] = $result['feet']/3;
                $result['kilometers'] = $result['miles']*1.609;
                $result['meters'] = $result['kilometers']*1000;

                $total_km =  $result['kilometers'];
                $total_km = round($total_km);
                
                $roundwayCharges_inPer = 10;

            }else{
                echo "<script> alert('Something went wrong, redirecting you to home page'); </script>";
                echo "<script> window.open('index.php','_self'); </script>";
            }

            //setCookie('nyotevisit','yes',time()+((60*60)*24));
            
            $_SESSION['bookcab'] = "Yes";
            $_SESSION['fmcity'] = $fmcity;
            $_SESSION['tocity'] = $tocity;
            $_SESSION['pickdate'] = $pickdate;
            if( $isoneway == 0 ){
                $_SESSION['rtndate'] = $rtndate;
            }
            $_SESSION['picktime'] = $picktime;
            $_SESSION['isoneway'] = $isoneway;
            $_SESSION['total_km'] = $total_km;
            //$_COOKIE['fmcity'] = $fmcity;
        ?>

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
            <?php
                $get_cabs = mysqli_query($con,"SELECT * FROM cabs");
                $get_cab_modal = mysqli_query($con,"SELECT * FROM cab_models");


                if( mysqli_num_rows($get_cabs) > 0 ){
                    

                    $array_modal = array();
                    $array_cab_modal = array();
                    while( $modal_info = mysqli_fetch_array( $get_cab_modal )){
                        $cab_id = $modal_info['cab_id'];
                        $cab_model_id = $modal_info['cab_model_id'];
                        $model_name = $modal_info['model_name'];

                        if( array_key_exists( "$cab_id", $array_cab_modal )  ){
                            $array_cab_modal["$cab_id"] = $array_cab_modal["$cab_id"] . ", $model_name";
                        }else{
                            $array_cab_modal["$cab_id"] = $model_name;
                        }
                    }

                
            ?> 
            <div class="col-lg-8">
                <div class="row">
                   
                    <?php
                        while( $cab_info = mysqli_fetch_array( $get_cabs ) ){
                            $cab_id = $cab_info['cab_id'];
                            $cab_name = $cab_info['cab_name'];
                            $cab_image = $cab_info['cab_image'];
                            $cab_feature = $cab_info['cab_feature'];
                            $cab_price_perkm = $cab_info['cab_price_perkm'];
                            $discount_rate = $cab_info['discount_rate'];

                            
                            $total_price = $total_km * $cab_price_perkm;
                            $price = $total_price;
                            if( $isoneway == 0 ){
                                $total_price = ($total_km * 2 ) * $cab_price_perkm;
                                $total_price = round($total_price + ($total_price * ($roundwayCharges_inPer / 100)));
                            }
                            $price = $total_price;

                            
                            

                            echo <<< data
                                <div style="border-right: 2px dotted #828282;" class="col-lg-4 text-center">
                                    <div class="tarffi-box">
                                        <img class="img-fluid" src="assets/images/$cab_image" alt="$cab_name">
                                        <h4 class="mt-3">$cab_name</h4>

                                        <p>
                            data;
                            echo $array_cab_modal["$cab_id"];

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
                                            
                                            
                            echo <<< data
                                        <p>
                                        <a href="confirmbooking.php?cab_id=$cab_id" class="btn btn-warning btn-sm sm-bttn mt-4" style="background: #fb5718;"> <strong style="color: #fff;">Book Now </strong></a>
                                        </p>
                                    </div>
                                </div>
                            data;

                        }
                            
                        
                    ?> 
                  
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
                                    <td class="td-right">₹ 2/Min</td>
                                </tr>
                                <tr>
                                    <td>Night Charge(9 Pm To 6 Am)</td>
                                    <td class="td-right">₹ 300/Day</td>
                                </tr>
                                <tr>
                                    <td>On Every Extra Pickup / Drop</td>
                                    <td class="td-right">₹ 499</td>
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
                                    <td>SEDAN</td>
                                    <td class="td-right">₹ 10/KM</td>
                                </tr>
                                <tr>
                                    <td>SUV CAB</td>
                                    <td class="td-right">₹ 14/KM</td>
                                </tr>
                                <tr>
                                    <td>Innova</td>
                                    <td class="td-right">₹ 16/KM</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            

            <?php
                }else{
                    echo <<< data
                        <div class="col-12">
                            <div class="p-5 text-center" style="margin-top: 50px; margin-bottom: 50px;">
                                <h2> Cabs not available!! </h2>
                            </div>
                        </div>
                    data;
                }
            ?> 
        </div>
    </div>
    <br>
<!-- Main -->

<?php
    include "footer.php";
?>