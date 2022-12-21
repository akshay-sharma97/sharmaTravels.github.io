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
                            <li class="breadcrumb-item active" aria-current="page">Cabs</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Breadcum -->

    <!-- ========================================================================= -->

    <section id="tariffs" style="margin-top: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4 class="min-hd">Explore</h4>
                    <h2 class="man-hd">Our Tariffs</h2>
                </div>
            </div>

            <div class="row mt-5">
            <?php
                $get_cabs = mysqli_query($con,"SELECT * FROM cabs");

                if( mysqli_num_rows($get_cabs) > 0 ){
                    while( $cab_info = mysqli_fetch_array( $get_cabs ) ){
                        $cab_id = $cab_info['cab_id'];
                        $cab_name = $cab_info['cab_name'];
                        $cab_image = $cab_info['cab_image'];
                        $cab_feature = $cab_info['cab_feature'];
                        $cab_price_perkm = $cab_info['cab_price_perkm'];
                        $discount_rate = $cab_info['discount_rate'];

                        echo <<< data
                            <div class="col-lg-4 text-center">
                                <div class="tarffi-box">
                                    <img class="img-fluid" src="assets/images/$cab_image" alt="$cab_name">
                                    <h4 class="mt-3">$cab_name</h4>
                                    <p> $cab_name for a drive around the city at your service</p>
                                    <p> $cab_feature </p>
                                    <h4 class="fntclr mt-4"><i class="fas fa-rupee-sign"></i> $cab_price_perkm/KM</h4>
                                </div>
                            </div>
                        data;
                        


                    }
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
    </section> 

<?php
    include "footer.php";
?>